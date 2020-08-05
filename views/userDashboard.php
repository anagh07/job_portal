<?php include 'includes/header.php'; ?>
        <div class="jumbotron">
            <h1 class="display-4">Find a job</h1>
            <form action="userDashboard.php" method="GET">
                <select name="category" class="form-control">
                    <option value="0">- choose category</option>
                    <option value="0">all categories</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" value="FIND">
            </form>
        </div>

        <h4><?php echo $title ?></h4>
        <?php foreach($jobs as $job): ?>
        <div class="row marketing">
            <div class="col-md-10">
                <h4><?php echo $job->title; ?></h4>
                <p><?php echo $job->description; ?></p>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="jobDetails.php?id=<?php echo $job->id; ?>">View</a>
            </div>
        </div>
        <?php endforeach; ?>

<?php include 'includes/footer.php'; ?>