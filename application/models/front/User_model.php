<?php 
class User_model extends CI_Model {
	public function Login_user($login_data){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("email",$login_data["email"]);
		$this->db->limit("1");
		$query=$this->db->get();
		$result=$query->row_array();

		if(! $this->session->has_userdata('id')){
			return "De email is onjuist.";
		}
	}
}
