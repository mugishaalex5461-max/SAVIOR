<?php
define('SKIP_DB_CONNECTION', true);
require_once 'config.php';

// Create database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql_create_db = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if (!$conn->query($sql_create_db)) {
    die("Error creating database: " . $conn->error);
}

$conn->close();

// Reconnect to the created database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables
$tables = [
    // Pages content
    "CREATE TABLE IF NOT EXISTS pages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        slug VARCHAR(255) UNIQUE NOT NULL,
        content LONGTEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",
    
    // News & Events
    "CREATE TABLE IF NOT EXISTS news (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        image VARCHAR(255),
        published_date DATETIME,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        is_active BOOLEAN DEFAULT 1
    )",
    
    // Staff directory
    "CREATE TABLE IF NOT EXISTS staff (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        position VARCHAR(255) NOT NULL,
        department VARCHAR(255),
        email VARCHAR(255),
        phone VARCHAR(20),
        bio TEXT,
        image VARCHAR(255),
        is_active BOOLEAN DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    // Admissions
    "CREATE TABLE IF NOT EXISTS admissions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(20),
        level VARCHAR(50) COMMENT 'O-Level, A-Level',
        stream VARCHAR(50) COMMENT 'Science, Arts',
        message TEXT,
        status VARCHAR(50) DEFAULT 'pending' COMMENT 'pending, reviewed, accepted, rejected',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    // Contact messages
    "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(20),
        subject VARCHAR(255),
        message LONGTEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )",
    
    // Gallery
    "CREATE TABLE IF NOT EXISTS gallery (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        image VARCHAR(255) NOT NULL,
        category VARCHAR(100),
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        is_active BOOLEAN DEFAULT 1
    )",
    
    // Admin users
    "CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        role VARCHAR(50) DEFAULT 'editor',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login DATETIME
    )"
];

foreach ($tables as $table_sql) {
    if (!$conn->query($table_sql)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Insert sample admin user (password: admin123)
$admin_check = $conn->query("SELECT id FROM admin_users WHERE username = 'admin' LIMIT 1");
if ($admin_check->num_rows == 0) {
    $admin_password = password_hash('admin123', PASSWORD_DEFAULT);
    $conn->query("INSERT INTO admin_users (username, password, email, role) VALUES ('admin', '$admin_password', 'admin@savior-sss.ac.ug', 'admin')");
}

// Insert sample pages
$pages = [
    ['About', 'about', '<h1>About SAVIOR SSS</h1><p>Content to be added...</p>'],
    ['Academics', 'academics', '<h1>Academics</h1><p>Our O-Level and A-Level programs...</p>'],
    ['Admissions', 'admissions', '<h1>Admissions</h1><p>How to apply...</p>']
];

foreach ($pages as $page) {
    $check = $conn->query("SELECT id FROM pages WHERE slug = '{$page[1]}' LIMIT 1");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO pages (title, slug, content) VALUES ('{$page[0]}', '{$page[1]}', '{$page[2]}')");
    }
}

echo "Database initialized successfully!";
$conn->close();
?>
