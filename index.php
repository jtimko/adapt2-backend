<!DOCTYPE html>

<?php
  require('connection.php');
  require('header.php');
 ?>
    <div class="row">
      <div>
        <div class="col-8 mx-auto">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Name</td>
                <td>Company</td>
                <td>Category</td>
                <td>Started</td>
              </tr>
            </thead><!--end of thead-->
            <tbody>
              <?php
                $posts = $db->latestJobs();


                for ($i = 0; $i < 2; $i++) {
                  echo "<tr>";
                  echo "<td>" . $posts[$i]['f_name'] . "</td>";
                  echo "<td>" . $posts[$i]['company'] . "</td>";
                  echo "<td>" . $posts[$i]['cat_name'] . "</td>";
                  echo "<td>" . $posts[$i]['job_created'] . "</td>";
                  echo "</tr>";
                }
            ?>
            </tbody>
          </table><!--end of table-->
        </div><!--end of col-->
      </div><!--end of random div-->
    </div><!--end of row-->
<?php require('footer.php');
