<?php

class M_login extends CI_Model{

  public function insert($tabel,$data){
    $this->db->insert($tabel,$data);
  }

  public function cek_username($tabel,$username){
    return $this->db->select('username')
             ->from($tabel)
             ->where('username',$username)
             ->get()->result();
  }

  public function cek_user($tabel,$username){
    return  $this->db->select('*')
               ->from($tabel)
               ->where('username',$username)
               ->get();
  }

  public function idgambar($username)
  {
    $query = $this->db->select()
                      ->from('users')
                      ->where('username',$username)
                      ->get()->row();
    return $query->id;
  }

  function edit_user($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('users', $data);
	}
  public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}


}


 ?>
