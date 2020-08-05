<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

if (!empty($_SESSION['isLoggedIn'])) {
    redirect('index.php', 'Already logged in!', 'error');
} else {
    $template = new Template('views/signup.php');
    echo $template;
}