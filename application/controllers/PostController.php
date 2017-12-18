<?php

/**
 * Created by PhpStorm.
 * User: Thisun Pathirage
 * Date: 12/16/2017
 * Time: 3:04 PM
 */
class PostController extends CI_Controller
{
    public function addPost()
    {
        $data=array(
            'user_id' => 1,
            'title' => $this->input->post('title',TRUE),
            'location' => $this->input->post('location',TRUE),
            'category' => $this->input->post('category',TRUE),
            'quantity' => $this->input->post('quantity',TRUE),
            'mobile_number' => $this->input->post('mobilenumber',TRUE),
            'description' => $this->input->post('description',TRUE),
        );

        $this->load->model('PostModel');
        $response = $this->PostModel->insertPost($data);

        if($response){
            $this->session->set_flashdata('msg','Posted Successfully');
            redirect('Home');
        }
        else{
            $this->session->set_flashdata('msg','Something went wrong');
            redirect('Home');
        }
    }
}