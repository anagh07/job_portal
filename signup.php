<?php include_once 'config/init.php'; ?>

<?php
$user = new User;

if (!empty($_SESSION['isLoggedIn'])) {
    redirect('index.php', 'Already logged in!', 'error');
} else {
    $template = new Template('views/signup.php');

    if (isset($_POST['signup'])) {
        // Get entered user/employer data from form
        $input_usertype = $_POST['usertype'];
        $data['first_name'] = $_POST['fname'];
        $data['last_name'] = $_POST['lname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['login_password'] = $_POST['password'];
        $input_password_confirm = $_POST['confirmpassword'];
        // Check if confirm password matches
        if ($data['login_password'] != $input_password_confirm) {
            redirect('signup.php', 'Password re-type mismatch, please try again.', 'error');
        }

        // For user signup
        if ($input_usertype == 'user') {
            $createuser = $user->createUser($data);
            if ($createuser) {
                $createdUser = $user->getUser($data['email']);
                $user->categorizeUser($createdUser->user_ID, 'Basic');
                redirect('login.php', 'Successful signup, login to use account', 'success');
            } else {
                redirect('signup.php', 'Its not you its us. Please retry!', 'error');
            }
        }

        // For employer signup
        elseif ($input_usertype == 'employer') {
            $createemployer = $user->createEmployer($data);
            if ($createemployer) {
                $createdEmployer = $user->getEmployer($data['email']);
                $user->categorizeEmployer($createdEmployer->employer_ID, 'Basic');
                redirect('login.php', 'Successful signup, login to use account', 'success');
            } else {
                redirect('signup.php', 'Its not you its us. Please retry!', 'error');
            }
        }
    }

    echo $template;
}