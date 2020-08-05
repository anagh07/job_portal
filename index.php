<?php include_once 'config/init.php'; ?>

<?php
if (isset($_GET['controller'])) {
    include ('controllers/' . $_GET['controller'] . '.php');
}

else {
    $job = new Job;
    $template = new Template('views/home.php');
    
    echo $template;
}