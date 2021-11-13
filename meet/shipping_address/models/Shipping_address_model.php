<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Shipping_address_model extends App_Model
    {
        public function insert_data($table,$data)
        {
            return $this->db->insert($table,$data);
        }

        public function delete_data($table,$where)
        {
            return $this->db->delete($table,$where);
        }

        public function update_data($table,$data,$where)
        {
            return $this->db->update($table,$data,$where);
        }

    }