<?php

	class Room 
	{
		
		private $RoomId;
		private $RoomType;
		private $RoomWidth;
		private $RoomLength;
		private $Dimension;
		private $PropertyId;
		

		public function __construct($array){
			$this->RoomId = $array['RoomId'] ?? null;
			$this->RoomType = $array['RoomType'];
			$this->RoomWidth = $array['RoomWidth'];
			$this->RoomLength = $array['RoomLength'];
			$this->Dimension = $array['Dimension'];
			$this->PropertyId = $array['PropertyId'];
		}

		public function getRoomId(){
	      return $this->RoomId;
	    }

	    public function setRoomId($RoomId){
	      $this->RoomId = $RoomId;
	    }

	    public function getRoomType(){
	      return $this->RoomType;
	    }

	    public function setRoomType($RoomType){
	      $this->RoomType = $RoomType;
	    }

	    public function getRoomWidth(){
	      return $this->RoomWidth;
	    }

	    public function setRoomWidth($RoomWidth){
	      $this->RoomWidth = $RoomWidth;
	    }

	    public function getRoomLength(){
	      return $this->RoomLength;
	    }

	    public function setRoomLength($RoomLength){
	      $this->RoomLength = $RoomLength;
	    }

		public function getDimension(){
	      return $this->Dimension;
	    }
	     public function setDimension($Dimension){
	      $this->Dimension = $Dimension;
	    }

	    public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }

	   
	}


?>