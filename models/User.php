<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUser($email) {
        $this->db->query("SELECT email, password FROM users WHERE email = :u_email");
        $this->db->bind(':u_email', $email);
        $result = $this->db->single();

        return $result;
    }

    public function getEmployer($email) {
        $this->db->query("SELECT email, password FROM employers WHERE email = :e_email");
        $this->db->bind(':e_email', $email);
        $result = $this->db->single();

        return $result;
    }

}