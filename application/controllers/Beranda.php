<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

  public function index()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {

      $data['dataUser'] = $this->M_admin->numrows('users');
      $this->load->view('V_beranda', $data);
      $this->load->view('Sidebar');
    } else {
      redirect(base_url('Login'));
    }
  }

  public function barangmasuk()
  {

    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('datamasuk')
      );
      $this->load->view('daftarbarangmasuk', $data);
      $this->load->view('Modal', $data);
      $this->load->view('Sidebar');
    } else {
      redirect(base_url('Login'));
    }
  }
  public function barangkeluar()
  {

    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('datakeluar')
      );
      $this->load->view('daftarbarangkeluar', $data);
      $this->load->view('Modal', $data);
      $this->load->view('Sidebar');
    } else {
      redirect(base_url('Login'));
    }
  }
  public function inputbarang()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $this->load->view('V_Databarang');
    } else {
      redirect(base_url('Login'));
    }
  }
  public function inputcustomer()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $this->load->view('inputcustomer');
    } else {
      redirect(base_url('Login'));
    }
  }
  public function inputsupplier()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $this->load->view('inputsupplier');
    } else {
      redirect(base_url('Login'));
    }
  }
  public function randomstring()
  {
    echo random_string('numeric', 8);
  }
  public function laporandatabarang()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('databarang')
      );
      $this->load->view('V_Ldatabarang', $data);
      $this->load->view('Sidebar');
    } else {
      redirect(base_url('Login'));
    }
  }

  public function datacustomer()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('datacustomer')
      );
      $this->load->view('datacustomer', $data);
    } else {
      redirect(base_url('Login'));
    }
  }
  public function datasupplier()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('datasupplier')
      );
      $this->load->view('datasupplier', $data);
    } else {
      redirect(base_url('Login'));
    }
  }
  public function delete_barang($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('databarang', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('beranda/laporandatabarang'));
  }

  public function delete_transaksi_masuk($idtransaksi)
  {
    $this->load->model('M_admin');
    $where = array('idtransaksi' => $idtransaksi);
    $this->M_admin->delete('datamasuk', $where);
    $this->M_admin->delete('barangmasuk', $where);
    $this->M_admin->delete('transaksi', $where);

    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('beranda/barangmasuk'));
  }
  public function delete_transaksi_keluar($idtransaksi)
  {
    $this->load->model('M_admin');
    $where = array('idtransaksi' => $idtransaksi);
    $this->M_admin->delete('datakeluar', $where);
    $this->M_admin->delete('barangkeluar', $where);
    $this->M_admin->delete('transaksi', $where);

    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('beranda/barangkeluar'));
  }
  public function delete_customer($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('datacustomer', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('beranda/datacustomer'));
  }
  public function delete_supplier($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('datasupplier', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('beranda/datasupplier'));
  }

  public function delete_barang_keluar($kodeid)
  {
    $this->load->model('M_admin');
    $idtransaksi = 0;
    $where = array('kodeid' => $kodeid);
    $this->M_admin->delete('barangkeluar', $where);
    $this->M_admin->delete('transaksi', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    $where = array('idtransaksi' => $idtransaksi);

    $data['list_data2'] = $this->M_admin->select('databarang');
    $data['list_data1'] = $this->M_admin->get_data('datakeluar', $where);
    $data['detail'] = $this->db->query("SELECT barangkeluar.kodeid,barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlahkeluar, barangkeluar.stok
                                            FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                            WHERE barangkeluar.idtransaksi='$idtransaksi' 
                                            ")->result_array();

    $this->load->view('detailkeluar', $data);
    $this->load->view('modal_form_keluar', $data);
    $this->load->view('modal', $data);
  }
  public function delete_barang_masuk($kodeid)
  {
    $this->load->model('M_admin');
    $idtransaksi = 0;
    $where1 = array('kodeid' => $kodeid);

    $this->M_admin->delete('barangmasuk', $where1);
    $this->M_admin->delete('transaksi', $where1);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert"> Data Berhasil di Hapus </div>');
    $where = array('idtransaksi' => $idtransaksi);

    $data['list_data2'] = $this->M_admin->select('databarang');
    $data['list_data1'] = $this->M_admin->get_data('datamasuk', $where);
    $data['detail'] = $this->db->query("SELECT barangmasuk.id, barangmasuk.kodebarang,barangmasuk.namabarang,barangmasuk.satuan,barangmasuk.jumlahmasuk
                                              FROM barangmasuk LEFT JOIN datamasuk ON datamasuk.idtransaksi=barangmasuk.idtransaksi
                                              WHERE barangmasuk.idtransaksi='$idtransaksi' 
                                              ")->result_array();
    redirect(base_url('beranda/detail_masuk', $data));
  }
  function submitbarangmasuk($idtransaksi = 0)
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('idtransaksi', 'idtransaksi', 'required');
    $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required|numeric');
    $this->form_validation->set_rules('jumlahmasuk', 'Jumlahmasuk', 'required');
    $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');


    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
    Pastikan Form terisi dengan Benar
      </div>');
      redirect(base_url('beranda/detail_masuk'));
    }
    $kodeid = $this->input->post('kodeid', TRUE);
    $tanggal = $this->input->post('tanggal', TRUE);
    $keterangan  = $this->input->post('keterangan', TRUE);
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $jumlahmasuk      = $this->input->post('jumlahmasuk', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $stok       = $this->input->post('stok', TRUE);

    $data = array(
      'kodeid' => $kodeid,
      'tanggal' => $tanggal,
      'keterangan'  => $keterangan,
      'idtransaksi' => $idtransaksi,
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'stok'       => 0,
      'satuan'       => $satuan,
      'jumlahmasuk'       => $jumlahmasuk

    );
    if ($jumlahmasuk <= 0) {
      $this->session->set_flashdata('masuksalah1', '<div class="alert alert-danger" role="alert">
      Jumlah Masuk Belum Diisi </div>');
    } else {
      $this->M_admin->insert('barangmasuk', $data);
      $this->M_admin->insert('transaksi', $data);
      $this->session->set_flashdata('berhasilmasuk', '<div class="alert alert-success" role="alert">
      Barang Berhasil Dimasukkan </div>');
      $where = array('idtransaksi' => $idtransaksi);

      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datamasuk', $where);
      $data['detail'] = $this->db->query("SELECT barangmasuk.id, barangmasuk.kodeid,barangmasuk.kodebarang,barangmasuk.namabarang,barangmasuk.satuan,barangmasuk.jumlahmasuk
                                              FROM barangmasuk LEFT JOIN datamasuk ON datamasuk.idtransaksi=barangmasuk.idtransaksi
                                              WHERE barangmasuk.idtransaksi='$idtransaksi' 
                                              ")->result_array();
      $this->load->view('detailmasuk', $data);
      $this->load->view('modal_form', $data);
      $this->load->view('modal', $data);
    }
  }
  function submitdatamasuk()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('namasupplier', 'Tanggal', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
    Pastikan Form terisi dengan Benar
      </div>');
      redirect(base_url('beranda/datamasuk'));
    }
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $tanggal      = $this->input->post('tanggal', TRUE);
    $namasupplier       = $this->input->post('namasupplier', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon  = $this->input->post('telepon', TRUE);


    $data = array(
      'idtransaksi' => $idtransaksi,
      'tanggal'      => $tanggal,
      'namasupplier'  => $namasupplier,
      'alamat'  => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->insert('datamasuk', $data);
    $this->session->set_flashdata('berhasilmasuk', '<div class="alert alert-success" role="alert">
      Data Berhasil Ditambahkan </div>');
    redirect(base_url('beranda/datamasuk'));
  }

  function submitdatakeluar()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('namacustomer', 'Tanggal', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
    Pastikan Form terisi dengan Benar
      </div>');
      redirect(base_url('beranda/datakeluar'));
    }
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $tanggal      = $this->input->post('tanggal', TRUE);
    $namacustomer      = $this->input->post('namacustomer', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon  = $this->input->post('telepon', TRUE);


    $data = array(
      'idtransaksi' => $idtransaksi,
      'tanggal'      => $tanggal,
      'namacustomer'  => $namacustomer,
      'alamat'  => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->insert('datakeluar', $data);
    $this->session->set_flashdata('berhasilkeluar', '<div class="alert alert-success" role="alert">
      Data Berhasil Ditambahkan </div>');
    redirect(base_url('beranda/datakeluar'));
  }

  public function submitbarangkeluar()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');
    $idtransaksi = 0;

    //rules
    $this->form_validation->set_rules('idtransaksi', 'idtransaksi', 'required');
    $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required|numeric');
    $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlahkeluar', 'Jumlahkeluar', 'required|numeric');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');
    $this->form_validation->set_rules('stok', 'Stok', 'required');
    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
   Pastikan Form terisi dengan Benar
     </div>');
      redirect(base_url('beranda/detail_keluar'));
    }
    $kodeid = $this->input->post('kodeid', TRUE);
    $tanggal  = $this->input->post('tanggal', TRUE);
    $keterangan  = $this->input->post('keterangan', TRUE);
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $stok       = $this->input->post('stok', TRUE);
    $jumlahkeluar      = $this->input->post('jumlahkeluar', TRUE);

    $data = array(
      'kodeid' => $kodeid,
      'tanggal'  => $tanggal,
      'keterangan'  => $keterangan,
      'idtransaksi' => $idtransaksi,
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'stok'       => $stok,
      'jumlahkeluar'       => $jumlahkeluar,
      'jumlahmasuk' => 0
    );
    if ($jumlahkeluar <= 0) {
      $this->session->set_flashdata('Stoksalah', '<div class="alert alert-danger" role="alert">
     Jumlah Keluar Belum Diisi </div>');
      $where = array('idtransaksi' => $idtransaksi);
      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datakeluar', $where);
      $data['detail'] = $this->db->query("SELECT barangkeluar.kodeid,barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlahkeluar, barangkeluar.stok
                                             FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                             WHERE barangkeluar.idtransaksi='$idtransaksi' 
                                             ")->result_array();

      $this->load->view('detailkeluar', $data);
      $this->load->view('modal_form_keluar', $data);
      $this->load->view('modal', $data);
    }
    if ($stok >= $jumlahkeluar) {
      $this->M_admin->insert('barangkeluar', $data);
      $this->M_admin->insert('transaksi', $data);
      $this->session->set_flashdata('berhasilkeluar', '<div class="alert alert-success" role="alert">
     Barang Berhasil Dikeluarkan </div>');
      $where = array('idtransaksi' => $idtransaksi);
      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datakeluar', $where);
      $data['detail'] = $this->db->query("SELECT barangkeluar.kodeid,barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlahkeluar, barangkeluar.stok
                                             FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                             WHERE barangkeluar.idtransaksi='$idtransaksi' 
                                             ")->result_array();

      $this->load->view('detailkeluar', $data);
      $this->load->view('modal_form_keluar', $data);
      $this->load->view('modal', $data);
    } else {
      $this->session->set_flashdata('Stokkurang', '<div class="alert alert-danger" role="alert">
     Stok Tidak mencukupi </div>');
      $where = array('idtransaksi' => $idtransaksi);
      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datakeluar', $where);
      $data['detail'] = $this->db->query("SELECT barangkeluar.kodeid,barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlahkeluar, barangkeluar.stok
                                             FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                             WHERE barangkeluar.idtransaksi='$idtransaksi' 
                                             ")->result_array();

      $this->load->view('detailkeluar', $data);
      $this->load->view('modal_form_keluar', $data);
      $this->load->view('modal', $data);
    }
  }

  public function submitcustomer()
  {
    $this->load->model('M_admin');

    $namacustomer  = $this->input->post('namacustomer', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon     = $this->input->post('telepon', TRUE);

    $data = array(
      'namacustomer'  => $namacustomer,
      'alamat'  => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->insert('datacustomer', $data);
    $this->session->set_flashdata('berhasiltambahcustomer', '<div class="alert alert-success" role="alert">
    Data Berhasil Ditambahkan
  </div>');
    redirect(base_url('beranda/inputcustomer'));
  }
  public function submitsupplier()
  {
    $this->load->model('M_admin');

    $namasupplier  = $this->input->post('namasupplier', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon     = $this->input->post('telepon', TRUE);

    $data = array(
      'namasupplier'  => $namasupplier,
      'alamat'  => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->insert('datasupplier', $data);
    $this->session->set_flashdata('berhasiltambahsupplier', '<div class="alert alert-success" role="alert">
    Data Berhasil Ditambahkan </div>');
    redirect(base_url('beranda/inputsupplier'));
  }
  public function submitbarangbaru()
  {
    $this->load->model('M_admin');

    $conn = mysqli_connect('localhost', 'root', '', 'dbinventory');
    $kodebarang = ['kodebarang'];
    $cek1 = mysqli_query($conn, "SELECT * FROM databarang WHERE kodebarang");
    $cekkode = mysqli_num_rows($cek1);


    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);

    $data = array(
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'jumlah'       => 0
    );
    $cek =  $this->M_admin->cek_kode('databarang', $kodebarang);
    if ($cek->num_rows() != 1) {
      $this->M_admin->insert('databarang', $data);
      $this->session->set_flashdata('berhasiltambah', '<div class="alert alert-success" role="alert"> Barang Berhasil Ditambahkan </div>');
      redirect(base_url('beranda/inputbarang'));
    } else {
      $this->session->set_flashdata('gagaltambah', '<div class="alert alert-danger" role="alert"> Kode Barang Sudah Ada </div>');
      redirect(base_url('beranda/inputbarang'));
    }
  }
  public function datamasuk()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data1' => $this->M_admin->select('datasupplier')
      );
      $this->load->view('V_Formdatamasuk', $data);
      $this->load->view('Modal');
    } else {
      redirect(base_url("Login"));
    }
  }
  public function datakeluar()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data = array(
        'list_data' => $this->M_admin->select('datacustomer')
      );
      $this->load->view('V_Formdatakeluar', $data);
      $this->load->view('Modal');
    } else {
      redirect(base_url("Login"));
    }
  }

  public function detail_masuk($idtransaksi)
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $where = array('idtransaksi' => $idtransaksi);

      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datamasuk', $where);
      $data['detail'] = $this->db->query("SELECT barangmasuk.id,barangmasuk.kodeid,barangmasuk.kodebarang,barangmasuk.namabarang,barangmasuk.satuan,barangmasuk.jumlahmasuk
                                            FROM barangmasuk LEFT JOIN datamasuk ON datamasuk.idtransaksi=barangmasuk.idtransaksi
                                            WHERE barangmasuk.idtransaksi='$idtransaksi' 
                                            ")->result_array();

      $this->load->view('detailmasuk', $data);
      $this->load->view('modal_form', $data);
      $this->load->view('modal', $data);
    } else {
      redirect(base_url("Login"));
    }
  }
  public function detail_keluar($idtransaksi)
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $where = array('idtransaksi' => $idtransaksi);

      $data['list_data2'] = $this->M_admin->select('databarang');
      $data['list_data1'] = $this->M_admin->get_data('datakeluar', $where);
      $data['detail'] = $this->db->query("SELECT barangkeluar.kodeid,barangkeluar.id,barangkeluar.kodebarang,barangkeluar.namabarang,barangkeluar.satuan,barangkeluar.jumlahkeluar, barangkeluar.stok
                                            FROM barangkeluar LEFT JOIN datakeluar ON datakeluar.idtransaksi=barangkeluar.idtransaksi
                                            WHERE barangkeluar.idtransaksi='$idtransaksi' 
                                            ")->result_array();

      $this->load->view('detailkeluar', $data);
      $this->load->view('modal_form_keluar', $data);
      $this->load->view('modal', $data);
    } else {
      redirect(base_url("Login"));
    }
  }

  function prosesupdatedatabarang()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required|numeric');
    $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('pesangagal', '<div class="alert alert-danger" role="alert">
      Kolom Tidak Di Isi Dengan benar / Tidak Terisi </div>');
      redirect(base_url('beranda/laporandatabarang'));
    }
    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);


    $where = array('kodebarang' => $kodebarang);
    $data = array(
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'jumlah'       => $jumlah
    );
    $this->M_admin->update('databarang', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Data Berhasil di Update </div>');
    redirect(base_url('beranda/laporandatabarang'));
  }
  function prosesupdatedatacustomer()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('namacustomer', 'Nama Customer', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('pesangagal', '<div class="alert alert-danger" role="alert">
      Kolom Tidak Di Isi Dengan benar / Tidak Terisi </div>');
      redirect(base_url('beranda/datacustomer'));
    }
    $id  = $this->input->post('id', TRUE);
    $namacustomer  = $this->input->post('namacustomer', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon       = $this->input->post('telepon', TRUE);

    $where = array('id' => $id);
    $data = array(
      'id'  => $id,
      'namacustomer'  => $namacustomer,
      'alamat'       => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->update('datacustomer', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data Berhasil di Update </div>');
    redirect(base_url('beranda/datacustomer'));
  }
  function prosesupdatedatasupplier()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('namasupplier', 'Nama Supplier', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('pesangagal', '<div class="alert alert-danger" role="alert">
      Kolom Tidak Di Isi Dengan benar / Tidak Terisi
    </div>');
      redirect(base_url('beranda/datasupplier'));
    }
    $id  = $this->input->post('id', TRUE);
    $namasupplier  = $this->input->post('namasupplier', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon       = $this->input->post('telepon', TRUE);


    $where = array('id' => $id);
    $data = array(
      'id'  => $id,
      'namasupplier'  => $namasupplier,
      'alamat'       => $alamat,
      'telepon'       => $telepon
    );
    $this->M_admin->update('datasupplier', $data, $where);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Data Berhasil di Update
    </div>');
    redirect(base_url('beranda/datasupplier'));
  }
  public function proses_new_password()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $new_password = $this->input->post('new_password');

        $data = array(
          'email'    => $email,
          'password' => $this->hash_password($new_password)
        );

        $where = array(
          'id' => $this->session->userdata('id')
        );

        $this->M_admin->update_password('users', $where, $data);

        $this->session->set_flashdata('msg_berhasil', 'Password Telah Diganti');
        redirect(base_url('beranda/profile'));
      }
    } else {
      $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
      $this->load->view('profile');
    }
  }
  public function profile()
  {
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['token_generate'] = $this->token_generate();
      $this->session->set_userdata($data);
      $this->load->view('profile', $data);
    } else {
      redirect(base_url("Login"));
    }
  }
  public function token_generate()
  {
    return $tokens = md5(uniqid(true));
  }
  public function users()
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['list_users'] = $this->M_admin->kecuali('users', $this->session->userdata('name'));
      $data['token_generate'] = $this->token_generate();
      $this->session->set_userdata($data);
      $this->load->view('V_users', $data);
      $this->load->view('ModalUser');
    } else {
      redirect(base_url("Login"));
    }
  }
  public function proses_delete_user()
  {
    $this->load->model('M_admin');
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('users', $where);
    $this->session->set_flashdata('deleteuser', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
  </div>');
    redirect(base_url('beranda/users'));
  }
  public function update_user()
  {
    $this->load->model('M_admin');
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('users', $where);
    $this->session->set_userdata($data);
    $this->load->view('formupdate_users', $data);
  }
  public function form_user()
  {
    $this->load->model('M_admin');
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);
    $this->load->view('forminsert_users', $data);
  }
  public function proses_tambah_user()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $email        = $this->input->post('email', TRUE);
        $username     = $this->input->post('username', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);

        $data = array(
          'email'        => $email,
          'username'     => $username,
          'password'     => $this->hash_password($password),
          'role'         => $role,
        );
        $cek =  $this->M_admin->cek_users('users', $username);
        if ($cek->num_rows() != 1) {
          $this->M_admin->insert('users', $data);
          $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> User Berhasil Ditambahkan </div>');
          redirect(base_url('beranda/Users'));
        } else {
          $this->session->set_flashdata('gagaltambah', '<div class="alert alert-danger" role="alert"> Username Sudah Ada </div>');
          redirect(base_url('beranda/users'));
        }
      }
    }
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }
  public function logout()
  {
    session_destroy();
    $this->load->view('login');
  }
  public function detail_stok($kodebarang)
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $where = array('kodebarang' => $kodebarang);
      $data['list_data'] = $this->M_admin->get_data('databarang', $where);

      $data['detail'] = $this->db->query("SELECT transaksi.keterangan,transaksi.idtransaksi,transaksi.kodebarang,transaksi.namabarang,transaksi.jumlahkeluar,transaksi.jumlahmasuk
                                            FROM transaksi LEFT JOIN databarang ON databarang.kodebarang=transaksi.kodebarang
                                            WHERE transaksi.kodebarang='$kodebarang' 
                                            ")->result_array();

      $this->load->view('detail_stok', $data);
    } else {
      redirect(base_url('Login'));
    }
  }

  public function proses_update_users()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id           = $this->input->post('id', TRUE);
      $username     = $this->input->post('username', TRUE);
      $email        = $this->input->post('email', TRUE);
      $role         = $this->input->post('role', TRUE);

      $where = array('id' => $id);
      $data = array(
        'username'     => $username,
        'email'        => $email,
        'role'         => $role,
      );
      $this->M_admin->update('users', $data, $where);
      $this->session->set_flashdata('userberhasil', '<div class="alert alert-success" role="alert"> Data Berhasil di Update </div>');
      redirect(base_url('Beranda/users'));
    } else {
      $this->session->set_flashdata('usergagal', '<div class="alert alert-danger" role="alert"> Ada Kesalahan </div>');
      redirect(base_url('Beranda/users'));
    }
  }
}
