<?php
    require('connection.php');
    require('header.php');

    if(isset($_GET['id'])) {
       $results = $db->getJobsByCategory($_GET['id']);
    }
?>
    <div class="row">
      <div class="col-8 mx-auto my-5">
        <h1><?php echo $results[0]['cat_name']; ?></h1>
        <ul class='my-3'>
            <?php 
                foreach($results as $r) {
                    echo "<li><a href='title.php?id=" . $r['jobs_id'] . "'>" . $r['job_title'] . "</a></li>"; 
                }
                
            ?>
        </ul>
      </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php'); ?>