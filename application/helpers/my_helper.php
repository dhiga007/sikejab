<?php
function get_total($matriks = array(), $ASPEK)
{
    $total = array();
    foreach ($matriks as $key => $value) {
        $total[$key] = 0;
        foreach ($value as $k => $v) {
            $total[$key] += $v * $ASPEK[$k]->persen / 100;
        }
    }
    return $total;
}
function get_bobot_nilai($nilai)
{
    $array = array(
        '0' => 5,
        '1' => 4.5,
        '-1' => 4,
        '2' => 3.5,
        '-2' => 3,
        '3' => 2.5,
        '-3' => 2,
        '4' => 1.5,
        '-4' => 1,
    );
    return $array[$nilai];
}

function get_bobot_nilai_gap(&$matriks = array())
{
    foreach ((array)$matriks as $key => $value) {
        foreach ($value as $k => $v) {
            $matriks[$key][$k] = get_bobot_nilai($v);
        }
    }
}

function get_peta_gap(&$matriks = array(), $KRITERIA)
{
    foreach ((array) $matriks as $key => $value) {
        foreach ($value as $k => $v) {
            $matriks[$key][$k] = $v - $KRITERIA[$k]->nilai_kriteria;
        }
    }
}


function load_view($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('headerbaru', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footerbaru', $data);
}

function load_view_cetak($view, $data = array())
{
    $CI = &get_instance();
    $CI->load->view('header_cetak', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_cetak', $data);
}

function load_message($message = '', $type = 'danger')
{
    if ($type == 'danger') {
        $data['title'] = 'Error';
    } else {
        $data['title'] = 'Success';
    }

    $data['class'] = $type;
    $data['message'] = $message;

    load_view('message', $data);
}

function get_parent_array()
{
    $CI = &get_instance();

    $data = array('' => 'No Parent');
    $rows = $CI->kriteria_model->get_parent();
    $data2 = walk_kriteria($rows);

    return array_merge($data, $data2);
}

function get_nilai_option($selected = '')
{
    $nilai = array(
        '1' => 'Kurang',
        '2' => 'Cukup',
        '3' => 'Baik',
        '4' => 'Sangat Baik',
    );
    foreach ($nilai as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$key - $value</option>";
        else
            $a .= "<option value='$key'>$key - $value</option>";
    }
    return $a;
}

function get_aspek_option($selected = '')
{
    $CI = &get_instance();
    $rows = $CI->aspek_model->tampil();

    $a = '';
    foreach ($rows as $row) {
        if ($selected == $row->kode_aspek)
            $a .= "<option value='$row->kode_aspek' selected>$row->nama_aspek</option>";
        else
            $a .= "<option value='$row->kode_aspek'>$row->nama_aspek</option>";
    }
    return $a;
}

function get_factor_option($selected = '')
{
    $atribut = array('Core' => 'Core', 'Secondary' => 'Secondary');
    $a = '';
    foreach ($atribut as $key => $value) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$value</option>";
        else
            $a .= "<option value='$key'>$value</option>";
    }
    return $a;
}

function print_error()
{
    return validation_errors('<div class="alert alert-danger" alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
}
function kode_oto($field, $table, $prefix, $length)
{
    $CI = &get_instance();
    $query = $CI->db->query("SELECT $field AS kode FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    $row = $query->row_object();

    if ($row) {
        return $prefix . substr(str_repeat('0', $length) . (substr($row->kode, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}
