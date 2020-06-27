<?php
class User extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->model('User_Model');
	}
	// create user 
	
	public function createUser()
	{	 
	if(!empty($this->input->post('userName'))
	&& !empty($this->input->post('userMail'))
	&& !empty($this->input->post('userPass'))
	&& !empty($this->input->post('userLevel')))
	{
	$userName=$this->input->post('userName');
	$userMail=$this->input->post('userMail');
	$userPass=md5($this->input->post('userPass'));
	$userLevel=$this->input->post('userLevel');
	$data = array(
	'userName' => $userName,
	'userMail' => $userMail,
	'userPass' =>$userPass,
	'userLevel' =>$userLevel
	); 
	//load user model
	$this->User_Model->insertUser($data);
	$userJson['success'] = 'User Created Successfully';
	$userJson['error'] = '';
	}
	else {
		$userJson['success'] = '';
		$userJson['error'] = 'User Creation Failed';

	}
	$this->output->set_output(json_encode($userJson));	
	}

	// user login 

    public function logIn(){
	if(!empty($this->input->post('userMail'))
	&& !empty($this->input->post('userPass')))
	{
	$userMail = $this->input->post('userMail');
	$userPass = $this->input->post('userPass');
	//load user model
	$result = $this->User_Model->loginUser($userMail,$userPass);
	$userJson['message'] = $result;
	$this->output->set_output(json_encode($userJson));
	}
	else {
		$userJson['message'] = $result;

	$userJson['success'] = '';
	$userJson['error'] = 'please Enter Valid Details';
	$this->output->set_output(json_encode($userJson));	

	}
	}	

}
?>