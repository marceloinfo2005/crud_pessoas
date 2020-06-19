<?php class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['titulo'] = "Hello World";    //crio uma variavel e apelido de titulo com  o valor 'Hello World'
        $data['versao'] = $this->db->version();
        $this->load->view('home_view', $data);
    }
}