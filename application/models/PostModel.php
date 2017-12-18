<?php

/**
 * Created by PhpStorm.
 * User: Thisun Pathirage
 * Date: 12/16/2017
 * Time: 8:16 PM
 */
class PostModel extends CI_Model
{
    function insertPost($data){
        return $this->db->insert('post',$data);
    }

    function viewAll(){
        $query = $this->db->query("SELECT display_name, user_id, title, location, category, quantity, mobile_number, description FROM users,post WHERE users.id=post.user_id");
        return $query->result();
    }

    function viewSpecific($column,$value)
    {
        $query = $this->db->query("SELECT display_name, user_id, title, location, category, quantity, mobile_number, description FROM users,post WHERE users.id=post.user_id AND post.$column='$value'");
        return $query->result();
    }
}