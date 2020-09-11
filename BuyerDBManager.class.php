<?php

class BuyerDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllBuyers() {
		$buyer = array();
		$query    = $this->db->query( "SELECT * FROM buyerinfo" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$buyer[] = new Buyer( $r );
		}

		return $buyer;
	}

	public function getAllBuyerByUser($PropertyId) {
		$buyer = array();
		/*var_dump($UserId);*/
		$query    = $this->db->prepare( "SELECT * FROM buyerinfo WHERE PropertyId = :PropertyId" ); //whenever you want to select everything from your table
		$query->execute( array("PropertyId" => $PropertyId) );
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$buyer[] = new Buyer( $r );
		}

		return $buyer;
	}

	public function MarkasaAccepted($BuyerId,$PropertyId){
			$query = $this->db->prepare("UPDATE buyerinfo SET Status = 1 WHERE BuyerId = :BuyerId");
			$query->execute(array("BuyerId" => $BuyerId));

			$query1 = $this->db->prepare("UPDATE propertyinfo SET PropertyStatus = 0 WHERE PropertyId = :PropertyId");
			$query1->execute(array("PropertyId" => $PropertyId));
		}

	public function MarkasDecline($BuyerId,$PropertyId){
			$query = $this->db->prepare("UPDATE buyerinfo SET Status = 0 WHERE BuyerId = :BuyerId");
			$query->execute(array("BuyerId" => $BuyerId));

			$query1 = $this->db->prepare("UPDATE propertyinfo SET PropertyStatus = 0 WHERE PropertyId = :PropertyId");
			$query1->execute(array("PropertyId" => $PropertyId));
		}

	

	public function getSingleBuyer( $BuyerId ) {
		$query = $this->db->prepare( "SELECT * FROM buyerinfo WHERE BuyerId = :BuyerId" ); //whenever you want to select a single record from your table
		$query->execute( array( $BuyerId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Buyer( $result );
	}

	public function addBuyer( $Buyer ) {
		$query = $this->db->prepare( "INSERT INTO buyerinfo VALUES (DEFAULT, :BuyerEmail, :BuyerPrice, :PropertyId, :UserId, DEFAULT)" );
		$query->execute( array(
			"BuyerEmail"  => $Buyer->getBuyerEmail(), 
			"BuyerPrice"  => $Buyer->getBuyerPrice(),
			"PropertyId"  => $Buyer->getPropertyId(), 
			"UserId"  => $Buyer->getUserId(),
			
		) );
	}

	public function editBuyer( $Buyer ) {
		$query = $this->db->prepare( "UPDATE buyerinfo SET BuyerEmail = :BuyerEmail, BuyerPrice = :BuyerPrice, PropertyId = :PropertyId, UserId = :UserId, Status = :Status WHERE BuyerId = :BuyerId" );
		$query->execute( array(
			"BuyerId"    => $Buyer->getBuyerId(),
			"BuyerEmail"  => $Buyer->getBuyerEmail(),
			"PropertyId"  => $Buyer->getPropertyId(), 
			"UserId"  => $Buyer->getUserId(),
			"Status"   => $Buyer->getStatus(),
		) );
	}

	public function deleteBuyer($BuyerId){
			$query = $this->db->prepare("DELETE FROM buyerinfo WHERE BuyerId = :BuyerId");
		    $query->execute(array("BuyerId" => $BuyerId));
		}

	public function banBuyer($BuyerId){
			$query = $this->db->prepare("UPDATE buyerinfo SET Status = 0 WHERE BuyerId = :BuyerId");
			$query->execute(array("BuyerId" => $BuyerId));
		}
}