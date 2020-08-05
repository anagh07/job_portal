<?php include 'includes/header.php'; ?>

    <div class="jumbotron">
        <form action="login.php" method="post" class="login-form">
            <label for="usertype">Choose user type</label>
            <select name="usertype" class="form-control">
                <option value="user">User</option>
                <option value="employer">Employer</option>
            </select>
            <hr>
            <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" name="fname" id="fname" class="form-control">
            </div>
            <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" name="lname" id="lname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" value="Signup">
        </form>
        <hr>
        <p>---------------------------------------------------------------------</p>
        <p>Have an account already? Login now:</p>
        <a class="btn btn-success" href="login.php" role="button">Login</a>
    </div>

<?php include 'includes/footer.php'; ?>