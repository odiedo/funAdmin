<?php
include('connection/conn.php');
include('connection/header.php');
include('connection/dashboard_one.php');
include('connection/dashboard_ward.php');
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
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="verification.php" class="nav-item nav-link "><i class="fa fa-check me-2"></i>Verification</a>
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
            <?php include('top_nav.php'); ?>
            <!-- Navbar End -->


            <!-- Summary cards Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash" data-bs-toggle="modal" data-bs-target="#dataSyncModal">
                            <i class="fa fa-cogs fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Data Sync</p>
                                <h6 class="mb-0">click to sync</h6>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-file-alt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Applications</p>
                                <h6 class="mb-0"><?php echo number_format($total_applications); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-wheelchair fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">PWDs</p>
                                <h6 class="mb-0"><?php echo number_format($pwds); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-child fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Partial Orphans</p>
                                <h6 class="mb-0"><?php echo number_format($partial_orphans); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orphans</p>
                                <h6 class="mb-0"><?php echo number_format($total_orphans); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Single Parents</p>
                                <h6 class="mb-0"><?php echo number_format($single_parents); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 small-card-dash">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Others</p>
                                <h6 class="mb-0"><?php echo number_format($others); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Summary cards End -->


            <!-- Data bank settings Modal -->
            <div class="modal fade" id="dataSyncModal" tabindex="-1" aria-labelledby="dataSyncModalLabel" aria-hidden="true" style="background: #0006;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dataSyncModalLabel">
                                <i class="fa fa-cogs me-2 text-primary"></i> Data Bank Settings
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Upload Data Section -->
                            <div class="d-flex align-items-center justify-content-around  mb-4">
                                <div class="align-items-center text-center mb-4">
                                    <!-- Toast for success and error message -->
                                    <div class="toast-container position-fixed top-0 end-0 p-3">
                                        <div id="successToast" class="toast bg-success text-white" role="alert">
                                            <div class="toast-body" id="toastBodyappend"></div>
                                        </div>
                                        <div id="errorToast" class="toast bg-danger text-white" role="alert">
                                            <div class="toast-body" id="toastBodyappendError"></div>
                                        </div>
                                    </div>

                                    <!-- Sync both Dashboard and Ward Data -->
                                    <form id="syncDataForm" method="post">
                                        <button type="submit" class="btn btn-transparent custom-upload">
                                            <div id="uploadDataBtn">
                                                <i class="fa fa-sync fa-3x text-primary"></i><br>
                                                <span class="ms-3 font-weight-bold">Sync Data</span>
                                            </div>
                                        </button>
                                    </form>

                                    <!-- loading animation hidden -->
                                    <div id="progressAnimation" class="loading-animation mt-4" style="display: none;">
                                        <div class="spinner">
                                            <div class="rect1 bg-primary"></div>
                                            <div class="rect2 bg-primary"></div>
                                            <div class="rect3 bg-primary"></div>
                                            <div class="rect4 bg-primary"></div>
                                            <div class="rect5 bg-primary"></div>
                                        </div>
                                        <span class="ms-3">Syncing data...</span>
                                    </div>
                                </div>
                                <!-- Save Upload Data Section -->
                                <div class="align-items-center text-center mb-4">
                                    <form id="uploadForm" method="post" enctype="multipart/form-data">
                                        <!-- Custom Upload Button -->
                                        <div id="customFileUpload" class="custom-upload text-center" onclick="triggerFileUpload()">
                                            <i class="fa fa-cloud-upload-alt fa-3x text-primary"></i>
                                            <br>
                                            <span class="ms-3">Upload Residents Data (.csv)</span>
                                        </div>
                                        
                                        <!-- Hidden File Input -->
                                        <input type="file" name="csv_file" id="csv_file" accept=".csv" style="display:none;" required>
                                        <!-- Upload Button -->
                                        <button type="submit" class="btn btn-transparent border-primary text-primary mt-3" id="uploadButton" style="display:none;">Upload & Merge Data</button>
                                        
                                        <!-- Loading Animation -->
                                        <div id="loadingAnimation" class="loading-animation" style="display: none;">
                                            <div class="spinner">
                                                <div class="rect1 bg-primary"></div>
                                                <div class="rect2 bg-primary"></div>
                                                <div class="rect3 bg-primary"></div>
                                                <div class="rect4 bg-primary"></div>
                                                <div class="rect5 bg-primary"></div>
                                            </div>
                                            <p>Uploading...</p>
                                        </div>
                                    </form>
                                </div>

                                <!-- Clerks Entry Update section -->
                                <div class="text-center mb-4">
                                    <div id="updateEntriesBtn" class="custom-upload">
                                        <i class="fa fa-users fa-3x text-primary"></i>
                                        <br>
                                        Update Clerk Entries
                                    </div>
                                    <!-- Loading Animation -->
                                    <div id="loadingAnimationUpdate" class="loading-animation" style="display: none;">
                                        <div class="spinner">
                                            <div class="rect1 bg-primary"></div>
                                            <div class="rect2 bg-primary"></div>
                                            <div class="rect3 bg-primary"></div>
                                            <div class="rect4 bg-primary"></div>
                                            <div class="rect5 bg-primary"></div>
                                        </div>
                                        <p>Updating...</p>
                                    </div>
                                </div>

                                <!-- Save Backup Section -->
                                <div class="align-items-center custom-upload text-center  mb-4">
                                    <div id="add-other-wards-btn">
                                        <i class="fa fa-user-plus fa-3x text-primary"></i><br>
                                        <span class="ms-3">Wards Plus Sync</span>
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

            
            <!-- Statistics  Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4 h-80">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Ward Counts</h6>
                            </div>
                            <div class="container">
                                <?php if (!empty($wards)): ?>
                                    <?php foreach ($wards as $ward): ?>
                                        <div class="d-flex justify-content-between py-2">
                                        <a href="locations.php?ward=<?php echo urlencode(strtolower(str_replace(' ', '_', $ward['ward']))); ?>">
                                            <span><?php echo htmlspecialchars($ward['ward']); ?> Ward</span>
                                        </a>

                                            <span><?php echo $ward['total']; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No ward data available.</p>
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Ward Statistics</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="warddisbursement"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistics Chart End -->


            <!-- Data Entry Clerks Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Data Entry Clerks</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">Entry no</th>
                                    <th scope="col">Clerk</th>
                                    <th scope="col">Entries</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'connection/clerks_entry_show.php';
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Data Entry Clerks End -->

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
        document.getElementById('syncDataForm').addEventListener('submit', function(e) {
            e.preventDefault(); 

            // Show progress animation
            document.getElementById('progressAnimation').style.display = 'block';
            document.getElementById('syncDataForm').style.display = 'none';

            setTimeout(function() {
                var formData = new FormData();
                Promise.all([
                    // First request for dashboard summary sync
                    fetch('connection/calculate_dashboard.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.text()),

                    // Second request for ward sync
                    fetch('connection/sync_dashboard_summary_ward.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.text()),
                    
                    // third request for dashboard summary other sync
                    fetch('connection/other_wards_sync.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.text()),
                ])
                .then((results) => {
                    // Hide progress animation after both requests complete
                    document.getElementById('progressAnimation').style.display = 'none';
                    document.getElementById('syncDataForm').style.display = 'block';

                    $("#toastBodyappend").text("Data Synced Successfully.");
                    // Show success toast message
                    var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                    document.getElementById('successToast').style.display = 'block';
                    successToast.show();

                    setTimeout(function() {
                        successToast.hide();
                    }, 5000);
                })
                .catch(error => {
                    // Hide progress animation and show error
                    document.getElementById('progressAnimation').style.display = 'none';
                    document.getElementById('syncDataForm').style.display = 'block';
                    alert('Error syncing data: ' + error);
                });
            }, 10000);
        });
    </script>
    <script>
        $(document).ready(function() {
            // Trigger file upload
            $("#customFileUpload").click(function() {
                $("#csv_file").click();
                $("#uploadButton").show();
            });

            $("#uploadForm").on('submit', function(e) {
                e.preventDefault(); 
                $("#loadingAnimation").show();
                $("#uploadButton").prop("disabled", true);
                $('#customFileUpload').hide();
                $("#uploadButton").hide();

                var formData = new FormData(this);
                setTimeout(function() {
                    $.ajax({
                        url: 'connection/resident_data_upload.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            // Hide the loading animation
                            $("#loadingAnimation").hide();
                            $("#uploadButton").prop("disabled", false);
                            $("#uploadButton").hide();
                            $('#customFileUpload').show();

                            // Append success message to toast body
                            $("#toastBodyappend").text("Data uploaded successfully.");

                            // Show success toast message
                            var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                            document.getElementById('successToast').style.display = 'block';
                            successToast.show();

                            setTimeout(function() {
                                successToast.hide();
                            }, 5000);
                        },
                        error: function() {
                            // Hide the loading animation
                            $("#loadingAnimation").hide();
                            $("#uploadButton").prop("disabled", false);
                            $('#customFileUpload').show();
                            // Append error message to toast body
                            $("#toastBodyappendError").text("Error uploading the file. Please try again.");

                            // Show success toast message
                            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                            document.getElementById('errorToast').style.display = 'block';
                            errorToast.show();

                            setTimeout(function() {
                                errorToast.hide();
                            }, 5000);
                        }
                    });
                }, 10000); 
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $("#updateEntriesBtn").click(function() {
                $("#loadingAnimationUpdate").show();
                $("#updateEntriesBtn").hide();
                setTimeout(function() {
                    $.ajax({
                        url: 'connection/clerks_entry_calculation.php',
                        type: 'POST',
                        success: function(response) {
                            var result = JSON.parse(response);
                            if (result.status === "success") {

                                $("#loadingAnimationUpdate").hide();
                                $("#updateEntriesBtn").show();
                                
                                // Append success message to toast body
                                $("#toastBodyappend").text("Clerks Entries Updated Successfully.");

                                // Show success toast message
                                var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                                document.getElementById('successToast').style.display = 'block';
                                successToast.show();

                                // Hide toast after 5 seconds
                                setTimeout(function() {
                                    successToast.hide();
                                }, 5000);
                            } else {
                                alert(result.message);
                            }
                        },
                        error: function() {
                            // Append error message to toast body
                            $("#toastBodyappendError").text("Error updating Clerks Entries. Please try again");

                            // Show success toast message
                            var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                            document.getElementById('errorToast').style.display = 'block';
                            errorToast.show();

                            setTimeout(function() {
                                errorToast.hide();
                            }, 5000);
                            alert("Error updating total entries. Please try again.");
                        }
                    });
                }, 10000);
            });
        });
    </script>
<script>
    $(document).ready(function () {
        $('#add-other-wards-btn').click(function () {
            $.ajax({
                url: 'connection/other_wards.php',
                type: 'GET',
                success: function (response) {
                    $("#toastBodyappend").text(response);
                    // Show success toast message
                    var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                    document.getElementById('successToast').style.display = 'block';
                    successToast.show();

                    setTimeout(function() {
                        successToast.hide();
                    }, 5000);
                },
                error: function () {
                    $("#toastBodyappend").text("Error Occured.");
                    // Error
                    var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                    document.getElementById('errorToast').style.display = 'block';
                    errorToast.show();

                    setTimeout(function() {
                        errorToast.hide();
                    }, 5000);
                }
            });
        });
    });
</script>
</body>

</html>