<?php include_once 'config/init.php'; ?>

<?php
$user = new User;

// If employer
if ($_SESSION['loggedInUserType'] == 'employer') {
    $template = new Template('views/myEmployerAccount.php');
    
    // Session data
    if (!empty($_SESSION['isLoggedIn'])) {
        $template->isLoggedIn = $_SESSION['isLoggedIn'];
    } else {
        $template->isLoggedIn = false;
    }

    // Render data
    // Render data
    $account_emp = $user->getEmployer($_SESSION['loggedInUserEmail']);
    $template->employer = $account_emp;
    $template->emp_category = $user->getEmployerCategory($account_emp->employer_ID)->emp_category;

    echo $template;
}
// If normal user
else {
    $template = new Template('views/myUserAccount.php');
    
    // Session data
    if (!empty($_SESSION['isLoggedIn'])) {
        $template->isLoggedIn = $_SESSION['isLoggedIn'];
    } else {
        $template->isLoggedIn = false;
    }

    // Render data
    $account_user = $user->getUser($_SESSION['loggedInUserEmail']);
    $template->user = $account_user;
    $template->user_category = $user->getUserCategory($account_user->user_ID)->user_category;

    echo $template;
}