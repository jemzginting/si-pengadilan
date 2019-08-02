<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_konsultasi()
    {
        $this->db->select('*');
        $this->db->where('status', NULL);
        $res = $this->db->get('konsultasi');
        return $res->result_array();
    }

    public function get_chat_name()
    {
        $sql = "SELECT DISTINCT c.id_user, u .name 
        FROM chat c
        JOIN user u
        ON c.id_user = u.id_user
        WHERE (c.id_user = 1 OR c.id_target = 1) AND u.name != 'admin' ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_all_konsultasi()
    {
        $sql = "SELECT * from konsultasi k
                JOIN user u
                ON k.id_user = u.id_user
                where status != '' ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_bulan_konsultasi($bln, $thn)
    {
        $sql = "SELECT * from konsultasi k 
                JOIN user u
                ON k.id_user = u.id_user
                where status != '' AND month(tanggal_permohonan) = " . $bln . " AND year(tanggal_permohonan) =" . $thn;
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function update_konfirmasi($data)
    {
        $this->db->set('status', $data['status']);
        $this->db->set('notif', $data['view']);
        $this->db->where('no_konsul', $data['no_konsul']);
        $this->db->update('konsultasi');
    }
}
