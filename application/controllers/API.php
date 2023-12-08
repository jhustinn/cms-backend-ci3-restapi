<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class API extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model', 'konten');
        $this->load->model('User_model', 'user');
        $this->load->model('Saran_model', 'saran');
        $this->load->model('Category_model', 'category');
        $this->load->model('Carousel_model', 'carousel');
        $this->load->model('Config_model', 'configu');
        $this->load->model('Gallery_model', 'gallery');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    public function index_get($type)
    {
        switch ($type) {
            case "konten":
                $id = $this->get('id');

                if ($id === null) {
                    $konten = $this->konten->getContent();
                } else {
                    $konten = $this->konten->getContent($id);
                }

                if ($konten) {
                    $this->response(
                        $konten,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'id not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;
            case "user":
                $id = $this->get('id');

                if ($id === null) {
                    $user = $this->user->getUsers();
                } else {
                    $user = $this->user->get_user_by_id($id);
                }

                if ($user) {
                    $this->response(
                        $user,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'id not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;
            case "category":
                $id = $this->get('id');

                if ($id === null) {
                    $category = $this->category->getCategory();
                } else {
                    $category = $this->category->get_categoryCategory($id);
                }

                if ($category) {
                    $this->response(
                        $category,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'id not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;
            case "carousel":
                $id = $this->get('id');

                if ($id === null) {
                    $carousel = $this->carousel->getCarousel();
                } else {
                    $carousel = $this->carousel->getCarousel($id);
                }

                if ($carousel) {
                    $this->response(
                        $carousel,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'id not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;

            // Gallery


            case "gallery":
                $id = $this->get('id');

                if ($id === null) {
                    $gallery = $this->gallery->getGallery();
                } else {
                    $gallery = $this->gallery->getGallery($id);
                }

                if ($gallery) {
                    $this->response(
                        $gallery
                        ,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'id not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;

            // End Gallery

            case "config":

                $config = $this->configu->getConfiguration();

                if ($config) {
                    $this->response(
                        $config,
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'config not found'
                    ], RestController::HTTP_NOT_FOUND);
                }
                break;

            // End Config
        }
    }


    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'profide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->konten->deleteContent($id) > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'data' => $id,
                    'message' => 'deleted.'
                ], RestController::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {

        $data = [
            'isi_saran' => $this->post('isi_saran'),
            'tanggal' => date('Y-m-d H:i:s'),
            'name' => $this->post('name'),
            'email' => $this->post('email'),
        ];
        // var_dump($data);
        // die;
        if ($this->saran->insertSaran($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Your feedback has been sended!'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to send feedback!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id_content' => $this->post('id_content'),
            'title' => $this->post('title'),
            'category' => $this->post('category'),
            'description' => $this->post('description'),
        ];
        if ($this->content->updateContent($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data content has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update content!.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}