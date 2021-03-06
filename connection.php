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
      $sql = "SELECT contacts.f_name, contacts.contact_id, jobs.jobs_id, jobs.job_title, categories.cat_name, jobs.job_created, jobs.job_cat
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

    // This helps list all the categories available.
    public function listCategories() {
      $sql = "SELECT * FROM categories";
      $stmt = $this->dbc->prepare($sql);
      $stmt->execute();

      $results = $stmt->fetchAll();

      return $results;
    }

    // This function is for title.php. It grabs all the data for a specific job
    public function getJobsById($id) {
      $stmt = $this->dbc->prepare("SELECT jobs.job_title, jobs.job_descr, jobs.job_price, jobs.job_created, 
                                          contacts.f_name, contacts.company, categories.cat_name
                                    FROM ((jobs 
                                          INNER JOIN categories ON categories.category_id = jobs.job_cat)
                                          INNER JOIN contacts on contacts.contact_id = jobs.contact_id)
                                    WHERE jobs.jobs_id = :id");
      $stmt->execute(array(":id" => $id));

      $results = $stmt->fetchAll();

      return $results;
    }

    // this is for person.php to grab all the contact information for a specific contact
    public function getPersonById($id) {
      $stmt = $this->dbc->prepare("SELECT * FROM contacts WHERE contact_id = :id");
      $stmt->execute(array(":id" => $id));
      
      $results = $stmt->fetchAll();

      return $results;
    }

    // this function is also for person.php but helps grab all the jobs done for a specific contact
    public function getJobsListById($id) {
      $stmt = $this->dbc->prepare("SELECT jobs_id, job_title FROM jobs WHERE contact_id = :id");
      $stmt->execute(array(":id" => $id));

      $results = $stmt->fetchAll();

      return $results;
    }

    public function getJobsByCategory($id) {
      $stmt = $this->dbc->prepare("SELECT jobs.jobs_id, jobs.job_title, categories.cat_name
                      FROM jobs INNER JOIN categories ON jobs.job_cat = categories.category_id
                      AND categories.category_id = :id");
      $stmt->execute(array(":id" => $id));

      $results = $stmt->fetchAll();

      return $results;
    }

    // For the modal on index.php. Adds contacts to the db once verified on addcontacts.php
    public function addContacts($fName, $company, $phone) {
      $stmt = $this->dbc->prepare("INSERT INTO contacts(f_name, company, telephone)
                                   VALUES(:f_name, :company, :phone)");
      $stmt->execute(array(":f_name" => $fName, ":company" => $company, ":phone" => $phone));                            
    }

    // For the modal on index.php. Adds jobs to the db once verified on addjobs.php
    public function addJobs($s_id, $jobTitle, $jobDesc, $c_id, $jobPrice) {
      $stmt = $this->dbc->prepare("INSERT INTO jobs(job_title, job_descr, contact_id, job_cat, job_created, job_price)
                                   VALUES(:jobTitle, :jobDesc, :s_id, :c_id, NOW(), :jobPrice)");
      $stmt->execute(array(":jobTitle" => $jobTitle, ":jobDesc" => $jobDesc, ":s_id" => $s_id, ":c_id" => $c_id, ":jobPrice" => $jobPrice));                            
    }

    public function updateJobs($jobId, $jobTitle, $jobDesc, $jobPrice) {
      $stmt = $this->dbc->prepare("UPDATE jobs SET job_title = :jobTitle, job_descr = :jobDesc, job_price = :jobPrice 
                                    WHERE jobs_id = :jobId");
      $stmt->execute(array(":jobTitle" => $jobTitle, ":jobDesc" => $jobDesc, ":jobPrice" => $jobPrice, ":jobId" => $jobId));
    }

  }

  $db = new Connection();

 ?>
