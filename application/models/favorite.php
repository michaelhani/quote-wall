<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorite extends CI_Model {

	public function index()
	{
		redirect("/users/destroy");
	}



	public function add_favorite($post)
	{
		$query="INSERT INTO favorites(user_id,quote_id,created_at,updated_at)
				VALUES(?,?,now(),now())";
		$values=array($post['user_id'], $post['quote_id']);
		return $this->db->query($query,$values);
		
	}

	public function fetch_favorites()
	{
		$query="SELECT quotes.author, quotes.content, poster.alias AS poster, quotes.id, favorites.id FROM users
			JOIN favorites ON users.id=favorites.user_id
			JOIN quotes ON favorites.quote_id=quotes.id
            JOIN users AS poster ON quotes.user_id = poster.id
			WHERE users.id=? ";
		$values=$this->session->userdata('id');
		return $this->db->query($query,$values)->result_array();
	}

	public function remove_favorite($id)
	{
		$query="DELETE FROM favorites WHERE id=?";
		return $this->db->query($query, $id);
	}

}
?>