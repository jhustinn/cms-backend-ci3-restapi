<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getContent($id = NULL)
    {

        if ($id === null) {
            $this->db->from('konten a');
            $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('konten', ['id_konten' => $id])->result_array();
        }

    }

    public function deleteContent($id)
    {
        $this->db->delete('konten', ['id_konten' => $id]);
        return $this->db->affected_rows();
    }

    public function createContent($data)
    {
        $this->db->insert('konten', $data);
        return $this->db->affected_rows();
    }

    public function updateContent($data, $id)
    {
        $this->db->update('konten', $data, ['id_konten' => $id]);
        return $this->db->affected_rows();
    }

    public function getContentFotoId($id)
    {

        return $this->db->get_where('konten', ['foto' => $id])->result_array();

    }

}