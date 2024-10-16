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
                    <a href="letters.php" class="nav-item nav-link active"><i class="fa fa-envelope-open-text me-2"></i>Letters</a>
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
            <?php include('top_nav.php'); ?>
            <!-- Navbar End -->

            <!-- Letter Processing Section Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row mb-2">
                    <div class="col-md-12 bg-light">
                        <div class="handles p-2">
                            <div class="left-issue d-flex justify-content-between">
                                <h3 class="">Letter(s)  </h3>
                                <div class="btn border-0"><i class="fa fa-arrow-left text-info" onClick="window.history.back();"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row g-4">
                            <!-- Letters Card -->
                            <div class="col-md-12">
                                <div class="card text-center p-3 shadow-sm border-0">
                                    <div class="card-body">
                                        <i class="fas fa-envelope fa-2x mb-3 text-primary"></i>
                                        <h5 class="card-title">Letters</h5>
                                        <p class="text-muted">Manage All</p>
                                        <div class="dflex justify-content-between">
                                            <a href="letter_processing.php?secondary" class="btn btn-primary btn-sm">Secondary (321)</a>
                                            <a href="letter_processing.php?tertiary" class="btn btn-secondary btn-sm">Tertiary (45)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- History Card -->
                            <div class="col-md-6">
                                <div class="card text-center p-3 shadow-sm border-0">
                                    <div class="card-body">
                                        <i class="fas fa-history fa-2x mb-3 text-success"></i>
                                        <h5 class="card-title">History</h5>
                                        <p class="text-muted">Track Activities</p>
                                        <a href="history.php" class="btn btn-success btn-sm">View History</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Acknowledgement Letters Card -->
                            <div class="col-md-6">
                                <div class="card text-center p-3 shadow-sm border-0">
                                    <div class="card-body">
                                        <i class="fas fa-check-circle fa-2x mb-3 text-info"></i>
                                        <h5 class="card-title">Acknowledgements</h5>
                                        <p class="text-muted">School Letters</p>
                                        <a href="acknowledgement.php" class="btn btn-info btn-sm">View Letters</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <h5 class="text-center bg-light p-3">Top Schools</h5>
                        <div id="topSchoolsCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card text-center p-3">
                                        <i class="fas fa-school fa-2x mb-3 text-primary"></i>
                                        <h5 class="card-title">Kolanya Boys High</h5>
                                        <h5 class="text-muted">Ksh 1,200,000</h5>
                                        <p class="text-muted">100 Students</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card text-center p-3">
                                        <i class="fas fa-school fa-2x mb-3 text-primary"></i>
                                        <h5 class="card-title">Kamuria Secondary</h5>
                                        <h5 class="text-muted">Ksh 1,050,000</h5>
                                        <p class="text-muted">100 Students</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card text-center p-3">
                                        <i class="fas fa-school fa-2x mb-3 text-primary"></i>
                                        <h5 class="card-title">Kamusinga Boys High</h5>
                                        <h5 class="text-muted">Ksh 900,500</h5>
                                        <p class="text-muted">100 Students</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card text-center p-3">
                                        <i class="fas fa-school fa-2x mb-3 text-primary"></i>
                                        <h5 class="card-title">Alliance High</h5>
                                        <h5 class="text-muted">Ksh 850,400</h5>
                                        <p class="text-muted">100 Students</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#topSchoolsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#topSchoolsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Letter Processing Section End -->

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