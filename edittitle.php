<?php
    require('connection.php');
    require('header.php');

    if (isset($_GET['id'])) {
        $results = $db->getJobsById($_GET['id']);
    }
?>
    <div class="row my-5">
        <div class="col-4 mx-auto">
            <div class="form-group">
                <form action="" method="POST">
                    <label for="pTitle">Title</label>
                    <input type="text" class="form-control" name="pTitle" value="<?php if (isset($results[0]['job_title'])) echo $results[0]['job_title']; ?>" />
                    <label for="pFull">Full Name</label>
                    <input type="text" class="form-control" name="pFull" value="<?php if (isset($results[0]['f_name'])) echo $results[0]['f_name']; ?>" />
                    <label for="pCompany">Company</label>
                    <input type="text" class="form-control" name="pCompany" value="<?php if (isset($results[0]['company'])) echo $results[0]['company']; ?>" />
                    <label for="pPrice">Price $</label>
                    <input type="text" class="form-control" name="pPrice" value="<?php if (isset($results[0]['job_price'])) echo $results[0]['job_price']; ?>" />
                    <label for="pDesc">Job Description</label>
                    <textarea name="pDesc" class="form-control"><?php if(isset($results[0]['job_descr'])) echo $results[0]['job_descr']; ?></textarea>
                </form>
            </div><!--end of form-group-->
        </div><!--end of col-->
    </div><!--end of row-->

<?php 
    require('footer.php');
?>
