<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    include "../class/Student.php";
    include "../class/StudentsManagement.php";

    $index = $_GET['index'];

    $studentsManagement = new StudentsManagement("../data/data.json");
    $studentsManagement->deleteStudent($index);
    header("Location: ../index.php");
}
