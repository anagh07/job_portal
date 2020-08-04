<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$template = new Template('views/jobDetails.php');

// Parse id parameter passed in req url
$job_id = isset($_GET['id']) ? $_GET['id'] : null;

// Pass down data to the views
$template->job = $job->getJob($job_id);

echo $template;