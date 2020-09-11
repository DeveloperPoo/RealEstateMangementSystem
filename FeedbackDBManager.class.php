<?php

class FeedbackDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllFeedback() {
		$feedback = array();
		$query    = $this->db->query( "SELECT * FROM feedback" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$feedback[] = new Feedback( $r );
		}

		return $feedback;
	}
	
	public function addFeedback( $Feedback ) {
		$query = $this->db->prepare( "INSERT INTO feedback VALUES (DEFAULT, :FeedbackerName, :FeedbackerNumber, :FeedbackerEmail, :FeedbackerMessage)" );
		$query->execute( array(
			"FeedbackerName"  => $Feedback->getFeedbackerName(), 
			"FeedbackerNumber"  => $Feedback->getFeedbackerNumber(),
			"FeedbackerEmail"  => $Feedback->getFeedbackerEmail(), 
			"FeedbackerMessage"  => $Feedback->getFeedbackerMessage(),
			
		) );
	}


}