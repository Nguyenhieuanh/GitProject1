<?php
include "../class/Student.php";
include "../class/StudentsManagement.php";
$index = $_GET['index'];
$studentsManagement = new StudentsManagement("../data/data.json");
$student = $studentsManagement->getStudentByIndex($index);

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<body>
<form class="needs-validation" novalidate action="../action/update.php?index=<?php echo $index?>" method="post"
      style="margin-left: 20px; margin-top: 30px">
    <h2 style="margin-left: 13px">Edit Student</h2>
    <br/>
    <div class="col-md-4 mb-3">
        <label for="validationTooltip01">Full name</label>
        <input type="text" class="form-control" id="validationTooltip01" name="name"
               value="<?php echo $student->getName() ?>" required>
        <div class="valid-tooltip">
            Looks good!
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Age</label>
        <input type="number" class="form-control" id="validationTooltip05" name="age"
               value="<?php echo $student->getAge() ?>" required>
        <div class="invalid-tooltip">
            Please provide a phone number.
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip05">Phone number</label>
        <input type="text" class="form-control" id="validationTooltip05" name="phone"
               value="<?php echo $student->getPhone() ?>" required>
        <div class="invalid-tooltip">
            Please provide a phone number.
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationTooltipUsername">Email</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
            </div>
            <input type="text" class="form-control" id="validationTooltipUsername"
                   aria-describedby="validationTooltipUsernamePrepend" name="email"
                   value="<?php echo $student->getEmail() ?>" required>
            <div class="invalid-tooltip">
                Please provide a valid email.
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="validationTooltip03">Address</label>
        <input type="text" class="form-control" id="validationTooltip03" name="address"
               value="<?php echo $student->getAddress() ?>" required>
        <div class="invalid-tooltip">
            Please provide a valid address.
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>