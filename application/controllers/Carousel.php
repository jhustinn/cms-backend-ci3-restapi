<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Activity_model', 'activity');
        $this->load->model('Content_model', 'content');
        $this->load->model('Carousel_model', 'carousel');
        $this->load->model('User_model', 'user');

    }

    public function index()
    {

        // Tambah User
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        $data['carousel'] = $this->db->get('carousel')->result_array();
        $data['title'] = "Carousel";

        // $this->db->from('konten a');
        // $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        // $data['content'] = $this->db->get()->result_array();



        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/top_bar', $data);
        $this->load->view('carousel/index', $data);
        $this->load->view('template/footer');

    }

    // Add User Modal
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
            $config['upload_path'] = 'assets/images/carousel/';
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
                'id_carousel' => $this->input->post('kategori'),
            ];

            $this->activity->insert('carousel', 'Menambahkan data carousel dengan judul : ' . $this->input->post('judul'), '', $this->input->post('judul'), date('Y-m-d H:i:s'), $user['name']);

            $this->db->from('carousel');
            $this->db->where('judul', $this->input->post('judul'));
            $cek = $this->db->get()->result_array();

            if ($cek <> NULL) {
                $res = [
                    'status' => 422,
                    'message' => 'Title elready exist!',
                ];
            } else {
                $query = $this->db->insert('carousel', $data);
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

            $query = $this->db->get_where('carousel', ['foto' => $id], 1);

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

            $upload_image = $_FILES['editImage']['name'];

            if ($upload_image) {
                date_default_timezone_set("Asia/Jakarta");
                $namaFoto = date('YmdHis') . '.jpg';
                $config['upload_path'] = 'assets/images/carousel/';
                $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $namaFoto;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('editImage')) {
                    $new_image = $namaFoto;
                    $filename = FCPATH . '/assets/images/carousel/' . $id;
                    if (file_exists($filename)) {
                        unlink("./assets/images/carousel/" . $id);
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
            $query = $this->db->update('carousel', $update_data);



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


    public function deletePhoto($id)
    {
        $user = $this->user->get_user_by_email($this->session->userdata('email'));
        // $filename = FCPATH . '/assets/images/konten/' . $id;
        // if (file_exists($filename)) {
        unlink("./assets/images/carousel/" . $id);
        // }

        $query = $this->db->get_where('carousel', ['foto' => $id]);
        if ($query->num_rows() > 0) {
            $row = $query->row(); // Get the first row
            $judul_value = $row->judul; // Access the 'judul' property

            $this->activity->insert('galeri', 'Menghapus data galeri dengan judul : ' . $judul_value, $judul_value, '', date('Y-m-d H:i:s'), $user['name']);

        } else {
            echo 'Failed!';
        }




        $this->db->where('foto', $id);
        $query = $this->db->delete('carousel');



        if ($query) {
            $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Carousel Deleted! </div>
        ');
            redirect('carousel');
        } else {
            $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Failed To Delete Carousel!</div>
        ');
            redirect('carousel');
        }
    }

}