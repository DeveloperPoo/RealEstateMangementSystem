<?php
	class Visits{
		private $VisitId;
		private $VisitDate;
		private $VisitHour;
		private $VisitMinute;
		private $VisiterEmail;
		private $PropertyId;
		private $VisitStatus;
		

		public function __construct($array){
			$this->VisitId = $array['VisitId'] ?? null;
			$this->VisitDate = $array['VisitDate'];
			$this->VisitHour = $array['VisitHour'];
			$this->VisitMinute = $array['VisitMinute'];
			$this->VisiterEmail = $array['VisiterEmail'];
			$this->PropertyId = $array['PropertyId'];
			$this->VisitStatus = $array['VisitStatus'] ?? 0;
		}


		public function getVisitId(){
	      return $this->VisitId;
	    }

	    public function setVisitId($VisitId){
	      $this->VisitId = $VisitId;
	    }

	    public function getVisitDate(){
	      return $this->VisitDate;
	    }

	    public function setVisitDate($VisitDate){
	      $this->VisitDate = $VisitDate;
	    }

	    public function getVisitHour(){
	      return $this->VisitHour;
	    }

	    public function setVisitHour($VisitHour){
	      $this->VisitHour = $VisitHour;
	    }

	    public function getVisitMinute(){
	      return $this->VisitMinute;
	    }

	    public function setVisitMinute($VisitMinute){
	      $this->VisitMinute = $VisitMinute;
	    }

	    public function getVisiterEmail(){
	      return $this->VisiterEmail;
	    }

	    public function setVisiterEmail($VisiterEmail){
	      $this->VisiterEmail = $VisiterEmail;
	    }

	    public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }

	    public function getVisitStatus(){
	      return $this->VisitStatus;
	    }

	    public function setVisitStatus($VisitStatus){
	      $this->VisitStatus = $VisitStatus;
	    }
	    
		
  }


 ?>