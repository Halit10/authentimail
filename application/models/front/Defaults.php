<?php 
class Defaults extends CI_Model {
	public function headerData(){
		if($this->session->has_userdata("id")){
			$loglink			="user/profile";
			$registerHidden		=true;
			$accountText		="Profiel";
			$logoutLink			=true;

		} else {
			$loglink			="login";
			$registerHidden		=false;
			$accountText		="Login";
			$logoutLink			=false;
		}
		return array(	"title"			=>"test",
						"accountText"	=>$accountText,
						"warningMessage"=>"this is a test error message",
						"warningClass"	=>"alert-success",
						"warningVisible"=>true,
						"logLink"		=>$loglink,
						"logoutLink"	=>$logoutLink,
						"registerHidden"=>$registerHidden,
						
					);
	}


}
