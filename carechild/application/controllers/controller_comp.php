<?php

Class Controller_comp extends CI_Controller{
    

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('table');
        $this->load->model('crud_model');
    }
    
    
    public function emitir_alarme() {
        $compromissos = $this->crud_model->get_all_compromissos()->result();   
        foreach ($compromissos as $comp){
            $id=$comp->id;
            $hora = $comp->hora_inicio;
            $fec=$comp->frequencia;
            $hora2=date('H:i:s',strtotime('+'. $fec, strtotime($hora)));
            if((date('H:i:s')==$hora2)&&($comp->encerrado == 'nao')){
                $dados = array(
                        'titulo' => 'Crud &raquo; Alarme',
                        'tela' => 'emitir_alarme',
                        'id' => $id,
                        'cuidador'=> $this->crud_model->get_all_cuidadores()->result(),
                );
                 $this->load->view('crud',$dados); 
             }
        }
    }
       
    public function index() {
        
        $dados = array(
            'titulo' => 'Crud com CodeIgniter',
            'tela' => '',
        );
        $this->load->view('crud',$dados);
        $this->emitir_alarme();
    }
        
    public function create() {
         
        $this->form_validation->set_rules('crianca_fk','CRIANCA','required');
        $this->form_validation->set_rules('cuidado_fk','CUIDADO','required');
        $this->form_validation->set_rules('qtd_vezes','QUANTIDADE DE VEZES','required');
        $this->form_validation->set_rules('frequencia','FREQUENCIA','required');
        $this->form_validation->set_rules('hora_inicio','HORA INICIAL','required');
        $this->form_validation->set_rules('encerrado','ENCERRADO','required');
        
        if($this->form_validation->run()==TRUE):
            echo 'OK';
            $dados = elements(array('crianca_fk','cuidado_fk','qtd_vezes','frequencia','hora_inicio','encerrado'),$this->input->post());
            
            $this->crud_model->do_insert($dados);
        endif;

        $dados = array(
           'titulo' => 'Crud &raquo; Create',
           'tela' => 'criarcomp',
           'criancas' => $this->crud_model->get_all()->result(),
           'cuidados' => $this->crud_model->get_all_cuidados()->result(),
        );
        
        $this->load->view('crud',$dados);
    }
    
   public function retrieve() {

        $dados = array(
            'titulo' => 'Crud &raquo; Retrieve',
            'tela' => 'retrieve',
            'criancas' => $this->crud_model->get_all()->result(),
            'cuidados' => $this->crud_model->get_all_cuidados()->result(),
            'compromissos' => $this->crud_model->get_all_compromissos()->result(),
        );
        $this->load->view('crud',$dados);
    }
       
    public function update() {
        
        $this->form_validation->set_rules('encerrado','Encerrado','required');
        $this->form_validation->set_rules('funcionario_fk','CUIDADOR','required');
        $this->form_validation->set_rules('hr_realizacao','HORA','required');
         
        if($this->form_validation->run()==TRUE):
           $dados = elements(array('encerrado'),$this->input->post());
           $this->crud_model->do_update($dados,array('id'=>$this->input->post('compromisso_fk')));
          
           $compreal = elements(array('compromisso_fk','funcionario_fk','hr_realizacao'),$this->input->post());
           
            
           $this->crud_model->insertCompReal($compreal);
        endif;
       
    }
    
   /* 
    public function delete() {
        
        if($this->input->post('idusuario')>0){
            $this->crud_model->do_delete(array('id'=>$this->input->post('idusuario')));
        }
        
        $dados = array(
            'titulo' => 'Crud &raquo; Delete',
            'tela' => 'delete',

        );
        $this->load->view('crud',$dados);
    }
   */ 
}