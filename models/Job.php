<?php

class Job {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllJobs() {
        $this->db->query("SELECT job_listing.*, job_category.category_name AS c_name 
                            FROM job_listing 
                            INNER JOIN job_category
                            ON job_listing.category_id = job_category.category_id
                            ORDER BY job_listing.post_date DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getCategories() {
        $this->db->query("SELECT * FROM job_category");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getByCategory($category) {
        $this->db->query("SELECT job_listing.*, job_category.category_name AS c_name 
                            FROM job_listing 
                                INNER JOIN job_category
                                ON job_listing.category_id = job_category.category_id
                            WHERE job_listing.category_id = $category
                            ORDER BY job_listing.post_date DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getCategory($category_id) {
        $this->db->query("SELECT * FROM job_category WHERE category_id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $result = $this->db->single();

        return $result;
    }

    public function getJob($id) {
        $this->db->query("SELECT * FROM job_listing WHERE job_ID = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();

        return $result;
    }

    public function getJobByTitleCompany($title, $company) {
        $this->db->query("
            SELECT * FROM job_listing WHERE job_title = :job_title AND company = :company
        ");
        $this->db->bind(':job_title', $title);
        $this->db->bind(':company', $company);
        $result = $this->db->single();

        return $result;
    }

    public function getJobsByEmployer($empid) {
        $this->db->query("
            SELECT * FROM job_listing 
            JOIN posts ON job_listing.job_ID = posts.job_ID
            WHERE posts.employer_ID = :empid;
        ");
        $this->db->bind(':empid', $empid);
        $result = $this->db->resultSet();

        return $result;
    }

    public function create($data) {
        // Query
        $this->db->query("
            INSERT INTO job_listing (job_title, job_description, no_of_vacancies, post_date, salary, status, category_id, company) VALUES (:job_title, :job_description, :no_of_vacancies, CURDATE(), :salary, 'hiring', :category_id, :company)
        ");
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':job_description', $data['job_description']);
        $this->db->bind(':no_of_vacancies', $data['no_of_vacancies']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':category_id', $data['category_id']);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Job posted by Employer
    public function addPosts($jodid, $empid) {
        // Query
        $this->db->query("
            INSERT INTO posts (job_ID, employer_ID)
            VALUES (:job_ID, :employer_ID)
        ");
        $this->db->bind(':job_ID', $jodid);
        $this->db->bind(':employer_ID', $empid);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Check application status (offers table)
    public function getOfferByUserJobId($userid, $jobid) {
        $this->db->query("
            SELECT * FROM offers
            WHERE user_ID = :userid
            AND job_ID = :jobid
        ");
        $this->db->bind(':userid', $userid);
        $this->db->bind(':jobid', $jobid);
        $result = $this->db->single();

        return $result;
    }

    // List of applicants per job
    public function getApplicantsByJobId($jobid) {
        $this->db->query("
            SELECT * FROM application
            INNER JOIN user ON application.user_ID = user.user_ID
            WHERE job_ID = :jobid
        ");
        $this->db->bind(':jobid', $jobid);
        $result = $this->db->resultSet();

        return $result;
    }

    // Offer job to applicant
    public function createJobOfferToUser($jobid, $userid, $salary) {
        $this->db->query("
            INSERT INTO job_offer (job_ID, salary)
            VALUES (:jobid, :salary)
        ");
        $this->db->bind(':jobid', $jobid);
        $this->db->bind(':salary', $salary);
        $joboffer = $this->db->execute();

        $this->db->query("
            INSERT INTO offers (job_ID, user_ID)
            VALUES (:jobid, :userid)
        ");
        $this->db->bind(':jobid', $jobid);
        $this->db->bind(':userid', $userid);
        $useroffer = $this->db->execute();
        
        // Return true/false depending on whether job was created
        if ($joboffer && $useroffer) {
            return true;
        } else {
            return false;
        }
    }

    // Delete job listing
    public function deleteJobListing($jobid) {
        $this->db->query("
            DELETE from job_listing
            WHERE job_ID = :jobid
        ");
        $this->db->bind(':jobid', $jobid);
        $delete = $this->db->execute();
        
        // Return true/false depending on whether job was created
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    // Delete/ withdraw application
    public function deleteApplication($jobid, $userid) {
        $this->db->query("
            DELETE from application
            WHERE job_ID = :jobid
            AND user_ID = :userid
        ");
        $this->db->bind(':jobid', $jobid);
        $this->db->bind(':userid', $userid);
        $result = $this->db->execute();
        
        // Return true/false depending on whether job was created
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}