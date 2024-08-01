<!-- Here is using pure PHP for form validation because I still not familier with Laravel also -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ensure form fields
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $file = $_FILES['file'];

    if (empty($name) || empty($email) || empty($message) || empty($file['name'])) {
        die('Please fill all required fields.');
    }

    // check the email format and validate it
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

    // Check file type is match the uploaded type
    $allowedTypes = ['jpg', 'png', 'jpeg', 'pdf'];
    if (!in_array($fileType, $allowedTypes)) {
        die('Sorry...! Only JPG, JPEG, PNG, PDF files are still allowed.');
    }

   
    if (!move_uploaded_file($file["tmp_name"], $target_file)) {
        die('Error uploading file.');
    }

    // Here I specify my email address to dent that submited data now
    $to = 'warnasooriyacs1000@gmail.com'; //my email address was added in here for testing
    $subject = 'Form submit from Backend Task intern';
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
