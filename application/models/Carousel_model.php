<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarousel($id = NULL)
    {

        if ($id === null) {
            return $this->db->get('carousel')->result_array();
        } else {
            return $this->db->get_where('carousel', ['id_carousel' => $id])->result_array();
        }
        // return $this->db->get('konten')->result_array();

    }

    // public function getContentByCategory()
    // {

    //     return $this->db->get('kategori')->result_array();


    // }

}