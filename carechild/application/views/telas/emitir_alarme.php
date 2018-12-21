<meta http-equiv="refresh" content="50">

<table align="center" >
    <?php
        
        $query= $this->crud_model->get_byid($id)->row();
        $cri= $this->crud_model->get_nomecri($query->crianca_fk)->row();
        $cuid= $this->crud_model->get_nomecuid($query->cuidado_fk)->row();
        
        $cont=1;
        $nomes=array();
        foreach ($cuidador as $cuid){
          $nomes[$cont++] = $cuid->nome;
        }
        
        echo form_open("controller_comp/update/$id");
        echo validation_errors('<p>','</p>');
        
        if ($this->session->flashdata('edicaook')){
           echo $this->session->flashdata('edicaook');
        }
    ?>
    <tr>
        <td><?php echo form_label('CRIANÇA'); echo form_hidden('compromisso_fk',$query->id);?></td>
        <td><?php echo form_input(array('name'=>'crianca_fk'),set_value('crianca_fk',$cri->nome),'disabled="disabled"');?></td>
    </tr>
    <tr>
        <td><?php echo form_label('CUIDADO');?></td>
        <td><?php echo form_input(array('name'=>'cuidado_fk'),set_value('cuidado_fk',$cuid->nome),'disabled="disabled"');?></td>
        <td><?php echo form_hidden('encerrado','sim');?></td>
    </tr> 
    <tr>
        <td><?php echo form_label('CUIDADOR');?></td>
        <td><?php echo form_dropdown('funcionario_fk',$nomes); echo form_hidden('hr_realizacao',date('H:i:s'));?></td>
    </tr>
    <tr>
        <td align="center" colspan="2"><?php echo form_submit(array('name'=>'cadastrar'),'Encerrar');?></td>
    </tr>
    
   <?php echo form_close();?>
</table>