<?php
class M_report extends CI_Model
{
    public function getDataPengirimanIn()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "Delivered")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncome()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "Delivered")
            ->get('pengiriman')
            ->result();
    }
    public function getDataPengirimanThisMonthIn()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "Delivered")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisMonthIn()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "Delivered")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->get('pengiriman')
            ->result();
    }

    public function getDataPengirimanThisWeekIn()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "Delivered")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisWeekIn()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "Delivered")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->get('pengiriman')
            ->result();
    }
    public function getDataPengirimanThisDayIn()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "Delivered")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisDayIn()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "Delivered")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->get('pengiriman')
            ->result();
    }



    public function getDataPengirimanOut()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "On Process")
            ->or_where("status", "On Delivery")
            ->get('pengiriman')
            ->result();
    }
    public function getSumOutcome()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "On Process")
            ->or_where("status", "On Delivery")
            ->get('pengiriman')
            ->result();
    }
    public function getDataPengirimanThisMonthOut()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "On Process")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->or_where("status", "On Delivery")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisMonthOut()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "On Process")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->or_where("status", "On Delivery")
            ->where("DATE_FORMAT(tgl_order,'%M') = DATE_FORMAT(CURDATE(),'%M')")
            ->get('pengiriman')
            ->result();
    }

    public function getDataPengirimanThisWeekOut()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "On Process")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->or_where("status", "On Delivery")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisWeekOut()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "On Process")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->or_where("status", "On Delivery")
            ->where("YEARWEEK(tgl_order) = YEARWEEK(CURDATE())")
            ->get('pengiriman')
            ->result();
    }
    public function getDataPengirimanThisDayOut()
    {
        return $this->db
            ->join('barang', 'pengiriman.id_barang=barang.id_barang')
            ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
            ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
            ->join('paket', 'pengiriman.id_paket=paket.id_paket')
            ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
            ->where("status", "On Process")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->or_where("status", "On Delivery")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->get('pengiriman')
            ->result();
    }
    public function getSumIncomeThisDayOut()
    {
        return $this->db
            ->select_sum('total_harga', 'TotalOrdered')
            ->where("status", "On Process")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->or_where("status", "On Delivery")
            ->where("DATE_FORMAT(tgl_order,'%Y-%m-%d') = DATE_FORMAT(CURDATE(),'%Y-%m-%d')")
            ->get('pengiriman')
            ->result();
    }
}
