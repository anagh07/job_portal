<?php include_once 'config/init.php'; ?>
<?php
$job = new Job;

if (!empty($_SESSION['employerLogin'])) {
    $jobid = $_GET['jobId'];
    $delete = $job->deleteJobListing($jobid);
    if ($delete) {
        redirect('myAccount.php', 'Listing deleted', 'success');
    } else {
        redirect('myAccount.php', 'Failed to delete', 'error');
    }
} else {
    redirect('index.php', 'Please login first', 'error');
}
