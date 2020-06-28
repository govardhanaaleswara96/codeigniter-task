<?php
class Admin extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Book_Model');
    $this->load->model('User_Model');
}
	// create Books 
	public function create(){
        if(!empty($this->input->post('name'))
        && !empty($this->input->post('price'))
        && !empty($this->input->post('userId')))
        {
        $bookName = $this->input->post('name');
        $bookPrice = $this->input->post('price');
        $userId = $this->input->post('userId');
        $data = array(
            'name' => $bookName,
            'price' => $bookPrice,
            ); 
        // check admin or not based on userLevel from session we get user data
        // load user model
        $userLevel = $this->User_Model->checkAdminOrNot($userId);
        $checkUser = $userLevel[0]['userLevel'];
        if($checkUser == '1') {  // check user level 
        //load books model
        $result = $this->Book_Model->createBook($data);
        $bookJson['message'] = 'Book Created Successfully';
        $this->output->set_output(json_encode($bookJson));
        }
        else{
            $bookJson['message'] = 'Admin Only Have Access TO Create Books';
            $this->output->set_output(json_encode($bookJson));
        }
        }
        else {
        $bookJson['message'] = 'please Enter Valid Details';
        $this->output->set_output(json_encode($bookJson));	
        }
    }	

    // view books
    public function view(){
        //load books model
        $result = $this->Book_Model->getBooks();
        if($result !== '') {
            $bookJson['Books'] = $result;
            $this->output->set_output(json_encode($bookJson));	
        }
        else{
            $bookJson['message'] = "No Books Found";
            $this->output->set_output(json_encode($bookJson));	

        }
    }   

    // edit books
    public function edit(){
        if(!empty($this->input->post('name'))
        && !empty($this->input->post('price'))
        && !empty($this->input->post('bookId'))
        && !empty($this->input->post('userId')))
        {
        $bookName = $this->input->post('name');
        $bookPrice = $this->input->post('price');
        $userId = $this->input->post('userId');
        $bookId = $this->input->post('bookId');
        $data = array(
            'name' => $bookName,
            'price' => $bookPrice,
            ); 
        // check admin or not based on userLevel from session we get user data
        // load user model
        $userLevel = $this->User_Model->checkAdminOrNot($userId);
        $checkUser = $userLevel[0]['userLevel'];
        if($checkUser == '1') {
        //load books model
        $result = $this->Book_Model->editBook($bookId,$data);
        $bookJson['message'] = 'Book Updated Successfully';
        $this->output->set_output(json_encode($bookJson));
        }
        else{
        $bookJson['message'] = 'Admin Only Have Access TO Edit Books';
        $this->output->set_output(json_encode($bookJson));
        }
        }
        else {
        $bookJson['message'] = 'please Enter Valid Details';
        $this->output->set_output(json_encode($bookJson));	
    
        }
    } 

    // delete books
    public function delete(){
        if(!empty($this->input->post('bookId'))
        && !empty($this->input->post('userId')))
        {
        $bookId = $this->input->post('bookId');
        $userId = $this->input->post('userId');
        // check admin or not based on userLevel from session we get user data
        // load user model
        $userLevel = $this->User_Model->checkAdminOrNot($userId);
        $checkUser = $userLevel[0]['userLevel'];
        if($checkUser == '1') {
        //load books model
        $result = $this->Book_Model->deleteBook($bookId);
        $bookJson['message'] = 'Book Deleted Successfully';
        $this->output->set_output(json_encode($bookJson));
        }
        else{
        $bookJson['message'] = 'Admin Only Have Access TO Edit Books';
        $this->output->set_output(json_encode($bookJson));
        }
        }
        else {
        $bookJson['message'] = 'please Enter Valid Details';
        $this->output->set_output(json_encode($bookJson));	
    
        }
    } 	
}
?>