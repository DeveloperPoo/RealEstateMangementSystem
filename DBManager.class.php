<?php


class DBManager {
	protected $db;

	/**
	 * DBManager constructor.
	 */
	private function __construct() {
		$host   = "localhost";
		$user   = "root";
		$pass   = "";
		$dbname = "rems";

		//Tris to connect to the database using the provided credentials
		//if the connection works it will keep the persistance, else it will throw and error
		try {
			$this->db = new PDO( "mysql:host=$host;dbname=$dbname", $user, $pass );
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$this->db->exec("set names utf8");
		} catch ( Exception $e ) {
			die( "Database Connection Error: " . $e->getMessage() );
		}
	}

	public static function Instance(){
		static $instance = null;

		if($instance === null)
			$instance = new DBManager();

		return $instance;
	}

	/**
	 * @return PDO
	 */
	public function getDb() {
		return $this->db;
	}
}


?>