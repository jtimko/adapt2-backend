<?php
  require('connection.php');
  require('header.php');
 ?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
          <div id="newJobs">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#newJobsModal">
              Add New Job
            </button><!--end of button-->
            <button type="button" class="btn btn-secondary my-2" data-toggle="modal" data-target="#newContactModal">
              Add New Contact
            </button><!--end of button-->
          </div><!--end of newJobs-->

          <!-- modal of new jobs -->

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
                  <form action="addjobs.php" method="POST">
                    <div class="form-group">
                      <label for="selectContact">Select Contact</label>
                      <select class="form-control" name="selectContact">
                        <option id="0">None</option>
                        <?php 
                          $contacts = $db->listContacts();
                            foreach($contacts as $c) {
                              echo "<option value='" . $c['contact_id'] . "'>" . $c['f_name'] . "</option>";
                            }
                        ?>
                      </select><!--end of select-->

                      <label for="jobTitle">Job Title</label>
                      <input type="text" class="form-control" name="jobTitle" placeholder="Facebook.com for Mark Zuckerberg" />

                      <label for="jobDesc">Job Description</label>
                      <textarea class="form-control" name="jobDesc" placeholder="Tell me about this job.."></textarea>
                      
                      <label for="selectCat">Select Category</label>
                      <select class="form-control" name="selectCat">
                        <?php 
                            $cat = $db->listCategories();
                              foreach($cat as $c) {
                                echo "<option value='" . $c['category_id'] . "'>" . $c['cat_name'] . "</option>";
                              }
                          ?>
                      </select>

                      <label for="jobPrice">Price</label>
                      <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" class="form-control" name="jobPrice" placeholder="How much..">
                      </div><!--end of input-group-->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                      </div><!--end of modal-footer-->
                    </div><!--end of form-group-->
                  </form><!--end of form-->
                </div><!--end of modal-body-->
              </div><!-- end of modal-content-->
            </div><!--end of modal-dialog-->
          </div><!--end of modal-->

          <!-- Modal for new contacts -->
          <div class="modal fade" id="newContactModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">New Contacts</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button><!--end of button-->
                </div><!--end of modal-header -->
                <div class="modal-body">
                  <form action="addcontacts.php" method="POST">
                    <div class="form-group">
                      <label for="fName">Full Name</label>
                      <input type="text" class="form-control" name="fName" placeholder="John Smith" />

                      <label for="company">Company</label>
                      <input type="text" class="form-control" name="company" placeholder="Adapt2 Inc.," />
                    
                      <label for="telephone">Telephone</label>
                      <input type="text" class="form-control" name="telephone" placeholder="7074444444" />

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save Changes</button>
                      </div><!--end of modal-footer-->
                    </div><!--end of form-group-->
                  </form><!--end of form-->
                </div><!--end of modal-body-->

              </div><!-- end of modal-content-->
            </div><!--end of modal-dialog-->
          </div><!--end of modal-->

          <!--main part of site-->
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Job Title</td>
                <td>Name</td>
                <td>Category</td>
                <td>Started</td>
              </tr>
            </thead><!--end of thead-->
            <tbody>
              <?php
                $posts = $db->latestJobs();

                foreach($posts as $p) {
                  echo "<tr>";
                  echo "<td><a href='title.php?id=" . $p['jobs_id'] . "'>" . $p['job_title'] . "</a></td>";
                  echo "<td><a href='person.php?id=" . $p['contact_id'] . "'>" . $p['f_name'] . "</a></td>";
                  echo "<td>" . $p['cat_name'] . "</td>";
                  echo "<td>" . $p['job_created'] . "</td>";
                  echo "</tr>";
                }
            ?>
            </tbody>
          </table><!--end of table-->
        </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php');
