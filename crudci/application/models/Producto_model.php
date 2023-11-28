<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtener_productos() {
        // Consulta para obtener todos los productos de la base de datos
        $query = $this->db->get('datos.productos');
    
        // Devuelve el resultado como un arreglo de objetos
        return $query->result();
    }

    public function agregar_producto($data) {
        // Insertar el nuevo producto en la base de datos
        $this->db->insert('datos.productos', $data);
    }
    
    public function obtener_producto_por_id($id) {
        // Obtener un producto por su ID desde la base de datos
        $query = $this->db->get_where('datos.productos', array('id' => $id));
        return $query->row();
    }
    
    public function actualizar_producto($id, $data) {
        // Actualizar un producto por su ID en la base de datos
        $this->db->where('id', $id);
        $this->db->update('datos.productos', $data);
    }
    

    public function eliminar_producto($id) {
        // Eliminar un producto por su ID en la base de datos
        $this->db->where('id', $id);
        $this->db->delete('datos.productos');
    }    

    public function buscar_productos($termino) {
        // Realizar una búsqueda de productos en la base de datos
        $this->db->like('nombre', $termino);
        $this->db->or_like('descripcion', $termino);
        $query = $this->db->get('datos.productos');
        return $query->result();
    }
    
}

?>
