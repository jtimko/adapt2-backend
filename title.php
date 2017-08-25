<?php
    require('connection.php');
    require('header.php');

    if (isset($_GET['id'])) {
        $jobId = $_GET['id'];
        $results = $db->getJobsById($_GET['id']);
    }
?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h3><?php echo $results[0]['job_title']; ?></h3>
            <h4><?php echo $results[0]['f_name']; ?> (<?php echo $results[0]['company']; ?>)</h4>
            <h5><?php echo $results[0]['cat_name']; ?></h5>
            <p><b>$<?php echo $results[0]['job_price']; ?></b></a>
            <p><?php echo nl2br($results[0]['job_descr']); ?></p>
            <p><a href="editjob.php?id=<?php echo $jobId; ?>">Edit Text</a></p>
        </div><!--end of col-->
    </div><!--end of row-->

<?php 
    require('footer.php');
?>
