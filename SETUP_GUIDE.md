# SAVIOR SSS Website - Setup & Testing Guide

## 🚀 Quick Start (5 Minutes)

### Step 1: Initialize Database
1. Ensure XAMPP is running (Apache + MySQL)
2. Open your browser
3. Go to: **http://localhost/SAVIOR_SSS/php/init_db.php**
4. You should see: ✓ "Database initialized successfully!"

### Step 2: Access the Website
Visit: **http://localhost/SAVIOR_SSS/**

You should see the professional homepage with:
- School name "SAVIOR SSS" in navigation
- Motto "ENDURE AND SUCCEED"
- Hero section with "Apply Now" button
- Quick info cards
- Latest news preview
- Call to action section

### Step 3: Test All Pages

**Navigation Menu:**
- [Home](http://localhost/SAVIOR_SSS/) ✓
- [About](http://localhost/SAVIOR_SSS/about.php) - School info, facilities, contact
- [Academics](http://localhost/SAVIOR_SSS/academics.php) - O-Level & A-Level programs
- [Admissions](http://localhost/SAVIOR_SSS/admissions.php) - Application form
- [News](http://localhost/SAVIOR_SSS/news.php) - News & events
- [Staff](http://localhost/SAVIOR_SSS/staff.php) - Staff directory
- [Gallery](http://localhost/SAVIOR_SSS/gallery.php) - Photos
- [Contact](http://localhost/SAVIOR_SSS/contact.php) - Contact form

---

## 📋 Testing Checklist

### Homepage
- [ ] School logo/name displays correctly
- [ ] Navigation menu is visible
- [ ] Hero section displays properly
- [ ] "Apply Now" button works
- [ ] Info cards are responsive
- [ ] News preview shows

### About Page
- [ ] School information displays
- [ ] Motto "ENDURE AND SUCCEED" is visible
- [ ] All contact details are present:
  - Phone: +256 785 376 582
  - Director: +256 782 744 355
  - Address: P.O. Box 151, Kisoro
  - Centre No: U3734 ME/32/5760
- [ ] Facilities list displays

### Academics Page
- [ ] O-Level program details
- [ ] A-Level program details
- [ ] Arts & Science streams
- [ ] Subject listings
- [ ] "Start Your Application" button

### Admissions Page
- [ ] 5-step process displays
- [ ] Requirements boxes show
- [ ] Form has all fields:
  - Full Name
  - Email
  - Phone
  - Level (O/A)
  - Stream (Arts/Science)
  - Message
- [ ] Form submits successfully
- [ ] Contact info displays

### Contact Page
- [ ] Contact form has all fields
- [ ] Location info displays
- [ ] Phone numbers correct
- [ ] Office hours show
- [ ] Map placeholder present
- [ ] Form validates on submit

### Responsive Design
- [ ] Desktop (1920px) - looks good
- [ ] Tablet (768px) - navigation adapts
- [ ] Mobile (375px) - hamburger menu works
- [ ] All text readable
- [ ] Images scale properly

---

## 🗄️ Database Verification

### Check Database Creation

1. Open phpMyAdmin: http://localhost/phpmyadmin
2. On left side, look for database: **savior_sss_db**
3. Click to expand and verify these tables exist:
   - `pages`
   - `news`
   - `staff`
   - `admissions`
   - `messages`
   - `gallery`
   - `admin_users`

### Verify Tables Have Data

1. Click on `admin_users` table
2. You should see one record:
   - **username:** admin
   - **email:** admin@savior-sss.ac.ug
   - **role:** admin

3. Click on `pages` table
4. Should see 3 sample pages:
   - About
   - Academics
   - Admissions

---

## 📝 Test Form Submissions

### Test Admission Form
1. Go to [Admissions](http://localhost/SAVIOR_SSS/admissions.php)
2. Fill out form:
   - Name: Test Student
   - Email: test@example.com
   - Phone: 0785376582
   - Level: O-Level
   - Stream: Science
   - Message: I'm interested in joining
3. Click "Submit Application"
4. Should redirect and show success message

### Verify in Database
1. Go to phpMyAdmin
2. Navigate to `savior_sss_db` → `admissions`
3. You should see your test entry

### Test Contact Form
1. Go to [Contact](http://localhost/SAVIOR_SSS/contact.php)
2. Fill out form:
   - Name: John Doe
   - Email: john@example.com
   - Phone: 0782744355
   - Subject: Test Message
   - Message: This is a test message about the school
3. Click "Send Message"
4. Should show success message

### Verify in Database
1. Go to phpMyAdmin
2. Navigate to `savior_sss_db` → `messages`
3. You should see your test message

---

## 🎨 Visual Inspection

### Color Scheme
- **Navigation:** Gradient blue (primary: #1a5f8e)
- **Buttons:** Gold/orange (#f39c12)
- **Text:** Dark gray (#2c3e50)
- **Background:** Light gray sections

### Typography
- **Headings:** Segoe UI, bold
- **Body:** Segoe UI, regular weight
- **Sizes:** Responsive (larger on desktop, smaller on mobile)

### Layout Elements
- [ ] Sticky navigation bar
- [ ] Hero section with gradient
- [ ] Card-based layouts
- [ ] Hover effects on buttons and cards
- [ ] Responsive grid layouts
- [ ] Footer with school info

---

## 🔧 Troubleshooting

### Database Not Connecting

**Error:** "Connection failed: Access denied"

**Solution:**
1. Ensure MySQL is running in XAMPP
2. Check credentials in `php/config.php`:
   ```php
   DB_HOST: localhost
   DB_USER: root
   DB_PASS: (empty)
   ```
3. Restart MySQL and try again

### Forms Not Submitting

**Error:** Forms don't save data

**Solution:**
1. Verify database tables exist in phpMyAdmin
2. Check file permissions on `php/` folder
3. Check browser console for errors (F12)
4. Try re-running `init_db.php`

### Styling Not Applied

**Error:** Page looks plain/broken

**Solution:**
1. Hard refresh page: Ctrl+Shift+R (or Cmd+Shift+R on Mac)
2. Check CSS file path in browser (F12 > Network tab)
3. Verify `css/style.css` file exists
4. Check navigation in `php/header.php`

### Mobile Menu Not Working

**Error:** Hamburger menu doesn't open

**Solution:**
1. Check browser zoom (should be 100%)
2. Try different browser
3. Clear browser cache
4. Check `js/script.js` is loading (F12 > Console)

---

## 📊 Admin Credentials

**Default Login (for future admin panel):**
- **Username:** admin
- **Password:** admin123
- **Email:** admin@savior-sss.ac.ug

⚠️ **Change this password before going live!**

---

## 🚀 Next Steps

### Immediate (To Make It Perfect)
1. Add school logo to images folder
2. Add school photos to gallery
3. Update colors to match school branding (if different)
4. Add real news articles
5. Add staff members to staff directory

### Short Term (This Week)
1. Test all forms thoroughly
2. Test on different browsers (Chrome, Firefox, Safari, Edge)
3. Test on mobile devices
4. Set up Google Analytics
5. Create backup of database

### Medium Term (This Month)
1. Add news regularly
2. Build admin dashboard
3. Set up email notifications
4. Collect testimonials from students
5. Implement search functionality

### Long Term (This Quarter)
1. Add student portal
2. Integrate payment system
3. Set up email newsletter
4. Deploy to live server
5. Set up HTTPS certificate

---

## 📞 Support

If you encounter any issues:

1. **Check Console:** Press F12, check Console tab for errors
2. **Check Network:** F12 > Network tab to see failed requests
3. **Test Database:** Go to phpMyAdmin and verify data
4. **Restart XAMPP:** Stop all and start again
5. **Check File Paths:** Ensure all files exist in correct folders

---

## ✅ Ready to Launch!

Once all tests pass, your SAVIOR SSS website is ready for:
- ✓ Local hosting on XAMPP
- ✓ Testing with team/staff
- ✓ Sharing with stakeholders
- ✓ Collecting feedback
- ✓ Making final adjustments
- ✓ Deploying to live server

**Website Location:** `c:\xampp\htdocs\SAVIOR_SSS\`  
**Access URL:** http://localhost/SAVIOR_SSS/

---

**Enjoy your new SAVIOR SSS website! 🎉**
