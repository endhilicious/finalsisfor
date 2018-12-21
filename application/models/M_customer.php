<?php
/**
 * Created by PhpStorm.
 * User: AndiWijaya
 * Date: 12/5/2018
 * Time: 10:01 PM
 */

class M_customer extends CI_Model
{

    function tampil_data() {
        return $this->db->get('customer');
    }

    function tampil_customer($where, $table) {
        return$this->db->get_where($table, $where);
    }

    function input_customer($data, $table) {
        $this->db->insert($table, $data);
    }

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}