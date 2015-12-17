<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	public function index()
	{
		redirect("/users/destroy");
	}

	public function fetch_user($id)
	{
		$query="SELECT * FROM users WHERE id=?";
		return $this->db->query($query,$id)->row_array();
	}

	public function post_quote($post)
	{
		$query="INSERT INTO quotes(author,content,user_id,created_at,updated_at)
				VALUES(?,?,?,now(),now())";
		$values=array($post['author'],$post['content'],$post['id']);
		return $this->db->query($query,$values);
	}

	public function fetch_quotes()
	{
		$query="SELECT quotes.author, quotes.id, quotes.content, users.alias FROM quotes
				JOIN users WHERE users.id=quotes.user_id";
		return $this->db->query($query)->result_array();
	}

}
?>