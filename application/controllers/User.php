<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

  public function index() 
  {
    $this->load->model('M_admin');
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 0) {

      $data['dataUser'] = $this->M_admin->numrows('users');
      $this->load->view('user/V_beranda', $data);
      $this->load->view('user/Sidebar');
    } else {
      $this->load->view('login/login');
    }
  }


  public function inputmasuk()
  {

    $this->load->view('user/V_Formbarangmasuk');
  }
  public function inputkeluar()
  {

    $this->load->view('user/V_Formbarangkeluar');
  }
  public function inputbarang()
  {

    $this->load->view('user/V_Databarang');
  }
  public function inputcustomer()
  {

    $this->load->view('user/inputcustomer');
  }
  public function inputsupplier()
  {

    $this->load->view('user/inputsupplier');
  }
  public function randomstring()
  {
    echo random_string('numeric', 8);
  }
  public function laporandatabarang()
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data' => $this->M_admin->select('databarang')
    );
    $this->load->view('user/V_Ldatabarang', $data);
    $this->load->view('user/Sidebar');
  }
  public function laporanbarangkeluar()
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data' => $this->M_admin->select('barangkeluar')
    );
    $this->load->view('user/V_Lbarangkeluar', $data);
  }
  public function laporanbarangmasuk()
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data' => $this->M_admin->select('barangmasuk')
    );
    $this->load->view('user/V_Lbarangmasuk', $data);
  }
  public function datacustomer()
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data' => $this->M_admin->select('datacustomer')
    );
    $this->load->view('user/datacustomer', $data);
  }
  public function datasupplier()
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data' => $this->M_admin->select('datasupplier')
    );
    $this->load->view('user/datasupplier', $data);
  }
  public function delete_barang($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('databarang', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
  Data Berhasil di Hapus
    </div>');
    redirect(base_url('user/laporandatabarang'));
  }
  public function delete_customer($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('datacustomer', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
  Data Berhasil di Hapus
    </div>');
    redirect(base_url('user/datacustomer'));
  }

  public function delete_barang_keluar($idtransaksi)
  {
    $this->load->model('M_admin');
    $where = array('idtransaksi' => $idtransaksi);
    $this->M_admin->delete('barangkeluar', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
  Data Berhasil di Hapus
    </div>');
    redirect(base_url('user/laporanbarangkeluar'));
  }

  public function delete_barang_masuk($idtransaksi)
  {
    $this->load->model('M_admin');
    $where = array('idtransaksi' => $idtransaksi);
    $this->M_admin->delete('barangmasuk', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
  Data Berhasil di Hapus
    </div>');
    redirect(base_url('user/laporanbarangmasuk'));
  }


  function submitbarangmasuk()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('namasupplier', 'Tanggal', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required|numeric');
    $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
  Pastikan Form terisi dengan Benar
    </div>');
      redirect(base_url('user/laporandatabarang'));
    }
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $tanggal      = $this->input->post('tanggal', TRUE);
    $lokasi       = $this->input->post('lokasi', TRUE);
    $namasupplier       = $this->input->post('namasupplier', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon  = $this->input->post('telepon', TRUE);
    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);

    $data = array(
      'idtransaksi' => $idtransaksi,
      'tanggal'      => $tanggal,
      'lokasi'       => $lokasi,
      'namasupplier'  => $namasupplier,
      'alamat'  => $alamat,
      'telepon'       => $telepon,
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'jumlah'       => $jumlah

    );

    if ($jumlah <= 0) {
      $this->session->set_flashdata('masuksalah1', '<div class="alert alert-danger" role="alert">
    Jumlah Masuk Belum Diisi </div>');
      redirect(base_url('user/laporandatabarang'));
    } else {
      $this->M_admin->insert('barangmasuk', $data);
      $this->session->set_flashdata('berhasilmasuk', '<div class="alert alert-success" role="alert">
    Barang Berhasil Dimasukkan </div>');
      redirect(base_url('user/laporandatabarang'));
    }
  }
  public function submitbarangkeluar()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('namacustomer', 'Nama Customer', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kodebarang', 'Kode Barang', 'required|numeric');
    $this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
    $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('numeric', '%s Harus Di isi dengan angka');

    if ($this->form_validation->run() != TRUE) {
      $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
  Pastikan Form terisi dengan Benar
    </div>');
      redirect(base_url('user/laporandatabarang'));
    }

    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $tanggal      = $this->input->post('tanggal', TRUE);
    $lokasi       = $this->input->post('lokasi', TRUE);
    $namacustomer  = $this->input->post('namacustomer', TRUE);
    $alamat  = $this->input->post('alamat', TRUE);
    $telepon       = $this->input->post('telepon', TRUE);
    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $stok       = $this->input->post('stok', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);

    $data = array(
      'idtransaksi' => $idtransaksi,
      'tanggal'      => $tanggal,
      'lokasi'       => $lokasi,
      'namacustomer'  => $namacustomer,
      'alamat'  => $alamat,
      'telepon'       => $telepon,
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'stok'       => $stok,
      'jumlah'       => $jumlah
    );
    if ($jumlah <= 0) {
      $this->session->set_flashdata('Stoksalah', '<div class="alert alert-danger" role="alert">
    Jumlah Keluar Belum Diisi </div>');
      redirect(base_url('user/laporandatabarang'));
    }
    if ($stok >= $jumlah) {
      $this->M_admin->insert('barangkeluar', $data);
      $this->session->set_flashdata('berhasilkeluar', '<div class="alert alert-success" role="alert">
    Barang Berhasil Dikeluarkan </div>');
      redirect(base_url('user/laporandatabarang'));
    } else {
      $this->session->set_flashdata('Stokkurang', '<div class="alert alert-danger" role="alert">
    Stok Tidak Mencukupi </div>');
      redirect(base_url('user/laporandatabarang'));
    }
  }

  function modalbarangkeluar()
  {
    $this->load->model('M_admin');
    $kode = $this->M_admin->get()->result();
    $data = ['kodebarang' => $kode];
    $this->load->view('user/V_Formbarangkeluar', $data);
  }

  public function submitcustomer()
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
      return $this->load->view('user/inputcustomer');
    }

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
    redirect(base_url('user/inputcustomer'));
  }
  public function submitsupplier()
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
      return $this->load->view('user/inputsupplier');
    }

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
  Data Berhasil Ditambahkan
</div>');
    redirect(base_url('user/inputsupplier'));
  }
  public function submitbarangbaru()
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
      return $this->load->view('user/V_databarang');
    }

    $kodebarang  = $this->input->post('kodebarang', TRUE);
    $namabarang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);

    $data = array(
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'jumlah'       => $jumlah
    );
    $cek =  $this->M_admin->cek_kode('databarang', $kodebarang);
    if ($cek->num_rows() != 1) {
      $this->M_admin->insert('databarang', $data);
      $this->session->set_flashdata('berhasiltambah', '<div class="alert alert-success" role="alert">
  Barang Berhasil Ditambahkan
</div>');
      redirect(base_url('user/inputbarang'));
    } else {
      $this->session->set_flashdata('gagaltambah', '<div class="alert alert-danger" role="alert">
  Kode Barang Sudah Ada
</div>');
      redirect(base_url('user/inputbarang'));
    }
  }
  public function masuk_data_barang($kodebarang = 0)
  {
    $this->load->model('M_admin');
    $data = array(
      'list_data1' => $this->M_admin->select('datasupplier')
    );
    $where = array('kodebarang' => $kodebarang);
    $data['list_data'] = $this->M_admin->get_data('databarang', $where);
    $this->load->view('user/V_Formbarangmasuk', $data);
  }
  public function keluar_data_barang($kodebarang = 0)
  {


    $this->load->model('M_admin');
    $data = array(
      'list_data1' => $this->M_admin->select('datacustomer')
    );
    $where = array('kodebarang' => $kodebarang);
    $data['list_data'] = $this->M_admin->get_data('databarang', $where);
    $this->load->view('user/V_Formbarangkeluar', $data);
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
    Kolom Tidak Di Isi Dengan benar / Tidak Terisi
  </div>');
      redirect(base_url('user/laporandatabarang'));
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
    Data Berhasil di Update
  </div>');
    redirect(base_url('user/laporandatabarang'));
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
    Kolom Tidak Di Isi Dengan benar / Tidak Terisi
  </div>');
      redirect(base_url('user/datacustomer'));
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
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Data Berhasil di Update
  </div>');
    redirect(base_url('user/datacustomer'));
  }
  function proses_update_barang_masuk()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    //rules
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == TRUE) {
    }
    $idtransaksi = $this->input->post('idtransaksi', TRUE);
    $tanggal      = $this->input->post('tanggal', TRUE);
    $lokasi       = $this->input->post('lokasi', TRUE);
    $kode_barang  = $this->input->post('kodebarang', TRUE);
    $nama_barang  = $this->input->post('namabarang', TRUE);
    $satuan       = $this->input->post('satuan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);

    $where = array('id' => $id);
    $data = array(
      'kodebarang'  => $kodebarang,
      'namabarang'  => $namabarang,
      'satuan'       => $satuan,
      'jumlah'       => $jumlah

    );

    $this->M_admin->updatemasuk('id', $where, $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Data Berhasil di Update
  </div>');
    redirect(base_url('user/laporanbarangmasuk'));
  }
  public function proses_new_password()
  {
    $this->load->model('M_admin');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
    $this->form_validation->set_message('matches', '%s Password tidak sama');

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
        redirect(base_url('user/profile'));
      }
    } else {
      $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
      $this->load->view('user/profile');
    }
  }
  public function profile()
  {
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);
    $this->load->view('user/profile', $data);
  }
  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }
  public function users()
  {
    $this->load->model('M_admin');
    $data['list_users'] = $this->M_admin->kecuali('users', $this->session->userdata('name'));
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);
    $this->load->view('user/V_users', $data);
    $this->load->view('user/ModalUser');
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
    redirect(base_url('user/users'));
  }
  public function delete_supplier($id)
  {
    $this->load->model('M_admin');
    $where = array('id' => $id);
    $this->M_admin->delete('datasupplier', $where);
    $this->session->set_flashdata('berhasildelete', '<div class="alert alert-success" role="alert">
    Data Berhasil di Hapus
      </div>');
    redirect(base_url('user/datasupplier'));
  }
  public function update_user()
  {
    $this->load->model('M_admin');
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('users', $where);
    $this->session->set_userdata($data);
    $this->load->view('user/formupdate_users', $data);
  }
  public function form_user()
  {
    $this->load->model('M_admin');
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);
    $this->load->view('user/forminsert_users', $data);
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
        $this->M_admin->insert('users', $data);
        $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert">
      User Berhasil Di tambahkan
    </div>');
        redirect(base_url('user/users'));
      }
    } else {
      $this->session->set_flashdata('gagalinputuser', '<div class="alert alert-danger" role="alert">
      Kolom Tidak Terisi Dengan Benar
    </div>');
      $this->load->view('user/ModalUser', $data);
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
      $this->session->set_flashdata('userberhasil', '<div class="alert alert-success" role="alert">
      Data Berhasil di Update
    </div>');
      redirect(base_url('user/users'));
    } else {
      $this->session->set_flashdata('usergagal', '<div class="alert alert-danger" role="alert">
      Ada Kesalahan
    </div>');
      redirect(base_url('user/users'));
    }
  }
}
?>