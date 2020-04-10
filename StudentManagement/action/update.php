<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $index = $_GET['index'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];

    $studentsManagement = new StudentsManagement("../data/data.json");
    $student = new Student($name, $age, $phone, $email, $address);
    $studentsManagement->updateStudent($index,$student);
    header("Location: ../index.php");
}