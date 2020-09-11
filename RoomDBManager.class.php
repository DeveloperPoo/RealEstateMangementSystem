<?php

class RoomDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	

	public function getAllRoomByUser($PropertyId) {
		$room = array();
		/*var_dump($UserId);*/
		$query    = $this->db->prepare( "SELECT * FROM room WHERE PropertyId = :PropertyId" ); //whenever you want to select everything from your table
		$query->execute( array("PropertyId" => $PropertyId) );
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$room[] = new Room( $r );
		}

		return $room;
	}

	public function getAllRoom() {
		$room = array();
		$query    = $this->db->query( "SELECT * FROM room" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$room[] = new Room( $r );
		}

		return $room;
	}

	public function getSingleRoom( $RoomId ) {
		$query = $this->db->prepare( "SELECT * FROM room WHERE RoomId = :RoomId" ); //whenever you want to select a single record from your table
		$query->execute( array( $RoomId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Room( $result );
	}

	public function addRoom( $Room ) {
		$query = $this->db->prepare( "INSERT INTO room VALUES (DEFAULT, :RoomType, :RoomWidth, :RoomLength ,:Dimension, :PropertyId)" );
		$query->execute( array(
			"RoomType"  => $Room->getRoomType(), 
			"RoomWidth"  => $Room->getRoomWidth(),
			"RoomLength"  => $Room->getRoomLength(),
			"Dimension"  => $Room->getDimension(),
			"PropertyId"  => $Room->getPropertyId(),
			
		) );
	}

	public function editRoom( $Room ) {
		$query = $this->db->prepare( "UPDATE room SET RoomType = :RoomType, RoomWidth = :RoomWidth, RoomLength = :RoomLength , Dimension = :Dimension, PropertyId = :PropertyId WHERE RoomId = :RoomId" );
		$query->execute( array(
			"RoomId"    => $Room->getRoomId(),
			"RoomType"  => $Room->getRoomType(), 
			"RoomWidth"  => $Room->getRoomWidth(),
			"RoomLength"  => $Room->getRoomLength(),
			"Dimension"  => $Room->getDimension(), 
			"PropertyId"  => $Room->getPropertyId(),
			
		) );
	}

	public function deleteRoom($RoomId){
			$query = $this->db->prepare("DELETE FROM room WHERE RoomId = :RoomId");
		    $query->execute(array("RoomId" => $RoomId));
		}

}