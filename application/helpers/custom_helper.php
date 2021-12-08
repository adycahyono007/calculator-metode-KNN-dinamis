<?php

    /**
     * Encript password
     *
     * @param string $input
     * @return string
     */
    function hashEncrypt($input)
    {
        $hash   = password_hash($input, PASSWORD_DEFAULT);
        return $hash;
    }

    /**
     * Verify Password
     *
     * @param string $input
     * @param string $hash
     * @return boolean
     */
    function hashEcryptVerify($input, $hash)
    {
        if (password_verify($input, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check User is Not Login
     *
     * @return boolean
     */
    function guestAccess()
    {
        $CI =& get_instance();

        if (!empty($CI->session->is_login)) {
            redirect('dashboard');
        }
    }

    /**
     * Check User is Admin
     *
     * @return boolean
     */
    function adminAccess()
    {
        $CI =& get_instance();

        if (empty($CI->session->is_login)) {
            redirect('');
        }

        $user = $CI->db->from('admin')
                        ->where('id', $CI->session->id)
                        ->get()
                        ->row();

        if (empty($user)) {
            redirect('');
        }
    }

    function xssFilter($string = null)
    {
        if (empty($string)) {
            return '';
        }

        if (is_numeric($string) || is_integer($string)) {
            return $string;
        }

        return htmlspecialchars("$string", ENT_QUOTES);
    }

    function getVariabelRepo()
    {
        $CI =& get_instance();

        $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $data = $CI->cache->get(md5('variabel'));
        
        if (!$data)
        {
            $data = $CI->db->order_by('id_status_variabel', 'asc')
                            ->get('variabel')
                            ->result();

            $cache = $CI->cache->save(md5('variabel'), $data, 3600);
        }

        return $data;
    }

    function resetVariabelRepo()
    {
        $CI =& get_instance();

        $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $CI->cache->delete(md5('variabel'));
    }

    function decimalOrInteger($data = null)
    {
        if (empty($data)) {
            return '';
        }

        $exploded = explode('.', $data);

        if (count($exploded) < 2) {
            return $data;
        }

        if ($exploded[1] == 00) {
            return intval($exploded[0]);
        }

        return $data;
    }

    function cmp($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }