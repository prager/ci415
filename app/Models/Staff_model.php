<?php namespace App\Models;

use CodeIgniter\Model;

class Staff_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
  }

/**
* Collect all the data needed by MDARC Staff to be displayed on the portal and for file downloads
*/
  public function get_mems($param) {
    $mem_types = $this->get_mem_types();
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $db->close();
    $res = $builder->get()->getResult();

//members current on their dues either Individual or Primary
    $cur_members = array();
    $cur_emails = array();

//all current members including Individual and Primary with Spouses and Additional members
    $all_cur_members = array();
    $all_cur_emails = array();

//members who want hardcopy of The Carrier and string for the address labels
    $carrier = array();
    $lbl_str = "";

//array of members owing dues
    $pay_due = array();

//email string and array of emails for the member owing dues
    $due_emails = '';
    $due_emails_arr = array();

//lists everybody in MDARC
    $all_members = array();

//array for deleted members
    $del_members = array();
    $silent_keys = array();

//The monster loop harvesting all the members data
    foreach($res as $member) {
      $elem = array();
      $elem['id'] = $member->id_members;

//set the true or false values for boolean db entries
      $elem['carrier'] = filter_var(trim(strtoupper($member->hard_news)), FILTER_VALIDATE_BOOLEAN);
      $elem['dir'] = filter_var(trim(strtoupper($member->hard_dir)), FILTER_VALIDATE_BOOLEAN);
      $elem['arrl'] = filter_var(trim(strtoupper($member->arrl_mem)), FILTER_VALIDATE_BOOLEAN);
      $elem['mem_card'] = filter_var(trim(strtoupper($member->mem_card)), FILTER_VALIDATE_BOOLEAN);
      $member->h_phone == NULL ? $elem['h_phone'] = '000-000-0000' : $elem['h_phone'] = $member->h_phone;
      $member->w_phone == NULL ? $elem['w_phone'] = '000-000-0000' : $elem['w_phone'] = $member->w_phone;
      $member->comment == NULL ? $elem['comment'] = '' : $elem['comment'] = $member->comment;
      $elem['phone_unlisted'] = $member->h_phone_unlisted;
      $elem['cell_unlisted'] = $member->w_phone_unlisted;
      $elem['email_unlisted'] = $member->email_unlisted;
      $elem['fname'] = $member->fname;
      $elem['lname'] = $member->lname;
      $member->address == NULL ? $elem['address'] = 'N/A' : $elem['address'] = $member->address;
      $member->city == NULL ? $elem['city'] = 'N/A' : $elem['city'] = $member->city;
      $member->state == NULL ? $elem['state'] = 'N/A' : $elem['state'] = $member->state;
      $member->zip == NULL ? $elem['zip'] = 'N/A' : $elem['zip'] = $member->zip;
      $elem['active'] = $member->active;
      $member->cur_year == NULL ? $elem['cur_year'] = 'N/A' : $elem['cur_year'] = $member->cur_year;
      $elem['mem_type'] = $mem_types[$member->id_mem_types];
      $elem['callsign'] = $member->callsign;
      $elem['license'] = $member->license;
      $elem['hard_news'] = $member->hard_news;
      $elem['spouse_name'] = $member->spouse_name;
      $elem['spouse_call'] = $member->spouse_call;
      $elem['pay_date'] = date('Y-m-d', $member->paym_date);
      $elem['pay_date_file'] = date('Y/m/d', $member->paym_date);
      $elem['silent_date'] = date('Y-m-d', $member->silent_date);
      $elem['id_mem_types'] = $member->id_mem_types;
      $member->mem_since == NULL ? $elem['mem_since'] = 'N/A' : $elem['mem_since'] = $member->mem_since;
      $member->email == NULL ? $elem['email'] = 'N/A' : $elem['email'] = $member->email;
      $elem['ok_mem_dir'] = $member->ok_mem_dir;
      $cur_yr = date('Y', time());
      $elem['silent_date'] = '';
      $member->silent_date > 1 ? $elem['silent_date'] = date('Y-m-d', $member->silent_date) : $elem['silent_date'] = 'No Date';
      $elem['silent_year'] = $member->silent_year;
      $member->usr_type == 98 ? $elem['silent'] = TRUE : $elem['silent'] = FALSE;
      $member->cur_year == 99 ? array_push($del_members, $elem) : FALSE;

//Push all the members including silent keys
      array_push($all_members, $elem);

//Push all the current members including voting members (Spouse and Additional types)
      if(($member->cur_year >= $cur_yr  && $member->silent_date == 0)) {
        array_push($all_cur_members, $elem);
        if($elem['email'] != '') {
          array_push($all_cur_emails, $elem['email']);
        }
      }

//Push all the paying members, which are primary and individual
      if(($member->cur_year >= $cur_yr  && $member->silent_date == 0) &&
        ($member->mem_type == 'Primary' || $member->mem_type == 'Individual')) {
        array_push($cur_members, $elem);
        if($elem['email'] != '') {
          array_push($cur_emails, $elem['email']);
        }
        if($member->hard_news == 'True') {
          array_push($carrier, $elem);
          $lbl_str .= $elem['fname'] . " " . $elem['lname'] . " " . $elem['callsign'] . "\n";
          $lbl_str .= $elem['address'] . "\n";
          $lbl_str .= $elem['city'] . ", " . $elem['state'] . " " . $elem['zip'] . "\n\n";
        }
      }

//Collect the data of the member who didn't pay dues for current year
      elseif(($member->cur_year == (intval($cur_yr) - 1) && $member->silent_date == 0) &&
        ($member->mem_type == 'Primary' || $member->mem_type == 'Individual') && $member->cur_year > 0) {
        if($elem['email'] != '') {
          array_push($due_emails_arr, $elem['email']);
        }
        array_push($pay_due, $elem);
      }

//Get the silent keys
      elseif($member->silent_year > 0) {
        array_push($silent_keys, $elem);
      }
    }

//sort the emails alphabetically to detect possible erroneous emails
    array_multisort($due_emails_arr, SORT_ASC);
    array_multisort($cur_emails, SORT_ASC);
    array_multisort($all_cur_emails, SORT_ASC);

//build the text file for emails of current members for emailing The Carrier
    $emails_str = '';
    foreach($all_cur_emails as $email) {
      $emails_str .= strtolower($email) . ', ';
    }
    file_put_contents('files/cur-emails.txt', $emails_str);

//build the text file for emails of members owing due payments
    foreach($due_emails_arr as $email) {
      $due_emails .= $email . ', ';
    }
    file_put_contents('files/due-emails.txt', $due_emails);

//build the text file for the envelope labels for mailing The Carrier
    file_put_contents('files/address-lbls.txt', $lbl_str);

//sort the arrays for displaying
    array_multisort(array_column($cur_members, 'lname'), SORT_ASC, $cur_members);
    array_multisort(array_column($all_cur_members, 'lname'), SORT_ASC, $all_cur_members);
    array_multisort(array_column($carrier, 'lname'), SORT_ASC, $carrier);
    array_multisort(array_column($pay_due, 'lname'), SORT_ASC, $pay_due);
    array_multisort(array_column($all_members, 'lname'), SORT_ASC, $all_members);
    array_multisort(array_column($silent_keys, 'lname'), SORT_ASC, $silent_keys);

//build the csv file for downloading all the members
    $all_mem_str = "id,fname,lname,spouse_name,phone,cell phone,address,city,state,zip,email,mem type,callsign,license,cur yr,pay date,mem since,hard news,arrl,comment\n";
    foreach($all_members as $mem) {
      $all_mem_str .= $mem['id'].",".$mem['fname'].",".$mem['lname'].",".$mem['spouse_name'].",".$mem['h_phone'].",".$mem['w_phone'].","
                  .str_replace(","," ", $mem['address']).",".$mem['city'].",".$mem['state'].",".$mem['zip'].",".$mem['email'].
                      ",".$mem['mem_type'].",".$mem['callsign'].",".$mem['license'].",".$mem['cur_year'].",".$mem['pay_date_file'].",".$mem['mem_since'].",".
                      $mem['hard_news'].",".$mem['arrl'].",". str_replace(","," ", $mem['comment']) . "\n";
    }
    file_put_contents('files/all_members.csv', $all_mem_str);

    $pay_due_str = "id,fname,lname,phone,cell phone,address,city,state,zip,email,mem type,callsign,license,cur yr,pay date,mem since,hard news,arrl,comment\n";
    foreach($pay_due as $mem) {
      $pay_due_str .= $mem['id'].",".$mem['fname'].",".$mem['lname'].",".$mem['h_phone'].",".$mem['w_phone'].","
                  .str_replace(","," ", $mem['address']).",".$mem['city'].",".$mem['state'].",".$mem['zip'].",".$mem['email'].
                      ",".$mem['mem_type'].",".$mem['callsign'].",".$mem['license'].",".$mem['cur_year'].",".$mem['pay_date_file'].",".$mem['mem_since'].",".
                      $mem['hard_news'].",".$mem['arrl'].",". str_replace(","," ", $mem['comment']) . "\n";
    }
    file_put_contents('files/pay_due.csv', $pay_due_str);

    $curr_mem_str = "id,fname,lname,phone,cell phone,address,city,state,zip,email,mem type,callsign,license,cur yr,pay date,mem since,hard news,arrl,comment\n";
    foreach($all_cur_members as $mem) {
      $curr_mem_str .= $mem['id'].",".$mem['fname'].",".$mem['lname'].",".$mem['h_phone'].",".$mem['w_phone'].","
                  .str_replace(","," ", $mem['address']).",".$mem['city'].",".$mem['state'].",".$mem['zip'].",".$mem['email'].
                      ",".$mem['mem_type'].",".$mem['callsign'].",".$mem['license'].",".$mem['cur_year'].",".$mem['pay_date_file'].",".$mem['mem_since'].",".
                      $mem['hard_news'].",".$mem['arrl'].",". str_replace(","," ", $mem['comment']) . "\n";
    }
    file_put_contents('files/curr_mems.csv', $curr_mem_str);


    $retarr = array();

//get new members for last 30 days
    $from = time() - (60 * 60 * 24 * 30);
    $to = time();
    $retarr['cnt_new'] = count($this->get_new_mems($from, $to));
//get new members for current year
    $from = strtotime("1 January " . date('Y', time()));
    $to = time();
    $retarr['cnt_new_yr'] = count($this->get_new_mems($from, $to));
//get renewals for current year
    $from = strtotime("1 January " . date('Y', time()));
    $to = time();
    $retarr['cnt_renew'] = count($this->get_renewals($from, $to));
//get renewals for last 30 days
    $from = time() - (60 * 60 * 24 * 30);
    $to = time();
    $retarr['cnt_renew_30'] = count($this->get_renewals($from, $to));
    $retarr['lic'] = $param['lic'];
    $retarr['states'] = $param['states'];
    $retarr['cur_members'] = $cur_members;
    $retarr['dir'] = $all_cur_members;
    $retarr['dir_cnt'] = count($all_cur_members);
    $retarr['cnt_cur'] = count($cur_members);
    $retarr['cnt_carr'] = count($carrier);
    $retarr['carrier'] = $carrier;
    $retarr['cnt_pay'] = count($pay_due);
    $retarr['pay_due'] = $pay_due;

//deleted members are actually inactive members still in db
    $retarr['del_mems'] = $del_members;
    $retarr['cnt_del'] = count($del_members);
    $retarr['silent_keys'] = $silent_keys;
    $retarr['cnt_silents'] = count($silent_keys);
    $retarr['mem_types'] = $mem_types;

    return $retarr;

  }

  public function update_cur_yr() {
    $db = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $res = $builder->get()->getResult();
    foreach($res as $mem) {
      $builder->resetQuery();
      $cur_yr = trim($mem->cur_year);
      if($cur_yr == '9999') {
        $cur_yr = '2035';
      }
      $builder->update(array('c_year' => strtotime(trim($cur_yr) . '/01/01')), ['id_members' => $mem->id_members]);
    }
    $db->close();
  }

/**
* Adds or edits a member
* @param mixed $param[] for db insert and update
* @return bool $retval whether or not the email param was ok
*/
  public function edit_mem($param) {
    $param['mem_type'] = $this->get_mem_type($param['id_mem_types']);
    $retval = TRUE;
    $id = $param['id'];
    unset($param['id']);
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->where('email', $param['email']);
    $builder->where('callsign', $param['callsign']);
    $builder->where('lname', $param['lname']);
    $builder->where('fname', $param['fname']);
    if($id != NULL) {
      $builder->resetQuery();
      $builder->update($param, ['id_members' => $id]);
    }
    elseif(($builder->countAllResults() == 0) && $this->check_dups($param)) {
          $param['update_type'] = 'Initial insert';
          $param['mem_type'] = 'Individual';
          $param['cur_year'] =  date('Y', time());
          $param['mem_since'] = date('Y', time());
          $builder->resetQuery();
          $builder->insert($param);
        }
    else {
        $retval = FALSE;
      }
    $db->close();

    return $retval;
  }

/**
* Check for duplicate members within 5 years
*/
  private function check_dups($param) {
    $retval = TRUE;
    $db      = \Config\Database::connect();
    $builder = $db->table('old_mems_2020');
    $res = $builder->get()->getResult();
    foreach($res as $mem) {
      if(($param['email'] == $mem->email) && ((date('Y', time()) - 5) > $mem->cur_year)) {
          $retval = FALSE;
          break;
        }
    }
    return $retval;
  }
/**
* This doesn't delete a member, only inactivates by setting current year to 99
* @param int as id_members
*/
  public function delete_mem($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->resetQuery();
    $builder->update(array('cur_year' => 99), ['id_members' => $id]);
  }

/**
* This copies the data with silent keys to the main table. Only temporary one time script
*/
  public function set_silents() {
    $db      = \Config\Database::connect();
    $builder = $db->table('tSilentKeys');
    $silents = $builder->get()->getResult();
    $db->close();
    $db      = \Config\Database::connect();
    $builder = $db->table('tSilentKeys');
    $builder->resetQuery();
    $builder = $db->table('tMembers');
    $mems = $builder->get()->getResult();
    foreach($silents as $silent) {
      $sil_callsign = $silent->cCallPrefix . $silent->cCallSuffix;
      foreach($mems as $mem) {
        if($sil_callsign == $mem->callsign) {
          $builder->resetQuery();
          $mem_arr = array(
            'callsign' => $sil_callsign
          );
          $builder->where('id_members', $mem->id_members);
          $builder->update($mem_arr);
        }
      }
    }
    $db->close();
  }

/**
* Set silent key if the member passed
*/
  public function set_silent($param) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $id = $param['id'];
    unset($param['id']);
    $builder->resetQuery();
    $builder->update($param, ['id_members' => $id]);
    $db->close();
  }

/**
* Unset silent key in case of mistake was made
*/
  public function unset_silent($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->resetQuery();
    $builder->update(array('usr_type' => 0, 'silent_date' => 0,
    'silent_year' => 0), ['id_members' => $id]);
    $db->close();
  }

  /**
	* Temporary routine to verify payments
  * To do: should return some data how many records was corrected
	*/
  public function verify_payment() {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $mem_rec = $builder->get()->getResult();
    $builder->resetQuery();
    $builder = $db->table('paid_2021');
    $paid_rec = $builder->get()->getResult();
    $retarr = array();
    foreach($mem_rec as $mem) {
      foreach($paid_rec as $paid) {
        $name_arr = explode(",", $paid->Name);
        $paid_fname = trim($name_arr[1]);
        $paid_lname = trim($name_arr[0]);
        if(($mem->fname == $paid_fname && $mem->lname == $paid_lname) && $mem->cur_year < date('Y', time())) {
          $pay_date = strtotime($paid->Date);
          $builder = $db->table('tMembers');
          $builder->resetQuery();
          $builder->update(array('cur_year' => date('Y', time()), 'paym_date' => $pay_date), ['id_members' => $mem->id_members]);
          $paid_arr =array();
          $paid_arr['fname'] = $paid_fname;
          $paid_arr['lname'] = $paid_lname;
          $paid_arr['pay_date'] = $paid->Date . ' | ' . $pay_date;
          array_push($retarr, $paid_arr);
        }
      }
    }
    $db->close();
    return $retarr;
  }

	public function get_mem_types() {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMemTypes');
    $builder->orderBy('id_mem_types', 'DESC');
    $types = $builder->get()->getResult();
    $retarr = array();
    foreach($types as $type) {
      $retarr[$type->id_mem_types] = $type->description;
    }
    $db->close();
    return $retarr;
	}

/**
* Returns the type description
*/
  public function get_mem_type($type) {
    $types = $this->get_mem_types();
    return $types[$type];
  }

  /**
  * Returns the new members for a given period
  * @param int from date via unix timestamp
  * @param int to date via unix timestamp
  * @return array the member data
  */
  public function get_new_mems($from, $to) {
    $db = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->where('paym_date >', $from);
    $builder->where('paym_date <', $to);
    $builder->where('mem_since', date('Y', time()));
    $db->close;
    $res = $builder->get()->getResult();
    $retarr = array();
    foreach($res as $mem) {
      $mem_arr = array(
        'id' => $mem->id_members,
        'fname' => $mem->fname,
        'lname' => $mem->lname,
        'callsign' => $mem->callsign,
        'license' => $mem->license,
        'payment_date' => $mem->paym_date
      );
      array_push($retarr, $mem_arr);
    }
    return $retarr;
  }

/**
* Returns renewals for a given period
* @param int from date via unix timestamp
* @param int to date via unix timestamp
* @return array the member data
*/
  public function get_renewals($from, $to) {
    $db = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->where('paym_date >', $from);
    $builder->where('paym_date <', $to);
    $builder->where('mem_since <', date('Y', time()));
    $db->close;
    $res = $builder->get()->getResult();
    $retarr = array();
    foreach($res as $mem) {
      $mem_arr = array(
        'id' => $mem->id_members,
        'fname' => $mem->fname,
        'lname' => $mem->lname,
        'callsign' => $mem->callsign,
        'license' => $mem->license,
        'payment_date' => $mem->paym_date
      );
      array_push($retarr, $mem_arr);
    }
    return $retarr;
  }

  public function get_rep($param) {
    $this->data_mod = new \App\Models\Data_model();
		$param['states'] = $this->data_mod->get_states_array();
		$param['lic'] = $this->data_mod->get_lic();
    $retarr = $this->get_mems($param);
    $retarr['date_start'] = date('Y-m-d', $param['date_start']);
    $retarr['date_stop'] = date('Y-m-d', $param['date_stop']);
    $retarr['renewals_period'] = count($this->get_renewals($param['date_start'], $param['date_stop']));
    $retarr['new_mems_period'] = count($this->get_new_mems($param['date_start'], $param['date_stop']));
    return $retarr;
  }
}
