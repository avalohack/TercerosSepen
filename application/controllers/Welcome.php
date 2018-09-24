<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
	  $this->load->helper("url");
		$this->load->helper("directory"); //carga el helper directory
		$data["archgivos"]=directory_map("./terceros/", 1);
    $this->load->view('grid',$data);
		// $this->load->view('welcome_message',$data);
		// $this->load->view('ejemplos',$data);
	}



	public function b($sub)
	{
		$this->load->helper("url");
		$data["sub"] = $sub;
		$this->load->helper("directory"); //carga el helper directory
	  $data["archgivos"]=directory_map("./terceros/$sub", 1);
		$this->load->view('grid',$data);
		// $this->load->view('welcome_message',$data);
		// $this->load->view('ejemplos',$data);

	}

	public function q($sub, $quin)
	{

		$this->load->helper("url");
		$this->load->helper("directory"); //carga el helper directory
	  $data["archgivos"]=directory_map("./terceros/$sub/$quin", 1);
		$data["sub"] = $sub;
		$data["quin"] = $quin;
		$this->load->view('grid',$data);
		// $this->load->view('welcome_message',$data);
		// $this->load->view('ejemplos',$data);

	}




}
?>
