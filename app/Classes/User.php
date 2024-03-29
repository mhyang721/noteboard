<?php 

    class User {
    
        // Database Property
        static protected $db;

        // Active Record Design Pattern
        public $id;
        public $name;
        public $email;
        protected $password;
        protected $retype_password;

        // Set errors var
        public $errors;

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
            $this->retype_password = $args['retype_password'] ?? NULL;

        }

        // Create
        public function create() {

            // If this is not valid, don't run the following password hashing
            if(!$this->validate()) {return false;}

            // Create an encrypted password based on a hashing algorithm that only goes one way
            // PASSWORD_DEFAULT is bcrypt
            $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

            // ? = values to be replaced
            $sql = "INSERT INTO users (email, name, password) VALUES (?, ?, ?)";

            // Prepare the sql statement above to be executed (have the ? replaced)
            $stmt = self::$db->prepare($sql);

            // Built-in php function to prevent SQL injections
            // Specify data types and variables of the ? above
            $stmt->bind_param('sss', $this->email, $this->name, $hashed_password);

            // Run the statement
            $result = $stmt->execute();

            // Send back the above
            return $result;

        }

        // Read: Search the db for a user by email
        static public function find_user_by_email($email) {

            $sql = "SELECT * FROM users WHERE email=?";

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

        // Validate if email and password are filled in
        public function validate() {

            // Return error message if email is blank
            if(is_blank($this->email)) {
                $this->errors[] = "Email cannot be blank";
            }

            // Return error message if password is blank
            if(is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank";
            }

            // Return error message if password is not equal to re-typed password
            if($this->password != $this->retype_password) {
                $this->errors[] = "Passwords must match";
            }
            // dd($this->password . $this->password);

            // If there are no errors, errors property will be empty
            return empty($this->errors);

        }
        
    }
