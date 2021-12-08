<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampel extends MY_Controller {

    const VIEW_PATH = 'pages/sampel';
    const CONTROLLER_PATH = '';
    
    public function __construct()
    {
        parent::__construct();
        adminAccess();
    }
    

    public function index($id = null)
    {
        $data['page'] = self::VIEW_PATH . '/index';

        $data['pageTitle'] = 'Sampel';

        $data['pageAction'] = null;

        $data['ext_styles'] = [
            base_url('theme/adminlte-3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')
        ];

        $data['ext_scripts'] = [
            base_url('theme/adminlte-3/plugins/datatables/jquery.dataTables.js'),
            base_url('theme/adminlte-3/plugins/datatables-bs4/js/dataTables.bootstrap4.js'),
            base_url('assets/scripts/sampel.min.js')
        ];

        $data['variabel'] = getVariabelRepo();

        $data['sampel'] = $this->db->get('sampel_item')->result();

        if (!empty($data['sampel'])) {
            foreach ($data['sampel'] as $key => $value) {
                foreach ($data['variabel'] as $key2 => $value2) {
                    $data['sampel'][$key]->sampel[] = $this->sampel
                                                ->where('id_sampel_item', $value->id)
                                                ->where('id_variabel', $value2->id)
                                                ->first();
                }
            }
        }

        if (!$_POST) {
            $data['input'] = $this->sampel->getDefaultValues();
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

        $this->form_validation->set_rules($this->sampel->validationRules());

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

        $this->db->insert(
            'sampel_item', 
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s') 
            ]
        );

        $id_sampel_item = $this->db->insert_id();

        foreach ($data['input']['nilai'] as $key => $value) {
            $input[] = [
                'id_variabel' => $key,
                'nilai' => $value,
                'id_sampel_item' => $id_sampel_item
            ];
        }

        if (!$this->db->insert_batch('sampel', $input)) {
            $this->session->set_flashdata('error', 'Gagal menambah sampel.');
        } else {
            $this->session->set_flashdata('success', 'Berhasil menambah sampel.');
        }

        redirect('sampel');
    }

    public function getById()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }

        $id = $this->input->get('id', true);

        $data = $this->sampel->where('id_sampel_item', $id)
                                ->get();

        echo json_encode($data);
    }

    private function update($id, $data)
    {
        // Load form validation library
        $this->load->library('form_validation');

        $this->form_validation->set_rules($this->sampel->validationRules());

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

        $sampel = $this->sampel->where('id_sampel_item', $id)
                                ->get();

        foreach ($sampel as $key => $value) {
            $input[$key] = [
                'id' => $value->id,
                'id_variabel' => $value->id_variabel,
                'id_sampel_item' => $value->id_sampel_item,
                'nilai' => $data['input']['nilai'][$value->id_variabel]
            ];
        }

        if ($this->db->update_batch('sampel', $input, 'id') < 1) {
            $this->session->set_flashdata('warning', 'Sampel tidak ada perubahan.');
        } else {
            $this->session->set_flashdata('success', 'Berhasil mengubah sampel.');
        }

        redirect('sampel');
    }

    public function inputCheck($input = null)
    {
        if ( !$_POST ) {
            show_404();
            return;
        }

        $input = $this->input->post('nilai', true);
        $this->load->library('form_validation');

        if (!is_array($input)) {
            $this->form_validation->set_message('inputCheck', 'Input type is not valid.');
            return false;
        }

        $variabel = getVariabelRepo();

        foreach ($variabel as $key => $value) {
            if (!array_key_exists($value->id, $input) || strlen($input[$value->id]) < 1) {
                $this->form_validation->set_message('inputCheck', "$value->nama field must be required.");
                return false;
                break;
            }

            if ($value->id_status_variabel == 1) {
                if (!is_float($input[$value->id])) {

                    if (is_numeric($input[$value->id])) {
                        $exploded = explode('.', $input[$value->id]);
                        if (strlen($exploded[0]) > 10) {
                            $this->form_validation->set_message('inputCheck', "$value->nama value maximum length of 10 characters.");
                            return false;
                        }

                        if (count($exploded) > 1) {
                            if (strlen($exploded[1]) > 2) {
                                $this->form_validation->set_message('inputCheck', "$value->nama comma maximum length of 2 characters.");
                                return false;
                            }
                        }

                        continue;
                    }
    
                    $this->form_validation->set_message('inputCheck', "$value->nama value is not valid.");
                    return false;
                }

                $exploded = explode('.', $input[$value->id]);
                if (strlen($exploded[0]) > 10) {
                    $this->form_validation->set_message('inputCheck', "$value->nama value maximum length of 10 characters.");
                    return false;
                }

                if (strlen($exploded[1]) > 2) {
                    $this->form_validation->set_message('inputCheck', "$value->nama comma maximum length of 2 characters.");
                    return false;
                }
            }

        }

        return true;

    }

    public function delete($id = null)
    {
        if ($this->input->method() != 'post' || $id === null) {
            show_404();
            return;
        }

        $process = $this->db->where('id', $id)
                    ->delete('sampel_item');

        if ($process > 0) {
            $this->session->set_flashdata('success', 'Berhasil menghapus sampel.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus sampel.');
        }

        redirect('sampel');
    }

}

/* End of file Dashboard.php */
