<?php
    require('connection.php');

   if (isset($_POST['fName'])) {
        $message = '';
        if (strlen($_POST['fName']) > 2) {
            $f_name = htmlentities($_POST['fName']);
        } else {
            $message .= "Enter a valid name\n";
        }
        if (strlen($_POST['company']) > 0) {
            $company = htmlentities($_POST['company']);
        } else {
            $message .= "Enter a company name\n";
        }
        if (strlen($_POST['telephone']) > 9) {
            $tele = htmlentities($_POST['telephone']);
        } else {
            $message .= "Enter a valid telephone number";
        }

        if ($f_name && $company && $tele) {
            $db->addContacts($f_name, $company, $tele);
            header('Location: index.php');
        } else {
            echo $message;
        }
    }
?>