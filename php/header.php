<?php
// Header template
require_once 'config.php';

$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getPageTitle($current_page); ?></title>
    <link rel="stylesheet" href="/SAVIOR_SSS/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h1><?php echo SCHOOL_NAME; ?></h1>
                <p class="motto"><?php echo SCHOOL_MOTTO; ?></p>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="<?php echo $current_page == 'index' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo $current_page == 'about' ? 'active' : ''; ?>">About</a></li>
                <li><a href="academics.php" class="<?php echo $current_page == 'academics' ? 'active' : ''; ?>">Academics</a></li>
                <li><a href="admissions.php" class="<?php echo $current_page == 'admissions' ? 'active' : ''; ?>">Admissions</a></li>
                <li><a href="https://www.facebook.com/search/top?q=SAVIOR%20Secondary%20School%20Kisoro" target="_blank" rel="noopener" class="<?php echo $current_page == 'news' ? 'active' : ''; ?>">News</a></li>
                <li><a href="staff.php" class="<?php echo $current_page == 'staff' ? 'active' : ''; ?>">Staff</a></li>
                <li><a href="gallery.php" class="<?php echo $current_page == 'gallery' ? 'active' : ''; ?>">Gallery</a></li>
                <li><a href="contact.php" class="<?php echo $current_page == 'contact' ? 'active' : ''; ?>">Contact</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
</body>
</html>
