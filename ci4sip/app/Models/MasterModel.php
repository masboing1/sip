<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
    function get($tabel, $where = false)
    {
        if ($where == false) {
            $query = db_connect()->query("SELECT * from $tabel");
        } else {
            $query = db_connect()->query("SELECT * from $tabel $where");
        }
        return $query;
    }

    function get_id_master($tabel, $pk)
    {
        $query = db_connect()->query("SELECT MAX($pk) AS id_max FROM $tabel");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
            }
        } else {
            $tmp = "1";
        }
        return $tmp;
    }
    function get_id($tabel, $pk)
    {
        $query = db_connect()->query("SELECT MAX(RIGHT($pk,3)) AS id_max FROM $tabel");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
                $id = sprintf("%03s", $tmp);
            }
        } else {
            $id = "001";
        }
        return $id;
    }
    function get_id3($tabel, $where)
    {
        $query = db_connect()->query("SELECT MAX(RIGHT(id,3)) AS id_max FROM $tabel $where");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
                $id = sprintf("%03s", $tmp);
            }
        } else {
            $id = "001";
        }
        return $id;
    }
    function get_id6($tabel, $where)
    {
        $query = db_connect()->query("SELECT MAX(RIGHT(id,6)) AS id_max FROM $tabel $where");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
                $id = sprintf("%06s", $tmp);
            }
        } else {
            $id = "000001";
        }
        return $id;
    }

    function get_id_barang($tabel, $kategorisatuan)
    {
        $query = db_connect()->query("SELECT MAX(RIGHT(id,6)) AS id_max FROM $tabel where id like '$kategorisatuan%'");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
                $id = sprintf("%06s", $tmp);
            }
        } else {
            $id = "000001";
        }
        return $id;
    }
    function get_faktur($tabel, $tanggal)
    {
        $q = $this->db->query("SELECT MAX(RIGHT(faktur,3)) AS id_max FROM $tabel where tanggal = '" . $tanggal . "'");
        if ($q->getNumRows() > 0) {
            foreach ($q->getresult() as $rs) {
                $tmp = ((int)$rs->id_max) + 1;
                $id = sprintf("%03s", $tmp);
            }
        } else {
            $id = "001";
        }
        return str_replace('-', '', $tanggal) . "-" . $id;
    }
    function get_bulan($tabel)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $hasil = $this->db->query("SELECT DATE_FORMAT( tanggal, '%Y-%m' ) AS id, DATE_FORMAT( tanggal, '%M %Y' ) AS bulan
		FROM $tabel where LEFT(id,4) = '$instansi_id'
		GROUP BY DATE_FORMAT( tanggal, '%Y-%m' )
		ORDER BY DATE_FORMAT( tanggal, '%Y-%m' ) DESC");
        return $hasil;
    }
    function get_tahun($tabel)
    {
        $hasil = $this->db->query("SELECT DATE_FORMAT( tanggal, '%Y' ) AS tahun
		FROM $tabel
		GROUP BY DATE_FORMAT( tanggal, '%Y' )
		ORDER BY DATE_FORMAT( tanggal, '%Y' ) DESC");
        return $hasil;
    }
}
