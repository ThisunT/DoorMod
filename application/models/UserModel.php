<?php

class UserModel extends CI_Model{

    function insertUser(){

        $data=array(
            'fname'=>$this->input->post('fname',TRUE),
            'lname'=>$this->input->post('lname',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'password'=>$this->input->post('password',TRUE)
//        hash pwd
//            'password'=>sha1($this->input->post('password',TRUE))
        );

        return $this->db->insert('users',$data);
    }

    function loginUser(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $result = $this->db->get('users');

        if($result->num_rows()==1){
            return $result->row(0);
        }
        else{
            return false;
        }
    }
}