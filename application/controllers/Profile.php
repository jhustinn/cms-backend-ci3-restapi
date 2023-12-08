<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Activity_model', 'activity');

        // isAdmin();
        is_logged_in();





        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');



    }

    public function index()
    {
        $data['user'] = $this->db->get('user')->result_array();

        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/top_bar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer');
    }

    public function UserProfile()
    {
        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        // $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        // $this->load->view('template/top_bar', $data);
        $this->load->view('user/editUserProfile', $data);
        // $this->load->view('template/footer');
    }
    public function aboutUserProfile()
    {
        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        // $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        // $this->load->view('template/top_bar', $data);
        $this->load->view('user/aboutUserProfile', $data);
        // $this->load->view('template/footer');
    }

    // Edit User
    public function editUserProfile()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('idImageProfile');
            $id_user = $this->input->post('idProfile');
            $name = $this->input->post('name');



            $upload_image = $_FILES['profileImage']['name'];

            if ($upload_image) {
                date_default_timezone_set("Asia/Jakarta");
                $namaFoto = date('YmdHis') . '.jpg';
                $config['upload_path'] = 'assets/images/profile/';
                $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $namaFoto;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profileImage')) {
                    $new_image = $namaFoto;
                    // $filename = FCPATH . '/assets/images/konten/' . $old_image;
                    $filename = FCPATH . '/assets/images/profile/' . $id;
                    if (file_exists($filename)) {
                        unlink("./assets/images/profile/" . $id);
                    }
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $update_data = [
                'name' => $name,
            ];

            $this->db->where('id', $id_user);
            $query = $this->db->update('user', $update_data);

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Profile edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit profile!.'
                ];
            }
            echo json_encode($res);
        }
    }

    // Change Password
    public function changePassword()
    {


        $data['title'] = 'Change Password';
        $this->load->view('user/changepassword', $data);

    }

    public function changeUserPassword()
    {
        if ($this->input->is_ajax_request()) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $current_password = $this->input->post('old_password');
            $new_password = $this->input->post('password1');
            $cek = $this->input->post('password2');

            if (!password_verify($current_password, $data['user']['password'])) {
                $res = [
                    'status' => 422,
                    'message' => 'Wrong current password!'
                ];
                echo json_encode($res);
            } else {
                if ($new_password != $cek) {

                    $res = [
                        'status' => 423,
                        'message' => 'Password not same!'
                    ];
                    echo json_encode($res);
                } else {
                    if ($current_password == $new_password) {
                        $res = [
                            'status' => 404,
                            'message' => 'New password cannot be the same as your current password!'
                        ];
                        echo json_encode($res);
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('user');

                        $res = [
                            'status' => 200,
                            'message' => 'Password changed!'
                        ];
                        echo json_encode($res);
                    }
                }
            }
        }

    }


}