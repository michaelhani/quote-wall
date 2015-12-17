<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function new_user()
	{
		//form validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required|is_unique[users.alias]|max_length[12]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('pass_confirm', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run()===false) 
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		else
		{
			$this->user->register($this->input->post());
			$this->session->set_flashdata('sucess', "You have sucessfully registered!");
			redirect("/");
		}
	}

	public function login_user()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run()===false) 
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		}
		else
		{
			$this->user->login($this->input->post());
		}
	}
}

