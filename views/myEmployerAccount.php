<?php include 'includes/header.php'; ?>

    <!-- Profile -->
    <div class="jumbotron">
        <h3 class="display-5">My Account</h3>
        
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                First Name (Company name):&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $employer->first_name ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Last Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $employer->last_name ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Email:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $employer->email ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Address:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $employer->country ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Phone:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $employer->phone ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Employer category:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $emp_category ?>
            </li>
        </ul>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="editProfile.php" role="button">Edit profile</a>
            <a class="btn btn-info btn-lg" href="#" role="button">Upgrade category</a>
            <a class="btn btn-danger btn-lg" href="#" type="button">Delete Account</a>
        </p>
    </div>

    <!-- My Listings -->
    <div class="jumbotron">
        <h3>Jobs posted by me</h3>
        <hr>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
                <a class="mb-1 btn btn-outline-info" href="#" type="button">View details and applicants</a>
                <a class="mb-5 btn btn-outline-danger" href="#" type="button">Delete Listing</a>
            </a>
            <hr>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>