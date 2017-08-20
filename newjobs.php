<!DOCTYPE html>

<?php
  require('connection.php');
  require('header.php');
 ?>
    <div class="row">
        <div class="col-8 mx-auto">
            <form>
                <button class="btn btn-success my-2" id="showContact">
                    Add New Contact
                </button><!--end of id#showContact-->
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
        </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php');
