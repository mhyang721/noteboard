<?php 

    class Session {
        
        // Properties
        public $user_id;

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

            if(is_null( $this->get_user_id() )) {
                redirect('/users/login.php');
            } else {
                return true;
            }

        }

    }

?>