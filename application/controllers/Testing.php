<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends MY_Controller {

    const VIEW_PATH = 'pages/testing';
    const CONTROLLER_PATH = '';
    
    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    

    public function index()
    {
        $data['page'] = self::VIEW_PATH . '/index';

        $data['pageTitle'] = 'Data Testing';

        $data['pageAction'] = null;

        $data['variabel'] = getVariabelRepo();

        if (!$_POST) {
            $data['input'] = $this->testing->getDefaultValues($data['variabel']);
        } else {
            $data['input'] = $this->input->post(null, true);
            return $this->store($data);
        }

        $this->appView($data);
    }

    private function store($data)
    {
        // Load form validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->testing->validationRules());

        // Set if validation error
        $this->form_validation->set_error_delimiters(
            '<span>','</span>'
        );

        // Execute validation rules
        if (!$this->form_validation->run()) {
            $data['errorForm'] = [
                'nilai' => form_error('nilai[]')
            ];

            $this->appView($data);
            return;
        }

        foreach ($data['input']['nilai'] as $key => $value) {
            $input[] = [
                'id_variabel' => $key,
                'nilai' => $value
            ];
        }

        if ($this->testing->count() > 0) {
            $status = 'mengubah';
        } else {
            $status = 'menambah';
        }

        if (!$this->db->empty_table('testing')) {
            $this->session->set_flashdata('error', "Gagal $status data testing.");
            redirect('testing');
        }

        if (!$this->db->insert_batch('testing', $input)) {
            $this->session->set_flashdata('error', "Gagal $status data testing.");
        }

        $this->startCalculation($data, $input);
    }

    private function startCalculation($data, $input)
    {
        $this->db->empty_table('hasil');
        $this->db->empty_table('hasil_akhir');

        $sampel = $this->db->get('sampel_item')->result();
        $testing = $this->testing->get();

        $hasil = [];
    
        $pengurangan = [];

        $index = 0;

        foreach ($data['variabel'] as $key2 => $value2) {
            if ($value2->id_status_variabel == 2) {
                continue;
            }

            $hasilKuadrat = 0;

            $dataTesting = $this->testing
                                ->where('id_variabel', $value2->id)
                                ->limit(1)
                                ->first();

            foreach ($sampel as $key => $value) {
    
                $dataSampel = $this->db
                                    ->where('id_variabel', $value2->id)
                                    ->where('id_sampel_item', $value->id)
                                    ->limit(1)
                                    ->get('sampel')
                                    ->row()
                                    ->nilai;
                
                $pengurangan[$key2][$key] = floatval($dataTesting->nilai) - floatval($dataSampel);

                $kuadrat[$key2][$key] = pow($pengurangan[$key2][$key], 2);

                $hasil[$index]['id_variabel'] = $value2->id;
                $hasil[$index]['id_sampel_item'] = $value->id;
                $hasil[$index]['id_testing'] = $dataTesting->id;
                $hasil[$index]['pengurangan'] = $pengurangan[$key2][$key];
                $hasil[$index]['kuadrat'] = $kuadrat[$key2][$key];

                $index++;
            }

        }

        if (!$this->db->insert_batch('hasil', $hasil, null, 300)) {
            $this->session->set_flashdata('error', "Gagal menambah data testing.");
            redirect('testing');
        }

        $newHasil = $this->db->select_sum('kuadrat')
                            ->select('id_sampel_item')
                            ->group_by('id_sampel_item')
                            ->get('hasil')
                            ->result();

        foreach ($newHasil as $key => $value) {
            $hasilAkhir[] = [
                'id_sampel_item' => $value->id_sampel_item,
                'total_kuadrat' => $value->kuadrat,
                'jarak' => sqrt($value->kuadrat)
            ];
        }

        if (!$this->db->insert_batch('hasil_akhir', $hasilAkhir)) {
            $this->session->set_flashdata('error', "Gagal menambah data testing.");
            $this->db->empty_table('hasil');
            $this->db->empty_table('hasil_akhir');
            redirect('testing');
        }

        redirect('hasil');
    }

    public function inputCheck($input = null)
    {
        if ( !$_POST ) {
            show_404();
            return;
        }

        $input = $this->input->post('nilai', true);

        if (!is_array($input)) {
            $this->load->library('form_validation');
            $this->form_validation->set_message('inputCheck', 'Input type is not valid.');
            return false;
        }

        $variabel = getVariabelRepo();

        foreach ($variabel as $key => $value) {

            if ($value->id_status_variabel == 1) {
                if (!array_key_exists($value->id, $input) || strlen($input[$value->id]) < 1) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_message('inputCheck', "$value->nama field must be required.");
                    return false;
                    break;
                }

                if (!is_float($input[$value->id])) {
                    if (is_numeric($input[$value->id])) {
                        continue;
                    }
    
                    $this->load->library('form_validation');
                    $this->form_validation->set_message('inputCheck', "$value->nama value is not valid.");
                    return false;
                }
            }

        }

        return true;

    }

}

/* End of file Dashboard.php */
