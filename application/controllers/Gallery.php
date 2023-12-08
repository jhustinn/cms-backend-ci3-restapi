<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Activity_model', 'activity');

        // isAdmin();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        // Tambah User
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        $data['category'] = $this->db->get('kategori')->result_array();
        $this->db->from('galeri a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $data['gallery'] = $this->db->get()->result_array();
        $this->db->where('email !=', $this->session->userdata('email'));
        $data['user'] = $this->db->get('user')->result_array();
        $data['title'] = "Gallery";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/top_bar', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('template/footer');
    }

    public function addPhotoModal()
    {
        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'Modal Fetch Successfully',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed'
            ];
            echo json_encode($res);
        }
    }


    public function addPhoto()
    {
        if ($this->input->is_ajax_request()) {
            date_default_timezone_set("Asia/Jakarta");
            $namaFoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = 'assets/images/galeri/';
            $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $namaFoto;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['size'] >= 500 * 1024) {
                $res = [
                    'status' => 422,
                    'message' => 'File size is too big!',
                ];
            } elseif (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
            } else {
                $data = array('upload_data' => $this->upload->data());
            }


            $user = $this->user->get_user_by_email($this->session->userdata('email'));
            $data = [
                'judul' => $this->input->post('judul'),
                'foto' => $namaFoto,
                'id_kategori' => $this->input->post('kategori'),
                'tanggal' => date('Y:m:d'),
                'username' => $user['name'],
            ];

            $this->activity->insert('galeri', 'Menambahkan data konten dengan judul : ' . $this->input->post('judul'), '', $this->input->post('judul'), date('Y-m-d H:i:s'), $user['name']);

            $this->db->from('galeri');
            $this->db->where('judul', $this->input->post('judul'));
            $cek = $this->db->get()->result_array();

            if ($cek <> NULL) {
                $res = [
                    'status' => 422,
                    'message' => 'Title elready exist!',
                ];
            } else {
                $query = $this->db->insert('galeri', $data);
                $this->upload->do_upload('foto');
                if ($query) {

                    $res = [
                        'status' => 200,
                        'message' => 'Photo added!'
                    ];
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to add photo!.'
                    ];
                }
            }
            echo json_encode($res);
        }
    }


    // Edit User Modal
    public function editPhotoModal($id)
    {
        if ($this->input->is_ajax_request()) {

            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('galeri', ['foto' => $id], 1);

            if ($query->num_rows() == 1) {

                $content = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Photo Fetch Successfully',
                    'data' => $content
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Photo ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }

    // Edit User
    public function editPhoto()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id_edit_image');
            // $id_konten = $this->input->post('id_edit_content');

            $title = $this->input->post('edit_title');
            $category = $this->input->post('edit_category');

            $upload_image = $_FILES['editImage']['name'];

            if ($upload_image) {
                date_default_timezone_set("Asia/Jakarta");
                $namaFoto = date('YmdHis') . '.jpg';
                $config['upload_path'] = 'assets/images/galeri/';
                $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $namaFoto;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('editImage')) {
                    $new_image = $namaFoto;
                    $filename = FCPATH . '/assets/images/galeri/' . $id;
                    if (file_exists($filename)) {
                        unlink("./assets/images/galeri/" . $id);
                    }
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $update_data = [
                'judul' => $title,
                'foto' => $namaFoto,
                'id_kategori' => $category,
            ];


            $this->db->where('foto', $id);
            $query = $this->db->update('galeri', $update_data);



            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Photo edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit photo!.'
                ];
            }
            echo json_encode($res);
        }
    }


    public function deletePhotoModal($id)
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('galeri', ['foto' => $id]);

            if ($query->num_rows() == 1) {
                $content = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Gallery Fetch Successfully',
                    'data' => $content
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Photo ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }
    public function deletePhoto()
    {
        if ($this->input->is_ajax_request()) {
            $user = $this->user->get_user_by_email($this->session->userdata('email'));
            $id = $this->input->post('id');
            // $filename = FCPATH . '/assets/images/konten/' . $id;
            // if (file_exists($filename)) {
            unlink("./assets/images/galeri/" . $id);
            // }

            $query = $this->db->get_where('galeri', ['foto' => $id]);
            if ($query->num_rows() > 0) {
                $row = $query->row(); // Get the first row
                $judul_value = $row->judul; // Access the 'judul' property

                $this->activity->insert('galeri', 'Menghapus data galeri dengan judul : ' . $judul_value, $judul_value, '', date('Y-m-d H:i:s'), $user['name']);

            } else {
                echo 'Failed!';
            }




            $this->db->where('foto', $id);
            $query = $this->db->delete('galeri');



            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Photo deleted!.'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to delete photo!.'
                ];
            }

            echo json_encode($res);
        }
    }
}