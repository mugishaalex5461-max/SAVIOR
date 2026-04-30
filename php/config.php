<?php
// SAVIOR SSS Website Configuration

// Database connection
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'savior_sss_db');

// School Information
define('SCHOOL_NAME', 'SAVIOR SSS');
define('SCHOOL_MOTTO', 'ENDURE AND SUCCEED');
define('SCHOOL_TYPE', 'Mixed Day and Boarding');
define('SCHOOL_LOCATION', 'Nyakinama, Bufumbira, Western Uganda');
define('SCHOOL_BOX', 'P.O. Box 151, Kisoro');
define('SCHOOL_PHONE1', '+256 785 376 582');
define('SCHOOL_PHONE2', '+256 782 744 355');
define('SCHOOL_DIRECTOR_PHONE', '+256 782 744 355');
define('SCHOOL_WHATSAPP', '+256 776252838');
define('SCHOOL_CENTRE_NO', 'U3734 ME/32/5760');
define('SCHOOL_EMAIL', 'info@savior-sss.ac.ug');

// Programs
define('PROGRAMS', 'O\'Level and A\'Level (Arts & Science)');

// Connect to database (only if database exists)
$conn = null;
if (!defined('SKIP_DB_CONNECTION')) {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($conn->connect_error) {
            // Database doesn't exist yet, create it
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
            if (!$conn->query("CREATE DATABASE IF NOT EXISTS " . DB_NAME)) {
                die("Error creating database: " . $conn->error);
            }
            $conn->close();
            
            // Reconnect to new database
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        }
        
        $conn->set_charset("utf8");
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Helper functions
function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

function formatDate($date) {
    return date('d M Y', strtotime($date));
}

function getPageTitle($page) {
    $titles = [
        'home' => 'Home | SAVIOR SSS',
        'about' => 'About Us | SAVIOR SSS',
        'academics' => 'Academics | SAVIOR SSS',
        'admissions' => 'Admissions | SAVIOR SSS',
        'news' => 'News & Events | SAVIOR SSS',
        'staff' => 'Staff Directory | SAVIOR SSS',
        'contact' => 'Contact Us | SAVIOR SSS',
        'gallery' => 'Gallery | SAVIOR SSS'
    ];
    
    return $titles[$page] ?? 'SAVIOR SSS - Endure and Succeed';
}
?>
