<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = fopen("emails.txt", "a");
        fwrite($file, $email . "\n");
        fclose($file);
        echo json_encode(["success" => true, "message" => "Email submitted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email format"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>