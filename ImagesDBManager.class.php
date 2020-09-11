<?php

class ImagesDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllImageOfSpecificProperty($PropertyId) {
		$image = array();
		$query    = $this->db->prepare( "SELECT * FROM images WHERE PropertyId = :PropertyId" ); //whenever you want to select everything from your table
		$query->execute(array("PropertyId" => $PropertyId));
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$image[] = new Images( $r );
		}

		return $image;
	}

	public function getAllImages() {
		$image = array();
		$query    = $this->db->query( "SELECT * FROM images" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$image[] = new Images( $r );
		}

		return $image;
	}

	public function getSingleImage( $ImageId ) {
		$query = $this->db->prepare( "SELECT * FROM images WHERE ImageId = :ImageId" ); //whenever you want to select a single record from your table
		$query->execute( array( $ImageId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Images( $result );
	}

	public function addImage( $Image ) {
		$query = $this->db->prepare( "INSERT INTO images VALUES (DEFAULT, :Photo, :Description, :PropertyId)" );
		$query->execute( array(
			"Photo"  => $Image->getPhoto(), 
			"Description"  => $Image->getDescription(),
			"PropertyId"  => $Image->getPropertyId(),
		) );
	}

	public function editImage( $Image ) {
		$query = $this->db->prepare( "UPDATE images SET Photo = :Photo, Description = :Description,PropertyId = :PropertyId WHERE ImageId = :ImageId" );
		$query->execute( array(
			"ImageId"    => $User->getImageId(),
			"Photo"  => $Image->getPhoto(), 
			"Description"  => $Image->getDescription(),
			"PropertyId"  => $Image->getPropertyId(),
		) );
	}

	public function deleteImage($ImageId){
			$query = $this->db->prepare("DELETE FROM images WHERE ImageId = :ImageId");
		    $query->execute(array("ImageId" => $ImageId));
		}

	/*public function banImage($ImageId){
			$query = $this->db->prepare("UPDATE images SET Status = 0 WHERE ImageId = :ImageId");
			$query->execute(array("ImageId" => $ImageId));
		}*/
}