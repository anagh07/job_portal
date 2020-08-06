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
                <strong>Company:</strong><?php echo $job->company; ?>
            </li>
            <li class="list-group-item">
                <strong>Salary: </strong><?php echo $job->salary; ?>
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
                <a class="mb-1 btn btn-outline-success" href="#" type="button">Apply now</a>
            <?php endif ?>
    </ul>
    <hr>
    <hr>
    <hr>

    <!-- Applicant list for employer -->
    <?php if (!empty($_SESSION['loggedInUserType']) && $_SESSION['loggedInUserType'] == 'employer') : ?>
        <h3 class="page-header">Applicants</h3>
        <hr>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
            </a>
            <a class="mb-1 btn btn-outline-info" href="#" type="button">View applicant profile</a>
            <a class="mb-1 btn btn-outline-success" href="#" type="button">Offer job to applicant</a>
        </div>
    <?php endif ?>

    <hr>
<?php include 'includes/footer.php'; ?>