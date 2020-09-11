<?php

	class Images 
	{
		
		private $ImageId;
		private $Photo;
		private $Description;
		private $PropertyId;

		public function __construct($array){
			$this->ImageId = $array['ImageId'] ?? null;
			$this->Photo = $array['Photo'];
			$this->Description = $array['Description'];
			$this->PropertyId = $array['PropertyId'];
		}

		public function getImageId(){
	      return $this->ImageId;
	    }

	    public function setImageId($ImageId){
	      $this->ImageId = $ImageId;
	    }

	    public function getPhoto(){
	      return $this->Photo;
	    }

	    public function setPhoto($Photo){
	      $this->Photo = $Photo;
	    }

	    public function getDescription(){
	      return $this->Description;
	    }

	    public function setDescription($Description){
	      $this->Description = $Description;
	    }

	    public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }


	   
	}


?>