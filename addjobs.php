<?php
    require('connection.php');

   /****************************************
        Just typical proof checking input data
        to avoid mistakes or hacking attempts
    ***************************************/

   if (isset($_POST['submit'])) {
        $message = '';
        if (isset($_POST['selectContact'])) {
            $s_id = (int)htmlentities($_POST['selectContact']);
        } else {
            $s_id = false;
            $message .= "Choose a contact<br />";
        }
        if (strlen($_POST['jobTitle']) > 0) {
            $jobTitle = htmlentities($_POST['jobTitle']);
        } else {
            $jobTitle = false;
            $message .= "Enter a name for the job<br />";
        }
        if (strlen($_POST['jobDesc']) > 5) {
            $jobDesc = htmlentities($_POST['jobDesc']);
        } else {
            $jobDesc = false;
            $message .= "Enter a job description<br />";
        }
        if (isset($_POST['selectCat'])) {
            $jobCat = (int)htmlentities($_POST['selectCat']);
        } else {
            $jobCat = false;
            $message .= "Choose a job category<br />";
        }
        if (strlen($_POST['jobPrice']) > 2) {
            $jobPrice = htmlentities($_POST['jobPrice']);
            $jobPrice = floatval($jobPrice);
        } else {
            $jobPrice = false;
            $message .= "Enter a job description<br />";
        }

        if ($s_id && $jobTitle && $jobDesc && $jobCat && $jobPrice) {
            $db->addjobs($s_id, $jobTitle, $jobDesc, $jobCat, $jobPrice); // adds the data to the db
            header('Location: index.php'); // Returns back to admin index 
        } else {
            echo $message;
        }
    }
?>