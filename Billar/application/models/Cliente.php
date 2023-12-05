<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends CI_Model {

    public $table = 'clientes';
    public $table_id = 'id_cliente';

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }

    //Traer todos
    public function obtener_clientes() {
        $this->db->select('*');
        $this->db->from('clientes');
        return $this->db->get()->result();
    }

    public function buscar_clientes($busqueda) {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('documento', $busqueda);
        $this->db->or_like('nombres', $busqueda);
        $this->db->or_like('telefono', $busqueda);
        $this->db->or_like('horas_jugadas', $busqueda);
        // $query = $this->db->get();
        return $this->db->get()->result();
    }

    public function agregar_cliente($data){
        $this->db->insert($this->table, $data);
    }

    public function actualizar($id, $data){
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }
}

?>
