<?php
if (!isset($_POST['code'])) {
    header("Location: editEmployee.php");
}

$link = mysqli_connect("localhost", "root", "", "elhamd");

// Check connection
if($link === false) {
    header("Location: editEmployee.php?code=" . urlencode($code) . "&error=" . urlencode("Failed to connect"));
}

// Escape user inputs for security
$code = mysqli_real_escape_string($link, $_POST['code']);
$firstName = mysqli_real_escape_string($link, $_POST['firstName']);
$lastName = mysqli_real_escape_string($link, $_POST['lastName']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$address = mysqli_real_escape_string($link, $_POST['homeAddress']);
$department = mysqli_real_escape_string($link, $_POST['department']);
$mobile = mysqli_real_escape_string($link, $_POST['mobile']);
$DoB = mysqli_real_escape_string($link, $_POST['birthDate']);
$degree = mysqli_real_escape_string($link, $_POST['degree']);
$empDate = mysqli_real_escape_string($link, $_POST['employmentDate']);
$salary = mysqli_real_escape_string($link, $_POST['salary']);
$empCode = mysqli_real_escape_string($link, $_POST['employmentCode']);

// Attempt insert query execution
$sql = "UPDATE employee SET `First_Name`='$firstName', `Last_Name`='$lastName', `email`='$email', `address`='$address', `Dep`='$department', `mobile`='$mobile', `DOB`='$DoB', `degree`='$degree', `emp_date`='$empDate', `salary`='$salary', `comp_id`='$empCode' WHERE comp_id = $code";
if (mysqli_query($link, $sql)) {
    header("Location: editEmployee.php?code=" . urlencode($code) . "&message=" . urlencode("Save Successful"));
} else {
    header("Location: editEmployee.php?code=" . urlencode($code) . "&error=" . urlencode("Couldn't save changes" . mysqli_error($link)));
}
// Close connection
mysqli_close($link);
?>