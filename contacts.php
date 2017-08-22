<?php
    require('connection.php');
    require('header.php');
?>
    <div class="row">
      <div class="col-8 mx-auto">
        <table class="table table-hover">
          <thead>
            <tr>
              <td>Name</td>
              <td>Company</td>
              <td>Category</td>
            </tr>
          </thead><!--end of thead-->
          <tbody>
            <?php
              $posts = $db->listContacts();

              foreach($posts as $p) {
                echo "<tr>";
                echo "<td>" . $p['f_name'] . "</td>";
                echo "<td>" . $p['company'] . "</td>";
                echo "<td>" . $p['telephone'] . "</td>";
                echo "</tr>";
              }
           ?>
          </tbody>
        </table><!--end of table-->
      </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php'); ?>