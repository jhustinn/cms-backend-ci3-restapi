<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategory($id = NULL)
    {

        if ($id === null) {
            $this->db->from('kategori');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('kategori', ['id_kategori' => $id])->result_array();
        }
        // return $this->db->get('konten')->result_array();

    }

}