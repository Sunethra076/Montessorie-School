<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $childName = htmlspecialchars($_POST['childName']);
    $parentName = htmlspecialchars($_POST['parentName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $age = htmlspecialchars($_POST['age']);
    $address = htmlspecialchars($_POST['address']);
    // DB connection
    $conn = new mysqli("localhost", "root", "", "test2");

    // Prepare and execute statement (note the table name is now 'contact')
    $stmt = $conn->prepare("INSERT INTO admission (childName,parentName, email, phone, age , address) VALUES (?, ?, ?, ? , ? ,?)");
    $stmt->bind_param("ssssss", $childName, $parentName ,$email, $phone, $age, $address);
    $stmt->execute();

    echo "Message submitted successfully!";
    
    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>


