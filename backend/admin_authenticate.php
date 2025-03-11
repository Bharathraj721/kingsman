<?php
// Admin credentials (for demonstration purposes, these should be stored securely)
$admin_username = "admin";
$admin_password = "password"; // Change this to a secure password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['admin-username'];
    $input_password = $_POST['admin-password'];

    // Check if the credentials match
    if ($input_username === $admin_username && $input_password === $admin_password) {
        // Allow download of the CSV file
        $file = 'credentials.csv';
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit();
        } else {
            echo "No credentials found.";
        }
    } else {
        echo "Invalid admin credentials.";
    }
}
?>
