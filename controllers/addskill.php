<?php include_once 'config/init.php'; ?>

<?php
// User model
$user = new User;

// Receive the data from the form
if (isset($_POST['addskill'])) {
    // Extract data from form
    $skill = $_POST['skill'];
    // Find current user
    $active_user_id = $_SESSION['loggedInUserId'];

    // Add skill
    $success = $user->addSkill($active_user_id, $skill);
    if ($success) {
        redirect('myAccount.php', 'Skill added', 'success');
    } else {
        redirect('myAccount.php', 'Failed to add skill', 'error');
    }
}