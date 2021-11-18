<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Master extends BaseController {
	var $username;

/**
* Controller for the webmaster
*/
	public function index() {
		if($this->check_master()) {
				echo view('template/header_master.php');
				echo view('master/master_view.php');
	    }
	    else {
					echo view('template/header');
	        $data['title'] = 'Login Error';
	        $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
	        ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
	        echo view('status/status_view', $data);
	    }
			echo view('template/footer');
	}
/**
* Checks for master user according to the type code
*/
	private function check_master() {
		$retval = FALSE;
		$user_arr = $this->login_mod->get_cur_user();
		if(($user_arr != NULL) && ($user_arr['type_code'] == 99 && $user_arr['authorized'] == 1)) {
			$retval = TRUE;
		}
		return $retval;
	}

	public function download_user_types() {
		if($this->check_master()) {
			$this->master_mod->put_user_types();
			return $this->response->download('files/user_types.csv', NULL);
		}
	}

	public function download_users() {
		if($this->check_master()) {
			$this->master_mod->put_users();
			return $this->response->download('files/users.csv', NULL);
		}
	}
/**
* Enables master user edit users
*/
	public function edit_users() {
	 echo view('template/header_master');
	 if($this->check_master()) {
		 $data = $this->master_mod->get_users_data();
		 $data['states'] = $this->data_mod->get_states_array();
		 $data['msg'] = NULL;
		 $data['errmsg'] = NULL;
		 echo view('master/edit_users_view', $data);
		 }
		 else {
				 $data['title'] = 'Login Error';
				 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
				 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
				 echo view('status/status_view', $data);
		 }
		 echo view('template/footer');

	}
	/**
	* Saves the updated admin user data into db
	*/
	public function load_admin() {
		if($this->check_master()) {
			echo view('template/header_master');
			$param['id_user'] = $this->uri->getSegment(2);
			$param['id_user_type'] = $this->request->getPost('pos');
			$param['type_code'] = $this->request->getPost('pos');
			$param['fname'] = $this->request->getPost('fname');
			$param['lname'] = $this->request->getPost('lname');
			$param['phone'] = $this->request->getPost('phone');
			$param['facebook'] = $this->request->getPost('facebook');
			$param['twitter'] = $this->request->getPost('twitter');
			$param['linkedin'] = $this->request->getPost('linkedin');
			$param['email'] = $this->request->getPost('email');
			$param['street'] = $this->request->getPost('street');
			$param['city'] = $this->request->getPost('city');
			$param['state_cd'] = $this->request->getPost('state');
			$param['zip_cd'] = $this->request->getPost('zip');
			$param['comment'] = $this->request->getPost('comment');
			$param['callsign'] = $this->request->getPost('callsign');
			$this->master_mod->load_admin($param);
			$data = $this->master_mod->get_users_data();
			$data['states'] = $this->data_mod->get_states_array();
			$data['msg'] = 'Updated user. Thank you!';
			$data['errmsg'] = NULL;
			echo view('master/edit_users_view', $data);
		}
		else {
				echo view('template/header');
 				 $data['title'] = 'Login Error';
 				 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
 				 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
 				 echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function delete_user() {
		if($this->check_master()) {
			echo view('template/header_master');
			 $this->master_mod->delete_user($this->uri->getSegment(2));
			 $data = $this->master_mod->get_users_data();
	 		 $data['states'] = $this->data_mod->get_states_array();
			 $data['msg'] = 'Deleted user. Thank you!';
			 $data['errmsg'] = NULL;
	 		 echo view('master/edit_users_view', $data);
		}
		else {
			echo view('template/header');
			 $data['title'] = 'Login Error';
			 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
			 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
			 echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function authorize() {
		if($this->check_master()) {
			echo view('template/header_master');
			 $this->master_mod->authorize($this->uri->getSegment(2));
			 $data = $this->master_mod->get_users_data();
	 		 $data['states'] = $this->data_mod->get_states_array();
			 $data['msg'] = 'Authorized / Unauthorized user. Thank you!';
			 $data['errmsg'] = NULL;
	 		 echo view('master/edit_users_view', $data);
		}
		else {
			echo view('template/header');
			 $data['title'] = 'Login Error';
			 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
			 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
			 echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function activate() {
		if($this->check_master()) {
			echo view('template/header_master');
			 $this->master_mod->activate($this->uri->getSegment(2));
			 $data = $this->master_mod->get_users_data();
	 		 $data['states'] = $this->data_mod->get_states_array();
			 $data['msg'] = 'Activated / deactivated user. Thank you!';
			 $data['errmsg'] = NULL;
	 		 echo view('master/edit_users_view', $data);
		}
		else {
			echo view('template/header');
			 $data['title'] = 'Login Error';
			 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
			 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
			 echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function reset_user() {
		if($this->check_master()) {
			echo view('template/header_master');
				$param['id_user'] = $this->uri->getSegment(2);
				$param['username'] = $this->request->getPost('username');
				$param['pass'] = $this->request->getPost('pass');
				$param['pass2'] = $this->request->getPost('pass2');
				$flags = $this->master_mod->reset_user($param);
				if ($flags['flag']) {
 			 		$data = $this->master_mod->get_users_data();
		 		 	$data['states'] = $this->data_mod->get_states_array();
				 	$data['msg'] = 'Username and pasword were succesfuly reset. Thank you!';
					$data['errmsg'] = NULL;
		 		  echo view('master/edit_users_view', $data);
				}
				else {
					$data['errmsg'] = 'Please, fix the following error(s):<br>';
					$data['id_user'] = $param['id_user'];
					if($flags['usr_dup']) $data['errmsg'] .= '<p style="color:red;">Duplicate username</p>';
					if(!($flags['pass_match'])) $data['errmsg'] .= '<p style="color:red;">Passwords do not match</p>';
					if(!($flags['pass_comp'])) $data['errmsg'] .= '<p style="color:red;">Password complexity requirement not met</p>';
					echo view('master/set_pass_view', $data);
				}
		}
		else {
			echo view('template/header');
			 $data['title'] = 'Login Error';
			 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
			 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
			 echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function mem_types() {
		$this->master_mod->set_mem_type();
		if($this->check_master()) {
				echo view('template/header_master');
				echo view('master/master_view');
			}
			else {
					echo view('template/header');
					$data['title'] = 'Login Error';
					$data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
					' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
					echo view('status/status_view', $data);
			}
			echo view('template/footer');
	}

	public function convert_callsign() {
		echo view('template/header_master');
		$this->master_mod->convert_to_callsign($this->request->getPost('tbl'));
		$data['title'] = 'Done!';
		$data['msg'] = 'Callsign converted. <br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}
}
