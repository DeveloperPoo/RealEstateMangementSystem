<?php

class AlertDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllAlerts() {
		$alert = array();
		$query    = $this->db->query( "SELECT * FROM alerts" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$alert[] = new Alert( $r );
		}

		return $alert;
	}

	public function getSingleAlertId( $PropertyId,$UserId ) {
		$query = $this->db->prepare( "SELECT * FROM alerts WHERE PropertyId = :PropertyId AND UserId = :UserId AND Status = '1' " ); //whenever you want to select a single record from your table
		$query->execute( array( "PropertyId" => $PropertyId,"UserId" => $UserId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Alert( $result );
	}
	public function getSingleAlert( $AlertId ) {
		$query = $this->db->prepare( "SELECT * FROM alerts WHERE AlertId = :AlertId" ); //whenever you want to select a single record from your table
		$query->execute( array( $AlertId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Alert( $result );
	}

	public function addAlert( $Alert ) {
		$query = $this->db->prepare( "INSERT INTO alerts VALUES (DEFAULT, :PropertyId, :UserId, DEFAULT)" );
		$query->execute( array(
			"PropertyId"  => $Alert->getPropertyId(), 
			"UserId"  => $Alert->getUserId(),
			
		) );
	}

	public function editAlert( $Alert ) {
		$query = $this->db->prepare( "UPDATE alerts SET PropertyId = :PropertyId, UserId = :UserId, Status = :Status WHERE AlertId = :AlertId" );
		$query->execute( array(
			"AlertId"    => $Alert->getAlertId(),
			"PropertyId"  => $Alert->getPropertyId(), 
			"UserId"  => $Alert->getUserId(),
			"Status"   => $Alert->getStatus(),
		) );
	}

	public function deleteAlert($AlertId){
			$query = $this->db->prepare("DELETE FROM alerts WHERE AlertId = :AlertId");
		    $query->execute(array("AlertId" => $AlertId));
		}

	public function banAlert($AlertId){
			$query = $this->db->prepare("UPDATE alerts SET Status = 0 WHERE AlertId = :AlertId");
			$query->execute(array("AlertId" => $AlertId));
		}
}