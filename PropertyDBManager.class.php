 <?php

class PropertyDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function getAllProperty() {
		$property = array();
		$query    = $this->db->query( "SELECT * FROM propertyinfo WHERE PropertyStatus='1'" ); //whenever you want to select everything from your table
		
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$property[] = new Property( $r );
		}

		return $property;
	}

	public function getAllPropertyByUSer($UserId) {
		$property = array();
		/*var_dump($UserId);*/
		$query    = $this->db->prepare( "SELECT * FROM propertyinfo WHERE UserId = :UserId" ); //whenever you want to select everything from your table
		$query->execute( array("UserId" => $UserId ) );
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$property[] = new Property( $r );
		}

		return $property;
	}
public function MarkasSold($PropertyId){
			$query = $this->db->prepare("UPDATE propertyinfo SET PropertyStatus = 0 WHERE PropertyId = :PropertyId");
			$query->execute(array("PropertyId" => $PropertyId));
		}

	public function MarkasAvailable($PropertyId){
			$query = $this->db->prepare("UPDATE propertyinfo SET PropertyStatus = 1 WHERE PropertyId = :PropertyId");
			$query->execute(array("PropertyId" => $PropertyId));
		}
		
	public function getAllPropertyExceptUser($UserId) {
		$property = array();
		/*var_dump($UserId);*/
		$query    = $this->db->prepare( "SELECT * FROM propertyinfo WHERE UserId != :UserId and PropertyStatus='1'" ); //whenever you want to select everything from your table
		$query->execute( array("UserId" => $UserId ) );
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$property[] = new Property( $r );
		}

		return $property;
	}
	public function getSingleProperty( $PropertyId ) {
		$query = $this->db->prepare( "SELECT * FROM propertyinfo WHERE PropertyId = :PropertyId" ); //whenever you want to select a single record from your table
		$query->execute( array( "PropertyId" => $PropertyId) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new Property( $result );
	}

	

	public function addProperty( $Property ) {
		$query = $this->db->prepare( "INSERT INTO propertyinfo VALUES (DEFAULT, :Features, :ParkingSpace, :HousePrice, :PropertyType, :PublicRemarks, :Bathroom, :Bedrooom , :Hall, :Balcony, :SizeInterior, :SizeExterior, :Utilities, :PetFriendly, :StreetAddress, :City , :Province,  :Postalcode, :Country, :Neighborhood, :ConstructedDate, :RenovatedDate, :OwnerName, :OwnerConNo , :AgreementType, DEFAULT, DEFAULT,:UserId)" );
		$query->execute( array(
			"Features"  => $Property->getFeatures(), 
			"ParkingSpace"  => $Property->getParkingSpace(),
			"HousePrice"  => $Property->getHousePrice(),
			"PropertyType"  => $Property->getPropertyType(), 
			"PublicRemarks"  => $Property-> getPublicRemarks(),
			"Bathroom"  => $Property->getBathroom(), 
			"Bedrooom"  => $Property->getBedroom(),
			"Hall"  => $Property->getHall(),
			"Balcony"  => $Property->getBalcony(), 
			"SizeInterior"  => $Property->getSizeInterior(),
			"SizeExterior"  => $Property->getSizeExterior(),
			"Utilities"  => $Property->getUtilities(), 
			"PetFriendly"  => $Property-> getPetFriendly(),
			"StreetAddress"  => $Property->getStreetAddress(), 
			"City"  => $Property->getCity(),
			"Province"  => $Property->getProvince(),
			"Postalcode"  => $Property->getPostalcode(), 
			"Country"  => $Property->getCountry(),
			"Neighborhood"  => $Property->getNeighborhood(),
			"ConstructedDate"  => $Property->getConstructedDate(), 
			"RenovatedDate"  => $Property-> getRenovatedDate(),
			"OwnerName"  => $Property->getOwnerName(), 
			"OwnerConNo"  => $Property->getOwnerConNo(),
			"AgreementType"  => $Property->getAgreementType(),
			"UserId"  => $Property->getUserId(),
			
		) );
	}

	public function editProperty( $Property ) {
		$query = $this->db->prepare( "UPDATE propertyinfo SET Features = :Features, ParkingSpace = :ParkingSpace,HousePrice = :HousePrice,PropertyType = :PropertyType,PublicRemarks = :PublicRemarks,Bathroom = :Bathroom,Bedroom = :Bedroom ,Hall = :Hall,Balcony = :Balcony,SizeInterior = :SizeInterior,SizeExterior = :SizeExterior,Utilities = :Utilities,PetFriendly = :PetFriendly,StreetAddress = :StreetAddress,City = :City ,Province = :Province,Postalcode =  :Postalcode,Country = :Country,Neighborhood = :Neighborhood,ConstructedDate = :ConstructedDate,RenovatedDate = :RenovatedDate,OwnerName = :OwnerName,OwnerConNo = :OwnerConNo ,AgreementType = :AgreementType,PropertyVideo = :PropertyVideo,PropertyStatus = :PropertyStatus,UserId = :UserId WHERE PropertyId = :PropertyId" );
		$query->execute( array(
			"PropertyId"  => $Property->getPropertyId(),
			"Features"  => $Property->getFeatures(), 
			"ParkingSpace"  => $Property->getParkingSpace(),
			"HousePrice"  => $Property->getHousePrice(),
			"PropertyType"  => $Property->getPropertyType(), 
			"PublicRemarks"  => $Property-> getPublicRemarks(),
			"Bathroom"  => $Property->getBathroom(), 
			"Bedroom"  => $Property->getBedroom(),
			"Hall"  => $Property->getHall(),
			"Balcony"  => $Property->getBalcony(), 
			"SizeInterior"  => $Property->getSizeInterior(),
			"SizeExterior"  => $Property->getSizeExterior(),
			"Utilities"  => $Property->getUtilities(), 
			"PetFriendly"  => $Property-> getPetFriendly(),
			"StreetAddress"  => $Property->getStreetAddress(), 
			"City"  => $Property->getCity(),
			"Province"  => $Property->getProvince(),
			"Postalcode"  => $Property->getPostalcode(), 
			"Country"  => $Property->getCountry(),
			"Neighborhood"  => $Property->getNeighborhood(),
			"ConstructedDate"  => $Property->getConstructedDate(), 
			"RenovatedDate"  => $Property-> getRenovatedDate(),
			"OwnerName"  => $Property->getOwnerName(), 
			"OwnerConNo"  => $Property->getOwnerConNo(),
			"AgreementType"  => $Property->getAgreementType(),
			"PropertyVideo"  => $Property->getPropertyVideo(),
			"PropertyStatus"  => $Property->getPropertyStatus(),
			"UserId"  => $Property->getUserId(),
		) );
	}

	public function deleteProperty($PropertyId){
			$query = $this->db->prepare("DELETE FROM propertyinfo WHERE PropertyId = :PropertyId");
		    $query->execute(array("PropertyId" => $PropertyId));
		}

	public function banProperty($PropertyId){
			$query = $this->db->prepare("UPDATE propertyinfo SET Status = 0 WHERE PropertyId = :PropertyId");
			$query->execute(array("PropertyId" => $PropertyId));
		}
}