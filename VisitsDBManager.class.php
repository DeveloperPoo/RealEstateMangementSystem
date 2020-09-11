<?php

class VisitsDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}


	public function getAllVisitsByUser($PropertyId) {
		$visit = array();
		/*var_dump($UserId);*/
		$query    = $this->db->prepare( "SELECT * FROM visits WHERE PropertyId = :PropertyId" ); //whenever you want to select everything from your table
		$query->execute( array("PropertyId" => $PropertyId) );
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$visit[] = new Visits( $r );
		}

		return $visit;
	}
	public function getAllRecentVisits() {
		$visit = array();
		$query    = $this->db->query( "SELECT * FROM visits GROUP BY PropertyId ORDER BY VisitDate DESC" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$visit[] = new Visits( $r );
		}

		return $visit;
	}
	    

	public function getAllVisits() {
		$visit = array();
		$query    = $this->db->query( "SELECT * FROM visits" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$visit[] = new Visits( $r );
		}

		return $visit;
	}

	public function getSingleVisit( $VisitId ) {
		$query = $this->db->prepare( "SELECT * FROM visits WHERE VisitId = :VisitId" ); //whenever you want to select a single record from your table
		$query->execute( array( $VisitId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Visits( $result );
	}

	public function MarkasaAccepted($VisitId){
			$query = $this->db->prepare("UPDATE visits SET VisitStatus = 1 WHERE VisitId = :VisitId");
			$query->execute(array("VisitId" => $VisitId));
		}

	public function MarkasDecline($VisitId){
			$query = $this->db->prepare("UPDATE visits SET VisitStatus = 0 WHERE VisitId = :VisitId");
			$query->execute(array("VisitId" => $VisitId));
		}

	public function addVisit( $Visit) {
		$query = $this->db->prepare( "INSERT INTO visits VALUES (DEFAULT, :VisitDate, :VisitHour, :VisitMinute,:VisiterEmail, :PropertyId, DEFAULT)" );
		$query->execute( array(
			"VisitDate"  => $Visit->getVisitDate(), 
			"VisitHour"  => $Visit->getVisitHour(),
			"VisitMinute"  => $Visit->getVisitMinute(),
			"VisiterEmail"  => $Visit->getVisiterEmail(),
			"PropertyId"  => $Visit->getPropertyId(), 

			
		) );
	}

	public function editVisit( $Visit ) {
		$query = $this->db->prepare( "UPDATE visits SET VisitDate = :VisitDate, VisitHour = :VisitHour, VisitMinute = :VisitMinute ,VisiterEmail = :VisiterEmail , PropertyId = :PropertyId, VisitStatus = :VisitStatus WHERE VisitId = :VisitId" );
		$query->execute( array(
			"VisitId"    => $Visit->getVisitId(),
			"VisitDate"  => $Visit->getVisitDate(), 
			"VisitHour"  => $Visit->getVisitHour(),
			"VisitMinute"  => $Visit->getVisitMinute(),
			"VisiterEmail"  => $Visit->getVisiterEmail(),
			"PropertyId"  => $Visit->getPropertyId(),
			"VisitStatus"  => $Visit->getVisitStatus(),
		) );
	}

	public function deleteVisit($VisitId){
			$query = $this->db->prepare("DELETE FROM visits WHERE VisitId = :VisitId");
		    $query->execute(array("VisitId" => $VisitId));
		}

	/*public function banVisit($VisitId){
			$query = $this->db->prepare("UPDATE visits SET Status = 0 WHERE VisitId = :VisitId");
			$query->execute(array("VisitId" => $VisitId));
		}*/
}