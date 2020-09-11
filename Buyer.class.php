<?php

	class Buyer 
	{
		
		private $BuyerId;
		private $BuyerEmail;
		private $BuyerPrice;
		private $PropertyId;
		private $UserId;
		private $Status;

		public function __construct($array){
			$this->BuyerId = $array['BuyerId'] ?? null;
			$this->BuyerEmail = $array['BuyerEmail'];
			$this->BuyerPrice = $array['BuyerPrice'];
			$this->PropertyId = $array['PropertyId'];
			$this->UserId = $array['UserId'];
			$this->Status = $array['Status'] ?? 0;
		}

	
		public function getBuyerId(){
	      return $this->BuyerId;
	    }

	    public function setBuyerId($BuyerId){
	      $this->BuyerId = $BuyerId;
	    }

	    public function getBuyerEmail(){
	      return $this->BuyerEmail;
	    }

	    public function setBuyerEmail($BuyerEmail){
	      $this->BuyerEmail = $BuyerEmail;
	    }
	    
	    public function getBuyerPrice(){
	      return $this->BuyerPrice;
	    }

	    public function setBuyerPrice($BuyerPrice){
	      $this->BuyerPrice = $BuyerPrice;
	    }

	    public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }
	    public function getUserId(){
	      return $this->UserId;
	    }

	    public function setUserId($UserId){
	      $this->UserId = $UserId;
	    }

	    public function getStatus(){
	      return $this->Status;
	    }

	    public function setStatus($Status){
	      $this->Status = $Status;
	    }

	   
	}


?>