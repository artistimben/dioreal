<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hakkimizda()
    {
        return view('hakkimizda');
    }

    public function oteller()
    {
        return view('oteller');
    }

    public function yatlar()
    {
        return view('yatlar');
    }

    public function restoranlar()
    {
        return view('restoranlar');
    }

    public function geziRehberi()
    {
        return view('gezi-rehberi');
    }

    public function etkinlikler()
    {
        return view('etkinlikler');
    }

    public function journal()
    {
        return view('journal');
    }

    public function admin()
    {
        return view('admin');
    }
}
