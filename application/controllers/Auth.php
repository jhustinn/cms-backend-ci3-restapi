<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('email')) {

            $user_data = $this->session->userdata('role_id');

            if ($user_data == 1) {
                redirect('admin');
            } else {
                redirect('auth');
            }


        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
            // $this->_gauth();
        } else {
            // Validation success
            $this->_login();

        }
    }

    public function fogotPasswordModal()
    {
        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'modal Fetch Successfully',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed!'
            ];
            echo json_encode($res);
        }
    }

    public function verifyEmail()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (6 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    // $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type, $email)
    {

        $this->load->library('email');
        // $name = $this->input->post("fname");
        // $cemail = $this->input->post("email");
        // $pno = $this->input->post("phone");
        // $message = $this->input->post("message");
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'cmssaya@gmail.com';
        $config['smtp_pass'] = 'gbgj ujlo ecbh vpwr';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = FALSE;

        $this->email->initialize($config);
        $this->email->from('CMS Saya', 'Admin');
        $this->email->to($email);

        // $this->email->subject('Account Verification');
        // $this->email->message('Account Verification');
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('
            <html>
            <body>
            <div style="max-width: 320px;
            border-width: 1px;
            border-color: rgba(219, 234, 254, 1);
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, 1);
            padding: 1rem;">
            <div style="display: flex;
            align-items: center;
            grid-gap: 1rem;
            gap: 1rem;">
              <p style="font-weight: 600;
              color: rgba(107, 114, 128, 1);">Reset Your Password!</p>
            </div>
          
            <p style="margin-top: 1rem;
            color: rgba(107, 114, 128, 1);">
              Click This Button to Verify your email! dont send this email to anyone.
            </p>
          
            <div style="margin-top: 1.5rem;">
              <a style="text-decoration: none;display: inline-block;
              border-radius: 0.5rem;
              width: 100%;
              padding: 0.75rem 1.25rem;
              text-align: center;
              font-size: 0.875rem;
              line-height: 1.25rem;
              font-weight: 600;background-color: rgba(59, 130, 246, 1);
              color: rgba(255, 255, 255, 1);" href="' . base_url() . 'auth/verifyEmail?email=' . $email . '&token=' . urlencode($token) . '">
              Verify Email
            </a>
          </div>
        </div>
        </body>
        </html>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('
            <html>
            <body>
            <div style="max-width: 320px;
            border-width: 1px;
            border-color: rgba(219, 234, 254, 1);
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, 1);
            padding: 1rem;">
            <div style="display: flex;
            align-items: center;
            grid-gap: 1rem;
            gap: 1rem;">
              <p style="font-weight: 600;
              color: rgba(107, 114, 128, 1);">Reset Your Password!</p>
            </div>
          
            <p style="margin-top: 1rem;
            color: rgba(107, 114, 128, 1);">
              Click This Button to reset your password! dont send this email to anyone.
            </p>
          
            <div style="margin-top: 1.5rem;">
              <a style="text-decoration: none;display: inline-block;
              border-radius: 0.5rem;
              width: 100%;
              padding: 0.75rem 1.25rem;
              text-align: center;
              font-size: 0.875rem;
              line-height: 1.25rem;
              font-weight: 600;background-color: rgba(59, 130, 246, 1);
              color: rgba(255, 255, 255, 1);" href="' . base_url() . 'auth/resetPassword?email=' . $email . '&token=' . urlencode($token) . '">
              Reset Password
            </a>
          </div>
        </div>
        </body>
        </html>');
        }
        $send = $this->email->send();
        if ($send) {
            // echo json_encode("send");
            return true;
        } else {
            $error = $this->email->print_debugger(array('headers'));
            echo json_encode($error);
            die;
        }

    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya Ada
        if ($user) {

            if ($user['is_active'] == 1) {
                // Cek password
                if (password_verify($password, $user['password'])) {

                    if ($user['role_id'] == 1 || $user['role_id'] == 2) {
                        $this->db->where('email', $user['email']);
                        $this->db->update('user', ['recent_login' => date('Y-m-d H:i:s')]);
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        $res = [
                            'status' => 200,
                        ];
                        echo json_encode($res);
                    } else {
                        $res = [
                            'status' => 404,
                        ];
                        echo json_encode($res);
                    }
                } else {
                    $res = [
                        'status' => 402,
                        'message' => 'Wrong Password!'
                    ];
                    echo json_encode($res);
                }
            } else {
                $res = [
                    'status' => 422,
                    'data' => $user
                ];
                echo json_encode($res);
            }
        } else {
            $res = [
                'status' => 500,
                'message' => 'User Not Registered!',
            ];
            echo json_encode($res);
        }
    }

    public function sendEmail()
    {
        if ($this->input->is_ajax_request()) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify', $this->input->post('email'));
            $res = [
                'status' => 200,
                'message' => 'Email has sended, please check your email to activate.',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 422,
                'message' => 'Email not found!'
            ];
            echo json_encode($res);
        }

    }

    public function logoutModal()
    {
        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'modal Fetch Successfully',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed!'
            ];
            echo json_encode($res);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'You have been logout!',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed to logout!'
            ];
            echo json_encode($res);
        }
        // redirect('auth');
    }

    public function forgotPassword()
    {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email'),
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot', $this->input->post('email'));
                $res = [
                    'status' => 200,
                    'message' => 'Email has sended, please check your email reset your password.',
                ];
                echo json_encode($res);

            } else {
                $res = [
                    'status' => 422,
                    'message' => 'Email not found!'
                ];
                echo json_encode($res);
            }
        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed!'
            ];
            echo json_encode($res);
        }



    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('auth/change-password', $data);
            $this->load->view('template/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $data['title'] = "Blocked!";
        $this->load->view('auth/blocked', $data);
    }

}