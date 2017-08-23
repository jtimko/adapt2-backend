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
                // split the phone string to proper format.
                // 7074444444 -> 707-444-4444
                preg_match("/(\d{3})(\d{3})(\d{4})/",$p['telephone'],$phone);

                echo "<tr>";
                echo "<td><a href='person.php?id=" . $p['contact_id'] . "'>" . $p['f_name'] . "</a></td>";
                echo "<td>" . $p['company'] . "</td>";
                echo "<td>" . $phone[1] . "-" . $phone[2] . "-" . $phone[3] . "</td>";
                echo "</tr>";
              }
           ?>
          </tbody>
        </table><!--end of table-->
      </div><!--end of col-->
    </div><!--end of row-->
<?php require('footer.php'); ?>