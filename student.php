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
                        <h6 class="mb-0">Odiedo Paul</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="verification.php" class="nav-item nav-link"><i class="fa fa-check me-2"></i>Verification</a>
                    <a href="analysis.php" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Analysis</a>
                    <a href="letters.php" class="nav-item nav-link"><i class="fa fa-envelope-open-text me-2"></i>Letters</a>
                    <a href="reports.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Reports</a>
                    <a href="bulk.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Bulk Action</a>
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
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Mercy sent you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Desmond sent you a message</h6>
                                        <small>21 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Monica sent you a message</h6>
                                        <small>28 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Odiedo Paul</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <div class="container mt-4">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-12 bg-light">
                            <div class="handles p-2">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Student Data - Kajiado East</h3>
                                    <div class="btn border-0"><i class="fa fa-arrow-left text-info" onClick="window.history.back();"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <!-- Personal Information Column -->
                        <div class="col-md-4" style="font-size: 0.85rem;">
                            <h4 class="text-success text-center" style="font-size: 1rem;"><i class="fas fa-user fa-3x"></i><br> Personal Info</h4>
                            <div class="d-flex justify-content-between">
                                <strong>Application ID:</strong> <span>APP20241001</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Name:</strong> <span>John Mwangi</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Gender:</strong> <span>Male</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Date of Birth:</strong> <span>12th June 2005</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Birth Certificate No:</strong> <span>BC202141234</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Postal Address:</strong> <span>P.O. Box 123, Kajiado</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Phone:</strong> <span>+254 712 345 678</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Email:</strong> <span>john.mwangi@example.com</span>
                            </div>
                        </div>

                        <!-- Education and Financial Information Column -->
                        <div class="col-md-4" style="font-size: 0.85rem;">
                            <h4 class="text-success text-center" style="font-size: 1rem;"><i class="fas fa-school fa-3x"></i> <br> Education Info</h4>
                            <div class="d-flex justify-content-between">
                                <strong>School:</strong> <span>Kajiado High School</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Admission No:</strong> <span>ADM202101</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Class:</strong> <span>Form 4</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Year of Admission:</strong> <span>2021</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Course Duration:</strong> <span>4 Years</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Expected Completion:</strong> <span>2024</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Education Level:</strong> <span>Secondary</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Fee Balance:</strong> <span>Kshs 15,000</span>
                            </div>
                        </div>

                        <!-- Family Information Column -->
                        <div class="col-md-4" style="font-size: 0.85rem;">
                            <h4 class="text-success text-center" style="font-size: 1rem;"><i class="fas fa-users fa-3x"></i><br> Parents Info</h4>
                            <div class="d-flex justify-content-between">
                                <strong>Father's Name:</strong> <span>Peter Mwangi</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Father's ID Number:</strong> <span>12345678</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Father's Phone:</strong> <span>+254 722 123 456</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Father Alive/Deceased:</strong> <span>Alive</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Father's Occupation:</strong> <span>Farmer</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Father's Income:</strong> <span>Kshs 30,000</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother's Name:</strong> <span>Mary Wambui</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother's ID Number:</strong> <span>23456789</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother's Phone:</strong> <span>+254 733 654 321</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother Alive/Deceased:</strong> <span>Alive</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother's Occupation:</strong> <span>Teacher</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong>Mother's Income:</strong> <span>Kshs 40,000</span>
                            </div>
                        </div>

                    </div>
                </div>
                
                
                
            
                <!-- Attachments Section -->
                <div class="section mb-4">
                    <h2 class="text-success">Attachments</h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>Birth Certificate</th>
                            <td><a href="#">Download</a></td>
                            <th>ID Photo (Front)</th>
                            <td><a href="#">Download</a></td>
                        </tr>
                        <tr>
                            <th>ID Photo (Back)</th>
                            <td><a href="#">Download</a></td>
                            <th>Report Card</th>
                            <td><a href="#">Download</a></td>
                        </tr>
                        <tr>
                            <th>Fee Balance Proof</th>
                            <td><a href="#">Download</a></td>
                        </tr>
                    </table>
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

    <!-- Auto-vetting Script -->
    <script src="js/main.js"></script>
</body>

</html>