<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventario extends CI_Model
{
    public $table = 'inventario';
    public $table_id = 'id_inventario';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }

    public function index()
    {
        // Lógica para la página principal si es necesario
    }

    public function guardar($data)
    {
        // Lógica para guardar (crear o actualizar) un registro en el inventario
        // Si $data contiene un 'id_inventario', se actualiza; de lo contrario, se inserta uno nuevo
        if (isset($data['id_inventario'])) {
            return $this->update($data);
        } else {
            return $this->insert($data);
        }
    }

    public function borrar($id)
    {
        // Lógica para borrar un registro del inventario por ID
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

    public function editar($id)
    {
        // Lógica para obtener los datos de un registro del inventario por ID
        $this->db->where($this->table_id, $id);
        $query = $this->db->get($this->table);
        return $query->row(); // Devuelve un solo objeto con los datos del registro
    }

    public function lista()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {
        $this->db->where($this->table_id, $data['id_inventario']);
        $this->db->update($this->table, $data);
        return $data['id_inventario'];
    }

    public function obtenerProducto($idProducto)
    {
        $this->db->select('nombre, categoria');
        $this->db->from('productos');
        $this->db->where('id_producto', $idProducto);
        $query = $this->db->get();
        return $query->row();
    }

    public function buscarInventario($buscar) {
        $this->db->select('productos.nombre AS producto_nombre, productos.categoria, inventario.unidad_medida, inventario.cantidad');
    
        // Realiza la unión entre las tablas productos e inventario
        $this->db->from('productos');
        $this->db->join('inventario', 'productos.id_producto = inventario.id_producto', 'left');
    
        // Aplica la condición de búsqueda en ambos campos (nombre y categoría)
        $this->db->group_start();
        $this->db->like('productos.nombre', $buscar);
        $this->db->or_like('productos.categoria', $buscar);
        $this->db->or_like('inventario.unidad_medida', $buscar);
        $this->db->or_like('inventario.cantidad', $buscar);
        $this->db->group_end();
    
        $query = $this->db->get();
    
        return $query->result();
    }
}
