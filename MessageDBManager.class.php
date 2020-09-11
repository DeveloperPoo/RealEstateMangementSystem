<?php

class MessageDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllMessage() {
		$message = array();
		$query    = $this->db->query( "SELECT * FROM message" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$message[] = new Message( $r );
		}

		return $message;
	}
	
	public function addMessage( $Message ) {
		$query = $this->db->prepare( "INSERT INTO message VALUES (DEFAULT, :MessagerName, :MessagerNumber, :MessagerEmail, :MessagerMessage, :PropertyId)" );
		$query->execute( array(
			"MessagerName"  => $Message->getMessagerName(), 
			"MessagerNumber"  => $Message->getMessagerNumber(),
			"MessagerEmail"  => $Message->getMessagerEmail(), 
			"MessagerMessage"  => $Message->getMessagerMessage(),
			"PropertyId"  => $Message->getPropertyId(),
			
		) );
	}


}