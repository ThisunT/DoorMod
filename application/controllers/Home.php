<?php
defined('BASEPATH') or exit();
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('PostModel');
        $data['query'] = $this->PostModel->viewAll();
        $this->load->view('home', $data);
    }

    public function search()
    {
        if (isset($_POST)){
            $column=$_POST['searchId'];
            $value=$_POST['searchValue'];
        }
        if($value==null){
            $this->index();
        }
        else if($column=="*" and $value!=null){
            $data['query'] = null;
            $this->load->view('home', $data);
        }
        else{
            $this->load->model('PostModel');
            $data['query'] = $this->PostModel->viewSpecific($column,$value);
            $this->load->view('home', $data);
        }
    }

    public function friends()
    {
        $this->load->view('friends');
    }

    public function messages()
    {
        $this->load->view('messages');
    }

    public function notifications()
    {
        $this->load->view('notifications');
    }

    public function post()
    {
        $this->load->view('post');
    }
}
