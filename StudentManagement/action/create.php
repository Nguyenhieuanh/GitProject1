<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];

    $student = new Student($name, $age, $phone, $email, $address);
    $studentManagement = new StudentsManagement("../data/data.json");
    $studentManagement->addStudent($student);
    header("Location: ../index.php");
}