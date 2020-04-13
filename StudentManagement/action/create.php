<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $name = $_POST["name"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $img = $_FILES['image']['name'];


    $isError = false;
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $isError = true;
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $isError = true;
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
        $isError = true;
    }

    if (empty($email)) {
        $emailErr = '* Email is a required field!';
        $isError = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Malformed email (xxx@xxx.xxx.xxx)";
        $isError = true;
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
        $isError = true;
    }

    if ($isError) {
        header("Location: ../view/add.php");
    }

    if ($isError == false) {
        $target_dir = "../upload/";
        $target_file = $target_dir . basename(time() . '-' . $img);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        $student = new Student($name, $age, $phone, $email, $address, $target_file);
        $studentManagement = new StudentsManagement("../data/data.json");
        $studentManagement->addStudent($student);
        header("Location: ../index.php");
    }
}

//function test_input($data)
//{
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    if (empty($_POST["name"])) {
//        $nameErr = "Name is required";
//        $isError = true;
//    } else {
//        $name = test_input($_POST["name"]);
//    }
//
//    if (empty($_POST["email"])) {
//        $emailErr = "Email is required";
//        $isError = true;
//    } else {
//        $email = test_input($_POST["email"]);
//    }
//
//    if (empty($_POST["age"])) {
//        $age = "";
//        $isError = true;
//    } else {
//        $website = test_input($_POST["age"]);
//    }
//}