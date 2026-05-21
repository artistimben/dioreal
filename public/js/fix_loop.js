const fs = require('fs');

let html = fs.readFileSync('index.html', 'utf-8');

// 1. Remove padding from dest-row and add spacer divs
html = html.replace(/<div class="dest-row" style="padding: 0 5rem; display: flex; gap: 2rem; text-align: left; width: 100vw; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">/g, 
    '<div class="dest-row" style="padding: 0; display: flex; gap: 2rem; text-align: left; width: 100vw; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">\n            <div class="dest-spacer" style="flex: 0 0 3rem;"></div>');

html = html.replace(/<div class="dest-row" style="flex: 1; padding: 0 5rem; display: flex; gap: 2rem; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">/g, 
    '<div class="dest-row" style="flex: 1; padding: 0; display: flex; gap: 2rem; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">\n            <div class="dest-spacer" style="flex: 0 0 3rem;"></div>');

// Add the end spacer before the closing tag of dest-row. 
// We can do this in the JS block entirely instead of HTML regex to be safer!

// Let's rewrite the JS block entirely
const jsStartStr = '/* ── DESTINATIONS SLIDER SCROLL (AUTO + DRAG) ──────────── */';
const jsStartIdx = html.indexOf(jsStartStr);

if (jsStartIdx !== -1) {
    const jsEndIdx = html.indexOf('</script>', jsStartIdx);
    if (jsEndIdx !== -1) {
        const newJs = `/* ── DESTINATIONS SLIDER SCROLL (AUTO + DRAG) ──────────── */

        document.querySelectorAll('.dest-row').forEach(slider => {
            // Ensure there is an end spacer for symmetry before cloning
            const endSpacer = document.createElement('div');
            endSpacer.className = 'dest-spacer';
            endSpacer.style.flex = '0 0 3rem';
            slider.appendChild(endSpacer);

            // Clone children for infinite scroll
            const children = Array.from(slider.children);
            children.forEach(child => {
                const clone = child.cloneNode(true);
                if(clone.id) clone.removeAttribute('id');
                slider.appendChild(clone);
            });

            let isDown = false;
            let startX;
            let scrollLeft;
            let autoScrollInterval;

            const startAuto = () => {
                autoScrollInterval = setInterval(() => {
                    if (!isDown) {
                        slider.scrollLeft += 1;
                        
                        // Because we perfectly duplicated the entire content including start/end spacers
                        // The scrollWidth is exactly 2x the original content.
                        // When scrollLeft hits scrollWidth / 2, it is perfectly looking at the cloned startSpacer!
                        if (slider.scrollLeft >= slider.scrollWidth / 2) {
                            slider.scrollLeft = 0;
                        }
                    }
                }, 15); // Slightly faster for smoother appearance
            };
            
            // Start the auto-scroll animation
            startAuto();

            // Pause on hover or touch
            slider.addEventListener('mouseenter', () => clearInterval(autoScrollInterval));
            slider.addEventListener('mouseleave', () => { isDown = false; startAuto(); });
            slider.addEventListener('touchstart', () => clearInterval(autoScrollInterval), {passive: true});
            slider.addEventListener('touchend', startAuto);

            // Drag to scroll logic
            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
                slider.style.cursor = 'grabbing';
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.style.cursor = 'grab';
            });
            slider.addEventListener('mouseleave', () => {
                if (isDown) {
                    isDown = false;
                    slider.style.cursor = 'grab';
                }
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 1.5;
                slider.scrollLeft = scrollLeft - walk;
            });
        });
    `;
        html = html.substring(0, jsStartIdx) + newJs + html.substring(jsEndIdx);
        fs.writeFileSync('index.html', html, 'utf-8');
        console.log('Fixed infinite loop jump.');
    }
}
