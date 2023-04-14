<?php 

    class User {
    
        // Database Property
        static protected $db;

        // Active Record Design Pattern
        public $id;
        public $name;
        public $email;
        protected $password;

        // Methods
        static public function set_db($db_conn) {
            self::$db = $db_conn;
        }

        // Constructor
        public function __construct($args = []) {

            // ?? = null coalescing operator
            // if $args['id'] does not exist, id of the new User instance will be null
            $this->id = $args['id'] ?? NULL;
            $this->id = $args['name'] ?? NULL;
            $this->email = $args['email'] ?? NULL;
            $this->password = $args['password'] ?? NULL;

        }

        // Create
        public function create() {

            // PASSWORD_DEFAULT is BCRYPT
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Users (email, name, password) VALUES ('{$this->email}', '{$this->name}','{$hashed_password}')";

            $result = self::$db->query($sql);

            return $result;

        }

        // Read: Search the db for a user by email
        static public function find_user_by_email($email) {

            $sql = "SELECT * FROM Users WHERE email='{$email}'";
            $result = self::$db->query($sql);

            return $result;

        }

        // validate_password() is a built-in php function
        // Checks if a string is equal to a hashed password
        public function validate_password($provided_password) {

            return password_verify($provided_password, $this->password);

        }
        
    }
