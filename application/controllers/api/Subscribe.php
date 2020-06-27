<?php
class Subscribe extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Subscribe_Model');
	}    
    // subscribe book
    public function index(){
    if(!empty($this->input->post('bookId'))
    && !empty($this->input->post('userId')))
     {
    $bookId = $this->input->post('bookId');
    $userId = $this->input->post('userId');     
    $data = array(
        'userId' => $bookId,
        'bookId' => $userId,
        ); 
    // load subscribe model        
    $this->Subscribe_Model->subscribeToBook($data);
    $bookJson['message'] = 'Book Subscribed';
    $this->output->set_output(json_encode($bookJson));	

    }
    else {
    $bookJson['message'] = 'please Enter Valid Details';
    $this->output->set_output(json_encode($bookJson));	
    }
}
    // get book and subscribe counts
    public function dashboard(){      
       $subCount =  $this->Subscribe_Model->subscribeCount();
       $bookCount =  $this->Subscribe_Model->booksCount();
       $bookJson['book counts'] = $bookCount;
       $bookJson['subscribe counts'] = $subCount;

       $this->output->set_output(json_encode($bookJson));	
    }

    // get UserSubscribeDetails
    public function UserSubscribeDetails(){    
        $userArr = [];  
        $userDetails =  $this->Subscribe_Model->subscribeDetails();
        foreach ($userDetails as $r) {
            $data['user name'] = $r->userName;
            $data['book name'] = $r->name; 
            array_push($userArr,$data);
      
        }
        $this->output->set_output(json_encode($userArr));	

    }
}
?>