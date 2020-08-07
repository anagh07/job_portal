<?php include_once 'config/init.php'; ?>
<?php
// User model
$user = new User;

// Receive the data from the form
if (isset($_POST['applynow'])) {
    // Find current user
    $userid = $_SESSION['loggedInUserId'];
    // Extract job from form
    $jobid = $_POST['jobid'];

    // Create the application
    $apply = $user->createApplication($jobid, $userid);
    // If application submitted
    if ($apply) {
        redirect('myAccount.php', 'Application submitted. You can view it under submitted applications section.', 'success');
    } else {
        redirect('jobDetails.php', 'Failed to apply.', 'error');
    }
}