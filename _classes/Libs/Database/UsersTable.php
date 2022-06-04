<?php
    namespace Libs\Database;
    use PDOException;

    class UsersTable
    {
        private $db = null;
        public function __construct(MySQL $db) {
            $this->db = $db->connect();
        }

        public function insert($data){
            try {
                $query = "
                INSERT INTO users (
                name, email, phone, address,
                password, role_id, created_at
                ) VALUES (
                :name, :email, :phone, :address,
                :password, :role_id, NOW()
                )
                ";
                $statement = $this->db->prepare($query);
                $statement->execute($data);
                return $this->db->lastInsertId();

            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        
        public function suspended($id) {
            $result = $this->db->query("SELECT suspended FROM users WHERE id = $id");
            $row = $result->fetch();

            return $row->suspended;
        }

        public function delete($id){
            $result = $this->db->query("DELETE FROM users WHERE id = $id");
            return $result;
        }
        // public function findByEmailAndPassword($email, $password){
        //     $statement = $this->db->prepare("SELECT * FROM users WHERE
        //     email=:email AND password =:password");
        //     $statement->execute(
        //         [":email" => $email, ":password" => $password]);

        //     return $statement->fetch() ?? false;
        // }

        public function findByEmailAndPassword($email, $password)
        {
            $result = $this->db->query("SELECT * FROM users WHERE email='$email'");
            $user = $result->fetch();

            if(!$user) {
                return false;
            }

            if(password_verify($password, $user->password)) {
                return $user;
            }else {
                return false;
            }

            // $statement = $this->db->prepare("
            // SELECT users.*, roles.name AS role, roles.value
            // FROM users LEFT JOIN roles
            // ON users.role_id = roles.id
            // WHERE users.email = :email 
            // AND users.password = :password
            // ");

            // $statement->execute([
            // ':email' => $email,
            // ':password' => $password 
            // ]);

            // $row = $statement->fetch();
            // return $row ?? false;
        }

        public function getAll() {
            $statement = $this->db->query("
            SELECT users.*, roles.name AS role, roles.value
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id
            ");
            return $statement->fetchAll();
        }
    }