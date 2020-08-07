<?php include_once 'config/init.php'; ?>
<?php
$job = new Job;
$user = new User;

if (!empty($_SESSION['isLoggedIn'])) {
    // Receive data from form and save
    if(isset($_POST['update'])) {
        $input_usertype = $_SESSION['loggedInUserType'] == 'user' ? 'user' : 'employer';
        $data['first_name'] = $_POST['fname'];
        $data['last_name'] = $_POST['lname'];
        $data['email'] = $_POST['email'];
        $data['phone'] = $_POST['phone'];
        $data['login_password'] = $_POST['password'];
        $data['id'] = $_SESSION['loggedInUserId'];
        $input_password_confirm = $_POST['confirmpassword'];

        // Check if confirm password matches
        if ($data['login_password'] != $input_password_confirm) {
            redirect('index.php', 'Password re-type mismatch, please try again.', 'error');
        }

        // For user profile
        if ($input_usertype == 'user') {
            $createuser = $user->updateUser($data);
            if ($createuser) {
                redirect('index.php', 'Successful updated profile', 'success');
            } else {
                redirect('signup.php', 'Its not you its us. Please retry!', 'error');
            }
        }

        // For employer profile
        elseif ($input_usertype == 'employer') {
            $createemp = $user->updateEmployer($data);
            if ($createemp) {
                redirect('index.php', 'Successful updated profile', 'success');
            } else {
                redirect('signup.php', 'Its not you its us. Please retry!', 'error');
            }
        }
    }

    // Render the form
    $template = new Template('views/signup.php');
    $template->user = $user->getUserById($_SESSION['loggedInUserId']);
    $template->editMode = true;

    // Session data
    if (!empty($_SESSION['isLoggedIn'])) {
        $template->isLoggedIn = $_SESSION['isLoggedIn'];
    } else {
        $template->isLoggedIn = false;
    }

    echo $template;
} else {
    redirect('login.php', 'Please login to your account first', 'error');    
}