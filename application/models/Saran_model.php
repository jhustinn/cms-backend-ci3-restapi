<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSaran()
    {
        return $this->db->get('saran')->result_array();
    }

    public function insertSaran($data)
    {
        $this->db->insert('saran', $data);
        return $this->db->affected_rows();
    }

    public function deleteAll($id)
    {
        $this->db->where_in('id_saran', $id);
        return $this->db->delete('saran');
    }


}