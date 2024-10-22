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
        .modal {
            display: none; 
            position: fixed; 
            z-index: 9999; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 40%;
        }

        .modal-footer {
            display: none;
            text-align: center;
            margin-top: 10px;
        }

        #progress-text {
            font-size: 18px;
            font-weight: bold;
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

            <!-- Auto-vetting Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12 bg-light">
                        <div class="handles p-2">
                            <div class="left-issue d-flex justify-content-between">
                                <h3 class="">Auto-vettng Process</h3>
                                <div class="btn border-0"><i class="fa fa-arrow-left text-info" onClick="window.history.back();"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-8">
                        <form id="autovet-form" class="text-center">
                            <div class="mb-4">
                                <label class="form-label mt-3">Please select issues you want to vet and click "Auto-vet" button below:</label>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue1" value="No birth certificate provided">
                                    <label class="form-check-label" for="issue1">No birth certificate provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue2" value="No admission number provided">
                                    <label class="form-check-label" for="issue2">No admission number provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue3" value="No school provided">
                                    <label class="form-check-label" for="issue3">No school provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue4" value="Driving school">
                                    <label class="form-check-label" for="issue4">No father id number provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue5" value="No id number provided">
                                    <label class="form-check-label" for="issue5">No mother id number provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue6" value="No father details provided">
                                    <label class="form-check-label" for="issue6">No father details provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue7" value="No mother details provided">
                                    <label class="form-check-label" for="issue7">No mother details provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue8" value="No parents details provided">
                                    <label class="form-check-label" for="issue8">No parents details provided</label>
                                </div>
                                <div class="form-check text-start">
                                    <input class="form-check-input" type="checkbox" id="issue9" value="Incomplete applicants">
                                    <label class="form-check-label" for="issue9">Incomplete applicants</label>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary" onclick="autoVetIssues()"><i class="fas fa-rocket"></i> Auto-vet</button>
                        </form>
                    </div>
                    <div class="col-md-4 pt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Status Report</h5>
                                <h5 class="">Vetting Progress</h5>
                                <div class="progress mb-3">
                                    <div id="vetting-progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                <h5 class="card-title">Summary</h5>
                                <ul id="vetting-summary" class="list-group">
                                    <li class="list-group-item d-flex justify-content-between"><span>Issues Vetted:</span> <span id="issues-count"> </span></li>
                                    <li class="list-group-item d-flex justify-content-between"><span>Total Students affected:</span> <span id="affected-count"> </span></li>
                                    <!-- <li class="list-group-item d-flex justify-content-between"><span>Remainig Students:</span> <span id="remain-count">3980</span></li> -->
                                </ul>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary mt-2" id="reset-button"><i class="fas fa-window-restore"></i> Reset Vetting</button>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <!-- Auto-vetting Form End -->

            <!-- Modal Structure for Loading Animation -->
            <div id="loadingModal" class="modal">
                <div class="modal-content">
                    <div class="toast-container position-fixed top-0 end-0 p-3">
                        <div id="successToast" class="toast bg-success text-white" role="alert">
                            <div class="toast-body" id="toastBodyappend"></div>
                        </div>
                        <div id="errorToast" class="toast bg-danger text-white" role="alert">
                            <div class="toast-body" id="toastBodyappendError"></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <h4>Auto-vetting</h4>
                        <p id="progress-text">Processing... 0%</p>
                        <ul id="vetted-list" class="list-group p-0 m-0"></ul>
                    </div>
                    <div class="modal-footer">
                        <button id="ok-button" class="btn btn-success" onclick="closeModal()">Done</button>
                    </div>
                </div>
                <!-- Loading Animation HTML -->
                <div id="loadingAnimation" class="loading-animation" style="display: none;">
                    <div class="spinner">
                        <div class="rect1 bg-primary"></div>
                        <div class="rect2 bg-primary"></div>
                        <div class="rect3 bg-primary"></div>
                        <div class="rect4 bg-primary"></div>
                        <div class="rect5 bg-primary"></div>
                    </div>
                    <p class="text-center"><strong>AI Vetting...</strong></p>
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

    <!-- Auto Vet Process -->
    <script>
        // Function to start the auto-vetting process after a delay
        function startAutoVetWithDelay() {
            // Show the loading animation
            let loadingAnimation = document.getElementById('loadingAnimation');
            loadingAnimation.style.display = 'block';

            // Add a 5-second delay before starting the auto-vet process
            setTimeout(() => {
                // Hide the loading animation
                loadingAnimation.style.display = 'none';
                // Call the auto-vet function
                autoVetIssues();
            }, 10000); 
        }

        // Auto-vetting Script
        function autoVetIssues() {
            let modal = document.getElementById('loadingModal');
            let progressText = document.getElementById('progress-text');
            let vettedList = document.getElementById('vetted-list');
            let okButton = document.getElementById('ok-button');
            let footer = document.querySelector('.modal-footer');
            
            // Clear the previous list of vetted items
            vettedList.innerHTML = '';
            // Collect checked issues
            let selectedIssues = [];
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(function(issue) {
                selectedIssues.push(issue.nextElementSibling.innerText);
            });
            
            if (selectedIssues.length === 0) {
                alert("Please select at least one issue to auto-vet.");
                return;
            }

            // Show modal
            modal.style.display = 'flex';
            okButton.style.display = 'none';
            footer.style.display = 'none';
            progressText.innerHTML = 'Processing... 0%';
            
            let progress = 0;
            let interval = setInterval(function () {
                if (progress >= 100) {
                    clearInterval(interval);
                    progressText.innerHTML = 'Auto-vetting complete!';
                    okButton.style.display = 'inline-block';
                    footer.style.display = 'block';
                } else {
                    progress++;
                    progressText.innerHTML = 'Processing... ' + progress + '%';
                }
            }, 50); // Animation speed

            // Perform AJAX request to the server
            console.log("Selected issues:", selectedIssues);

            $.ajax({
                url: 'analysis/auto_vet.php',
                type: 'POST',
                data: { issues: JSON.stringify(selectedIssues) },
                success: function(response) {
                    clearInterval(interval);
                    progressText.innerHTML = 'Auto-vetting complete!';
                    
                    // Update the vetted list display
                    selectedIssues.forEach(function(issue) {
                        let listItem = document.createElement('li');
                        listItem.classList.add('list-group-item');
                        listItem.innerText = issue;
                        vettedList.appendChild(listItem);
                    });

                    okButton.style.display = 'inline-block';
                    footer.style.display = 'block';

                    // Display success or error response in a toast notification
                    if (response.includes("success")) {
                        showToast('successToast', response);
                    } else {
                        showToast('errorToast', response);
                    }
                },
                error: function() {
                    clearInterval(interval);
                    progressText.innerHTML = 'Error processing request.';
                    okButton.style.display = 'inline-block';
                    footer.style.display = 'block';
                    
                    showToast('errorToast', "Error processing request. Please try again.");
                }
            });
        }

        // Function to fetch vetting status and update the report
        function updateVettingStatus() {
            // Send an AJAX request to fetch the vetting status
            fetch('analysis/auto_vet_status.php')
                .then(response => response.json())
                .then(data => {
                    // Update the Issues Vetted count
                    document.getElementById('issues-count').textContent = data.vetted_issues || 0;

                    // Update the Total Students Affected count
                    document.getElementById('affected-count').textContent = data.total_affected || 0;

                    // Update the progress bar based on the number of vetted issues
                    // Assuming a total of 8 issues for a full progress bar
                    const totalIssues = 8;
                    const progressPercent = (data.vetted_issues / totalIssues) * 100;
                    const progressBar = document.getElementById('vetting-progress-bar');
                    progressBar.style.width = progressPercent + '%';
                    progressBar.setAttribute('aria-valuenow', progressPercent);
                    progressBar.textContent = Math.round(progressPercent) + '%';
                })
                .catch(error => {
                    console.error('Error fetching vetting status:', error);
                });
        }

        // Call the function to update the status when the page loads
        document.addEventListener('DOMContentLoaded', updateVettingStatus);

        // Function to close the modal
        function closeModal() {
            let modal = document.getElementById('loadingModal');
            modal.style.display = 'none';
        }

        // Function to show a toast notification
        function showToast(toastId, message) {
            document.getElementById(toastId).querySelector('.toast-body').textContent = message;
            let toast = new bootstrap.Toast(document.getElementById(toastId));
            toast.show();
        }



        $('#reset-button').click(function () {
            $.ajax({
                url: 'analysis/auto_vet_reset.php',
                type: 'POST',
                success: function (response) {
                    let data = JSON.parse(response);
                    if (data.status === "success") {
                        alert(data.message);
                        // Optionally, refresh the vetting status
                        updateVettingStatus();
                    } else {
                        alert("Error: " + data.message);
                    }
                },
                error: function () {
                    alert("An error occurred while resetting vetting issues.");
                }
            });
        });

    </script>
    


    <script src="js/main.js"></script>
</body>

</html>