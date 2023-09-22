<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function select($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }

  public function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }
  public function updateuser($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }
  public function updatemasuk($data, $where)
  {
    $this->db->where($where);
    $this->db->update('barangmasuk', $data);

    return true;
  }

  public function delete($tabel, $where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }
  public function get_data($tabel, $kodebarang)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($kodebarang)
      ->get();
    return $query->result();
  }
  public function get_data2($tabel, $idtransaksi)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($idtransaksi)
      ->get();
    return $query->result();
  }
  public function update_password($tabel, $where, $data)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }
  public function numrows($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->get();
    return $query->num_rows();
  }
  public function kecuali($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where_not_in('username', $username)
      ->get();

    return $query->result();
  }
  public function get()
  {
    return $this->db->get('barangmasuk');
  }
  public function cek_kode($tabel, $kodebarang)
  {
    return  $this->db->select('*')
      ->from($tabel)
      ->where('kodebarang', $kodebarang)
      ->get();
  }
  public function cek_users($tabel, $username)
  {
    return  $this->db->select('*')
      ->from($tabel)
      ->where('username', $username)
      ->get();
  }

  public function detail_masuk()
  {
    $this->db->select('barangmasuk.idtransaksi, barangmasuk.kodebarang, barangmasuk.namabarang, barangmasuk.jumlah, barangmasuk.satuan');
		$this->db->from('barangmasuk');
		$this->db->join('datamasuk', 'datamasuk.idtransaksi = barangmasuk.idtransaksi', 'full');
		return $this->db->get();
  }

  public function Detail($idtransaksi)
  {
    $sql = "SELECT barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlah, barangkeluar.stok
                                                FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                                WHERE barangkeluar.idtransaksi='$idtransaksi')";
    $this->db->query($sql);
  }
  public function getdata()
  {
      return $this->db->get('databarang');
  }
  public function getcustomer()
  {
      return $this->db->get('datacustomer');
  }
  public function getsupplier()
  {
      return $this->db->get('datasupplier');
  }
}
