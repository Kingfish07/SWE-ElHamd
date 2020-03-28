<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<?php
$showEdit = false;
$codeErrorMessage = null;
$editErrorMessage = null;
$editMessage = null;
$deleteMessage = null;
$code = '';
$firstName = '';
$lastName = '';
$email = '';
$address = '';
$department = '';
$mobile = '';
$DoB = '';
$degree = '';
$emp_date = '';
$salary = '';
$EmpCode = '';

if (isset($_GET['error'])) {
    $editErrorMessage = $_GET['error'];
}
if (isset($_GET['message'])) {
    $editMessage = $_GET['message'];
}
if (isset($_GET['deleteMessage'])) {
    $deleteMessage = $_GET['deleteMessage'];
}
if (isset($_GET['code'])) {
    $link = mysqli_connect("localhost", "root", "", "elhamd");
    $code = mysqli_real_escape_string($link, $_GET['code']);
    $sql = 'SELECT * FROM employee WHERE comp_id = \'' . $code . '\';';
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) <= 0) {
        $codeErrorMessage = 'No employees with that code';
    } else {
        $showEdit = true;

        while ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['First_Name'];
            $lastName = $row['Last_Name'];
            $email = $row['email'];
            $address = $row['address'];
            $department = $row['Dep'];
            $mobile = $row['mobile'];
            $DoB = $row['DOB'];
            $degree = $row['degree'];
            $emp_date = $row['emp_date'];
            $salary = $row['salary'];
            $EmpCode = $row['comp_id'];
            break;
        }
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Edit Employee
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="user-profile">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    HT
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    ElHamd Trading
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="./dashboard.html">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>



                    <li class="active ">
                        <a href="./user.html">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Employee Profile</p>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Employee Profile</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Edit Employee</h5>
                            </div>
                            <div class="card-body">
                                <form action="editEmployee.php" method="GET">
                                    <div class="row">
                                        <div class="col-md-12 pl-1">
                                            <div class="form-group">
                                                <label>Code for Employee to Edit</label>
                                                <input type="text" name="code" class="form-control" placeholder="Employee code" value="<?php echo $code; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($codeErrorMessage !== null || $deleteMessage !== null) { ?>
                                        <div class="row">
                                            <div class="col-md-12 pl-1">
                                                <?php
                                                    if ($codeErrorMessage !== null) {
                                                        echo $codeErrorMessage;
                                                    }
                                                    if ($deleteMessage !== null) {
                                                        echo $deleteMessage;
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <button type="submit" class="btn">Search</button>
                                </form>

                                <?php if ($showEdit) { ?>
                                    <form action="edit.php" method="POST">
                                        <div class="row">

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php echo $firstName; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo $lastName; ?>">
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mobile Number</label>
                                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo $mobile; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-3 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Department</label>
                                                    <input type="text" name="department" class="form-control" placeholder="Department" value="<?php echo $department; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="homeAddress" class="form-control" placeholder="Home Address" value="<?php echo $address; ?>">
                                                </div>
                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <input type="date" name="birthDate" class="form-control" value="<?php echo $DoB; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr-1">
                                                <div class="form-group">
                                                    <label>Employment Date</label>
                                                    <input type="date" name="employmentDate" class="form-control" value="<?php echo $emp_date; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input type="number" name="salary" class="form-control" placeholder="Salary" value="<?php echo $salary; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Educational Degree</label>
                                                    <input type="text" name="degree" class="form-control" placeholder="Educational Degree" value="<?php echo $degree; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Employee code</label>
                                                    <input type="text" name="employmentCode" class="form-control" placeholder="Employee code" value="<?php echo $EmpCode; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <?php if ($editErrorMessage !== null || $editMessage !== null) { ?>
                                            <div class="row">

                                                <div class="col-md-12 pl-1">
                                                    <?php
                                                    if ($editErrorMessage !== null) {
                                                        echo $editErrorMessage;
                                                    }
                                                    if ($editMessage !== null) {
                                                        echo $editMessage;
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        <?php } ?>

                                        <input type="hidden" name="code" value="<?php echo $code; ?>" />
                                        <button type="submit" name="action" class="btn" value="edit">Save Changes</button>
                                        <button type="submit" name="action" class="btn" value="delete">Delete Employee</button>
                                    </form>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
</body>

</html>