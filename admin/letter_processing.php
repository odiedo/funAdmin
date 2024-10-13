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
    <style>
        .modal.fade .modal-dialog {
            transform: translate(0, 0);
        }
        #spinnerContainer {
            background-color: #0006;
            color: aqua;
            z-index: 1050;
            width: 100vw;
            height: 100vh;
        }
    
        .d-none {
            display: none !important;
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
        <div id="spinnerContainer" class="d-none position-fixed top-50 start-50 translate-middle d-flex flex-column align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="sr-only">Loading...</span>
            </div>
            <div id="progressText" class="mt-3 text-light">0%</div>
        </div>
        

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
            <?php include('top_nav.php'); ?>
            <!-- Navbar End -->

            <!-- Letter Generation Section -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-lg border-0 p-4" style="background-color: #f9f9f9;">
                            <div class="card-body">
                                <h3 class="text-center mb-4" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 300;">
                                    <i class="fas fa-school text-primary me-2"></i> Generate Letters for Schools
                                </h3>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label for="schoolSelect" class="form-label">Select School</label>
                                        <select class="form-select form-select-lg" id="schoolSelect">
                                            <option selected>Select School</option>
                                            <option value="1">Kolanya Boys High School</option>
                                            <option value="2">Kamuria Secondary School</option>
                                            <option value="3">Kamusinga Boys High School</option>
                                            <option value="4">Alliance High School</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="educationLevel" class="form-label">Education Level</label>
                                        <select class="form-select form-select-lg" id="educationLevel">
                                            <option selected>Select Level</option>
                                            <option value="secondary">Secondary</option>
                                            <option value="tertiary">Tertiary</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="chequeDate" class="form-label">Date for Cheque Letter Signed</label>
                                        <input type="date" class="form-control form-control-lg" id="chequeDate">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label for="totalBeneficiary" class="form-label">Beneficiaries</label>
                                        <input type="text" class="form-control form-control-lg" id="totalBeneficiary" value="123" disabled>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="amountPerStudent" class="form-label">Amount per Student (Kshs)</label>
                                        <input type="number" class="form-control form-control-lg" id="amountPerStudent" value="0">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="totalDisbursedAmount" class="form-label">Total Amount Disbursed (Kshs)</label>
                                        <input type="text" class="form-control form-control-lg" id="totalDisbursedAmount" value="500000" disabled>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary btn-lg px-5" id="generateLetterBtn">
                                        <i class="fas fa-file-alt me-2"></i> Generate Letters
                                    </button>
                                </div>
                                <hr>

                                <!-- School Search -->
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="schoolSearch" class="form-label">Search for School</label>
                                        <input type="text" class="form-control form-control-lg" id="schoolSearch" placeholder="Enter Student Name or ID">
                                    </div>
                                </div>

                                <!-- Student List -->
                                <div class="list-group mb-4" style="max-height: 300px; overflow-y: auto;">
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        Angorom Secondary school <span class="badge bg-dark rounded-pill">34</span> <span class="badge bg-primary rounded-pill">ID: ASC12345</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        St. Marys Mumias Secondary School <span class="badge bg-dark rounded-pill">320</span> <span class="badge bg-primary rounded-pill">ID: SMMSS67890</span>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        St. Jude Boys Secondary School <span class="badge bg-dark rounded-pill">430</span> <span class="badge bg-primary rounded-pill">ID: SJBSS83</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Verification Modal -->
            <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xm">
                    <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="passwordModalLabel" style="font-weight: 700; font-family: 'Helvetica Neue', sans-serif; color: #0009">
                                <i class="fas fa-lock me-2"></i>Password Verification
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding: 2rem;">
                            <form id="passwordForm">
                                <div class="mb-3">
                                    <label for="userPassword" class="form-label" style="font-weight: 600; color: #555;">
                                        Enter your password to confirm Process:
                                    </label>
                                    <input type="password" class="form-control" id="userPassword" placeholder="Password" style="border-radius: 50px; padding: 0.75rem; border: 1px solid #ccc;">
                                    <div class="invalid-feedback" style="color: #ff4d4d;">
                                        Incorrect password. Please try again.
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="border-top: 1px solid #ccc;">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border-radius: 50px; padding: 0.5rem 1.5rem;">
                                Cancel
                            </button>
                            <button type="button" class="btn btn-outline-primary" id="verifyPasswordBtn" style="border-radius: 50px; padding: 0.5rem 1.5rem;">
                                Verify
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal after Successful Password Verification -->
            <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="actionModalLabel" style="font-weight: 700; font-family: 'Helvetica Neue', sans-serif; color: #0007">
                                <i class="fas fa-file-alt me-2"></i>Executive Action Required
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="padding: 2rem;">
                            <h6 class="mb-3" style="font-weight: 600; color: #333; text-transform: uppercase; letter-spacing: 1px;">Cheque Details</h6>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">School:</strong> 
                                    <span id="summarySchool" style="color: #000;">Kolanya Boys High School</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Education Level:</strong> 
                                    <span id="summaryEducationLevel" style="color: #000;">Secondary</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Date for Cheque Letter Signed:</strong> 
                                    <span id="summaryChequeDate" style="color: #000;">2024-09-10</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Beneficiaries:</strong> 
                                    <span id="summaryBeneficiaries" style="color: #000;">123</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Amount per Student (Kshs):</strong> 
                                    <span id="summaryAmountPerStudent" style="color: #000;">1000</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Total Amount Disbursed (Kshs):</strong> 
                                    <span id="summaryTotalAmount" style="color: #000;">123000</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <strong style="color: #555;">Cheque Number:</strong> 
                                    <span id="summaryChequeNumber" style="color: #000;">CH123456</span>
                                </li>
                            </ul>                
                            <hr style="border-top: 1px solid #ccc;">
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-outline-primary" id="printLetter" style="border-radius: 50px; padding: 0.5rem 2rem;">
                                    <i class="fas fa-print"></i> Print
                                </button>
                                <button class="btn btn-outline-success" id="downloadLetter" style="border-radius: 50px; padding: 0.5rem 2rem;">
                                    <i class="fas fa-download"></i> Download
                                </button>
                                <button class="btn btn-outline-info" id="shareLetter" style="border-radius: 50px; padding: 0.5rem 2rem;">
                                    <i class="fas fa-share-alt"></i> Share
                                </button>
                                <button class="btn btn-outline-secondary" id="viewLetter" style="border-radius: 50px; padding: 0.5rem 2rem;">
                                    <i class="fas fa-eye"></i> View
                                </button>
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

    <script>
        $(document).ready(function() {
            $('#schoolSelect').select2({
                placeholder: "Select School",
                allowClear: true
            });
        });
    </script>
    <script>
        // calculation of total disbursed amount
        document.getElementById('amountPerStudent').addEventListener('input', calculateTotalDisbursed);    
        function calculateTotalDisbursed() {
            var beneficiaries = parseInt(document.getElementById('totalBeneficiary').value) || 0;
            var amountPerStudent = parseInt(document.getElementById('amountPerStudent').value) || 0;
            var totalDisbursed = beneficiaries * amountPerStudent;
            document.getElementById('totalDisbursedAmount').value = totalDisbursed;
        }
    
        calculateTotalDisbursed();
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        function calculateTotalDisbursed() {
            var beneficiaries = parseInt(document.getElementById('totalBeneficiary').value) || 0;
            var amountPerStudent = parseInt(document.getElementById('amountPerStudent').value) || 0;
            var totalDisbursed = beneficiaries * amountPerStudent;
            document.getElementById('totalDisbursedAmount').value = formatNumber(totalDisbursed);
        }
        
    </script>
    <script src="js/main.js"></script>
    <script>
        // Dummy password for verification
        const correctPassword = '123';
    
        document.getElementById('generateLetterBtn').addEventListener('click', function () {
            // Show the password verification modal
            var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'), {
                keyboard: false
            });
            passwordModal.show();
        });
    
        document.getElementById('verifyPasswordBtn').addEventListener('click', function () {
            const userPassword = document.getElementById('userPassword').value;
            if (userPassword === correctPassword) {
                // Hide the password modal
                var passwordModal = bootstrap.Modal.getInstance(document.getElementById('passwordModal'));
                passwordModal.hide();
        
                // Show the spinner with progress
                showSpinnerWithProgress();
        
                // Simulate counting progress
                let progress = 0;
                const progressInterval = setInterval(function() {
                    progress++;
                    document.getElementById('progressText').textContent = progress + '%';
        
                    // Stop counting when 100% is reached
                    if (progress >= 100) {
                        clearInterval(progressInterval);
                        hideSpinnerAndShowActionModal();
                    }
                }, 5);
            } else {
                document.getElementById('userPassword').classList.add('is-invalid');
            }
        });
        
        function showSpinnerWithProgress() {
            // Display spinner
            document.getElementById('spinnerContainer').classList.remove('d-none');
        }
        
        function hideSpinnerAndShowActionModal() {
            // Hide spinner
            document.getElementById('spinnerContainer').classList.add('d-none');
        
            // Show the action modal
            var actionModal = new bootstrap.Modal(document.getElementById('actionModal'), {
                keyboard: false
            });
            actionModal.show();
        }        
    
        function populateActionModal() {
            // Simulate fetching data (replace with actual data fetching logic)
            const school = document.getElementById('schoolSelect').selectedOptions[0].text;
            const educationLevel = document.getElementById('educationLevel').selectedOptions[0].text;
            const chequeDate = document.getElementById('chequeDate').value;
            const beneficiaries = document.getElementById('totalBeneficiary').value;
            const amountPerStudent = document.getElementById('amountPerStudent').value;
            const totalAmount = document.getElementById('totalDisbursedAmount').value;
            const chequeNumber = 'CH123456';  // Example cheque number, replace with actual logic
    
            // Populate modal fields
            document.getElementById('summarySchool').textContent = school;
            document.getElementById('summaryEducationLevel').textContent = educationLevel;
            document.getElementById('summaryChequeDate').textContent = chequeDate;
            document.getElementById('summaryBeneficiaries').textContent = beneficiaries;
            document.getElementById('summaryAmountPerStudent').textContent = amountPerStudent;
            document.getElementById('summaryTotalAmount').textContent = totalAmount;
            document.getElementById('summaryChequeNumber').textContent = chequeNumber;
    
            // Show the modal
            var actionModal = new bootstrap.Modal(document.getElementById('actionModal'), {
                keyboard: false
            });
            actionModal.show();
        }
    
        // Add event listeners for actions
        document.getElementById('printLetter').addEventListener('click', function () {
            alert('Print option selected!');
            // Add your print functionality here
        });
    
        document.getElementById('downloadLetter').addEventListener('click', function () {
            alert('Download option selected!');
            // Add your download functionality here
        });
    
        document.getElementById('shareLetter').addEventListener('click', function () {
            alert('Share option selected!');
            // Add your share functionality here
        });
    
        document.getElementById('viewLetter').addEventListener('click', function () {
            alert('View option selected!');
            // Add your view functionality here
        });
    </script>
    
</body>

</html>