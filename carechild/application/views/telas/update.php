<table align="center" >
    <?php
    
        $iduser = $this->uri->segment(3);
        if($iduser==NULL){
            redirect('crud/retrieve');
        }
        
        $query= $this->crud_model->get_byid($iduser)->row();
        
        echo form_open("crud/update/$iduser");
        echo validation_errors('<p>','</p>');
        
        if ($this->session->flashdata('edicaook')){
           echo $this->session->flashdata('edicaook');
        }
    ?>
    <tr>
        <td><?php echo form_label('Nome completo');?></td>
        <td><?php echo form_input(array('name' => 'nome'),set_value('nome',$query->nome),'autofocus');?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Email');?></td>
        <td><?php echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"');?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Login');?></td>
        <td><?php echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"');?></td>
    </tr>    
    <tr>
        <td><?php echo form_label('Senha');?></td>
        <td><?php echo form_password(array('name'=>'senha'),set_value('senha'));?></td>
    </tr>  
     <tr>
        <td><?php echo form_label('Repita a Senha');?></td>
        <td><?php echo form_password(array('name'=>'senha2'),set_value('senha2')); echo form_hidden('idusuario',$query->id  );?></td>
    </tr> 
    <tr>
        <td align="center" colspan="2"><?php echo form_submit(array('name'=>'cadastrar'),'Alterar Dados');?></td>
        
    </tr>
    
   <?php echo form_close();?>
</table>