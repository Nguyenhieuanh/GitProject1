<?php
include "class/StudentsManagement.php";
include "class/Student.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $searchName = $_REQUEST['searchName'];
}

$studentManagement = new StudentsManagement("data/data.json");
$students = $studentManagement->searchByName($searchName);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    th, td {
        text-align: center;
    }
</style>
<body>

<form method="post" style="margin: 15px">
    <br/>
    <input class="form-control" type="text" name="searchName" placeholder="Search by Name">
</form>
<br>
<div class="container">
    <h2>Students List</h2>
    <table class="table table-striped">
        <tr class="table-active">
            <th style="text-align: center">STT</th>
            <th>Full name</th>
            <th style="text-align: center">Age</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Address</th>
            <th>&ensp;</th>
        </tr>
        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td style="text-align: center"><?php echo $index + 1 ?></td>
                <td><?php echo $student->getName() ?></td>
                <td style="text-align: center"><?php echo $student->getAge()?></td>
                <td><?php echo $student->getPhone()?></td>
                <td><?php echo $student->getEmail()?></td>
                <td><?php echo $student->getAddress()?></td>
                <td><a onclick="return confirm('Ban chac chan muon xoa?')"
                       href="action/delete.php?index=<?php echo $index?>">Xoa</a>
                    <span>|</span>
                    <a href="view/edit.php?index=<?php echo $index?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <div class="card" style="width: 10rem;">
        <a href="view/add.php" class="btn btn-primary stretched-link">Add new Student</a>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>