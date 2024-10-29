<?php

header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "contacts"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'add':
        $姓名 = $_POST['姓名'];
        $手机号 = $_POST['手机号'];
        $归属地 = $_POST['归属地'];
        $备注 = $_POST['备注'];
        $stmt = $conn->prepare("INSERT INTO contacts (姓名, 手机号, 归属地, 备注) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $姓名, $手机号, $归属地, $备注);
        $stmt->execute();
        echo json_encode(["success" => true]);
        break;
        
    case 'edit':
        $姓名 = $_POST['姓名'];
        $手机号 = $_POST['手机号'];
        $归属地 = $_POST['归属地'];
        $备注 = $_POST['备注'];
        $stmt = $conn->prepare("UPDATE contacts SET 手机号=?, 归属地=?, 备注=? WHERE 姓名=?");
        $stmt->bind_param("ssss", $手机号, $归属地, $备注, $姓名);
        $stmt->execute();
        echo json_encode(["success" => true]);
        break;

    case 'delete':
        $姓名 = $_POST['姓名'];
        $stmt = $conn->prepare("DELETE FROM contacts WHERE 姓名=?");
        $stmt->bind_param("s", $姓名);
        $stmt->execute();
        echo json_encode(["success" => true]);
        break;

    case 'get':
        $result = $conn->query("SELECT * FROM contacts");
        $contacts = [];
        while ($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }
        echo json_encode($contacts);
        break;

    default:
        echo json_encode(["error" => "Invalid action"]);
        break;
}

$conn->close();
?>