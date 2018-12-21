<table align="center" >
    <?php
    
        $iduser = $this->uri->segment(3);
        if($iduser==NULL){
            redirect('crud/retrieve');
        }
        
        $query= $this->crud_model->get_byid($iduser)->row();
        
        echo form_open("crud/delete/$iduser");
        
    ?>
    <tr>
        <td><?php echo form_label('Nome completo');?></td>
        <td><?php echo form_input(array('name' => 'nome'),set_value('nome',$query->nome),'disabled="disabled"');?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Email');?></td>
        <td><?php echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"');?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Login');?> </td>
        <td><?php echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"');?></td>
    </tr>    
    <tr>
        <td align="center" colspan="2"><?php echo form_submit(array('name'=>'cadastrar'),'Ecluir Dados');?></td>
        
    </tr>
     <?php echo form_hidden('idusuario',$query->id);?>
    
   <?php echo form_close();?>
</table>