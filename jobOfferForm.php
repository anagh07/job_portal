<?php include_once 'config/init.php'; ?>
<?php
// User model
$user = new User;
$job = new Job;

if (isset($_POST['confirmSalary'])) {
    // extract data
    $jobid = $_POST['jobid'];
    $userid = $_POST['userid'];
    $salary = intval($_POST['salary']);

    $createOffer = $job->createJobOfferToUser($jobid, $userid, $salary);

    if ($createOffer) {
        redirect('index.php', 'Job offered successfully', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}

if (isset($_POST['joboffer'])) {
    // get job id and user id
    $jobid = $_POST['jobid'];
    $userid = $_POST['userid'];

    $offeredUser = $user->getUserById($userid);

    // render view
    $template = new Template('views/jobOfferForm.php');

    // Pass the values to template
    $template->userid = $userid;
    $template->jobid = $jobid;
    $template->user = $offeredUser;

    echo $template;
}

// else stay in details page
else {
    redirect('jobDetails.php', 'Oops something went wrong.', 'error');
}