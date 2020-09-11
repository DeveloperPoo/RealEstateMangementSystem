<?php

	class Feedback 
	{
		
		private $FeedbackerId;
		private $FeedbackerName;
		private $FeedbackerNumber;
		private $FeedbackerEmail;
		private $FeedbackerMessage;

		public function __construct($array){
			$this->FeedbackerId = $array['FeedbackerId'] ?? null;
			$this->FeedbackerName = $array['FeedbackerName'];
			$this->FeedbackerNumber = $array['FeedbackerNumber'];
			$this->FeedbackerEmail = $array['FeedbackerEmail'];
			$this->FeedbackerMessage = $array['FeedbackerMessage'];
		}

	
		public function getFeedbackerId(){
	      return $this->FeedbackerId;
	    }

	    public function setFeedbackerId($FeedbackerId){
	      $this->FeedbackerId = $FeedbackerId;
	    }

	    public function getFeedbackerName(){
	      return $this->FeedbackerName;
	    }

	    public function setFeedbackerName($FeedbackerName){
	      $this->FeedbackerName = $FeedbackerName;
	    }

	    public function getFeedbackerNumber(){
	      return $this->FeedbackerNumber;
	    }

	    public function setFeedbackerNumber($FeedbackerNumber){
	      $this->FeedbackerNumber = $FeedbackerNumber;
	    }

	    public function getFeedbackerEmail(){
	      return $this->FeedbackerEmail;
	    }

	    public function setFeedbackerEmail($FeedbackerEmail){
	      $this->FeedbackerEmail = $FeedbackerEmail;
	    }

	    public function getFeedbackerMessage(){
	      return $this->FeedbackerMessage;
	    }

	    public function setFeedbackerMessage($FeedbackerMessage){
	      $this->FeedbackerMessage = $FeedbackerMessage;
	    }

	   
	}


?>