<?php
class User_Model extends CI_Model 
{
	// create user   
	function insertUser($data)
	{
    $this->db->insert('users', $data);
	}

	// user login 
	function loginUser($userMail,$userPass)
	{
	$this->db->where('userMail', $userMail);
	$query = $this->db->get('users');
	if($query->num_rows() > 0)
	{
	foreach($query->result() as $row)
	{
	$store_password = $row->userPass;
	// password compare
	if(md5($userPass) == $store_password)
	{
	return 'User Login Successfully';
	// set user id for session for accessing routes
	$this->session->set_userdata('id', $row->id);
	}
	else
	{
	return 'Password Is Incorrect';
	}		
	}
	}
	else
	{
	return 'Invalid User Credentials';
	}
	}
	// check admin or not
	function checkAdminOrNot($id)
	{
	$this->db->select('userLevel'); 
	$this->db->from('users');
	$this->db->where('id',$id);
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
	}
}