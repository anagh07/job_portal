<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (!empty($_SESSION['isLoggedIn'])) {
    $template = new Template('views/signup.php');
    echo $template;
} else {
    redirect('login.php', 'Please login to your account first', 'error');    
}