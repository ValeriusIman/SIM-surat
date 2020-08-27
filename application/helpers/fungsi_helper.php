<?php
function not_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_name')) {
        redirect('auth');
    }
}
function login()
{
    $ci = get_instance();
    if ($ci->session->userdata('user_name')) {
        redirect('dashboard');
    }
}

function userData()
{
    $ci = get_instance();
    $result['user'] = $ci->db->get_where('user', ['user_name' =>
    $ci->session->userdata('user_name')])->row_array();
    return $result;
}

function check_admin()
{
    $ci = get_instance();
    $roleId = $ci->session->userdata('level');
    if ($roleId != 1) {
        redirect('auth/blocked');
    }
}

function check_disposisi()
{
    $ci = get_instance();
    $roleId = $ci->session->userdata('level');
    if ($roleId == 2) {
        redirect('auth/blocked');
    }
}

function ifNull($data, $return)
{
    if ($data == NULL) {
        $data = $return;
    }
    return $data;
}

function ifNol($data, $return)
{
    if ($data == "0") {
        $data = $return;
    }
    return $data;
}
