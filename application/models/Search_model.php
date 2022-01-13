<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_Model extends CI_Model {
    public function search($text){
        if(empty($text)){
            return array();
        }

        $text = $this->input->post("busca");
        $this->db->like("name", $text);
        return $this->db->get("tb_games")->result_array();
    }
}