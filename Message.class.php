<?php

	class Message 
	{
		
		private $MessageId;
		private $MessagerName;
		private $MessagerNumber;
		private $MessagerEmail;
		private $MessagerMessage;
		private $PropertyId;

		public function __construct($array){
			$this->MessageId = $array['MessageId'] ?? null;
			$this->MessagerName = $array['MessagerName'];
			$this->MessagerNumber = $array['MessagerNumber'];
			$this->MessagerEmail = $array['MessagerEmail'];
			$this->MessagerMessage = $array['MessagerMessage'];
			$this->PropertyId = $array['PropertyId'];
		}

	
		public function getMessageId(){
	      return $this->MessageId;
	    }

	    public function setMessageId($MessageId){
	      $this->MessageId = $MessageId;
	    }

	    public function getMessagerName(){
	      return $this->MessagerName;
	    }

	    public function setMessagerName($MessagerName){
	      $this->MessagerName = $MessagerName;
	    }

	    public function getMessagerNumber(){
	      return $this->MessagerNumber;
	    }

	    public function setMessagerNumber($MessagerNumber){
	      $this->MessagerNumber = $MessagerNumber;
	    }

	    public function getMessagerEmail(){
	      return $this->MessagerEmail;
	    }

	    public function setMessagerEmail($MessagerEmail){
	      $this->MessagerEmail = $MessagerEmail;
	    }

	    public function getMessagerMessage(){
	      return $this->MessagerMessage;
	    }

	    public function setMessagerMessage($MessagerMessage){
	      $this->MessagerMessage = $MessagerMessage;
	    }

	    public function getPropertyId(){
	      return $this->PropertyId;
	    }

	    public function setPropertyId($PropertyId){
	      $this->PropertyId = $PropertyId;
	    }

	   
	}


?>