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
    <style>
        .rotating-hourglass {
            animation: rotate 2s linear infinite;
        }
    
        .stopped-hourglass {
            animation: none;
        }
    
        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
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


            <!-- Summary cards Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-sync-alt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Data Sync</p>
                                <h6 class="mb-0">4/60</h6>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dataSyncModal">
                                Sync Now
                            </button>
                        </div>
                    </div>                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file-alt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Applications</p>
                                <h6 class="mb-0">4,200</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-wheelchair fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">PWDs</p>
                                <h6 class="mb-0">34</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-child fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Partial Orphans</p>
                                <h6 class="mb-0">89</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orphans</p>
                                <h6 class="mb-0">119</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Single Parents</p>
                                <h6 class="mb-0">34</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Summary cards End -->

            <!-- Data Sync Modal -->
            <div class="modal fade" id="dataSyncModal" tabindex="-1" aria-labelledby="dataSyncModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dataSyncModalLabel">
                                <i class="fa fa-cogs me-2 text-primary"></i> Data Sync Options
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Upload Data Section -->
                            <div class="d-flex align-items-center justify-content-around  mb-4">
                                <div class="align-items-center text-center mb-4">
                                    <div id="uploadDataBtn">
                                        <i class="fa fa-sync fa-3x text-info"></i><br>
                                        <span class="ms-3 font-weight-bold">Sync Data</span>
                                    </div>
                                </div>
                                <!-- Save Backup Section -->
                                <div class="align-items-center text-center  mb-4">
                                    <div id="saveBackupBtn">
                                        <i class="fa fa-cloud-download-alt fa-3x text-success"></i><br>
                                        <span class="ms-3">Save Backup</span>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <!-- Animation Containers -->
                            <div id="uploadAnimation" class="mt-4 d-none text-center">
                                <i class="fa fa-sync fa-2x text-info rotating-hourglass" id="uploadHourglass"></i>
                                <div class="progress mt-3" style="height: 25px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" id="uploadProgress" style="width: 0%">Uploading...</div>
                                </div>
                            </div>

                            <div id="backupAnimation" class="mt-4 d-none text-center">
                                <i class="fa fa-hourglass-half fa-2x text-success rotating-hourglass" id="backupHourglass"></i>
                                <div class="progress mt-3" style="height: 25px;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="backupProgress" style="width: 0%">Saving Backup...</div>
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
                                <div class="d-flex justify-content-between py-2">
                                    <a href="locations.php?kaputiei_north">
                                        <span>Kaputiei North Ward</span>
                                    </a>
                                    <span>2400</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <a href="locations.php?kitengela">
                                        <span>Kitengela Ward</span>
                                    </a>
                                    <span>1930</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <a href="locations.php?olkeri">
                                        <span>Oloosirkon/Sholinke Ward</span>
                                    </a>
                                    <span>1830</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <a href="locations.php?kenyawa_poka">
                                        <span>Kenyawa Poka Ward</span>
                                    </a>
                                    <span>2400</span>
                                </div>
                                <div class="d-flex justify-content-between py-2">
                                    <a href="locations.php?imilol">
                                        <span>Imaroro Ward</span>
                                    </a>
                                    <span>1300</span>
                                </div>
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
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>clesmer23</td>
                                    <td>Esmer Esike</td>
                                    <td>212</td>
                                    <td>Active</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>clemoki49</td>
                                    <td>Monica Kiambu</td>
                                    <td>152</td>
                                    <td>Active</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>cledesel49</td>
                                    <td>Desmond Eliot</td>
                                    <td>302</td>
                                    <td>Active</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
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
        const uploadDataBtn = document.getElementById('uploadDataBtn');
        const saveBackupBtn = document.getElementById('saveBackupBtn');
        const uploadAnimation = document.getElementById('uploadAnimation');
        const backupAnimation = document.getElementById('backupAnimation');
        const uploadProgress = document.getElementById('uploadProgress');
        const backupProgress = document.getElementById('backupProgress');
        const uploadHourglass = document.getElementById('uploadHourglass');
        const backupHourglass = document.getElementById('backupHourglass');
    
        uploadDataBtn.addEventListener('click', function() {
            // Disable Backup button while upload is in progress
            saveBackupBtn.disabled = true;
    
            // Show upload animation
            uploadAnimation.classList.remove('d-none');
            let progress = 0;
    
            // Simulate upload progress
            const interval = setInterval(() => {
                progress += 10;
                uploadProgress.style.width = progress + '%';
                uploadProgress.textContent = progress + '% Completed';
    
                if (progress >= 100) {
                    clearInterval(interval);
                    // Stop hourglass animation
                    uploadHourglass.classList.add('stopped-hourglass');
                    uploadProgress.classList.remove('progress-bar-animated');
                    uploadProgress.textContent = 'Upload Complete!';
                    // Enable Backup button after upload completes
                    saveBackupBtn.disabled = false;
                }
            }, 500);
        });
    
        saveBackupBtn.addEventListener('click', function() {
            // Disable Upload button while backup is in progress
            uploadDataBtn.disabled = true;
    
            // Show backup animation
            backupAnimation.classList.remove('d-none');
            let progress = 0;
    
            // Simulate backup progress
            const interval = setInterval(() => {
                progress += 15;
                backupProgress.style.width = progress + '%';
                backupProgress.textContent = progress + '% Completed';
    
                if (progress >= 100) {
                    clearInterval(interval);
                    // Stop hourglass animation
                    backupHourglass.classList.add('stopped-hourglass');
                    backupProgress.classList.remove('progress-bar-animated');
                    backupProgress.textContent = 'Backup Complete!';
                    // Enable Upload button after backup completes
                    uploadDataBtn.disabled = false;
                }
            }, 400);
        });
    </script>
</body>

</html>