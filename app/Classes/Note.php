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

		public function __construct($args) {
			$this->id = $args['id'] ?? NULL;
			$this->name = $args['name'] ?? NULL;
			$this->body = $args['body'] ?? NULL;
			$this->course_number = $args['course_number'] ?? NULL;
		}
 
	}               
 
?>