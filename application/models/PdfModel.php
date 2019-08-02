    <?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class PdfModel extends CI_Model
    {


        public function getContent($data)
        {
            $this->db->select(array('*'));
            $this->db->join('user u', 'b.id_user = u.id_user');
            $this->db->from('konsultasi b');
            $this->db->where('no_konsul', $data);
            $query = $this->db->get();
            return $query->row_array();
        }

        public function getRekapBulan2($bln, $thn)
        {
            $this->db->select(array('b.*'));
            // $this->db->select('b.*');
            $this->db->from('konsultasi b');
            $this->db->where('MONTH(tanggal_permohonan)', $bln);
            $this->db->where('YEAR(tanggal_permohonan)', $thn);
            $query = $this->db->get();
            return $query->row_array();
            // $res = $this->db->get('konsultasi b');
            // return $res->result_array();

            //   return $query->row_array();
        }

        public function getRekapBulan($bln, $thn)
        {

            $this->db->select('b.*, u.alamat, u.pekerjaan');
            $this->db->join('user u', 'b.id_user = u.id_user');
            $this->db->where('MONTH(tanggal_permohonan)', $bln);
            $this->db->where('YEAR(tanggal_permohonan)', $thn);
            $res = $this->db->get('konsultasi b');
            return $res->result_array();

            //   return $query->row_array();
        }
    }
    ?>