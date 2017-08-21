<?php
  require_once('config.php');

  class Connection {

    public function __construct() {
      // try to connect to the database;
      try {
        $this->dbc = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASS, array(PDO::ATTR_PERSISTENT=>true));
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    // Generate the data to display on the backend home page. Grabs current jobs and displays them in the table.
    public function latestJobs() {
      $sql = "SELECT contacts.f_name, contacts.company, categories.cat_name, jobs.job_created
              FROM ((jobs
                INNER JOIN categories ON jobs.job_cat = categories.category_id)
                INNER JOIN contacts ON jobs.contact_id = contacts.contact_id);";
      $stmt = $this->dbc->prepare($sql);
      $stmt->execute();

      $results = $stmt->fetchAll();

      return $results;
    }

    // For contacts.php. Grab the contacts in the database and display.
    public function listContacts() {
      $sql = "SELECT * FROM contacts ORDER BY f_name ASC";
      $stmt = $this->dbc->prepare($sql);
      $stmt->execute();

      $results = $stmt->fetchAll();

      return $results;
    }


  }

  $db = new Connection();

 ?>
