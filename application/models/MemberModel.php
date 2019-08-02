<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_nomor_urut()
    {
        $sql = "SELECT max(no_konsul) as no_konsul FROM konsultasi";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function tambah_konsul($data)
    {
        $this->db->set('no_konsul', $data['no_konsul']);
        $this->db->set('nama_permohon', $data['nama_permohon']);
        $this->db->set('tanggal_permohonan', $data['tanggal_permohonan']);
        $this->db->set('waktu_permohonan', $data['waktu_permohonan']);
        $this->db->set('no_telepon', $data['no_telepon']);
        $this->db->set('jenis_informasi', $data['jenis_informasi']);
        $this->db->set('tujuan_informasi', $data['tujuan_informasi']);
        $this->db->set('ktp', $data['ktp']);
        $this->db->set('id_user', $data['id_user']);
        $this->db->insert('konsultasi');
        $this->db->insert_id();
    }


    public function input_nilai($data, $id_user, $date)
    {
        $this->db->set('nilai', $data);
        $this->db->set('id_user', $id_user);
        $this->db->set('tanggal', $date);
        $this->db->insert('penilaian');
        $this->db->insert_id();
    }

    public function get_konsultasi_userid($userid)
    {
        $sql = 'SELECT * from konsultasi where status != ""  AND id_user=' . $userid;
        $res = $this->db->query($sql);
        return $res->result_array();
    }


    public function set_notif($userid)
    {
        $this->db->set('notif', '2');
        $this->db->where('notif', '1');
        $this->db->where('id_user', $userid);
        $this->db->update('konsultasi');
    }

    public function get_notif($userid)
    {
        $sql = "SELECT COUNT(no_konsul) as banyak FROM konsultasi WHERE notif = 1 AND id_user =" . $userid;
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}
