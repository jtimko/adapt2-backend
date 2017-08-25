<?php
    require('connection.php');
    require('header.php');

    if (isset($_GET['id'])) {
        $jobId = $_GET['id'];
        $results = $db->getJobsById($_GET['id']);
    }
?>
    <div class="row my-5">
        <div class="col-4 mx-auto">
            <div class="form-group">
                <form action="updatejob.php" method="POST">
                <label for="pFull">Full Name</label>
                    <input type="text" class="form-control" name="jobName" value="<?php if (isset($results[0]['f_name'])) echo $results[0]['f_name']; ?>" readonly />
                    <label for="jobCompany">Company</label>
                    <input type="text" class="form-control" name="jobCompany" value="<?php if (isset($results[0]['company'])) echo $results[0]['company']; ?>" readonly />
                    <label for="jobTitle">Title</label>
                    <input type="text" class="form-control" name="jobTitle" value="<?php if (isset($results[0]['job_title'])) echo $results[0]['job_title']; ?>" />
                    <label for="jobPrice">Price $</label>
                    <input type="text" class="form-control" name="jobPrice" value="<?php if (isset($results[0]['job_price'])) echo $results[0]['job_price']; ?>" />
                    <label for="jobDesc">Job Description</label>
                    <textarea name="jobDesc" class="form-control"><?php if(isset($results[0]['job_descr'])) echo $results[0]['job_descr']; ?></textarea>
                    <button type="submit" class="btn btn-primary my-3" value="submit" name="submit">Update</button>
                    <input type="hidden" name="jobId" value="<?php echo $jobId; ?>" readonly />
                </form>
            </div><!--end of form-group-->
        </div><!--end of col-->
    </div><!--end of row-->

<?php 
    require('footer.php');
?>
