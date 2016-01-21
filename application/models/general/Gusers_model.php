<?php
Class Gusers_model extends CI_Model {
	public function Register($data, $sort){
		foreach ($data as $key => $value) {
				if ($value == "") {
					$error = "Niet alle velden zijn ingevuld!";
				break;
				}
			}
	
		$birthdata=$this->getDate($data['Birthdate']);
		if($birthdata['correct']){
			$data['Birthdate']=$birthdata['date'];
		} else {
			$error="Er is geen geldige geboortedatum ingevuld";
		}
		if (isset($error)) {
			return $error;
		}


		//insert in database
		$this->db->insert($sort, $data);
	}

	public function getAllUserData($id){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id",$id);
		$this->db->limit("1");
		$query=$this->db->get();
		return $query->row_array();
	}
	public function editUser($data,$id){

		//check if the date is valid
		$birthdata=$this->getDate($data["Birthdate"]);
		if($birthdata['correct']){
			$data['Birthdate']=$birthdata['date'];
		}else {
			unset($data['Birthdate']);
		}
		//unset all emtpy values
		foreach($data as $key => $value){
			if($value==""){
				unset($data[$key]);
			}
		}


		//update the database
		$this->db->where("id",$id);
		$this->db->update("users",$data);
	}
	public function getDate($dateString){
		$data=explode ( "/", $dateString );
		//0=the month,1=the day,2 = the year 
		$correct=false;
		if(count($data)==3){
			$correct=checkdate ( $data[0] , $data[1] , $data[2] );
		}
		if($correct){
			return array("correct"=>true,"date"=>$data[2].'-'.$data[0].'-'.$data[1]);
		}
	}

	public function logout($sort){

		//$this->load->view('front/users/logout_form');
		$this->session->sess_destroy($sort);
		$this->output->set_header('refresh:3;url=login');
		//$this->load->view('front/defaults/front-footer.php');
	}
	public function login($table,$login_data){
		$error=true;
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where("email",$login_data["email"]);
		$this->db->limit("1");
		$query=$this->db->get();
		$result=$query->row_array();

		if (isset($result['email'])) {
			
			$this->session->set_userdata("id",$result['id']);
				
		}
		if($error){
			return "De email is onjuist.";
		}
	}
	
}
?>
