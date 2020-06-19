<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Pessoas_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    function cadastrar($data) {
        return $this->db->insert('pessoas', $data);
    }
    function listar() {
        $query = $this->db->get('pessoas');
        return $query->result();
    }
    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('pessoas');
    }
    function editar($id) {
        $this->db->where('id', $id);
        return $this->db->get('pessoas')->result();
    }
    function alterar($data) { 
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('pessoas');
    }
}