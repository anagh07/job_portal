<?php include 'includes/header.php'; ?>
    <a href="userDashboard.php">&lt&lt Back to listing</a>
    <hr>
    <h2 class="page-header">
        <?php echo $job->job_title; ?> 
    </h2>
    <small>Posted by <?php echo $job->company; ?> on <?php echo $job->post_date; ?></small>
    <hr>

    <ul class="list-group">
            <li class="list-group-item">
                <strong>Company: </strong><?php echo $job->company; ?>
            </li>
            <li class="list-group-item">
                <strong>Salary ($/yr): </strong><?php echo $job->salary; ?>
            </li>
            <li class="list-group-item">
                <strong>Vacancies: </strong><?php echo $job->no_of_vacancies; ?>
            </li>
            <li class="list-group-item">
                <strong>Start Date: </strong><?php echo $job->start_date; ?>
            </li>
            <li class="list-group-item">
                <strong>Location: </strong>
            </li>
            <li class="list-group-item">
                <strong>Description</strong>
                <p>
                    <?php echo $job->job_description; ?>
                </p>
            </li>
            <?php if (!empty($_SESSION['loggedInUserType']) && $_SESSION['loggedInUserType'] == 'user') : ?>
                <form action="index.php?controller=createApplication" method="post">
                    <input type="hidden" name="jobid" id="jobid" value="<?php echo $job->job_ID ?>" class="form-control">
                    <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['loggedInUserId'] ?>" class="form-control">
                    <input type="submit" class="mt-4 btn btn-outline-success" value="Apply Now" name="applynow" id="applynow">
                </form>
            <?php endif ?>
    </ul>
    <hr>
    <hr>
    <hr>

    <!-- Applicant list for employer -->
    <?php if (!empty($_SESSION['loggedInUserType']) && $_SESSION['loggedInUserType'] == 'employer') : ?>
        <h3 class="page-header">Applicants</h3>
        <hr>
        <?php foreach($applicants as $applicant): ?>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1"><?php echo $applicant->first_name . ' ' . $applicant->last_name ?></h5>
                    <small>applied on <?php echo $applicant->application_date ?></small>
                    </div>
                    <p class="mb-1">Email: <?php echo $applicant->email ?></p>
                    <p class="mb-2">Phone: <?php echo $applicant->phone ?></p>
                    <p class="mb-1">Skills: <!-- get list of skills --></p>
                    <ul>
                        <?php foreach($skills[$applicant->user_ID] as $skill): ?>
                            <li><?php echo $skill->skill ?></li>
                        <?php endforeach ?>
                    </ul>
                </a>
                <a class="mb-1 btn btn-outline-info" href="#" type="button">View applicant profile</a>
                <a class="mb-1 btn btn-outline-success" href="#" type="button">Offer job to applicant</a>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <hr>
<?php include 'includes/footer.php'; ?>