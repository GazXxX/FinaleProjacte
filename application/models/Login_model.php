<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
	function auth_user($username,$password){
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND pass=MD5('$password') LIMIT 1");
		return $query;
	}

}
