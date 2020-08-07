<?php include 'includes/header.php'; ?>

    <!-- Profile -->
    <div class="jumbotron">
        <h3 class="display-5">My Account</h3>
        
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                First Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->first_name ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Last Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->last_name ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Email:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->email ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Address:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->country ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Phone:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user->phone ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                User category:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_category ?>
            </li>
        </ul>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="editProfile.php" role="button">Edit profile</a>
            <a class="btn btn-success btn-lg" href="#" role="button">Upgrade category</a>
            <a class="btn btn-danger btn-lg" href="#" type="button">Delete Account</a>
        </p>
    </div>

    <!-- Skills -->
    <div class="jumbotron">
        <h3>Skills</h3>
        <div class="d-inline-flex p-2">
            <table class="table table-hover">
            <tbody>
                <tr class="table-active">
                    <?php foreach($skills as $skill): ?>
                        <td><?php echo $skill->skill ?></td>
                    <?php endforeach ?>
                </tr>
            </tbody>
            </table> 
        </div>
            
        <p class="lead">
            <form action="index.php?controller=addskill" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter skill" name="skill" id="skill">
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Add skill" name="addskill">
                </div>
            </form>
        </p>
    </div>

    <!-- My Applications -->
    <div class="jumbotron">
        <h3>My applications</h3>
        
        <div class="list-group">
            <?php foreach($applications as $application): ?>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $application->job_title ?></h5>
                    <small>applied on <?php echo $application->application_date ?></small>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                    <p class="mb-1">Company: <?php echo $application->company ?></p>
                    </div>
                    <a class="btn btn-outline-info btn-sm mb-1" href="jobDetails.php?id=<?php echo $application->job_ID ?>" type="button">Check Status</a>
                    <a class="btn btn-outline-warning btn-sm" href="#" type="button">Withdraw Application</a>
                </a>
                <hr>
            <?php endforeach ?>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>