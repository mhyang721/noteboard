<?php 
 
	class Note {
 
		// Create variable $db
		// static = belonging to the Note class itself
		// protected = accessible from within the Note class and its subclasses.
		static protected $db;
 
		// the columns in our Notes table
		public $id;
		public $name;
		public $body;
		public $course_number;
		// add user_id
		public $user_id;
 
		// Since $db is protected, we add a static public method
		// so that it can be called from outside the class
		static public function set_db($db) {
			self::$db = $db;
		}

		// Returns a results object that we can loop through
		static public function find_all($user_id) {

			// Select all entries from the Notes table that belong to a particular user
			$sql = "SELECT * FROM Notes WHERE user_id = ?";

			$stmt = self::$db->prepare($sql);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result;

		}

		// Constructor is called whenever a new instance of the Note class is created
		// $args = an array of values that is passed to the constructor function
		public function __construct($args) {

			// ?? = null coalescing operator
			// id of the new Note instance will be equal to the value of $args['id'] if it exists
			// if $args['id'] does not exist, id of the new Note instance will be null
			$this->id = $args['id'] ?? NULL;
			$this->name = $args['name'] ?? NULL;
			// mysqli_escape_string is a prebuilt function that is used to modify a string value
			// It allows special characters to be interpreted as part of the string
			// so that things like apostrophes don't cause syntax errors in the SQL query
			$this->body = mysqli_escape_string(self::$db, $args['body']) ?? NULL;
			$this->course_number = $args['course_number'] ?? NULL;
			// add user_id to constructor
			$this->user_id = $args['user_id'] ?? NULL;

		}

		// Method that creates a new record in the Notes table of our database
		public function create() {

			// Update Notes table column & values to include the new user_id column
            $sql = "INSERT INTO Notes (name, body, course_number, user_id) VALUES (?, ?, ?, ?)";

            $stmt = self::$db->prepare($sql);
            $stmt->bind_param('sssi', $this->name, $this->body, $this->course_number, $this->user_id);

            $stmt->execute();
            $result = $stmt->get_result();

            return $result;

        }

		// Method that finds a single record from the Notes table of our database
		// based on the $id parameter we provide
		static public function find($id, $user_id) {
 
			$sql = "SELECT * FROM Notes WHERE id= ? AND user_id = ?";
 
			$stmt = self::$db->prepare($sql);
            $stmt->bind_param('ii', $id, $user_id);
            $stmt->execute();

            $result = $stmt->get_result();

            return $result->fetch_assoc();

		}
		
		// Method that updates a single record in the Notes table of our database
		// based on the id and user_id
		public function update() {
			
			// LIMIT 1 is a clause added to limit the update to only one record
			// It is a fallback if you forget the WHERE clause
			$sql = "UPDATE Notes SET name = ?, body = ?, course_number = ? WHERE id = ? AND user_id = ? LIMIT 1";

			$stmt = self::$db->prepare($sql);
            $stmt->bind_param('sssii', $this->name, $this->body, $this->course_number, $this->id, $this->user_id);

            $stmt->execute();

            $result = $stmt->get_result();

            return $result;
 
		}

		// Method that deletes a single record from the Notes table of our database
		public function delete() {

			$sql = "DELETE FROM Notes WHERE id = ? AND user_id = ? LIMIT 1";
			
			$stmt = self::$db->prepare($sql);
            $stmt->bind_param('ii', $this->id, $this->user_id);

            $stmt->execute();

            $result = $stmt->get_result();

            return $result;
 
		}		
 
	}               
 