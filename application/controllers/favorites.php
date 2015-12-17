<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorites extends CI_Controller {

	public function index()
	{
		redirect("/users/destroy");
	}

	public function add_favorite()
	{
		$this->favorite->add_favorite($this->input->post());
		redirect("/quotes");
	}

	public function remove_favorite()
	{
		$this->favorite->remove_favorite($this->input->post("fav_id"));
		redirect("/quotes");
	}
}
?>