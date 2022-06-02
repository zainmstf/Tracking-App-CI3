<?php
class M_master_data extends CI_Model
{
    public function getData($dt)
    {
        return $this->db
            ->get($dt)
            ->result();
    }
    public function getDataBarang()
    {
        return $this->db
            ->join('vendor', 'barang.id_vendor=vendor.id_vendor')
            ->get('barang')
            ->result();
    }
    public function addNewData($dt, $data)
    {
        $this->db->insert($dt, $data);
    }
    public function getDataById($dt, $where, $id)
    {
        return $this->db
            ->where($where, $id)
            ->get($dt)
            ->result();
    }
    public function deleteData($dt, $columnId, $id)
    {

        $this->db->where($columnId, $id);
        $this->db->delete($dt);
    }
    public function editData($dt, $columnId, $id, $dataDt)
    {
        $this->db->where($columnId, $id);
        $this->db->update($dt, $dataDt);
    }
    public function getDataPengiriman()
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
    public function addNewDataPengiriman($pengirim, $penerima, $barang, $pengiriman)
    {
        $this->db->trans_start();
        $this->db->insert('pengirim', $pengirim);
        $this->db->insert('penerima', $penerima);
        $this->db->insert('barang', $barang);
        $this->db->insert('pengiriman', $pengiriman);
        $this->db->trans_complete();
    }
    public function deleteDataPengiriman($id_pengiriman, $id_pengirim, $id_penerima, $id_barang)
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

    public function getDataByIdPengiriman($id_pengiriman)
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
    public function editDataPengiriman($pengirim, $penerima, $barang, $pengiriman)
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
    public function changeStatus($pengiriman)
    {
        $this->db->where('id_pengiriman', $pengiriman['id_pengiriman']);
        $this->db->update('pengiriman', $pengiriman);
    }
}
