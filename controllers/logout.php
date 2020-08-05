<?php include_once 'config/init.php'; ?>

<?php
// User model
$user = new User;

unset($_SESSION['isLoggedIn']);
if (!empty($_SESSION['employerLogin'])) {
    unset($_SESSION['employerLogin']);
}

if (!empty($_SESSION['isLoggedIn'])) {
    redirect('index.php', 'Already logged in!', 'error');
} else {
    redirect('index.php', 'Logged out successfully', 'success');
}
