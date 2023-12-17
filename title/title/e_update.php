<?php
include 'session_e.php';
include 'connection.php';

$jobs_id = $_SESSION['eid'];

$query = "SELECT * FROM tbl_jobs WHERE id = $jobs_id";

$result = mysqli_query($conn, $query);

if ($result) {
    $jobData = mysqli_fetch_assoc($result);
    $title = $jobData['title'];
    $description = $jobData['description'];
    $qualifications = $jobData['qualifications'];
    $salary = $jobData['salary'];
    $location = $jobData['location'];
    $work_sched = $jobData['work_sched'];
    $work_arrangement = $jobData['work_arrangement'];
    $status = $jobData['status'];
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../title/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
    <title>Post A Job | Employer</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../title/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        
        <style>
            body {
                background-color: #f5f5f7;
                font-family: 'Lato', sans-serif;
                font-weight: 400;
            }

            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
        </style>
        
</head>
<body>

    <main>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <img class="bi me-2" src="../title/title-img/sec-logo.png" width="80" height="30" role="img" aria-label="Title"></img>
            <!-- navigators-->
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="e_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Post a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="e_viewapplications.php">View Applications</a>
                    </li>
                </ul>
                <button class="btn btn-primary" onclick="window.location.href='logout.php'">Logout</button>
            </div>
            </header>
        </div>
    </main>

    <!-- Form Section -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h2>Your Job Listing Awaits: Get Started</h2>
                <form id="form_jobs">
                    <input type='hidden' value="<?php echo $eid; ?>" name='eid' />
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Job Title</strong></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title of the posistion." value="<?php echo $title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Job Description</strong></label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Provide a brief description of the job responsibilities."><?php echo $description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="qualifications" class="form-label"><strong>Qualifications</strong></label>
                        <textarea class="form-control" name="qualifications" id="qualifications" rows="3" placeholder="List the qualifications and skills required for the position (Educational Background, Professional Experience, Skills, etc.)."><?php echo $qualifications; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label"><strong>Salary</strong></label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Indicate the salary for the position." value="<?php echo $salary; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label"><strong>Location</strong></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Specify the location of the job (city, state)." value="<?php echo $location; ?>">
                    </div>
                    <div class="mb-3"> 
                        <label for="work_sched" class="form-label"><strong>Work Schedule</strong></label>
                        <select class="form-select" name="work_sched" id="work_sched">
                            <option selected>Select Work Schedule</option>
                            <option value="Full-Time" <?php echo ($work_sched == 'Full-Time') ? 'selected' : ''; ?>>Full-time</option>
                            <option value="Part-Time" <?php echo ($work_sched == 'Part-Time') ? 'selected' : ''; ?>>Part-time</option>
                            <option value="Contract" <?php echo ($work_sched == 'Contract') ? 'selected' : ''; ?>>Contract</option>
                            <option value="Temporary" <?php echo ($work_sched == 'Temporary') ? 'selected' : ''; ?>>Temporary</option>
                        </select>
                    </div>
                    <div class="mb-3"> 
                        <label for="work_arrangement" class="form-label"><strong>Work Arrangement</strong></label>
                        <select class="form-select" name="work_arrangement" id="work_arrangement">
                            <option selected>Select Work Arrangement</option>
                            <option value="Remote" <?php echo ($work_arrangement == 'Remote') ? 'selected' : ''; ?>>Remote</option>
                            <option value="On-Site" <?php echo ($work_arrangement == 'On-site') ? 'selected' : ''; ?>>On-Site</option>  
                    </select>
                    </div>
                    <div class="mb-3"> 
                        <label for="status" class="form-label"><strong>Application Status</strong></label>
                        <select class="form-select" name="status" id="status">
                            <option selected>Select Application Status</option>
                            <option value="Open" <?php echo ($status == 'Open') ? 'selected' : ''; ?>>Open</option>
                            <option value="Closed" <?php echo ($status == 'CLosed') ? 'selected' : ''; ?>>Closed</option>  
                        </select>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary" name="submitPost" id="submitPost" type="button">Post a Job</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>  
  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        var isUpdate = urlParams.get('update') === 'true';

        function loadJobDetails() {
            var jobs_id = <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?>;
            if (jobs_id) {
                $.ajax({
                    type: "POST",
                    url: "process_jobs.php",
                    data: {
                        jobs_id: jobs_id
                    },
                    success: function(response) {
                        var jobData = JSON.parse(response);
                        $("#title").val(jobData.title);
                        $("#description").val(jobData.description);
                        $("#qualifications").val(jobData.qualifications);
                        $("#salary").val(jobData.salary);
                        $("#location").val(jobData.location);
                        $("#work_sched").val(jobData.work_sched);
                        $("#work_arrangement").val(jobData.work_arrangement);
                        $("#status").val(jobData.status);
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        }

        if (isUpdate) {
            loadJobDetails();
        }

        $("#submitPost").click(function() {
            var title = $("#title").val();
            var description = $("#description").val();
            var qualifications = $("#qualifications").val();
            var salary = $("#salary").val();
            var location = $("#location").val();
            var work_sched = $("#work_sched").val();
            var work_arrangement = $("#work_arrangement").val();
            var status = $("#status").val();

            var updateData = isUpdate ? { update: true, jobs_id: <?php echo isset($_GET['id']) ? $_GET['id'] : 'null'; ?> } : {};

            var formData = {
                title: title,
                description: description,
                qualifications: qualifications,
                salary: salary,
                location: location,
                work_sched: work_sched,
                work_arrangement: work_arrangement,
                status: status,
                ...updateData
            };

            $.ajax({
                type: "POST",
                url: "process_jobs.php", 
                data: formData,
                success: function(response) {
                    window.location.href = "e_home.php";
                },
                error: function(error) {
                    console.log("Error: " + error);
                }
            });
        });
    });
    </script>


    <script src="../title/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
