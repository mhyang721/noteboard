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
            $this->name = $args['name'] ?? NULL;
            $this->email = $args['email'] ?? NULL;
            $this->password = $args['password'] ?? NULL;

        }

        // Create
        public function create() {

            // Create an encrypted password based on a hashing algorithm that only goes one way
            // PASSWORD_DEFAULT is bcrypt
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

            // ? = values to be replaced
            $sql = "INSERT INTO Users (email, name, password) VALUES (?, ?, ?)";

            // Prepare the sql statement above to be executed (have the ? replaced)
            $stmt = self::$db->prepare($sql);

            // Built-in php function to prevent SQL injections
            // Specify data types and variables of the ? above
            $stmt->bind_param('sss', $this->email, $this->name, $hashed_password);

            // Run the statement
            $stmt->execute();

            // Get the results after statement runs
            $result = $stmt->get_result();

            // Return the results
            return $result;

        }

        // Read: Search the db for a user by email
        static public function find_user_by_email($email) {

            $sql = "SELECT * FROM Users WHERE email=?";

            $stmt = self::$db->prepare($sql);
            $stmt->bind_param('s', $email);

            $stmt->execute();

            $result = $stmt->get_result();

            return $result;

        }

        // validate_password() is a built-in php function
        // Checks if a string is equal to a hashed password
        public function validate_password($provided_password) {

            return password_verify($provided_password, $this->password);

        }
        
    }
