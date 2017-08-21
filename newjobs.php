<!DOCTYPE html>

<?php
  require('connection.php');
  require('header.php');
 ?>
    <div class="row">
        <div class="col-8 mx-auto">
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
                    <label for="selectContact">Select Contact</label>
                    <select class="form-control" id="selectContact">
                        <?php 
                            $contacts = $db->listContacts();
                                for ($i=0; $i<2; $i++) { // needs to be fixed. switch to length or end of file.
                                    echo "<option id='" . $contacts[$i]['contact_id'] . "'>" . $contacts[$i]['f_name'] . "</option>";
                                }
                        ?>
                    </select><!--end of select-->
                </div><!--end of form-group-->
            </form>
        </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php');
