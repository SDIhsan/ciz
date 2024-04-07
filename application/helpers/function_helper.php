<?php

function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_message('Silahkan login!');
        redirect('login');
    }
}

function is_admin()
{
    $ci = get_instance();
    $level = $ci->session->userdata('login_session')['level'];

    $status = true;

    if ($level != 'Admin') {
        $status = false;
    }

    return $status;
}

function set_message($message, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <span class='alert-icon'><i class='ni ni-like-2'></i></span>
        <span class='alert-text text-white'><strong>Success!</strong> {$message} </span>
        </div>");
    } else {
        $ci->session->set_flashdata('message', "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <span class='alert-icon'><i class='ni ni-like-2'></i></span>
        <span class='alert-text text-white'><strong>Warning!</strong> {$message} </span>
        </div>");
    }
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('User_model', 'amod');

    $userId = $ci->session->userdata('login_session')['user'];
    return $ci->amod->get('user', ['id_user' => $userId])[$field];
}

function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}
