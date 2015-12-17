<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function index()
	{
		$favorites=$this->favorite->fetch_favorites();
		$info = array('quotes' => $this->quote->fetch_quotes(),
						'user'=>$this->quote->fetch_user($this->session->userdata('id')),
						'favorites'=>$favorites);
		$this->load->view('home.php', $info);
	}

	public function new_quote()
	{
		$this->quote->post_quote($this->input->post());
		redirect("/quotes");
	}

	public function add_favorite()
	{
		var_dump($this->input->post());
		die();
	}
}
?>