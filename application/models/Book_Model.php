<?php
class Book_Model extends CI_Model 
{
    // create book via admin 
   public function createBook($data){
    $this->db->insert('books', $data);
   }   
   // get all books 
   public function getBooks(){
    $this->db->select('name,price'); 
	$this->db->from('books');
	$query = $this->db->get();
	$result = $query->result_array();
	return $result;
   }  
   // edit books
   public function editBook($id,$data)
   {
    $this->db->where('id',$id);
    $result =  $this->db->update('books', $data);
    return $result;
   }
      // edit books
   public function deleteBook($id)
    {
    $this->db->where('id', $id);
    $result = $this->db->delete('books'); 
    return $result;
    }
}