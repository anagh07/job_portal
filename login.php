<?php include_once 'config/init.php'; ?>

<?php
// User model
$user = new User;

// login check
// Receive the data from the form
if (isset($_POST['login'])) {    
    // Input user credentials
    $input_usertype = $_POST['usertype'];
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];

    // For employers
    if ($input_usertype == 'employer') {
        // employers auth code
        $auth_employer = $user->getEmployer($_POST['email']);
        $auth_email = $auth_employer->email;
        $auth_id = $auth_employer->employer_ID;
        $auth_password = $auth_employer->login_password;
        if ($auth_email == $input_email && $auth_password == $input_password) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['employerLogin'] = true;
            $_SESSION['loggedInUserEmail'] = $auth_email;
            $_SESSION['loggedInUserId'] = $auth_id;
            $_SESSION['loggedInUserType'] = $input_usertype;
            redirect('index.php', 'Successfully logged in!', 'success');
        } else {
            redirect('login.php', 'Invalid email or password', 'error');
        }
    } 
    // For users
    else {
        // User credentials from db
        $auth_user = $user->getUser($_POST['email']);
        $auth_email = $auth_user->email;
        $auth_password = $auth_user->login_password;
        $auth_id = $auth_user->user_ID;
        // Check for match
        if ($auth_email == $input_email && $auth_password == $input_password) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['loggedInUserEmail'] = $auth_email;
            $_SESSION['loggedInUserId'] = $auth_id;
            $_SESSION['loggedInUserType'] = $input_usertype;
            redirect('userDashboard.php', 'Successfully logged in!', 'success');
        } else {
            redirect('login.php', 'Invalid email or password', 'error');
        }
    }

}

if (!empty($_SESSION['isLoggedIn'])) {
    redirect('index.php', 'Logout of current user first', 'error');
} else {
    // Render the view
    $template = new Template('views/login.php');
    
    echo $template;
}