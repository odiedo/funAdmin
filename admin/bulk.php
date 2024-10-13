<?php
include('connection/conn.php');
include('connection/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fun Analysis System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/2.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>FAS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo ucfirst($_SESSION['fullname']); ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="verification.php" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Verification</a>
                    <a href="analysis.php" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Analysis</a>
                    <a href="letters.php" class="nav-item nav-link"><i class="fa fa-envelope-open-text me-2"></i>Letters</a>
                    <a href="reports.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Reports</a>
                    <a href="bulk.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Bulk Action</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h me-2"></i>Others</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        <a href="delete_account.php" class="dropdown-item">Delete account</a>
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include('top_nav.php'); ?>
            <!-- Navbar End -->

            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0">
                            <!-- Tabs for navigation -->
                            <ul class="nav nav-tabs " id="phoneTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="keypad-tab" data-bs-toggle="tab" href="#keypad" role="tab">Constituents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="recents-tab" data-bs-toggle="tab" href="#recents" role="tab">Recents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="internal-tab" data-bs-toggle="tab" href="#internal" role="tab">Internal</a>
                                </li>
                            </ul>
            
                            <!-- Tab content -->
                            <div class="tab-content" id="phoneTabContent">
                                <!-- Keypad tab -->
                                <div class="tab-pane fade show active" id="keypad" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="keypad mt-3 p-3">
                                                    <form action="send_sms.php" method="POST">
                                                        <div class="d-flex justify-content-between">
                                                            <h3>Compose Message</h3>
                                                            <span class="tokens p-2">300</span>
                                                        </div>
                                                        <div>
                                                            <label for="group">Group:</label>
                                                            <select name="ward" id="group" class="form-control">
                                                                <option selected disabled>--- Select Group ---</option>
                                                                <option value="all-wards">All Wards</option>
                                                                <option value="kaputiei-north">Kaputiei North</option>
                                                                <option value="kaputiei-south">Kaputiei South</option>
                                                                <option value="kenyawa-poka">Kenyawa Poka</option>
                                                                <option value="imatong">Imatong</option>
                                                            </select>
                                                            <label for="message">Message:</label>
                                                            <textarea name="message" id="message" class="form-control" placeholder="Write your Message here!!!" maxlength="240" rows="4" required></textarea>
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" name="send_bulk" class="btn p-3 m-4 shadow">Send</button>
                                                        </div>
                                                    </form>   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Add User Form -->
                                                <div class="card mt-2 mb-2 shadow">
                                                    <h5 class="text-center py-2">Add User Data</h5>
                                                    <div class="card-body">
                                                        <form action="save_resident.php" method="POST" id="addUserForm">
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="fullName" class="form-label">Full Name</label>
                                                                    <input type="text" class="form-control" id="fullName" name="full_name" required>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="phone" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="ward" class="form-label">Ward</label>
                                                                    <select id="ward" name="ward" class="form-control shadow" required>
                                                                        <option selected disabled>--- Select Ward ---</option>
                                                                        <option value="kaputiei-north">Kaputiei North</option>
                                                                        <option value="kaputiei-south">Kaputiei South</option>
                                                                        <option value="kenyawa-poka">Kenyawa Poka</option>
                                                                        <option value="imatong">Imatong</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="location" class="form-label">Location</label>
                                                                    <input type="text" class="form-control" id="location" name="location">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="sublocation" class="form-label">Sub-location</label>
                                                                    <input type="text" class="form-control" id="sublocation" name="sublocation">
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-control" id="status" name="status">
                                                                        <option value="active">Active</option>
                                                                        <option value="inactive">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <!-- Submit Button -->
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-primary shadow">Add User</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                
                                <!-- Recents tab -->
                                <div class="tab-pane fade" id="recents" role="tabpanel">
                                    <div class="recents mt-3 p-3">
                                        <div class="d-flex justify-content-between">
                                            <h3>Recent Messages</h3>
                                            <span class="tokens p-2">300</span>
                                        </div>
                                        <ul class="list-group mt-3">
                                            <?php
                                            // Database connection
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "bulk_sms";

                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            }
                                            // Fetch recent SMS from the database
                                            $sql = "SELECT ward, location, sublocation, message, sent_time FROM recent_sms ORDER BY sent_time DESC LIMIT 5";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<li class="list-group-item">';
                                                    echo htmlspecialchars($row['message']);
                                                    echo '<span class="float-end text-muted">' . date('h:i A, d/m/Y', strtotime($row['sent_time'])) . '</span>';
                                                    echo '</li>';
                                                }
                                            } else {
                                                echo '<li class="list-group-item">No recent messages.</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Internal tab -->
                                <div class="tab-pane fade" id="internal" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="internal mt-3 p-3">
                                                    <form action="send_internal_sms.php" method="POST">
                                                        <div class="d-flex justify-content-between">
                                                            <h3>Compose Internal Message</h3>
                                                            <span class="tokens p-2">add user</span>
                                                        </div>
                                                        <div>
                                                            <label for="group">Group:</label>
                                                            <select name="target" id="group" class="form-control">
                                                                <option selected disabled>--- Select Group ---</option>
                                                                <option value="all-employees">All Employees</option>
                                                                <option value="psc">PSC office</option>
                                                                <option value="cdf">cdf office</option>
                                                                <option value="executive">Executive</option>
                                                                <option value="committee">Committee</option>
                                                                <option value="ward_reps">Ward Representatives</option>
                                                                <option value="location_reps">Location Representatives</option>
                                                                <option value="other_reps">Other Representatives</option>
                                                            </select>
                                                            <label for="message">Message:</label>
                                                            <textarea name="message" id="message" class="form-control" placeholder="Write your Message here!!!" maxlength="240" rows="4" required></textarea>
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" name="send_internal" class="btn p-3 m-4 shadow">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-5 ">
                                                <div class="card shadow mt-2">
                                                    <h5 class="text-center py-2">Insert Staff Data</h5>
                                                    <div class="card-body">
                                                        <form action="insert_staff.php" method="POST">
                                                            <div class="form-group">
                                                                <label for="fullname">Full Name</label>
                                                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter full name" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="office">Office</label>
                                                                <select name="office" class="form-control" id="office" required>
                                                                    <option value="" disabled selected>--- Select Office ---</option>
                                                                    <option value="PSC">PSC</option>
                                                                    <option value="CDF">CDF</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="employee_post">Employee Post</label>
                                                                <select name="employee_post" class="form-control" id="employee_post" required>
                                                                    <option value="" disabled selected>--- Select Employee Post ---</option>
                                                                    <option value="executive">Executive</option>
                                                                    <option value="ward_reps">Ward Representative</option>
                                                                    <option value="location_reps">Location Representative</option>
                                                                    <option value="other_reps">Other Representative</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="phone">Phone Number</label>
                                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="status">Status</label>
                                                                <select name="status" class="form-control" id="status" required>
                                                                    <option value="active">Active</option>
                                                                    <option value="inactive">Inactive</option>
                                                                </select>
                                                            </div>

                                                            <div class="text-center">
                                                                <button type="submit" name="insert_staff" class="btn btn-primary m-2">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="https://odiedoportfolio.netlify.app" target="_blank">fun-corp developers</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://odiedo.netlify.app" target="_blank">Odiedo Paul</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>


    <script src="js/main.js"></script>
</body>

</html>