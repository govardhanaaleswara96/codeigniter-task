<?php
class Subscribe_Model extends CI_Model 
{
 // subscribe book
 public function subscribeToBook($data){
    $this->db->insert('subscribe', $data);
  }
 public function subscribeCount(){
  $this->db->from('subscribe');
  $query = $this->db->get();
  $rowcount = $query->num_rows();
  return $rowcount;
 } 
 public function booksCount(){
  $this->db->from('books');
  $query = $this->db->get();
  $rowcount = $query->num_rows();
  return $rowcount;
 } 
 public function subscribeDetails(){
  $SQL ="SELECT * FROM subscribe LEFT JOIN books ON books.id = subscribe.bookId LEFT JOIN users ON users.id = subscribe.userId";
  $query = $this->db->query($SQL);
  return $query->result();

 }
}