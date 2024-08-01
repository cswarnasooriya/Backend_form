<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $file = $_FILES['file'];

    if (empty($name) || empty($email) || empty($message) || empty($file['name'])) {
        die('Please fill all required fields.');
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    // Handle file upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($file["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file type
    $allowedTypes = ['jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx'];
    if (!in_array($fileType, $allowedTypes)) {
        die('Only JPG, JPEG, PNG, PDF, DOC, and DOCX files are allowed.');
    }

    // Move file to target directory
    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        die('Error uploading file.');
    }

    // Prepare email
    $to = 'your-email@example.com';
    $subject = 'New Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message\nFile: $target_file";
    $headers = "From: $email";

    // Send email
    if (!mail($to, $subject, $body, $headers)) {
        die('Error sending email.');
    }

    echo 'Form submitted successfully.';
} else {
    echo 'Invalid request method.';
}
?>
