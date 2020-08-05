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
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="login" name="login">
        </form>
        <hr>
        <p>---------------------------------------------------------------------</p>
        <p>Don't have an account? Sign up now:</p>
        <a class="btn btn-success" href="signup.php" role="button">Signup</a>
    </div>

<?php include 'includes/footer.php'; ?>