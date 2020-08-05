<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

// Receive the data from the form
if (isset($_POST['submit'])) {
    $data = array();
    $data['company'] = $_POST['company'];
    $data['title'] = $_POST['title'];
    $data['category'] = $_POST['category'];
    $data['salary'] = $_POST['salary'];
    $data['vacancies'] = $_POST['vacancies'];
    $data['description'] = $_POST['description'];

    // $job->create($data);

    // Check if job created
    if ($job->create($data)) {
        redirect('index.php', 'Job listing created', 'success');
    } else {
        redirect('createJob.php', 'Failed to create job listing', 'error');
    }
}

// Check if user logged in as employer
if (empty($_SESSION['employerLogin'])) {
    redirect('login.php', 'Please login as employer to hire!', 'error');
} else {
    // Create view
    $template = new Template('views/createJob.php');
    
    // Pass down data to the views
    $template->categories = $job->getCategories();
    if (!empty($_SESSION['isLoggedIn'])) {
        $template->isLoggedIn = $_SESSION['isLoggedIn'];
    } else {
        $template->isLoggedIn = false;
    }
    
    echo $template;
}
