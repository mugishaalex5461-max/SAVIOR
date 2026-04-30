#!/usr/bin/env python
# Add responsive map CSS to style.css

with open('css/style.css', 'r') as f:
    content = f.read()

new_css = '''
/* Map Container - Interactive Google Map */
.map-container {
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    margin-top: 1rem;
}

.map-container iframe {
    width: 100%;
    height: 400px;
    border: none;
    border-radius: 10px;
    display: block;
}

@media (max-width: 768px) {
    .map-container iframe {
        height: 300px;
    }
}

@media (max-width: 480px) {
    .map-container iframe {
        height: 250px;
    }
}
'''

if '.map-container' not in content:
    content = content.rstrip() + '\n' + new_css + '\n'
    with open('css/style.css', 'w') as f:
        f.write(content)
    print('✓ Responsive map CSS added to style.css!')
else:
    print('✓ Map CSS already exists in style.css!')
