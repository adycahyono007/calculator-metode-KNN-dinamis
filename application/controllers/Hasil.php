<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends MY_Controller {

    const VIEW_PATH = 'pages/hasil';
    const CONTROLLER_PATH = '';
    
    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    

    public function index()
    {
        $data['page'] = self::VIEW_PATH . '/index';

        $data['pageTitle'] = 'Hasil Perhitungan';

        $data['pageAction'] = null;

        $data['variabel'] = getVariabelRepo();

        $data['hasil_akhir'] = $this->db->get('view_hasil')
                                        ->result();

        if (!empty($data['variabel'])) {
            $data['hasilKuadratLabel'] = $this->hasilKuadratLabel(
                $data['variabel']
            );
        }

        if (!empty($data['hasil_akhir'])) {
            $data['daftar_hasil'] = $this->daftarHasil(
                $data['hasil_akhir'], $data['variabel']
            );
        }

        $data['ext_scripts'] = [
            base_url('theme/adminlte-3/plugins/chart.js/Chart.min.js'),
            base_url('assets/scripts/hasil.min.js')
        ];

        $this->appView($data);
    }

    public function getSortir()
    {
        $limit = $this->input->get('k');

        if ($limit > 10) {
            $limit = 10;
        }

        $data['hasil_sortir'] = $this->db->order_by('jarak', 'ASC')
                                            ->get('view_hasil')
                                            ->result();

        $data['hasil_sortir'] = $this->hasilSortir(
            $data['hasil_sortir'], getVariabelRepo()
        );

        // var_dump($data['hasil_sortir']);die;

        $data['kesimpulan'] = $this->kesimpulan(
            $data['hasil_sortir'], $limit
        );

        echo json_encode($data);
    }

    private function hasilKuadratLabel($variabel)
    {
        $label = '';
        foreach ($variabel as $key => $value) {
            if ($value->id_status_variabel != 2) {
                if ($key == 0) {
                    $label .= 'X' . ($key + 1);
                    continue;
                }

                $label .= ' + X' . ($key + 1);
            }
        }

        return $label;
    }

    private function daftarHasil($hasilAkhir, $variabel)
    {
        $kategoriArray = [];
        foreach ($hasilAkhir as $key => $value) {

            foreach ($variabel as $key2 => $value2) {
                if ($value2->id_status_variabel == 2) {
                    continue;
                }

                $hasilAkhir[$key]->hasil[] = 
                    $this->db
                        ->select('kuadrat, pengurangan')
                        ->where('id_sampel_item', $value->id_sampel_item)
                        ->where('id_variabel', $value2->id)
                        ->limit(1)
                        ->get('hasil')
                        ->row();
            }
        }

        return $hasilAkhir;
    }

    private function hasilSortir($hasilSortir, $variabel)
    {
        foreach ($hasilSortir as $key => $value) {
            foreach ($variabel as $key2 => $value2) {
                if ($value2->id_status_variabel == 2) {
                    continue;
                }

                $hasilSortir[$key]->sampel[] = 
                    $this->db
                        ->where('id_variabel', $value2->id)
                        ->where('id_sampel_item', $value->id_sampel_item)
                        ->limit(1)
                        ->get('sampel')
                        ->row();
            }
        }

        return $hasilSortir;
    }

    private function kesimpulan($hasilSortir, $limit)
    {
        $data = [];
        $kesimpulan = [];
        // var_dump($hasilSortir, $limit);die;

        foreach ($hasilSortir as $key => $value) {

            // var_dump($key);die;
            if ($key === intval($limit)) {
                break;
            }

            if (array_key_exists($value->kategori, $kesimpulan)) {
                $kesimpulan[$value->kategori]++;
                continue;
            }

            $kesimpulan[$value->kategori] = 1;
        }

        $terbesar = 0;
        foreach ($kesimpulan as $key => $value) {
            // var_dump();
            if ($terbesar < $value) {
                $terbesar = $value;
                $string = $key;
            }
        }

        return $string;
    }

}

/* End of file Hasil.php */
