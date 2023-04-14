<?php 

    class Session {
        
        // Properties
        public $user_id;
        public $errors = [];

        // Methods
        public function __construct($args = []) {

            // Starts the session everytime a new Session object is built
            session_start();

            // Will set the user_id of the session if there is one
            $this->user_id = $_SESSION['user_id'] ?? null;
            
        }

        // Saves id to each session
        public function login($id) {

            // If there is any old session data from a previous login, this will create a new id for the new session
            // Prevents new users from accessing old data from previous sessions
            session_regenerate_id();

            $this->user_id = $id;
            $_SESSION['user_id'] = $this->user_id;

            return true;

        }

        // Return the current user_id
        public function get_user_id() {

            return $this->user_id;

        }

        // Logout and remove all the info from the session
        public function logout() {

            session_destroy();

            return true;

        }

        // Return user to login page if they aren't logged in (if user_id is null)
        public function is_logged_in() {

            if(is_null($this->get_user_id())) {
                // redirect('/');
            } else {
                return true;
            }

        }

        // Allow error messages to be displayed across multiples pages
        public function set_errors($errors_arr) {

            // Stores the error messages in an array
            $this->errors = $errors_arr;

            // Store errors array in a $_SESSION variable
            $_SESSION['errors'] = $this->errors;

        }

        // Retrieves and displays error messages in HTML
        public function get_errors_html() {

            if($this->errors) {

                $html = "<ul class='mb-8 bg-pink py-2 px-4 rounded shadow'>";

                    foreach($this->errors as $error) {
                        $html .= "<li class='text-white'>{$error}</li>";
                    }

                $html .= "</ul>";

                return $html;

            }

            return "";
            
        }

    }

?>