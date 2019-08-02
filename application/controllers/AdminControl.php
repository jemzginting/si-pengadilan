<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminControl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sess_admin')) {
            //  redirect("login", 'refresh');
            redirect("AuthLogin");
        }

        $this->load->model('AdminModel');
        //  $this->load->library('form_validation', 'session');
    }

    public function index()
    {

        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Welcome to Website Pelayanan Pengadilan Agama Kota Palembang';
        // $this->template->view('template/admin/main_content', 1, $datacontent);
        //$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/admin/index', 1, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function dashboard()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;

        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/index', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function laporan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/laporan_konsultasi', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function konfirmasi_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/konfirmasi_konsultasi', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function laporan_pelayanan_masyarakat()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/laporan_pelayanan', 1, $datacontent);
        $this->load->view('template/footer', $datacontent);
    }

    public function penilaian_pelayanan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/penilaian_pelayanan', 1, $datacontent);
        $this->load->view('template/footer', $datacontent);
    }

    public function rekap_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/rekap_konsultasi', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function get_all_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $data['session'] = $session_data;
        $result = $this->AdminModel->get_konsultasi($data);
        echo json_encode($result);
    }

    public function get_name_chat()
    {
        $session_data = $this->session->userdata('sess_admin');
        //$data['session'] = $session_data;
        $result = $this->AdminModel->get_chat_name();
        echo json_encode($result);
    }

    public function get_rekap_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $data['session'] = $session_data;
        $result = $this->AdminModel->get_all_konsultasi();
        echo json_encode($result);
    }

    public function get_rekap_bulan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $data['session'] = $session_data;
        $tahun = $this->input->GET('tahun');
        $bulan = $this->input->GET('bulan');
        $result = $this->AdminModel->get_bulan_konsultasi($bulan, $tahun);
        echo json_encode($result);
    }

    public function konfirmasi_konsul()
    {
        $data['no_konsul'] = $this->input->post('no_konsul');
        $data['status'] = $this->input->post('status');
        $data['view'] = $this->input->post('view');
        $res = $this->AdminModel->update_konfirmasi($data);
        echo json_encode($res);
    }

    public function chat_pelanggan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['userid'] = $this->input->GET('id');

        $data['name'] = $this->input->GET('name');
        $data['title'] = 'Form Pelayanan Kepuasan Layanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/chat/chat', $data);
        $this->load->view('template/footer');
    }
}
