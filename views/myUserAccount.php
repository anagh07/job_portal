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
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                </tr>
            </tbody>
            </table> 
        </div>
            
        <p class="lead">
            <form action="index.php?controller=addskill" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter skill" id="addskill">
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
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small>3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Donec id elit non mi porta.</small>
                <a class="btn btn-link" href="#" type="button">Withdraw Application</a>
            </a>
            <hr>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-muted">3 days ago</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>