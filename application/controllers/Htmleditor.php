<?php
/*
	CoderzWar
	Author : Atiab Jobayer <atiab@coderzwar.com>
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Htmleditor extends CI_Controller
{
    public function index(){
        $this->twig->display('pages/htmleditor.twig', array());
    }

}

?>
