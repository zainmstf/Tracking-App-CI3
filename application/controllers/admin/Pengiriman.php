<?php

class Pengiriman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Anda belum login !
          </div>');
            redirect(base_url('admin/Auth'));
        }
    }

    public function index()
    {
        $data = $this->M_user->getData($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level,
            'cities' => $this->M_location->getCities(),
            'paket' => $this->M_dashboard->getDt('paket'),
            'vendor' => $this->M_dashboard->getDt('vendor'),
            'title' => "Halaman Type Item"
        );
        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/pengiriman');
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_master_data->getDataPengiriman();
        echo json_encode($data);
    }
    public function addData()
    {
        $id_pengirim = $this->M_dashboard->getDt('pengirim');
        $lastIdPengirim = $id_pengirim[array_key_last($id_pengirim)]->id_pengirim + 1;
        $id_penerima = $this->M_dashboard->getDt('penerima');
        $lastIdPenerima = $id_penerima[array_key_last($id_penerima)]->id_penerima + 1;
        $id_barang = $this->M_dashboard->getDt('barang');
        $lastIdBarang = $id_barang[array_key_last($id_barang)]->id_barang + 1;
        $no_resi = rand();
        $cResi = $this->M_dashboard->getDt('pengiriman');
        for ($i = 0; $i < count($cResi); $i++) {
            if ($no_resi == $cResi[$i]->no_resi) {
                while ($no_resi == $cResi[$i]) {
                    $no_resi = rand();
                }
            }
        }
        $pengirim = [
            'id_pengirim' => $lastIdPengirim,
            'nama_pengirim' => $this->input->post('sender_name'),
            'asal' => $this->input->post('origin_city'),
            'alamat_pengirim' => $this->input->post('sender_address'),
            'telp_pengirim' => $this->input->post('sender_phone_number'),
            'kode_pos_pengirim' => $this->input->post('sender_post_code')
        ];

        $penerima = [
            'id_penerima' => $lastIdPenerima,
            'nama_penerima' => $this->input->post('receipent_name'),
            'tujuan' => $this->input->post('destination_city'),
            'alamat_penerima' => $this->input->post('receipent_address'),
            'telp_penerima' => $this->input->post('receipent_phone_number'),
            'kode_pos_penerima' => $this->input->post('receipent_post_code')
        ];

        $barang = [
            'id_barang' => $lastIdBarang,
            'id_vendor' => $this->input->post('vendor'),
            'nama_barang' => $this->input->post('item_name'),
            'berat' => $this->input->post('weight'),
        ];


        $biaya_pengiriman = $this->input->post('shipping_cost');
        $insurance = $this->input->post('insurance');
        $qty = $this->input->post('qty');
        $total_harga = ($biaya_pengiriman + $insurance) * $qty;

        $keterangan = $this->input->post('note');
        if ($keterangan == NULL) {
            $keterangan = " ";
        }

        $pengiriman = [
            'id_barang' => $lastIdBarang,
            'id_pengirim' => $lastIdPengirim,
            'id_penerima' => $lastIdPenerima,
            'id_paket' => $this->input->post('item_type'),
            'id_vendor' => $this->input->post('vendor'),
            'no_resi' => $no_resi,
            'qty' => $qty,
            'biaya_pengiriman' => $biaya_pengiriman,
            'asuransi' => $insurance,
            'total_harga' => $total_harga,
            'status' => 'On Process',
            'keterangan' => $keterangan,
            'tgl_order' => date('Y-m-d H:i:s'),
            'tgl_diterima' => NULL,
            'username' => $this->session->userdata['username'],
        ];

        $data = $this->M_master_data->addNewDataPengiriman($pengirim, $penerima, $barang, $pengiriman);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id_pengiriman = $this->input->post('id');
        $getId = $this->M_master_data->getDataById('pengiriman', 'id_pengiriman', $id_pengiriman);
        $id_barang = $getId[0]->id_barang;
        $id_pengirim = $getId[0]->id_pengirim;
        $id_penerima = $getId[0]->id_pengirim;
        $data = $this->M_master_data->deleteDataPengiriman($id_pengiriman, $id_pengirim, $id_penerima, $id_barang);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id = $this->input->post('id');
        $data = $this->M_master_data->getDataByIdPengiriman($id);
        echo json_encode($data);
    }
    public function updateData()
    {
        $pengirim = [
            'id_pengirim' => $this->input->post("id_pengirim"),
            'nama_pengirim' => $this->input->post("sender_name"),
            'asal' => $this->input->post('origin_city'),
            'alamat_pengirim' => $this->input->post('sender_address'),
            'telp_pengirim' => $this->input->post('sender_phone_number'),
            'kode_pos_pengirim' => $this->input->post('sender_post_code')
        ];

        $penerima = [
            'id_penerima' => $this->input->post('id_penerima'),
            'nama_penerima' => $this->input->post('receipent_name'),
            'tujuan' => $this->input->post('destination_city'),
            'alamat_penerima' => $this->input->post('receipent_address'),
            'telp_penerima' => $this->input->post('receipent_phone_number'),
            'kode_pos_penerima' => $this->input->post('receipent_post_code')
        ];

        $barang = [
            'id_barang' => $this->input->post('id_barang'),
            'id_vendor' => $this->input->post('vendor'),
            'nama_barang' => $this->input->post('item_name'),
            'berat' => $this->input->post('weight'),
        ];

        $biaya_pengiriman = $this->input->post('shipping_cost');
        $insurance = $this->input->post('insurance');
        $qty = $this->input->post('qty');
        $total_harga = ($biaya_pengiriman + $insurance) * $qty;

        $keterangan = $this->input->post('note');
        if ($keterangan == NULL) {
            $keterangan = " ";
        }

        $pengiriman = [
            'id_pengiriman' => $this->input->post('id_pengiriman'),
            'id_barang' => $this->input->post('id_barang'),
            'id_pengirim' => $this->input->post('id_pengirim'),
            'id_penerima' => $this->input->post('id_penerima'),
            'id_paket' => $this->input->post('item_type'),
            'id_vendor' => $this->input->post('vendor'),
            'no_resi' => $this->input->post('no_resi'),
            'qty' => $qty,
            'biaya_pengiriman' => $biaya_pengiriman,
            'asuransi' => $insurance,
            'total_harga' => $total_harga,
            'status' => 'On Process',
            'keterangan' => $keterangan,
            'tgl_order' => $this->input->post('tgl_order'),
            'tgl_diterima' => NULL,
            'username' => $this->session->userdata['username'],
        ];
        $data = $this->M_master_data->editDataPengiriman($pengirim, $penerima, $barang, $pengiriman);
        echo json_encode($data);
    }
}
