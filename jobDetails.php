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
    if (!empty($skills)) {
        # code...
        $template->skills = $skills;
    }
}

// For users
if (!empty($_SESSION['loggedInUserType']) && $_SESSION['loggedInUserType'] == 'user') {
    // Find if user applied to job
    $hasApplied = $user->getApplicationByUserIdJobId($_SESSION['loggedInUserId'], $job_id);
    $template->hasApplied = $hasApplied;

    // Find if offer exists for current user in offers table
    $offer = $job->getOfferByUserJobId($_SESSION['loggedInUserId'], $job_id);
    // Pass "pending" if no offer found
    if (empty($offer)) {
        $template->offerStatus = 'pending';
    } else {
        // Pass "accepted" if offer found
        $template->offerStatus = 'accepted';
    }
}

echo $template;