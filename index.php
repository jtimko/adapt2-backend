<!DOCTYPE html>

<?php
  require('connection.php');
  require('header.php');
 ?>
    <div class="row">
        <div class="col-8 mx-auto">
          <div id="newJobs">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#newJobsModal">
              Add New Job
            </button><!--end of button-->
          </div><!--end of newJobs-->
          <div class="modal fade" id="newJobsModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">New Jobs</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button><!--end of button-->
                </div><!--end of modal-header -->
                <div class="modal-body">
                <button class="btn btn-success my-2" id="showContact">
                Add New Contact
            </button><!--end of id#showContact-->
            <form>
                <div id="newContact">
                    <label for="fName">Full Name</label>
                    <input type="text" class="form-control" id="fName" placeholder="John Smith" />
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" placeholder="Adapt2 Inc.," />
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" placeholder="7074444444" />
                </div><!--end of id#newContact-->
            
                <div class="form-group">
                    <label for="emailInput">Email Address</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="name@example.com" />
                </div>
            </form>
                </div><!--end of modal-body-->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save Changes</button>
                </div><!--end of modal-footer-->
              </div><!-- end of modal-content-->
            </div><!--end of modal-dialog-->
          </div><!--end of modal-->
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
    </div><!--end of row-->
<?php require('footer.php');
