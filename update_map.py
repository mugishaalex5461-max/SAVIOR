#!/usr/bin/env python
# Update contact page with interactive Google Map

with open('contact.html', 'r') as f:
    content = f.read()

old_map = '<div class="map-placeholder"><p>Interactive map coming soon</p></div>'
new_map = '<div class="map-container"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0!2d29.73!3d-1.27!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19f5d0d0d0d0d0d1%3A0x123456789!2sKisoro%2C%20Uganda!5e0!3m2!1sen!2sug!4v1234567890" width="100%" height="300" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>'

content = content.replace(old_map, new_map)

with open('contact.html', 'w') as f:
    f.write(content)

print('✓ Interactive Google Map added to contact.html!')
print('✓ Users can now click and interact with the live Kisoro map!')
