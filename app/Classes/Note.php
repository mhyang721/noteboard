<?php 
 
	class Note {
 
		static protected $db;
 
		public $id;
		public $name;
		public $body;
		public $course_number;
 
		static public function set_db($db) {
			self::$db = $db;
		}

		// Static: Accessed on the class directly
		static public function find_all() {

			// Get all entries with all data from notes table
			$sql = "SELECT * FROM Notes";

			// Run the query above on the db connection
			$result = self::$db->query($sql);

			// Return the result
			return $result;

		}

		public function __construct($args) {
			$this->id = $args['id'] ?? NULL;
			$this->name = $args['name'] ?? NULL;
			$this->body = $args['body'] ?? NULL;
			$this->course_number = $args['course_number'] ?? NULL;
		}

		public function create() {
            $sql = "INSERT INTO Notes (name, body, course_number)";
            $sql .= " VALUES ( '{$this->name}','{$this->body}','{$this->course_number}' )";

            $result = self::$db->query($sql);

            return $result;
        }

		static public function find($id) {
 
			$sql = "SELECT * FROM Notes ";
			$sql .= "WHERE id='{$id}'";
 
			$result = self::$db->query($sql);

			return $result->fetch_assoc();
 
		}
		
		public function update() {
 
			$sql = "UPDATE Notes SET ";
				$sql .= "name='{$this->name}', ";
				$sql .= "body='{$this->body}', ";
				$sql .= "course_number='{$this->course_number}' ";
			$sql .= "WHERE id='{$this->id}' ";
			$sql .= "LIMIT 1";
 
			$result = self::$db->query($sql); 
			
			return $result;
 
		}

		public function delete() {
 
			$sql = "DELETE FROM Notes ";
			$sql .= "WHERE id='{$this->id}' ";
			$sql .= "LIMIT 1";
 
			$result = self::$db->query($sql); 
			
			return $result;
 
		}		
 
	}               
 