<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        // Obtener todos los productos desde el modelo
        $data['productos'] = $this->Producto_model->obtener_productos();

        // Cargar la vista 'productos_list.php' y pasar datos
        $this->load->view('productos_list', $data);
    }

    public function agregar() {
        // Verifica si se ha enviado un formulario
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        
        if ($_POST) {
            // Validación de formulario y procesamiento de datos
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
            $this->form_validation->set_rules('costo', 'Costo', 'required|numeric');
            $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
            $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|integer');
            
            if ($this->form_validation->run() === TRUE) {
                // Datos del formulario
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'costo' => $this->input->post('costo'),
                    'precio' => $this->input->post('precio'),
                    'cantidad' => $this->input->post('cantidad')
                );
    
                // Agregar el producto a la base de datos
                $this->Producto_model->agregar_producto($data);
    
                // Redireccionar a la lista de productos
                redirect('productos');
            }
        }
    
        // Cargar la vista 'producto_form.php' para agregar productos
        $this->load->view('producto_form');
    }
    
    public function editar($id) {
        // Verifica si se ha enviado un formulario
        if ($_POST) {
            // Validación de formulario y procesamiento de datos (similar a 'agregar')
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
            $this->form_validation->set_rules('costo', 'Costo', 'required|numeric');
            $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
            $this->form_validation->set_rules('cantidad', 'Cantidad', 'required|integer');
    
            if ($this->form_validation->run() === TRUE) {
                // Datos del formulario
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'costo' => $this->input->post('costo'),
                    'precio' => $this->input->post('precio'),
                    'cantidad' => $this->input->post('cantidad')
                );
    
                // Actualizar el producto en la base de datos usando el modelo
                $this->Producto_model->actualizar_producto($id, $data);
    
                // Redireccionar a la lista de productos
                redirect('productos');
            }
        }
    
        // Obtener los datos del producto por ID
        $data['producto'] = $this->Producto_model->obtener_producto_por_id($id);
    
        // Cargar la vista 'producto_form.php' para editar productos
        $this->load->view('producto_form', $data);
    }
    

    public function eliminar($id) {
        // Elimina el producto por su ID en el modelo
        $this->Producto_model->eliminar_producto($id);
    
        // Redireccionar a la lista de productos
        redirect('productos');
    }
    

    public function buscar() {
        // Verifica si se ha enviado un formulario de búsqueda
        if ($_POST) {
            $termino = $this->input->post('termino');
    
            // Realizar la búsqueda de productos en el modelo
            $data['productos'] = $this->Producto_model->buscar_productos($termino);
    
            // Cargar la vista 'productos_list.php' con resultados de búsqueda
            $this->load->view('productos_list', $data);
        } else {
            // Si no se envió un formulario, redirigir a la lista de productos
            redirect('productos');
        }
    }
    
}
?>
