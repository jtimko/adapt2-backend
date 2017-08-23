<?php
    require('connection.php');
    require('header.php');

    if (isset($_GET['id'])) {
        $results = $db->getPersonById($_GET['id']);

        // split the phone string to proper format.
        // 7074444444 -> 707-444-4444
        preg_match("/(\d{3})(\d{3})(\d{4})/",$results[0]['telephone'],$phone);
    }
?>
    <div class="row my-5">
        <div class="col-4 mx-auto">
            <h3><?php echo $results[0]['f_name']; ?></h3>
            <h4><?php echo $results[0]['company']; ?> (<?php echo $results[0]['company']; ?>)</h4>
            <h5><?php echo "$phone[1]-$phone[2]-$phone[3]"; ?></h5>
        </div><!--end of col-->
        <div class="col-4 mx-auto">
            <h3>List of jobs</h3>
            <ul>  
                <?php
                    $people = $db->getJobsListById($results[0]['contact_id']);
                    foreach($people as $p) {
                        echo "<li><a href='title.php?id=" . $p['jobs_id'] . "'>" . $p['job_title'] . "</a></li>";
                    }
                ?>
            </ul>
        </div><!--end of col-->
    </div><!--end of row-->

<?php 
    require('footer.php');
?>
