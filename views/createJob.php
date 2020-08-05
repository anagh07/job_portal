<?php include 'includes/header.php'; ?>

    <h3 class="page-header">Create a job listing</h3>
    <form action="createJob.php" method="post">
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" name="company" id="company" class="form-control">
        </div>
        <div class="form-group">
            <label for="company">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
        <label for="category">Category</label>
            <select name="category" class="form-control">
                <option value="0">- choose category</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="company">Salary</label>
            <input type="text" name="salary" id="salary" class="form-control">
        </div>
        <div class="form-group">
            <label for="company">Vacancies</label>
            <input type="text" name="vacancies" id="vacancies" class="form-control">
        </div>
        <div class="form-group">
            <label for="company">Description</label>
            <textarea id="description" class="form-control" rows="3" name="description"></textarea>
        </div>
        <hr>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        <hr>
    </form>

<?php include 'includes/footer.php'; ?>