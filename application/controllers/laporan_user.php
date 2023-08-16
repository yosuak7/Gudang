<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct(); 
    }
    
    public function laporan_masuk_pdf()
    {
        $this->load->model('M_admin');
        $data['barangmasuk'] = $this->M_admin->get()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Inventory/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('laporan_masuk_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_Barang_Masuk.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }
    public function export_excel_masuk()
    {
        $this->load->model('M_admin');
        $data= array ('title' => 'Laporan Barang Masuk', 'barangmasuk' => $this->M_admin->get()->result_array());
        $this->load->view('user/export_excel_barang_masuk', $data);
    }
    public function laporan_keluar_pdf()
    {
        $this->load->model('M_admin');
        $data['barangkeluar'] = $this->M_admin->getkeluar()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Inventory/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('laporan_keluar_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_Barang_Keluar.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }
    public function export_excel_keluar()
    {
        $this->load->model('M_admin');
        $data= array ('title' => 'Laporan Barang Keluar', 'barangkeluar' => $this->M_admin->getkeluar()->result_array());
        $this->load->view('user/export_excel_barang_keluar', $data);
    }
    public function laporan_databarang_pdf()
    {
        $this->load->model('M_admin');
        $data['databarang'] = $this->M_admin->getdata()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/Inventory/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();
        $this->load->view('laporan_barang_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_Data_Barang.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }
    public function export_data_barang()
    {
        $this->load->model('M_admin');
        $data= array ('title' => 'Data Barang ', 'databarang' => $this->M_admin->getdata()->result_array());
        $this->load->view('user/export_excel_barang', $data);
    }
}

?>