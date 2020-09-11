<?php
	class Property{
		private $PropertyId;
		private $Features;
		private $ParkingSpace;
		private $HousePrice;
		private $PropertyType;
		private $PublicRemarks;
		private $Bathroom;
		private $Bedroom;
		private $Hall;
		private $Balcony;
		private $SizeInterior;
		private $SizeExterior;
		private $Utilities;
		private $PetFriendly;
		private $StreetAddress;
		private $City;
		private $Province;
		private $Postalcode;
		private $Country;
		private $Neighborhood;
		private $ConstructedDate;
		private $RenovatedDate;
		private $OwnerName;
		private $OwnerConNo;
		private $AgreementType;
		private $PropertyVideo;
		private $PropertyStatus;
		private $UserId;

		public function __construct($array){
			$this->PropertyId = $array['PropertyId'] ?? null;
			$this->Features = $array['Features'];
			$this->ParkingSpace = $array['ParkingSpace'];
			$this->HousePrice = $array['HousePrice'];
			$this->PropertyType = $array['PropertyType'];
			$this->PublicRemarks = $array['PublicRemarks'];
			$this->Bathroom = $array['Bathroom'];
			$this->Bedroom = $array['Bedroom'];
			$this->Hall = $array['Hall'];
			$this->Balcony = $array['Balcony'];
			$this->SizeInterior = $array['SizeInterior'];
			$this->SizeExterior = $array['SizeExterior'];
			$this->Utilities = $array['Utilities'];
			$this->PetFriendly = $array['PetFriendly'];
			$this->StreetAddress = $array['StreetAddress'];
			$this->City = $array['City'];
			$this->Province = $array['Province'];
			$this->Postalcode = $array['Postalcode'];
			$this->Country = $array['Country'];
			$this->Neighborhood = $array['Neighborhood'];
			$this->ConstructedDate = $array['ConstructedDate'];
			$this->RenovatedDate = $array['RenovatedDate'];
			$this->OwnerName = $array['OwnerName'];
			$this->OwnerConNo = $array['OwnerConNo'];
			$this->AgreementType = $array['AgreementType'];
			$this->PropertyVideo = $array['PropertyVideo'] ?? 0;
			$this->PropertyStatus = $array['PropertyStatus'] ?? 1;
			$this->UserId = $array['UserId'];
		}


		public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }

	    public function getFeatures(){
	      return $this->Features;
	    }

	    public function setFeatures($Features){
	      $this->Features = $Features;
	    }

	    public function getParkingSpace(){
	      return $this->ParkingSpace;
	    }

	    public function setParkingSpace($ParkingSpace){
	      $this->ParkingSpace = $ParkingSpace;
	    }

	    public function getHousePrice(){
	      return $this->HousePrice;
	    }

	    public function setHousePrice($HousePrice){
	      $this->HousePrice = $HousePrice;
	    }

	    public function getPropertyType(){
	      return $this->PropertyType;
	    }

	    public function setPropertyType($PropertyType){
	      $this->PropertyType = $PropertyType;
	    }

	    public function getPublicRemarks(){
	      return $this->PublicRemarks;
	    }

	    public function setPublicRemarks($PublicRemarks){
	      $this->PublicRemarks = $PublicRemarks;
	    }
	    public function getBathroom(){
	      return $this->Bathroom;
	    }

	    public function setBathroom($Bathroom){
	      $this->Bathroom = $Bathroom;
	    }

	    public function getBedroom(){
	      return $this->Bedroom;
	    }

	    public function setBedroom($Bedroom){
	      $this->Bedroom = $Bedroom;
	    }

	    public function getHall(){
	      return $this->Hall;
	    }

	    public function setHall($Hall){
	      $this->Hall = $Hall;
	    }

	    public function getBalcony(){
	      return $this->Balcony;
	    }

	    public function setBalcony($Balcony){
	      $this->Balcony = $Balcony;
	    }

		public function getSizeInterior(){
	      return $this->SizeInterior;
	    }

	    public function setSizeInterior($SizeInterior){
	      $this->SizeInterior = $SizeInterior;
	    }

	    public function getSizeExterior(){
	      return $this->SizeExterior;
	    }

	    public function setSizeExterior($SizeExterior){
	      $this->SizeExterior = $SizeExterior;
	    }

	    public function getUtilities(){
	      return $this->Utilities;
	    }

	    public function setUtilities($Utilities){
	      $this->Utilities = $Utilities;
	    }

	    public function getPetFriendly(){
	      return $this->PetFriendly;
	    }

	    public function setPetFriendly($PetFriendly){
	      $this->PetFriendly = $PetFriendly;
	    }

	    public function getStreetAddress(){
	      return $this->StreetAddress;
	    }

	    public function setStreetAddress($StreetAddress){
	      $this->StreetAddress = $StreetAddress;
	    }

	    public function getCity(){
	      return $this->City;
	    }

	    public function setCity($City){
	      $this->City = $City;
	    }
	    public function getProvince(){
	      return $this->Province;
	    }

	    public function setProvince($Province){
	      $this->Province = $Province;
	    }

	    public function getPostalcode(){
	      return $this->Postalcode;
	    }

	    public function setPostalcode($Postalcode){
	      $this->Postalcode = $Postalcode;
	    }

	    public function getCountry(){
	      return $this->Country;
	    }

	    public function setCountry($Country){
	      $this->Country = $Country;
	    }

	    public function getNeighborhood(){
	      return $this->Neighborhood;
	    }

	    public function setNeighborhood($Neighborhood){
	      $this->Neighborhood = $Neighborhood;
	    }

	    public function getConstructedDate(){
	      return $this->ConstructedDate;
	    }

	    public function setConstructedDate($ConstructedDate){
	      $this->ConstructedDate = $ConstructedDate;
	    }

	    public function getRenovatedDate(){
	      return $this->RenovatedDate;
	    }

	    public function setRenovatedDate($RenovatedDate){
	      $this->RenovatedDate = $RenovatedDate;
	    }

	    public function getOwnerName(){
	      return $this->OwnerName;
	    }

	    public function setOwnerName($OwnerName){
	      $this->OwnerName = $OwnerName;
	    }

	    public function getOwnerConNo(){
	      return $this->OwnerConNo;
	    }

	    public function setOwnerConNo($OwnerConNo){
	      $this->OwnerConNo = $OwnerConNo;
	    }

	    public function getAgreementType(){
	      return $this->AgreementType;
	    }

	    public function setAgreementType($AgreementType){
	      $this->AgreementType = $AgreementType;
	    }

	    public function getPropertyVideo(){
	      return $this->PropertyVideo;
	    }

	    public function setPropertyVideo($PropertyVideo){
	      $this->PropertyVideo = $PropertyVideo;
	    }

	    public function getPropertyStatus(){
	      return $this->PropertyStatus;
	    }

	    public function setPropertyStatus($PropertyStatus){
	      $this->PropertyStatus = $PropertyStatus;
	    }

	    public function getUserId(){
	      return $this->UserId;
	    }

	    public function setUserId($UserId){
	      $this->UserId = $UserId;
	    }
		
  }


 ?>