<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUser($email) {
        $this->db->query("SELECT * FROM user WHERE email = :u_email");
        $this->db->bind(':u_email', $email);
        $result = $this->db->single();

        return $result;
    }

    public function getEmployer($email) {
        $this->db->query("SELECT * FROM employer WHERE email = :e_email");
        $this->db->bind(':e_email', $email);
        $result = $this->db->single();

        return $result;
    }

    public function createUser($data) {
        // Query
        $this->db->query("
            INSERT INTO user (first_name, last_name, phone, email, login_password, regist_date) VALUES (:first_name, :last_name, :phone, :email, :login_password, CURDATE())
        ");
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':login_password', $data['login_password']);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function createEmployer($data) {
        // Query
        $this->db->query("
            INSERT INTO employer (first_name, last_name, phone, email, login_password, regist_date) VALUES (:first_name, :last_name, :phone, :email, :login_password, CURDATE())
        ");
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':login_password', $data['login_password']);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserCategory($user_id) {
        $this->db->query("
            SELECT user_category FROM user_categorized
            WHERE user_ID = :user_id
        ");
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->single();

        return $result;
    }

    public function getEmployerCategory($emp_id) {
        $this->db->query("
            SELECT emp_category FROM emp_categorized
            WHERE employer_ID = :employer_ID
        ");
        $this->db->bind(':employer_ID', $emp_id);
        $result = $this->db->single();

        return $result;
    }

    public function categorizeUser($userid, $category) {
        // Query
        $this->db->query("
            INSERT INTO user_categorized (user_ID, user_category) VALUES (:user_ID, :user_category)
        ");
        $this->db->bind(':user_ID', $userid);
        $this->db->bind(':user_category', $category);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function categorizeEmployer($empid, $category) {
        // Query
        $this->db->query("
            INSERT INTO emp_categorized (employer_ID, emp_category) VALUES (:employer_ID, :emp_category)
        ");
        $this->db->bind(':employer_ID', $empid);
        $this->db->bind(':emp_category', $category);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addSkill($userid, $skill) {
        // Query
        $this->db->query("
            INSERT INTO has_skills (user_ID, skill) VALUES (:user_ID, :skill)
        ");
        $this->db->bind(':user_ID', $userid);
        $this->db->bind(':skill', $skill);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSkills($user_id) {
        $this->db->query("
            SELECT * FROM has_skills
            WHERE user_ID = :user_id
        ");
        $this->db->bind(':user_id', $user_id);
        $result = $this->db->resultSet();

        return $result;
    }

    public function createApplication($jobid, $userid) {
        // Query
        $this->db->query("
            INSERT INTO application (job_ID, user_ID, application_date) VALUES (:job_ID, :user_ID, CURDATE())
        ");
        $this->db->bind(':job_ID', $jobid);
        $this->db->bind(':user_ID', $userid);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getApplicationsByUserId($userid) {
        $this->db->query("
            SELECT * FROM application
            INNER JOIN user ON application.user_ID = user.user_ID
            INNER JOIN job_listing ON application.job_ID = job_listing.job_ID
            WHERE application.user_ID = :user_ID
        ");
        $this->db->bind(':user_ID', $userid);
        $result = $this->db->resultSet();

        return $result;
    }

    public function getApplicationsByJobId($jobid) {
        $this->db->query("
            SELECT * FROM application WHERE job_ID = :job_ID
        ");
        $this->db->bind(':job_ID', $jobid);
        $result = $this->db->resultSet();

        return $result;
    }
}
