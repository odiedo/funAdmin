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
                    <a href="analysis.php" class="nav-item nav-link active"><i class="fa fa-chart-line me-2"></i>Analysis</a>
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
            <?php include('top_nav.php'); ?>
            <!-- Navbar End -->


            <!-- Analysis Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 p-2">
                    <!-- Pending Applications -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-info border-3 bg-light shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Pending Applications</h5>
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-clock fa-2x ms-3"></i>
                                    <h3 class="mb-0" id="pending-count">98</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Approved Applications -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-info border-3 bg-light shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Approved Applications</h5>
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-check-circle fa-2x ms-3"></i>
                                    <h3 class="mb-0" id="pending-count">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Rejected Applications -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-info border-3 bg-light shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Rejected Applications</h5>
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-times-circle fa-2x ms-3"></i>
                                    <h3 class="mb-0" id="pending-count">0</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-4">
                    <!-- Activate Vetting Process -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center border-0 shadow-sm small-card-dash" data-bs-toggle="modal" data-bs-target="#activateAnalysisModal">
                            <div class="card-body">
                                <i class="far fa-lightbulb text-danger fa-3x mb-3"></i>
                                <h5 class="card-title text-danger">Activate</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Auto Vetting -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-robot fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">Auto Vetting</h5>
                                <a href="autoprocess.php" class="btn btn-outline-primary btn-sm">Run</a>
                            </div>
                        </div>
                    </div>
            
                    <!-- Manual Vetting -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-user-check fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">Manual Vetting</h5>
                                <a href="manual_process.php" class="btn btn-outline-primary btn-sm">Start</a>
                            </div>
                        </div>
                    </div>
            
                    <!-- Data Completeness -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-tasks fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">Completeness</h5>
                                <a href="#" class="btn btn-outline-primary btn-sm">Check</a>
                            </div>
                        </div>
                    </div>
            
                    <!-- Fraud Detection -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">Fraud Detection</h5>
                                <a href="#" class="btn btn-outline-primary btn-sm">Run</a>
                            </div>
                        </div>
                    </div>
                    <!-- Regional Balance -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-star fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">Scoring/Ranking</h5>
                                <a href="#" class="btn btn-outline-primary btn-sm">Run</a>
                            </div>
                        </div>
                    </div>
                    <!-- School Balance -->
                    <div class="col-md-6 col-xl-3">
                        <div class="card text-center bg-light text-primary border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-school fa-3x mb-3"></i>
                                <h5 class="card-title text-primary">School Edits</h5>
                                <a href="school_edits.php" class="btn btn-outline-primary btn-sm">edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Activate analysis settings Modal -->
                <div class="modal fade" id="activateAnalysisModal" tabindex="-1" aria-labelledby="activateAnalysisModalLabel" aria-hidden="true" style="background: #0006;">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dataSyncModalLabel">
                                <i class="fa fa-cogs me-2 text-primary"></i> Analysis Settings
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="toast-container position-fixed top-0 end-0 p-3">
                                <div id="successToast" class="toast bg-success text-white" role="alert">
                                    <div class="toast-body" id="toastBodyappend"></div>
                                </div>
                                <div id="errorToast" class="toast bg-danger text-white" role="alert">
                                    <div class="toast-body" id="toastBodyappendError"></div>
                                </div>
                            </div>
                            <div class="row">
                                <!--  Activate Analysis Section -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card text-center p-0 m-0 bg-light text-primary border-0 shadow-sm" id="activateData">
                                        <div class="card-body">
                                            <i class="fas fa-power-off text-success fa-3x mb-3"></i>
                                            <h5 class="card-title text-success">Activate</h5>
                                        </div>
                                        <span>Activate Analysis Process</span>
                                    </div>
                                    <div id="loadingAnimation" class="loading-animation" style="display: none;">
                                        <div class="spinner">
                                            <div class="rect1 bg-primary"></div>
                                            <div class="rect2 bg-primary"></div>
                                            <div class="rect3 bg-primary"></div>
                                            <div class="rect4 bg-primary"></div>
                                            <div class="rect5 bg-primary"></div>
                                        </div>
                                        <p class="text-center"><strong>Activating...</strong></p>
                                    </div>  
                                </div>
                                <!-- Reset Section -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card text-center bg-light text-primary border-0 shadow-sm" id="resetData">
                                        <div class="card-body">
                                            <i class="fas fa-undo-alt text-danger fa-3x mb-3"></i>
                                            <h5 class="card-title text-danger">Reset</h5>
                                        </div>
                                        <p>Reset Analysis Data</p>
                                    </div>
                                    <div id="resetLoadingAnimation" class="loading-animation" style="display: none;">
                                        <div class="spinner">
                                            <div class="rect1 bg-primary"></div>
                                            <div class="rect2 bg-primary"></div>
                                            <div class="rect3 bg-primary"></div>
                                            <div class="rect4 bg-primary"></div>
                                            <div class="rect5 bg-primary"></div>
                                        </div>
                                        <p class="text-center"><strong>Resetting...</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- Analysis Content End -->

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $("#activateData").on('click', function(e) {
                e.preventDefault();
                $("#activateData").hide();
                $("#loadingAnimation").show(); 

                // Manually append the "activate" field to the serialized form data
                var formData = $(this).serialize() + "&activate=1";
                setTimeout(function() {
                    $.ajax({
                        url: 'analysis/activate.php', 
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            $("#activateData").show();  
                            $("#loadingAnimation").hide();

                            if (response.includes("success")) {
                                $("#toastBodyappend").text(response);
                                
                                var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                                document.getElementById('successToast').style.display = 'block';
                                successToast.show();

                                setTimeout(function() {
                                    successToast.hide();
                                }, 5000);
                            } else {
                                $("#toastBodyappendError").text(response);

                                var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                                document.getElementById('errorToast').style.display = 'block';
                                errorToast.show();

                                setTimeout(function() {
                                    errorToast.hide();
                                }, 5000);
                            }
                        },
                        error: function() {
                            $("#activateData").show(); 
                            $("#loadingAnimation").hide(); 
                            // Display error message
                            $("#toastBodyappendError").text("Error processing request. Please try again.");

                            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                            document.getElementById('errorToast').style.display = 'block';
                            errorToast.show();

                            setTimeout(function() {
                                errorToast.hide();
                            }, 5000);
                        }
                    });
                }, 5000); 
            });

            // Reset logic
            $("#resetData").on('click', function(e) {
                e.preventDefault();
                $("#resetData").hide();
                $("#resetLoadingAnimation").show();
                setTimeout(function() {
                    $.ajax({
                        url: 'analysis/reset.php',
                        type: 'POST',
                        data: { reset: 1 },
                        success: function(response) {
                            $("#resetData").show();
                            $("#resetLoadingAnimation").hide();

                            if (response.includes("success")) {
                                $("#toastBodyappend").text(response);
                                var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                                successToast.show();
                                setTimeout(function() {
                                    successToast.hide();
                                }, 5000);
                            } else {
                                $("#toastBodyappendError").text(response);
                                var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                                errorToast.show();
                                setTimeout(function() {
                                    errorToast.hide();
                                }, 5000);
                            }
                        },
                        error: function() {
                            $("#toastBodyappendError").text("Error processing request. Please try again.");
                            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                            errorToast.show();
                            setTimeout(function() {
                                errorToast.hide();
                            }, 5000);
                        }
                    });
                }, 5000); 
            });
        });
    </script>

</body>

</html>