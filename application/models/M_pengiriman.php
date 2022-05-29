<?php
class M_pengiriman extends CI_Model
{
  public function testi()
  {
    return $this->db->get('testimonials');
  }
  public function search($data)
  {
    return $this->db->select('*')
      ->from('pengiriman')
      ->join('barang', 'pengiriman.id_barang=barang.id_barang')
      ->join('penerima', 'pengiriman.id_penerima=penerima.id_penerima')
      ->join('pengirim', 'pengiriman.id_pengirim=pengirim.id_pengirim')
      ->join('paket', 'pengiriman.id_paket=paket.id_paket')
      ->join('vendor', 'pengiriman.id_vendor=vendor.id_vendor')
      ->where('pengiriman.no_resi', $data)
      ->get()->result_array();
  }
}
