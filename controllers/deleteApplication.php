<?php include_once 'config/init.php'; ?>
<?php
$job = new Job;

if (!empty($_SESSION['isLoggedIn'])) {
    $jobid = $_GET['jobId'];
    $delete = $job->deleteApplication($jobid, $_SESSION['loggedInUserId']);
    if ($delete) {
        redirect('myAccount.php', 'Application deleted', 'success');
    } else {
        redirect('myAccount.php', 'Failed to delete', 'error');
    }
} else {
    redirect('index.php', 'Please login first', 'error');
}
