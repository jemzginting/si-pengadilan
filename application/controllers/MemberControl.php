<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sess_member')) {
            redirect("AuthLogin");
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('MemberModel');
        //  $this->load->library('form_validation', 'session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Welcome to Website Pelayanan Pengadilan Tinggi Agama Kota Palembang';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/dashboard', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function dashboard()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', 2, $datacontent);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/dashboard', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function myprofile()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'My Profile';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/myprofile', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function pendaftaran_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        // $data['no_konsul'] = $this->MemberModel->get_nomor_urut();
        $urut = $this->MemberModel->get_nomor_urut();
        $noUrut = (int) substr($urut[0]['no_konsul'], 3, 3);
        $noUrut++;
        $char = "PTA";
        $kode = $char . sprintf("%03s", $noUrut);
        $data['no_urut'] = $kode;
        $data['nama'] = $session_data['name'];

        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/pendaftaran_konsultasi', $data);
        $this->load->view('template/footer');
    }

    public function konfirmasi_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Form Pelayanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/konfirmasi_konsultasi', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function tanggapan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Tanggapan Permohonan Konsultasi';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/tanggapan_konsultasi', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function form_pelayanan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Form Pelayanan Kepuasan Layanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/form_pelayanan', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function pelayanan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Form Pelayanan Kepuasan Layanan';
        $data['userid'] = 1;
        $data['name'] = 'Admin';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/chat/chat', $data);
        $this->load->view('template/footer');
    }

    public function penilaian_pelayanan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Penilaian Kepuasan Pelayanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/form_pelayanan', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ktp')) {
            return $this->upload->data();
        } else {
            return "default.jpg";
        }
    }



    public function submit_mohon()
    {

        //=======================UPLOAD GAMBAR==============
        $config['upload_path'] = "./assets/img";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $datax = array('upload_data' => $this->upload->data());
            $image = $datax['upload_data']['file_name'];
            $session_data = $this->session->userdata('sess_member');
            $data['id_user'] = $session_data['id_user'];
            $data['no_konsul'] = $this->input->post('nomor_urut');
            $data['nama_permohon'] = $this->input->post('nama_permohon');
            $data['tanggal_permohonan'] = $this->input->post('tanggal_permohonan');
            $data['waktu_permohonan'] = $this->input->post('waktu_permohonan');
            $data['no_telepon'] = $this->input->post('nomor_telepon');
            $data['ktp'] = $image;
            $data['jenis_informasi'] = $this->input->post('jenis_informasi');
            $data['tujuan_informasi'] = $this->input->post('tujuan_informasi');
            $result = $this->MemberModel->tambah_konsul($data);
            //  echo json_decode($result);
        }
        //=================================END UPLOAD=================

        //redirect('PengelolaController/input_shift');
    }


    public function input_nilai()
    {

        $session_data = $this->session->userdata('sess_member');
        $id_user = $session_data['id_user'];
        $date = date('Y-m-d');
        $jumlah = 0;
        $data[0] = $this->input->post('pertanyaan1');
        $data[1] = $this->input->post('pertanyaan2');
        $data[2] = $this->input->post('pertanyaan3');
        $data[3] = $this->input->post('pertanyaan4');
        $data[4] = $this->input->post('pertanyaan5');
        $data[5] = $this->input->post('pertanyaan6');
        $data[6] = $this->input->post('pertanyaan7');
        $data[7] = $this->input->post('pertanyaan8');
        $data[8] = $this->input->post('pertanyaan9');

        for ($i = 0; $i < sizeof($data); $i++) {
            $jumlah = $jumlah + $data[$i];
        }
        $rata = $jumlah / sizeof($data);
        $result = $this->MemberModel->input_nilai($rata, $id_user, $date);

        echo json_decode($result);
    }

    public function get_tanggapan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $userid = $session_data['id_user'];
        $result = $this->MemberModel->get_konsultasi_userid($userid);
        echo json_encode($result);
    }

    public function set_notifikasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $userid = $session_data['id_user'];
        $view = $this->input->post('view');
        if ($view != '') {
            $this->MemberModel->set_notif($userid);
        }

        $count = $this->MemberModel->get_notif($userid);
        $data = $count[0]['banyak'];
        echo json_encode($data);
    }
}
