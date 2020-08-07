<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$user = new User;
$template = new Template('views/jobDetails.php');

// Parse id parameter passed in req url
$job_id = isset($_GET['id']) ? $_GET['id'] : null;

// Pass down data to the views
$template->job = $job->getJob($job_id);
if (!empty($_SESSION['isLoggedIn'])) {
    $template->isLoggedIn = $_SESSION['isLoggedIn'];
} else {
    $template->isLoggedIn = false;
}

// For employer pass down list of applicants
if (!empty($_SESSION['loggedInUserType']) && $_SESSION['loggedInUserType'] == 'employer') {
    $applicant = $job->getApplicantsByJobId($job_id);
    $template->applicants = $applicant;
    // Get skills of applicant
    foreach ($applicant as $temp) {
        $skills[$temp->user_ID] = $user->getSkills($temp->user_ID);
    }
    $template->skills = $skills;
}

echo $template;