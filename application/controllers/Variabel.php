<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Variabel extends MY_Controller {

    const VIEW_PATH = 'pages/variabel';
    const CONTROLLER_PATH = '';
    
    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    

    public function index($id = null)
    {
        $data['page'] = self::VIEW_PATH . '/index';

        $data['pageTitle'] = 'Variabel';

        $data['pageAction'] = null;

        $data['ext_styles'] = [
            base_url('theme/adminlte-3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')
        ];

        $data['ext_scripts'] = [
            base_url('theme/adminlte-3/plugins/datatables/jquery.dataTables.js'),
            base_url('theme/adminlte-3/plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
            base_url('assets/scripts/variabel.min.js')
        ];

        $data['variabel'] = $this->variabel->select(
                                            'variabel.id, 
                                            variabel.nama,
                                            variabel.keterangan, 
                                            status_variabel.nama AS status'
                                            )
                                            ->join('status_variabel')
                                            ->get();

        $data['status'] = $this->db->get('status_variabel')
                                    ->result();

        if (!$_POST) {
            $data['input'] = $this->variabel->getDefaultValues();
        } else {
            $data['input'] = $this->input->post(null, false);

            if (empty($id)) {
                return $this->store($data);
            } 

            return $this->update($id, $data);

        }

        $this->appView($data);
    }

    private function store($data)
    {
        // Load form validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->variabel->validationRules());

        // Set if validation error
        $this->form_validation->set_error_delimiters(
            '<span>','</span>'
        );

        // Execute validation rules
        if (!$this->form_validation->run()) {
            $data['errorForm'] = [
                'nama' => form_error('nama'),
                'id_status_variabel' => form_error('id_status_variabel'),
                'keterangan' => form_error('keterangan')
            ];

            $this->appView($data);

            return;
        }

        $id = $this->variabel->create($data['input']);

        if (intval($id) > 0) {
            $this->session->set_flashdata('success', 'Berhasil menambah variabel.');
            resetVariabelRepo();
            
            $sampel = $this->db->group_by('id_sampel_item')
                                ->get('sampel')
                                ->result();

            if (!empty($sampel)) {
                if (!$this->makeNewSampel($sampel, $id)) {
                    $this->variabel->where('id', $id)->delete();
                    $this->session->set_flashdata('error', 'Gagal menambah variabel.');
                    redirect('variabel');
                }
            }

            if ($data['input']['id_status_variabel'] == 1) {
                if (!empty($this->db->limit(1)->get('testing')->row())) {
                    if (!$this->makeNewTesting($id)) {
                        $this->variabel->where('id', $id)->delete();
                        $this->session->set_flashdata('error', 'Gagal menambah variabel.');
                        redirect('variabel');
                    }
                }
            }

        } else {
            $this->session->set_flashdata('error', 'Gagal menambah variabel.');
        }

        redirect('variabel');
    }

    private function startCalculation()
    {
        $this->db->empty_table('hasil');
        $this->db->empty_table('hasil_akhir');

        $sampel = $this->db->get('sampel_item')->result();
        $testing = $this->db->get('testing')->result();
        $variabel = getVariabelRepo();

        $hasil = [];
    
        $pengurangan = [];

        $index = 0;

        foreach ($variabel as $key2 => $value2) {
            if ($value2->id_status_variabel == 2) {
                continue;
            }

            $hasilKuadrat = 0;

            $dataTesting = $this->db
                                ->where('id_variabel', $value2->id)
                                ->limit(1)
                                ->get('testing')
                                ->row();

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
            $this->session->set_flashdata('error', "Gagal mengubah hasil perhitungan.");
            return false;
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
            $this->session->set_flashdata('error', "Gagal mengubah hasil akhir perhitungan.");
            $this->db->empty_table('hasil');
            $this->db->empty_table('hasil_akhir');
            return false;
        }

        return true;
    }

    private function makeNewTesting($idVariabel)
    {
        return $this->db->insert(
            'testing', 
            [
                'id_variabel' => $idVariabel,
                'nilai' => 0
            ]
        );
    }

    private function makeNewSampel($sampel, $id_variabel)
    {
        foreach ($sampel as $key => $value) {
            $newData[] = [
                'id_sampel_item' => $value->id_sampel_item,
                'id_variabel' => $id_variabel,
                'nilai' => 0
            ];
        }

        return $this->db->insert_batch('sampel', $newData, null, 300);
    }

    public function getVariabelById()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }

        $id = $this->input->get('id', true);

        $data = $this->variabel->where('id', $id)
                                ->limit(1)
                                ->first();

        echo json_encode($data);
    }

    private function update($id, $data)
    {
        $data['item'] = $this->db->where('id', $id)
                                    ->get('variabel')
                                    ->row();

        // Load form validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->variabel->validationRules());

        // Set if validation error
        $this->form_validation->set_error_delimiters(
            '<span>','</span>'
        );

        // Execute validation rules
        if (!$this->form_validation->run()) {
            $data['errorForm'] = [
                'nama' => form_error('nama'),
                'id_status_variabel' => form_error('id_status_variabel'),
                'keterangan' => form_error('keterangan')
            ];

            $this->appView($data);

            return;
        }

        if ($this->variabel->update($data['input'], $id)) {

            $this->session->set_flashdata('success', 'Berhasil mengubah variabel.');

            $sampel = $this->db->where('id_variabel', $id)
                                ->get('sampel')
                                ->result();

            if (!empty($sampel)) {
                if (!$this->changeSampel($id, $data['input'], $sampel)) {
                    $this->variabel->update($data['item'], $id);
                    $this->session->set_flashdata('error', 'Gagal mengubah sampel.');
                    redirect('variabel');
                }
            }

            resetVariabelRepo();

        } else {

            $this->session->set_flashdata('error', 'Gagal mengubah variabel.');

        }

        redirect('variabel');
    }

    private function changeSampel($idVariabel, $input, $sampel)
    {
        if ($input['id_status_variabel'] == 1) {
            foreach ($sampel as $key => $value) {
                $data[$key] = $value;
                $data[$key]->nilai = floatval($value->nilai);
            }

            $this->db->update_batch('sampel', $data, 'id');
        }

        return true;
    }

    public function variabelExists($input = null)
    {
        if (!$_POST) {
            show_404();
            return;
        }

        if (empty($input)) {
            return true;
        }

        $variabel = $this->db->where('id', $input)
                            ->count_all_results('status_variabel');

        if ($variabel === 1) {
            return true;
        }

        $this->load->library('form_validation');
        $this->form_validation->set_message('variabelExists', '%s is not valid.');
        return false;

    }

    public function delete($id = null)
    {
        if ($this->input->method() != 'post' || $id === null) {
            show_404();
            return;
        }

        $process = $this->variabel->where('id', $id)
                    ->delete();

        if ($process > 0) {
            $this->session->set_flashdata('success', 'Berhasil menghapus variabel.');
            resetVariabelRepo();
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus variabel.');
        }

        redirect('variabel');
    }

}

/* End of file Dashboard.php */
