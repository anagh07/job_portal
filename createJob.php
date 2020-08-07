<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (empty($_SESSION['loggedInUserType'])) {
    redirect('login.php', 'Please login to post jobs', 'error');
} else if (empty($_SESSION['employerLogin'])) {
    redirect('index.php', 'You must be logged in as employer to post', 'error');
} else {
    # code...
    // Receive the data from the form
    if (isset($_POST['submit'])) {
        $data = array();
        $data['company'] = $_POST['company'];
        $data['job_title'] = $_POST['title'];
        $data['category_id'] = $_POST['category'];
        $data['salary'] = $_POST['salary'];
        $data['no_of_vacancies'] = $_POST['vacancies'];
        $data['job_description'] = $_POST['description'];
    
        // Check if job created
        if ($job->create($data)) {
            // posts table
            $newJobId = $job->getJobByTitleCompany($data['job_title'], $data['company'])->job_ID;
            $job->addPosts($newJobId, $_SESSION['loggedInUserId']);
            redirect('index.php', 'Job listing created', 'success');
        } else {
            redirect('createJob.php', 'Failed to create job listing', 'error');
        }
    }
    
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

