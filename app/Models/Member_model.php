<?php namespace App\Models;

use CodeIgniter\Model;

/**
* This model is to collect rank and file member data
*/
class Member_model extends Model {
  var $db;

  public function __construct()  {
        parent::__construct();
  }

  public function get_mem($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $db->close();
    $builder->where('id_users', $id);
    $elem = array();
    if($builder->countAllResults() > 0) {
      $builder->resetQuery();
      $builder->where('id_users', $id);
      $member = $builder->get()->getRow();
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
      $elem['mem_type'] = $member->mem_type;
      $elem['callsign'] = $member->callsign;
      $elem['license'] = $member->license;
      $elem['cur_year'] = $member->cur_year;
      $elem['hard_news'] = $member->hard_news;
      $elem['spouse_name'] = $member->spouse_name;
      $elem['spouse_call'] = $member->spouse_call;
      $elem['pay_date'] = date('Y-m-d', $member->paym_date);
      $elem['pay_date_file'] = date('Y/m/d', $member->paym_date);
      $elem['silent_date'] = date('Y-m-d', $member->silent_date);
      $member->mem_since == NULL ? $elem['mem_since'] = 'N/A' : $elem['mem_since'] = $member->mem_since;
      $member->email == NULL ? $elem['email'] = 'N/A' : $elem['email'] = $member->email;
      $elem['ok_mem_dir'] = $member->ok_mem_dir;
      $cur_yr = date('Y', time());
      $elem['silent_date'] = '';
      $elem['silent_year'] = $member->silent_year;
      $member->usr_type == 98 ? $elem['silent'] = TRUE : $elem['silent'] = FALSE;
    }
    else {
      $elem = NULL;
    }
    return $elem;
  }

  public function get_member_by_email($email) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->where('email', $email);
    $retval = array();
    $retval['flag'] = FALSE;
    if($builder->countAllResults() > 0) {
      $retval['flag'] = TRUE;
      $builder->resetQuery();
      $builder->where('email', $email);
      $mem_obj = $builder->get()->getRow();
      $retval['fname'] = $mem_obj->fname;
      $retval['lname'] = $mem_obj->lname;
      $retval['callsign'] = $mem_obj->callsign;
      $retval['phone'] = $mem_obj->cell;
      $retval['email'] = $email;
    }
    $db->close();
    return $retval;
  }

}
