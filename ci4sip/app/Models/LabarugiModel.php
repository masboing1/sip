<?php

namespace App\Models;

use CodeIgniter\Model;

class LabarugiModel extends Model
{
    public function total_pembelian($tanggal1, $tanggal2)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $hasil = $this->db->query("SELECT count(tb_pembelian.faktur) as tot_transaksi,sum(hp*jumlah) as tot_pembelian 
        from tb_pembelian, tb_pembelian_detail 
		where instansi_id = '$instansi_id' and tanggal between '$tanggal1' and '$tanggal2' and faktur = pembelian_faktur");
        return $hasil;
    }
    public function total_penjualan($tanggal1, $tanggal2, $pelanggan)
    {
        $instansi_id = session()->get('sip_instansi_id');
        if ($pelanggan <> '') {
            $where2 = "and pelanggan_name = '$pelanggan'";
        } else {
            $where2 = '';
        }
        $hasil = $this->db->query("SELECT sum(subtotal) as tot_penjualan,sum(modal) as modal,
        sum(potongan) as potongan, sum(laba) as laba
        from v_penjualan_detail 
		where instansi_id = '$instansi_id' and tanggal between '$tanggal1' and '$tanggal2' $where2");
        return $hasil;
    }
    //laporan operasional
    function total_operasional($tanggal1, $tanggal2, $jenis)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $hasil = $this->db->query("SELECT tm_jenis_operasional.*,jenis_operasional_id, sum(biaya) as biaya
        from tb_operasional, tm_jenis_operasional
		where tb_operasional.jenis_operasional_id = tm_jenis_operasional.id and
        left(tb_operasional.id,4) = '$instansi_id' and tanggal between '$tanggal1' and '$tanggal2' and jenis = '$jenis'
        group by jenis_operasional_id");
        return $hasil;
    }
}
