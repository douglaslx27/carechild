
<h4 align="center">CRIAR COMPROMISSO</h4>
<table align="center" >
    <?php echo form_open('controller_comp/create')?>
    <?php echo validation_errors('<p>','</p>');
          if ($this->session->flashdata('cadastrook')){
                echo $this->session->flashdata('cadastrook');
          }
          $cont=1;
          $nomes=array();
          foreach ($criancas as $us){
             $nomes[$cont++] = $us->nome;
          }
              
          $cont2=1;    
          $cuida=array();
          foreach ($cuidados as $c){
            $cuida[$cont2++] = $c->nome;
          } 
          
          $vezes=array(
            'uma vez' => 'uma vez',
            'indeterminado' => 'indeterminado',
          );
          
          $frec=array(
                '8 hour' => '08 horas',
                '6 hour' => '06 horas',
                '3 hour' => '03 horas',
                '12 hour' => '12 horas',
                '24 hour' => '24 horas'
          );
          
          $enc=array(
                'nao' => 'nao',
          );
    ?>
    
    <tr>
        <td><?php echo form_label('Crianca');?></td>
        <td><?php echo form_dropdown('crianca_fk',$nomes);?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Cuidado');?></td>
        <td><?php echo form_dropdown('cuidado_fk',$cuida);?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Quantidade de vezes');?></td>
        <td><?php echo form_dropdown('qtd_vezes',$vezes);?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Intervalo');?></td>
        <td><?php echo form_dropdown('frequencia',$frec);?></td>
    </tr>
     <tr>
        <td><?php echo form_label('Encerrado');?></td>
        <td><?php echo form_dropdown('encerrado',$enc);?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Hora de Inicio');?></td>
        <td><?php echo form_input(array('name'=>'hora_inicio'),set_value('hora_inicio'));?></td>
    </tr>    
    <tr>
        <td align="center" colspan="2"><?php echo form_submit(array('name'=>'criar'),'Criar');?></td>
    </tr>
    
   <?php echo form_close();?>
    
</table>