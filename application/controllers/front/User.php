<?php 
class User extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->model("front/Defaults");
			$data=$this->Defaults->headerData();
			$this->load->view("front/defaults/front-header.php",$data);
		}

		public function Login_user(){
			$this->load->model("front/User_model");
			$error=null;
			if ($this->input->post()) {
				$error = $this->User_model->Login_user($this->input->post());
				if(!$error){
					redirect("home");
				}
			} 
			$this->load->view('front/users/login_form.php', array('error' => $error));

			$this->load->view('front/defaults/front-footer.php');
		}

		public function Register_User(){
			$this->load->model("general/Gusers_model");
			$posted = true;
			$error = null;

			if ($this->input->post()) {
				$error = $this->Gusers_model->Register($this->input->post(),'users');
			} else {
				$posted = false;
			}

			if (isset($error)|| $posted == false) {
				$this->load->view('front/users/register_form.php', array('error' => $error));
			}else{
				$this->load->view('front/users/register_success.php');
				$this->output->set_header('refresh:5;url=login');
			}

			$this->load->view('front/defaults/front-footer.php');
		}
		public function editUser(){
			//make sure only people that are logged in can visit the page
			if(! $this->session->has_userData("id")){
				redirect("home");
			}
			$this->load->model("general/Gusers_model");
			if($this->input->post()){
				
				$this->Gusers_model->editUser($this->input->post(),$this->session->id);
			}
			$data=$this->Gusers_model->getAllUserData($this->session->id);
			$data["error"]=null;
			$this->load->view("front/users/register_form",$data);
			$this->load->view('front/defaults/front-footer.php');
			
		}

		public function logout(){
			
			$this->load->view('front/users/logout_form');
			$this->load->model("general/Gusers_model");
			$this->Gusers_model->logout("userId");
			$this->output->set_header('refresh:3;url=login');
			$this->load->view('front/defaults/front-footer.php');
		}
		public function showProfile(){
			if(!$this->session->has_userData("id")){
				redirect("home");
			}
			$this->load->view("front/users/profile");
			$this->load->view("front/defaults/front-footer");
		
		}
	}