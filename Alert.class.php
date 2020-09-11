<?php

	class Alert 
	{
		
		private $AlertId;
		private $PropertyId;
		private $UserId;
		private $Status;

		public function __construct($array){
			$this->AlertId = $array['AlertId'] ?? null;
			$this->PropertyId = $array['PropertyId'];
			$this->UserId = $array['UserId'];
			$this->Status = $array['Status'] ?? 1;
		}

	
		public function getAlertId(){
	      return $this->AlertId;
	    }

	    public function setAlertId($AlertId){
	      $this->AlertId = $AlertId;
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