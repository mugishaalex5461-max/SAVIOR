<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $level = sanitizeInput($_POST['level'] ?? '');
    $stream = sanitizeInput($_POST['stream'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($level)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO admissions (name, email, phone, level, stream, message, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("ssssss", $name, $email, $phone, $level, $stream, $message);

    if ($stmt->execute()) {
        // Redirect to success page or display message
        header('Location: /SAVIOR_SSS/admissions.php?success=1');
        exit;
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error submitting application']);
    }

    $stmt->close();
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}

$conn->close();
?>
