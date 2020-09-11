<?php
	class User{
		private $Userid;
		private $Username;
		private $Password;
		private $Firstname;
		private $Lastname;
		private $Email;
		private $DOB;
		private $Phone;
		private $Address;
		private $Status;
		private $Verified;
		private $token;

		public function __construct($array){
			$this->Userid = $array['Userid'] ?? null;
			$this->Username = $array['Username'];
			$this->Password = $array['Password'];
			$this->Firstname = $array['Firstname'];
			$this->Lastname = $array['Lastname'];
			$this->Email = $array['Email'];
			$this->DOB = $array['DOB'];
			$this->Phone = $array['Phone'];
			$this->Address = $array['Address'];
			$this->Status = $array['Status'] ?? 1;
			$this->Verified = $array['Verified'] ?? 0;
			$this->token = $array['token'] ?? 0;
		}


		public function getUserid(){
	      return $this->Userid;
	    }

	    public function setUserid($Userid){
	      $this->Userid = $Userid;
	    }

	    public function getUsername(){
	      return $this->Username;
	    }

	    public function setUsername($Username){
	      $this->Username = $Username;
	    }

	    public function getPassword(){
	      return $this->Password;
	    }

	    public function setPassword($Password){
	      $this->Password = $Password;
	    }

	    public function getFirstname(){
	      return $this->Firstname;
	    }

	    public function setFirstname($Firstname){
	      $this->Firstname = $Firstname;
	    }

	    public function getLastname(){
	      return $this->Lastname;
	    }

	    public function setLastname($Lastname){
	      $this->Lastname = $Lastname;
	    }

	    public function getEmail(){
	      return $this->Email;
	    }

	    public function setEmail($Email){
	      $this->Email = $Email;
	    }
	    public function getDOB(){
	      return $this->DOB;
	    }

	    public function setDOB($DOB){
	      $this->DOB = $DOB;
	    }

	    public function getPhone(){
	      return $this->Phone;
	    }

	    public function setPhone($Phone){
	      $this->Phone = $Phone;
	    }

	    public function getAddress(){
	      return $this->Address;
	    }

	    public function setAddress($Address){
	      $this->Address = $Address;
	    }

	    public function getStatus(){
	      return $this->Status;
	    }

	    public function setStatus($Status){
	      $this->Status = $Status;
	    }

	    public function getVerification(){
	      return $this->Verified;
	    }

	    public function setVerification($Verified){
	      $this->Verified = $Verified;
	    }

	    public function getToken(){
	      return $this->token;
	    }

	    public function setToken($token){
	      $this->token = $token;
	    }


		
  }


 ?>