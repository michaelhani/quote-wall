<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function index()
	{
		redirect("/users/destroy");
	}

	public function register($post)
	{
		$birthdate=$post['year'].'-'.$post['month'].'-'.$post['day'];
		$query="INSERT INTO users(name,alias,email,password,birthdate,created_at,updated_at)
				VALUES(?,?,?,?,?,now(),now())";
		$values=array($post['name'],$post['alias'],$post['email'],$post['password'],$birthdate);
		return $this->db->query($query,$values);
	}

	public function login($post)
	{
		$query="SELECT id FROM users WHERE email=? AND password=?";
		$values=array($post['email'],$post['password']);
		$id=$this->db->query($query,$values)->row_array();
		if(empty($id))
		{
			$this->session->set_flashdata('errors', 'Login is invalid');
			redirect('/');
		}
		else
		{	
			$this->session->set_userdata("id", $id['id']);
			redirect('/quotes');
		}
	}

}
?>
