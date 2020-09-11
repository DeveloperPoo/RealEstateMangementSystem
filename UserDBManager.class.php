<?php

class UserDBManager extends DBManager {
	protected $db;

	/**
	 * Student constructor.
	 */
	public function __construct() {
		$this->db = DBManager::Instance()->getDb();
	}

	public function VerifyUserByEmail($Email) {
		
		$query = $this->db->prepare( "SELECT token FROM userinfo WHERE Email = :Email AND Status = '1'" ); //Verify username and password from your table
		$query->execute(array("Email" => $Email));
		$result = $query->fetch( PDO::FETCH_ASSOC );
		return $result;
	}

	public function VerifyUserExistance( $Username , $Email) {
		
		$query = $this->db->prepare( "SELECT Email FROM userinfo WHERE  Username = :Username AND Email = :Email AND Status = '1'" ); //Verify username and password from your table
		$query->execute(array("Username" => $Username,"Email" => $Email));
		$result = $query->fetch( PDO::FETCH_ASSOC );
		return $result;
	}

	public function VerifyUser( $Username , $Password ) {
		
		$query = $this->db->prepare( "SELECT Userid FROM userinfo WHERE Username = :Username AND Password = :Password AND Verified = '1' AND Status = '1'" ); //Verify username and password from your table
		 $query->execute(array("Username" => $Username,"Password" => $Password));
		$result = $query->fetch( PDO::FETCH_ASSOC );
		return $result;
	}

	public function ResetPasswordByToken($Password,$token){
			$query = $this->db->prepare("UPDATE userinfo SET Password = :Password WHERE token = :token");
			$query->execute(array("Password" => $Password,"token" => $token));
	}

	public function UpdateVerifyStatus($token){
			$query = $this->db->prepare("UPDATE userinfo SET Verified = 1 WHERE token = :token");
			$query->execute(array("token" => $token));
	}

	public function VerifyEmail( $Username , $Password ) {
		
		$query = $this->db->prepare( "SELECT Userid FROM userinfo WHERE Username = :Username AND Password = :Password AND Verified = '1' AND Status = '1'" ); //Verify username and password from your table
		 $query->execute(array("Username" => $Username,"Password" => $Password));
		$result = $query->fetch( PDO::FETCH_ASSOC );
		return $result;
	}

	public function getAllUsers() {
		$users = array();
		$query    = $this->db->query( "SELECT * FROM userinfo" ); //whenever you want to select everything from your table
		$result   = $query->fetchAll( PDO::FETCH_ASSOC );

		foreach ( $result as $r ) {
			$users[] = new User( $r );
		}

		return $users;
	}


	public function getSingleUser( $Userid ) {
		$query = $this->db->prepare( "SELECT * FROM userinfo WHERE Userid = :Userid" ); //whenever you want to select a single record from your table
		$query->execute( array( "Userid" => $Userid) );
		$result = $query->fetch( PDO::FETCH_ASSOC );

		return new User( $result );


	}

	public function addUser( $User) {
		$query = $this->db->prepare( "INSERT INTO userinfo VALUES (DEFAULT, :Username, :Password, :Firstname, :Lastname, :Email, :DOB, :Phone , :Address, DEFAULT, DEFAULT,DEFAULT)" );
		$query->execute( array(
			"Username"  => $User->getUsername(), 
			"Password"  => $User->getPassword(),
			"Firstname"  => $User->getFirstname(),
			"Lastname"  => $User->getLastname(), 
			"Email"  => $User-> getEmail(),
			"DOB"  => $User->getDOB(), 
			"Phone"  => $User->getPhone(),
			"Address"  => $User->getAddress(),
			
			
		) );
	}

	public function editUser( $User ) {
		$query = $this->db->prepare( "UPDATE userinfo SET Username = :Username, Password = :Password,Firstname = :Firstname, Lastname = :Lastname, Email = :Email, DOB = :DOB, Phone = :Phone, Address = :Address, Status = :Status, Verified = :Verified WHERE Userid = :Userid" );
		$query->execute( array(
			"Userid"    => $User->getUserid(),
			"Username"  => $User->getUsername(), 
			"Password"  => $User->getPassword(),
			"Firstname"  => $User->getFirstname(),
			"Lastname"  => $User->getLastname(), 
			"Email"  => $User-> getEmail(),
			"DOB"  => $User->getDOB(), 
			"Phone"  => $User->getPhone(), 
			"Address"  => $User->getAddress(),
			"Status"   => $User->getStatus(),
			"Verified"   => $User->getVerification(),
		) );
	}

	public function updateToken($Email,$token){
			$query = $this->db->prepare("UPDATE userinfo SET token = :token WHERE Email = :Email");
		    $query->execute(array("Email" => $Email,"token" => $token));
		}

	public function banUser($Userid){
			$query = $this->db->prepare("UPDATE userinfo SET Status = 0 WHERE Userid = :Userid");
			$query->execute(array("Userid" => $Userid));
		}

}