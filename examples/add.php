<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "elhamd");

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobile = mysqli_real_escape_string($link, $_REQUEST['mobile']);
$Dep = mysqli_real_escape_string($link, $_REQUEST['Dep']);
$add = mysqli_real_escape_string($link, $_REQUEST['address']);
$DoB = mysqli_real_escape_string($link, $_REQUEST['DoB']);
$EmpDate = mysqli_real_escape_string($link, $_REQUEST['EmployDate']);
$Salary = mysqli_real_escape_string($link, $_REQUEST['Salary']);
$Degree = mysqli_real_escape_string($link, $_REQUEST['Degree']);
$EmpCode = mysqli_real_escape_string($link, $_REQUEST['EmpCode']);

// Attempt insert query execution
$sql = "INSERT INTO employee (First_Name, Last_Name, email, address, Department, mobile, DOB, degree, emp_date, salary, comp_id)
 VALUES ('$first_name', '$last_name', '$email', '$add', '$dep', '$mobile', '$DoB', '$Degree', '$EmpDate', '$Salary', '$EmpCode')";
if(mysqli_query($link, $sql)){
    echo "Employee added successfully.";
} else{
    header("Location: addEmployee.php?error=" . urlencode("Couldn't add employee, duplicate found"));
}
 
// Close connection
mysqli_close($link);
?>