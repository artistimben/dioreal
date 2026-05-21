<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;

class AdminAuthTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Configure default test credentials
        Config::set('auth.admin.username', 'admin');
        Config::set('auth.admin.password', 'admin');
        
        // Ensure env variables do not override Config in tests
        putenv('ADMIN_USERNAME=admin');
        putenv('ADMIN_PASSWORD=admin');
    }

    protected function tearDown(): void
    {
        // Clean up test data files
        $testFile = storage_path('app/data/test_hotel.json');
        if (File::exists($testFile)) {
            File::delete($testFile);
        }

        // Clean up uploaded files in test
        $uploadDir = public_path('storage/uploads');
        if (File::exists($uploadDir)) {
            File::cleanDirectory($uploadDir);
        }

        parent::tearDown();
    }

    /**
     * Test unauthenticated access to /admin redirects to /login.
     */
    public function test_unauthenticated_user_cannot_access_admin_and_redirects_to_login(): void
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Test login with invalid credentials fails.
     */
    public function test_user_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('/login', [
            'username' => 'wronguser',
            'password' => 'wrongpass',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('login_error');
        $this->assertFalse(session()->has('is_admin'));
    }

    /**
     * Test login with valid credentials succeeds and redirects to /admin.
     */
    public function test_user_can_login_with_valid_credentials_and_is_redirected_to_admin(): void
    {
        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/admin');
        $this->assertTrue(session()->get('is_admin'));
    }

    /**
     * Test authenticated user can access admin dashboard.
     */
    public function test_logged_in_user_can_access_admin_dashboard(): void
    {
        $response = $this->withSession(['is_admin' => true])->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('DIOREAL DİJİTAL');
    }

    /**
     * Test user can log out successfully.
     */
    public function test_logged_in_user_can_logout(): void
    {
        $response = $this->withSession(['is_admin' => true])
                         ->post('/logout');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
        $this->assertFalse(session()->has('is_admin'));
    }

    /**
     * Test API save endpoint requires admin middleware protection.
     */
    public function test_api_save_endpoint_requires_auth(): void
    {
        $response = $this->postJson('/api/save?key=test_hotel', ['title' => 'Test']);
        $response->assertStatus(401);
    }

    /**
     * Test API save endpoint intercepts base64 images, writes them to disk, and replaces with URL path.
     */
    public function test_api_save_endpoint_extracts_base64_images(): void
    {
        // 1x1 transparent PNG base64
        $base64Image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==';

        $payload = [
            'name' => 'Maxx Royal',
            'details' => [
                'hero_image' => $base64Image,
                'gallery' => [
                    $base64Image,
                    'normal_image_path.jpg'
                ]
            ]
        ];

        $response = $this->withSession(['is_admin' => true])
                         ->postJson('/api/save?key=test_hotel', $payload);

        $response->assertStatus(200);
        $response->assertJsonStructure(['success', 'key', 'size']);

        // Verify JSON file is stored
        $testFile = storage_path('app/data/test_hotel.json');
        $this->assertTrue(File::exists($testFile));

        $savedContent = json_decode(File::get($testFile), true);

        // Verify the base64 string was replaced with a public path
        $extractedPath1 = $savedContent['details']['hero_image'];
        $extractedPath2 = $savedContent['details']['gallery'][0];
        $normalPath = $savedContent['details']['gallery'][1];

        $this->assertStringStartsWith('/storage/uploads/', $extractedPath1);
        $this->assertStringStartsWith('/storage/uploads/', $extractedPath2);
        $this->assertEquals('normal_image_path.jpg', $normalPath);

        // Verify that the files actually exist on disk
        $file1 = public_path(ltrim($extractedPath1, '/'));
        $file2 = public_path(ltrim($extractedPath2, '/'));

        $this->assertTrue(File::exists($file1));
        $this->assertTrue(File::exists($file2));
    }
}
