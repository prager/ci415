<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Member extends BaseController {
	var $username;

/**
* Controller for the webmaster
*/
	public function index() {
    if($this->check_mem()) {
	  	echo view('template/header_member.php');
			$data['user'] = $this->login_mod->get_cur_user();
			$data['mem'] = $this->mem_mod->get_mem($data['user']['id_user']);
			echo view('members/member_view.php', $data);
	   }
    else {
	  	echo view('template/header');
			$this->login_mod->logout();
      $data['title'] = 'Login Error';
      $data['msg'] = 'There was an error while checking your credentials.<br><br>';
      echo view('status/status_view.php', $data);
    }
		echo view('template/footer.php');
	}
  
/**
* Loads personal data into the form and displays it
*/
  public function pers_data() {
    if($this->check_mem()) {
	  	echo view('template/header_member.php');
			$data['user'] = $this->login_mod->get_cur_user();
			$data['mem'] = $this->mem_mod->get_mem($data['user']['id_user']);
			echo view('members/pers_data_view.php', $data);
	   }
    else {
	  	echo view('template/header');
			$this->login_mod->logout();
      $data['title'] = 'Login Error';
      $data['msg'] = 'There was an error while checking your credentials.<br><br>';
      echo view('status/status_view.php', $data);
    }
		echo view('template/footer.php');
  }

  public function check_mem() {
		$retval = FALSE;
		$user_arr = $this->login_mod->get_cur_user();
		//echo 'type code ' . $user_arr['type_code'] . '<br>';
		//echo 'auth ' . $user_arr['authorized'] . '<br>';
		if((($user_arr != NULL) && ($user_arr['type_code'] == 99)) || (($user_arr['authorized'] == 1) && ($user_arr['type_code'] < 90))) {
			$retval = TRUE;
		}
		return $retval;
	}

}
