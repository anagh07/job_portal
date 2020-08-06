<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;
$template = new Template('views/userDashboard.php');

// Receive data sent from the views as GET/POST requests
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

if($category_id) {
    $template->jobs = $job->getByCategory($category_id);
    $template->title = 'Jobs found in ' . $job->getCategory($category_id)->category_name . ' category';
} else {
    $template->jobs = $job->getAllJobs();
    $template->title = 'Latest Jobs';
}

// Pass down data to the views
$template->categories = $job->getCategories();
if (!empty($_SESSION['isLoggedIn'])) {
    $template->isLoggedIn = $_SESSION['isLoggedIn'];
} else {
    $template->isLoggedIn = false;
}

echo $template;