<?php
class Dashboard extends CI_Controller
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
        for ($i = 0; $i < 7; $i++) {
            $graphTw[] = $this->M_dashboard->getGraphThisWeek($i);
            $graphLw[] = $this->M_dashboard->getGraphLastWeek($i);
        }

        for ($i = 0; $i < 7; $i++) {
            if (empty($graphTw[$i][0]->TotalItemsOrdered)) {
                $graphTw[$i][0]->TotalItemsOrdered = 0;
            }
            if (empty($graphLw[$i][0]->TotalItemsOrdered)) {
                $graphLw[$i][0]->TotalItemsOrdered = 0;
            }
        }
        $paket = $this->M_dashboard->getDt('paket');
        if (count($paket) > 0) {
            for ($i = 0; $i < count($paket); $i++) {
                $jenis_paket[][] = $paket[$i]->jenis_paket;
            }
            for ($i = 0; $i < count($paket); $i++) {
                array_push($jenis_paket[$i], $this->M_dashboard->getCountPaket($jenis_paket[$i][0]));
            }
        }

        $data = $this->M_user->getData($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'level' => $data->level,
            'graphTw' => $graphTw,
            'graphLw' => $graphLw,
            'totalOrderOp' => $this->M_dashboard->getCountOrder('On Process'),
            'totalOrderOd' => $this->M_dashboard->getCountOrder('On Delivery'),
            'totalOrderD' => $this->M_dashboard->getCountOrder('Delivered'),
            'totalOrderC' => $this->M_dashboard->getCountOrder('Canceled'),
            'totalSender' => $this->M_dashboard->getCount('pengirim'),
            'totalReceiver' => $this->M_dashboard->getCount('penerima'),
            'totalUser' => $this->M_dashboard->getCount('user'),
            'totalBarang' => $this->M_dashboard->getCount('barang'),
            'totalVendor' => $this->M_dashboard->getCount('vendor'),
            'totalTestimonials' => $this->M_dashboard->getCount('testimonials'),
            'totalIncome' => $this->M_dashboard->getSumIncome(),
            'lastOrder' => $this->M_dashboard->getOrder(),
            'cities' => $this->M_location->getCities(),
            'jenisPaket' => $jenis_paket,
            'paket' => $paket,
            'vendor' => $this->M_dashboard->getDt('vendor'),
            'title' => "Halaman Dashboard"
        );


        // echo "<pre>";
        // print_r($this->M_location->getProvinces());
        // echo "</pre>";


        $this->load->view('template/admin_header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/admin_footer');
    }
    public function getData()
    {
        $data = $this->M_dashboard->getOrder();
        echo json_encode($data);
    }
    public function getDataFromAjx()
    {
        $data = $this->input->post('input_ajx');
        $ini = $this->M_dashboard->search($data);
        echo json_encode($ini);
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

        $data = $this->M_dashboard->addNewData($pengirim, $penerima, $barang, $pengiriman);
        echo json_encode($data);
    }
    public function deleteData()
    {
        $id_pengiriman = $this->input->post('id_pengiriman');
        $data = $this->M_dashboard->deleteData($id_pengiriman);
        echo json_encode($data);
    }
    public function getDataId()
    {
        $id_pengiriman = $this->input->post('id_pengiriman');
        $data = $this->M_dashboard->getDataById($id_pengiriman);
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
            'id_penerima' => $this->input->post('id_pengirim'),
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
        $data = $this->M_dashboard->editData($pengirim, $penerima, $barang, $pengiriman);
        echo json_encode($data);
    }
}
