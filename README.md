# SAVIOR_SSS — School Website

This repository contains the website project for SAVIOR_SSS (PHP + static assets).

Important: This project uses PHP files and requires a PHP-capable webserver (Apache, Nginx + PHP). GitHub Pages only serves static sites and cannot run PHP.

Deployment options
- Host on a PHP-capable server (cPanel, shared hosting, VPS). Use the provided GitHub Actions workflow to deploy via FTP.
- Convert site to static HTML (if you don't use server-side PHP) and deploy to GitHub Pages instead.

Quick local steps

1. Initialize git and commit:

```bash
cd SAVIOR_SSS
git init
git add .
git commit -m "Prepare site for deployment"
git branch -M main
```

2. Create a GitHub repo (https://github.com/new) and add remote, then push:

```bash
git remote add origin git@github.com:YOUR_USERNAME/YOUR_REPO.git
git push -u origin main
```

Deploy via FTP (recommended for PHP hosting)

1. In your GitHub repository settings, create the following Secrets:
- `FTP_HOST` — e.g. `ftp.example.com`
- `FTP_USERNAME` — FTP username
- `FTP_PASSWORD` — FTP password
- `FTP_SERVER_DIR` — remote path, e.g. `/public_html` or `/public_html/SAVIOR_SSS`

2. The workflow `.github/workflows/deploy-ftp.yml` deploys the repository on every push to `main`.

If you want me to create the GitHub repo and push for you, tell me your GitHub username and desired repository name (I can use `gh` if available), or I can walk you through the steps.
# SAVIOR SSS Website

**School:** SAVIOR Secondary School  
**Location:** Nyakinama, Bufumbira, Western Uganda  
**Motto:** Endure and Succeed

## Overview

This is a complete, professional, XAMPP-ready PHP website for SAVIOR Secondary School. The site includes all essential pages for a modern school presence with easy content management.

## Features

✅ **Responsive Design** - Works on desktop, tablet, and mobile  
✅ **Modern UI** - Professional gradient theme with blue primary colors  
✅ **Database-Driven** - MySQL backend with content management  
✅ **Contact Management** - Form submissions stored in database  
✅ **Admissions System** - Application form and tracking  
✅ **News & Events** - Dynamic news section  
✅ **Staff Directory** - Team member showcase  
✅ **Gallery** - Photo gallery system  
✅ **Mobile-Friendly Navigation** - Hamburger menu for mobile  
✅ **SEO-Ready** - Semantic HTML, proper structure  

## Project Structure

```
SAVIOR_SSS/
├── index.php                 # Homepage
├── about.php                 # About the school
├── academics.php             # O-Level & A-Level programs
├── admissions.php            # Admissions & application form
├── news.php                  # News & events
├── staff.php                 # Staff directory
├── gallery.php               # Photo gallery
├── contact.php               # Contact form
├── php/
│   ├── config.php            # Database configuration
│   ├── header.php            # Navigation template
│   ├── footer.php            # Footer template
│   ├── init_db.php           # Database initialization
│   ├── process_admission.php  # Admission form handler
│   └── process_contact.php    # Contact form handler
├── css/
│   └── style.css             # Complete styling (1000+ lines)
├── js/
│   └── script.js             # Interactive features
├── images/                   # School images (add here)
├── uploads/                  # User uploads directory
└── admin/                    # Admin area (to be developed)
```

## School Information

| Item | Details |
|------|---------|
| **Name** | SAVIOR SSS |
| **Motto** | ENDURE AND SUCCEED |
| **Type** | Mixed Day and Boarding |
| **Location** | Nyakinama, Bufumbira, Western Uganda |
| **Address** | P.O. Box 151, Kisoro |
| **Phone** | +256 785 376 582 |
| **Director** | +256 782 744 355 |
| **Email** | info@savior-sss.ac.ug |
| **Centre No** | U3734 ME/32/5760 |
| **Programs** | O-Level & A-Level (Arts & Science) |

## Quick Start

### 1. Database Setup

1. Open `phpMyAdmin` (http://localhost/phpmyadmin)
2. Navigate to the `SAVIOR_SSS` folder
3. Open your browser and visit: **http://localhost/SAVIOR_SSS/php/init_db.php**
4. You should see: "Database initialized successfully!"

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`

### 2. Access the Website

Visit: **http://localhost/SAVIOR_SSS/**

### 3. Test Features

**Homepage:** http://localhost/SAVIOR_SSS/  
**About Page:** http://localhost/SAVIOR_SSS/about.php  
**Academics:** http://localhost/SAVIOR_SSS/academics.php  
**Admissions:** http://localhost/SAVIOR_SSS/admissions.php  
**News:** http://localhost/SAVIOR_SSS/news.php  
**Staff:** http://localhost/SAVIOR_SSS/staff.php  
**Gallery:** http://localhost/SAVIOR_SSS/gallery.php  
**Contact:** http://localhost/SAVIOR_SSS/contact.php  

## Pages Overview

| Page | Purpose | Status |
|------|---------|--------|
| **Home** | Landing page with hero section, quick info, news preview | ✅ Complete |
| **About** | School history, facilities, contact info | ✅ Complete |
| **Academics** | O-Level & A-Level programs, subjects, support services | ✅ Complete |
| **Admissions** | Application process, requirements, online form | ✅ Complete |
| **News** | News articles and events | ✅ Complete |
| **Staff** | Staff directory and management info | ✅ Complete |
| **Gallery** | Photo gallery (placeholder ready) | ✅ Complete |
| **Contact** | Contact form and location info | ✅ Complete |

## Database Tables

The system automatically creates these tables:

1. **pages** - Content pages (About, Academics, etc.)
2. **news** - News articles and events
3. **staff** - Staff directory
4. **admissions** - Admission applications
5. **messages** - Contact form submissions
6. **gallery** - Photo gallery
7. **admin_users** - Admin accounts

## Styling

The site uses a professional color scheme:
- **Primary:** #1a5f8e (School blue)
- **Secondary:** #2a7dab (Lighter blue)
- **Accent:** #f39c12 (Gold/Orange highlights)
- **Fully Responsive:** Mobile-first design approach

## Customization Guide

### Add School Logo
1. Place logo image in `images/` folder
2. Edit `php/header.php` to display logo
3. Add CSS styling for logo

### Add News Articles
1. Go to phpMyAdmin
2. Insert data into `news` table:
   - `title`: Article title
   - `content`: Article content
   - `published_date`: Date in YYYY-MM-DD format
   - `is_active`: 1 for active, 0 for inactive

### Add Staff Members
1. Go to phpMyAdmin
2. Insert data into `staff` table:
   - `name`: Staff name
   - `position`: Job title
   - `department`: Department
   - `email`: Email address
   - `phone`: Phone number
   - `is_active`: 1 for active

### Customize Colors
1. Edit `css/style.css`
2. Change `:root` variables:
   ```css
   --primary-color: #1a5f8e;
   --secondary-color: #2a7dab;
   --accent-color: #f39c12;
   ```

## Form Submissions

### Admission Applications
- Automatically saved to `admissions` table
- Can view in phpMyAdmin
- Use for follow-up communications

### Contact Messages
- Automatically saved to `messages` table
- Can view in phpMyAdmin
- Implement email notification (optional)

## Admin Area

The admin section is scaffolded in the `admin/` folder. Future development can include:
- Admin login/dashboard
- News management interface
- Staff management
- Application reviews
- Message viewing
- Gallery management
- Content editor

## Next Steps (Future Enhancements)

1. **Admin Dashboard** - Build admin login and management interface
2. **Email Notifications** - Send emails when forms are submitted
3. **Image Uploads** - Allow gallery image uploads
4. **Search Functionality** - Search news and staff
5. **Events Calendar** - Calendar-based event display
6. **Student Portal** - Login for students to view grades
7. **Payment Integration** - Online fee payment system
8. **Email Newsletter** - Subscribe and send newsletters
9. **Social Media Integration** - Facebook, Twitter, Instagram
10. **Mobile App** - Native mobile application

## Support & Maintenance

### Common Issues

**Database Connection Error:**
- Check XAMPP MySQL is running
- Verify credentials in `php/config.php`
- Run `init_db.php` again

**Forms Not Working:**
- Check MySQL connection
- Verify table exists in database
- Check file permissions in `uploads/` folder

**Styling Issues:**
- Clear browser cache (Ctrl+Shift+Delete)
- Check CSS file path in `php/header.php`
- Verify all CSS classes match in HTML

### Maintenance Tasks

- Regularly backup database
- Monitor form submissions
- Update news and events
- Add staff photos to gallery
- Check for broken links
- Test on different browsers

## File Permissions

Ensure these folders are writable:
- `uploads/` - for file uploads
- `php/` - for form processing

## Security Notes

⚠️ **Before Going Live:**
1. Change admin password in database
2. Use HTTPS encryption
3. Implement CSRF tokens
4. Add rate limiting to forms
5. Sanitize all user inputs (already done)
6. Use prepared statements (already done)
7. Add firewall rules
8. Regular security audits

## Technical Specifications

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **Hosting:** XAMPP (Apache + MySQL)
- **Responsive:** Mobile, Tablet, Desktop
- **Performance:** Optimized for fast loading

## Version History

**v1.0** (Current)
- Initial website launch
- All core pages and features
- Database structure
- Responsive design
- Contact and admission forms

## License

This website is custom-built for SAVIOR Secondary School. All rights reserved.

## Contact for Support

**School:** SAVIOR SSS  
**Email:** info@savior-sss.ac.ug  
**Phone:** +256 785 376 582  
**Director:** +256 782 744 355  

---

**Created:** 2024  
**Status:** Active and Maintained  
**Last Updated:** April 2024
