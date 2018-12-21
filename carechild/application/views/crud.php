<?php
$this->load->view('includes/header');
$this->load->view('includes/menu');
if($tela=='emitir_alarme'){$this->load->view('telas/emitir_alarme');}
if(($tela!='')&&($tela!='emitir_alarme')){$this->load->view('telas/'.$tela);}
$this->load->view('includes/footer');
