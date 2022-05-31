<?php
class M_dashboard extends CI_Model
{

    public function getGraphLastWeek($day)
    {
        return $this->db
            ->select_sum('total_harga', 'TotalItemsOrdered')
            ->where('YEARWEEK (tgl_order) = YEARWEEK(CURDATE()) -1')
            ->where("DATE_FORMAT(tgl_order, '%w') = $day")
            ->where("status", "Delivered")
            ->get('pengiriman')
            ->result();
    }
    public function getGraphThisWeek($day)
    {
        return $this->db
            ->select_sum('total_harga', 'TotalItemsOrdered')
            ->where('YEARWEEK (tgl_order) = YEARWEEK(CURDATE())')
            ->where("DATE_FORMAT(tgl_order, '%w') = $day")
            ->where("status", "Delivered")
            ->get('pengiriman')
            ->result();
    }
    public function getCountOrder($status)
    {
        return $this->db
            ->where('status', $status)
            ->get('pengiriman')
            ->result();
    }
    public function getCount($get)
    {
        return $this->db->count_all_results($get);
    }
    public function getSumIncome()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "Delivered")
            ->get('pengiriman')
            ->result();
    }
    public function getOrder()
    {
        return $this->db
            ->order_by('tgl_order', 'DESC')
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->get('pengiriman', 5)
            ->result();
    }
    public function getCountPaket($paket)
    {
        return $this->db
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->where('jenis_paket', $paket)
            ->count_all_results('pengiriman');
    }
    public function getDt($dt)
    {
        return $this->db
            ->get($dt)
            ->result();
    }
    public function getData()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->get('pengiriman')
            ->result();
    }
    public function search($data)
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->like('pengiriman.no_resi', $data)
            ->get('pengiriman', 5)->result();
    }
    public function addNewData($pengirim, $penerima, $barang, $pengiriman)
    {
        $this->db->trans_start();
        $this->db->insert('pengirim', $pengirim);
        $this->db->insert('penerima', $penerima);
        $this->db->insert('barang', $barang);
        $this->db->insert('pengiriman', $pengiriman);
        $this->db->trans_complete();
    }
    public function deleteData($id_pengiriman, $id_pengirim, $id_penerima, $id_barang)
    {
        $this->db->trans_start();
        $this->db->where('id_pengiriman', $id_pengiriman);
        $this->db->delete('pengiriman');
        $this->db->where('id_pengirim', $id_pengirim);
        $this->db->delete('pengirim');
        $this->db->where('id_penerima', $id_penerima);
        $this->db->delete('penerima');
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');

        $this->db->trans_complete();
    }
    public function getDataById($id_pengiriman)
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where('id_pengiriman', $id_pengiriman)
            ->get('pengiriman')
            ->result();
    }
    public function editData($pengirim, $penerima, $barang, $pengiriman)
    {
        $this->db->trans_start();
        $this->db->where('id_pengirim', $pengirim['id_pengirim']);
        $this->db->update('pengirim', $pengirim);

        $this->db->where('id_penerima', $penerima['id_penerima']);
        $this->db->update('penerima', $penerima);

        $this->db->where('id_barang', $barang['id_barang']);
        $this->db->update('barang', $barang);

        $this->db->where('id_pengiriman', $pengiriman['id_pengiriman']);
        $this->db->update('pengiriman', $pengiriman);



        $this->db->trans_complete();
    }
}
