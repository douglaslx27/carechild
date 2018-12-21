<?php

echo '<h2>LISTA DE COMPROMISSOS</h2>';
 if ($this->session->flashdata('exclusaook')){
           echo $this->session->flashdata('exclusaook');
 }

$this->table->set_heading('ID','CRIANCA','CUIDADO');
foreach ($compromissos as $linha) {
    
    $this->table->add_row($linha->id,$linha->crianca_fk,$linha->cuidado_fk);
           /* anchor("crud/update/$linha->id",'Editar').'-'.anchor("crud/delete/$linha->id",'Delete'));*/
    
}
echo $this->table->generate();