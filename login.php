<?php include_once 'config/init.php'; ?>

<?php
// User model
$user = new User;

// login check
// Receive the data from the form
if (isset($_POST['login'])) {
    // User credentials from db
    $auth_user = $user->getUser($_POST['email']);
    $auth_email = $auth_user->email;
    $auth_password = $auth_user->password;
    
    // Input user credentials
    $auth_usertype = $_POST['usertype'];
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];

    // For employers
    if ($auth_usertype == 'employer') {
        // employers auth code
    } else {
        // employee auth code
        // Check for match
        if ($auth_email == $input_email && $auth_password == $input_password) {
            $_SESSION['isLoggedIn'] = true;
            redirect('userDashboard.php', 'Successfully logged in!', 'success');
        } else {
            redirect('login.php', 'Invalid email or password', 'error');
        }
    }

}

if (!empty($_SESSION['isLoggedIn'])) {
    redirect('index.php', 'Already logged in!', 'error');
} else {
    // Render the view
    $template = new Template('views/login.php');
    
    echo $template;
}