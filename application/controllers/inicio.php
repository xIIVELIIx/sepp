<?php 
/**
* 
*/
class Inicio extends CI_Controller
{

	public function index(){

		//$this->db->get('ciudad'); 
		$data = $arrayName = array('titulo' => 'SEPP');
		$this->load->view("plantilla/head", $data);
		$this->load->view("plantilla/header");
		$this->load->view("plantilla/nav");
		$this->load->view("plantilla/content");
		$this->load->view("plantilla/footer");

		// print("Hola Mundo");
		//$this->load->view("")
	}

}
?>