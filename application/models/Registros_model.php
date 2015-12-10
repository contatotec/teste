<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros_Model extends CI_Model {
     
    public function cadastrar(){
         
        // Inserção dos dados
        $this->db->insert('produtos', array(
            'descricao' => $this->input->post('descricao', TRUE),
            'valor' => $this->input->post('valor', TRUE),
            'data' => date('Y-m-d H:i:s'),             
        )); 
    }


    public function getProdutosEdicao() {
    	$query = $this->db->get('produtos');
    	return $query->result();
    }

    
}