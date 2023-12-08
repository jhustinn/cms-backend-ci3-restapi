<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getGallery($id = NULL)
    {

        if ($id === null) {
            $this->db->from('galeri a');
            $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('konten', ['id_konten' => $id])->result_array();
        }

    }
}