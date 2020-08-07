<?php include 'includes/header.php'; ?>

    <div class="jumbotron">
        <p>Offering job to:</p>
        <h5><?php echo $user->first_name ?> <?php echo $user->last_name ?></h5>
        <form action="jobOfferForm.php" method="post">
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" class="form-control">
            </div>
            <input type="hidden" name="jobid" id="jobid" value="<?php echo $jobid ?>" class="form-control">
            <input type="hidden" name="userid" id="userid" value="<?php echo $userid ?>" class="form-control">
            <input type="submit" class="btn btn-primary" value="submit" name="confirmSalary">
        </form>
    </div>

<?php include 'includes/footer.php'; ?>