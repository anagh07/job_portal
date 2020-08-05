<?php

class Job {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllJobs() {
        $this->db->query("SELECT jobs.*, categories.name AS c_name 
                            FROM jobs 
                            INNER JOIN categories
                            ON jobs.category_id = categories.id
                            ORDER BY jobs.createdAt DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getCategories() {
        $this->db->query("SELECT * FROM categories");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getByCategory($category) {
        $this->db->query("SELECT jobs.*, categories.name AS c_name 
                            FROM jobs 
                                INNER JOIN categories
                                ON jobs.category_id = categories.id
                            WHERE jobs.category_id = $category
                            ORDER BY jobs.createdAt DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getCategory($category_id) {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);
        $result = $this->db->single();

        return $result;
    }

    public function getJob($id) {
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        $result = $this->db->single();

        return $result;
    }

    public function create($data) {
        // Query
        $this->db->query("
            INSERT INTO jobs (title, description, company, category_id) VALUES (:title, :description, :company, :category_id)
        ");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':category_id', $data['category']);

        // Return true/false depending on whether job was created
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}