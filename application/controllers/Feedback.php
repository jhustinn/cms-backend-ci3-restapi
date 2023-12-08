<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Saran_model', 'saran');

        // isAdmin();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');
        $admin = $this->user->get_user_by_email($this->session->userdata('email'));

        if ($admin['role_id'] != 1) {
            redirect('blocked');
        }

    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]', [
            'is_unique' => '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
            Email Used!
            </div>'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Tambah User
        $data['feedback'] = $this->saran->getSaran();
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        $this->db->where('email !=', $this->session->userdata('email'));
        $data['user'] = $this->db->get('user')->result_array();
        $data['title'] = "Feedback";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/top_bar', $data);
        $this->load->view('saran/index', $data);
        $this->load->view('template/footer');

    }

    public function deleteAllModal()
    {
        if ($this->input->is_ajax_request()) {
            if (!empty($this->input->post('checkbox_value'))) {
                // $check_id = [];
                $id = $this->input->post('checkbox_value');
                // foreach ($id as $i) {
                //     return array_push($check_id, $i);
                // }
                $res = [
                    'status' => 200,
                    'data' => $id
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 402,
                    'message' => 'Please select atleast 1 data!'
                ];
                echo json_encode($res);
            }
        } else {
            $res = [
                'status' => 422,
                'message' => 'Data not found!'
            ];
            echo json_encode($res);
        }
    }

    public function deleteAll()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            $this->saran->deleteAll($id);
            $res = [
                'status' => 200,
                'message' => 'Feedback has been deleted!',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed to delete feedback!'
            ];
            echo json_encode($res);
        }
    }

}