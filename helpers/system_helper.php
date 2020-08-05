<?php
function redirect($page = false, $message = null, $message_type = null) {
    if (is_string($page)) {
        $location = $page;
    } else {
        // redirect to current path
        $location = $_SERVER['SCRIPT_NAME'];
    }

    // Set messages in global $_SESSION obj
    if ($message != null) {
        $_SESSION['message'] = $message;
    }

    // Set msg type in global obj
    if ($message != null) {
        $_SESSION['message_type'] = $message_type;
    }

    // Redirect to $location
    header ('Location: ' . $location);
    exit;
}

function displayMessage() {
    if(!empty($_SESSION['message'])) {
        // Extract msg from session
        $message = $_SESSION['message'];

        // Extract msgt type
        if (!empty($_SESSION['message_type'])) {
            $message_type = $_SESSION['message_type'];

            // Display msgs
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success">' . $message . '</div>';
            }
        }

        // Clear the msg from session
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}