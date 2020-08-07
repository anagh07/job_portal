<?php include_once 'config/init.php'; ?>
<?php
if (isset($_GET['controller'])) {
    include ('controllers/' . $_GET['controller'] . '.php');
}

else {
    $job = new Job;
    $template = new Template('views/home.php');

    if (!empty($_SESSION['isLoggedIn'])) {
        $template->isLoggedIn = $_SESSION['isLoggedIn'];
    } else {
        $template->isLoggedIn = false;
    }
    
    echo $template;
}