<?php

class Crud_model extends CI_Model{
    
    public function do_insert($dados=NULL) {
        if ($dados!=NULL){
            $this->db->insert('compromisso',$dados);
            $this->session->set_flashdata('cadastrook','cadastro realizado com sucesso');
            redirect('controller_comp');
        }
    }
     public function insertCompReal($compreal=NULL) {
        if ($compreal!=NULL){
            $this->db->insert('compromisso_realizado',$compreal);
            $this->session->set_flashdata('cadastrook','cadastro realizado com sucesso');
            redirect('controller_comp');
        }
    }
    
    public function do_update($dados=NULL,$condicao=NULL) {
        if ($dados!=NULL && $condicao!=NULL){
            $this->db->update('compromisso',$dados,$condicao);
            $this->session->set_flashdata('edicaook','edição realizada com sucesso');
            
        }
    }
    
       
    public function get_all() {
        
        return $this->db->get('crianca');
    }
    public function get_all_cuidados() {
        
        return $this->db->get('cuidado');
    }
    
      public function get_all_compromissos() {
        
        return $this->db->get('compromisso');
    }
    
    public function get_all_cuidadores() {
        
        $this->db->where('funcao','cuidador');
        return $this->db->get('funcionario');
    }
    
    public function get_byid($id=NULL) {
        if($id!=NULL){
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('compromisso');
        }else{
            return FALSE;
        }
    }
    public function get_nomecri($id){
        if($id!=NULL){
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('crianca');
        }else{
            return FALSE;
        }
    }
    public function get_nomecuid($id){
         if($id!=NULL){
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('cuidado');
        }else{
            return FALSE;
        }
    }
}

