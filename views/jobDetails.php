<?php include 'includes/header.php'; ?>

    <h2 class="page-header">
        <?php echo $job->title; ?> 
    </h2>
    <small>Posted by <?php echo $job->company; ?> on <?php echo $job->createdAt; ?></small>
    <hr>

    <ul class="list-group">
            <li class="list-group-item">
                <strong>Company:</strong>
                <?php echo $job->company; ?>
            </li>
            <li class="list-group-item">
                <strong>Salary:</strong>
            </li>
            <li class="list-group-item">
                <strong>Location:</strong>
            </li>
            <li class="list-group-item">
                <strong>Description</strong>
                <p>
                    <?php echo $job->description; ?>
                </p>
            </li>        
    </ul>
    <hr>
    <a href="index.php">&lt&lt Back to listing</a>
    <hr>

<?php include 'includes/footer.php'; ?>