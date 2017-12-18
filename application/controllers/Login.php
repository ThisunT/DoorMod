<?php

class Login extends CI_Controller{

    public function LoginUser(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {

            $this->load->model('UserModel');
            $response = $this->UserModel->loginUser();

            if($response != false){

//                            setting session
                $user_data=array(
                    'user_id'=>$response->id,
                    'fname'=>$response->first_name,
                    'lname'=>$response->last_name,
                    'dp'=>$response->display_name,
                    'email'=>$response->email,
                    'loggedin'=>TRUE
                );

                $this->session->set_userdata('userdata',$user_data);

                $this->session->set_flashdata('msg2',"Welcome back!");
                redirect('Home/index');

            }
            else{
                $this->session->set_flashdata('msg1',"Login failed...Wrong email or password");
                redirect('Login/LoginUser');
            }

        }
    }

    public function LogoutUser(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('lname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('dp');
        $this->session->unset_userdata('loggedin');

        redirect('Home/LogIn');
    }

}