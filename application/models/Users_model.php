<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {
    public function store($user)
    {
        $this->db->insert('tb_users', $user);
    }
}