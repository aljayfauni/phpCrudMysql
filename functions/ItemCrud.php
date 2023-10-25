<?php
include "./interfaces/CRUDInterface.php";

class ItemCRUD implements CRUDInterface {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $password,$email) {
        try {
            $sql = "INSERT INTO users (username, password,email) VALUES (?, ?,?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $username,$password, $email);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception (e.g., log the error, display a user-friendly message)
            return false;
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM users";
            $result = $this->db->query($sql);

            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }

            return $users;
        } catch (Exception $e) {
            // Handle the exception
            return [];
        }
    }

    public function update($id, $username,$password,$email) {
        try {
            $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sssi", $username, $password,$email, $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Handle the exception
            return false;
        }
    }
}
?>
