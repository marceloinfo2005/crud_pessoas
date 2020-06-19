<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Pessoas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Pessoas";
        $this->load->model('pessoas_model');
        $data['pessoas'] = $this->pessoas_model->listar();
        $this->load->view('pessoas', $data);
    }
    function cadastrar() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|min_length[4]|max_length[45]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|max_length[45]'
            )
        );
        $this->form_validation->set_rules($validations);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
     
            $this->load->model('pessoas_model');
            if ($this->pessoas_model->cadastrar($data)) {
                redirect('pessoas');
            } else {
                log_message('error', 'Erro no cadastro...');
            }
        }
    }
    function deletar($id) {
        $this->load->model('pessoas_model');
        if ($this->pessoas_model->deletar($id)) {
            redirect('pessoas');
        } else {
            log_message('error', 'Error ao deletar...');
        }    
    }
    function editar($id) {
        $data['titulo'] = "CRUD com CodeIgniter | Alteraçao de Pessoas";
        $this->load->model('pessoas_model');
        $data['dados_pessoa'] = $this->pessoas_model->editar($id);
        $this->load->view('pessoas_edit', $data);
    }
    function alterar() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $validations = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|min_length[4]|max_length[45]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|min_length[4]|max_length[45]'
            )
        );
        $this->form_validation->set_rules($validations);
        if ($this->form_validation->run() == FALSE) {
            $this->editar($this->input->post('id'));
        } else {
            $data['id'] = $this->input->post('id');
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');

            $this->load->model('pessoas_model');
            if ($this->pessoas_model->alterar($data)) {
        } else { 
            log_message('error', 'Erro na alteraçao....');
          }    
        }
    }
}