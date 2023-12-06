package VistaVendedor;

import Alerts.AlertConfirmarDesligar;
import Alerts.GeneratingAlert;
import Clases.ButtonEditor;
import Clases.ButtonRenderer;
import Main.ConsumoApi;
import Main.Main;
import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.HashMap;
import java.util.Map;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.table.DefaultTableModel;

public class Vendedores extends javax.swing.JPanel {
    
    private ConsumoApi consumo;
    private Gson gson;
    private Font font;
    DefaultTableModel modelo;
    public Main main;
    
    public Vendedores(Main main) {
        consumo = new ConsumoApi();
        this.main = main;
        gson = new Gson();
        font = new Font("Segoe UI", Font.BOLD, 14);
        initComponents();
        initAlternComponets();
        mostrarVendedores();
    }

    Vendedores() {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jButton2 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        tablaVendedor = new javax.swing.JTable();
        inputBuscar = new javax.swing.JTextField();
        btnBuscarSeller = new javax.swing.JButton();
        BtnConAsignar = new javax.swing.JButton();
        BtnSinAsignar = new javax.swing.JButton();
        TituloInformativo = new javax.swing.JLabel();

        setBackground(new java.awt.Color(241, 230, 253));
        setForeground(new java.awt.Color(241, 230, 253));

        jButton2.setBackground(new java.awt.Color(113, 0, 234));
        jButton2.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        jButton2.setForeground(new java.awt.Color(255, 255, 255));
        jButton2.setText("CREAR VENDEDOR");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        tablaVendedor.setBackground(new java.awt.Color(241, 230, 253));
        tablaVendedor.setFont(new java.awt.Font("Segoe UI", 1, 14)); // NOI18N
        tablaVendedor.setForeground(new java.awt.Color(0, 0, 0));
        tablaVendedor.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null},
                {null, null, null, null, null, null}
            },
            new String [] {
                "DOCUMENTO", "NOMBRE", "APELLIDO", "VER", "EDITAR", "OPCION"
            }
        ));
        tablaVendedor.setSelectionBackground(new java.awt.Color(113, 0, 234));
        tablaVendedor.setShowGrid(true);
        jScrollPane1.setViewportView(tablaVendedor);

        inputBuscar.setFont(new java.awt.Font("Segoe UI", 1, 14)); // NOI18N
        inputBuscar.setForeground(new java.awt.Color(0, 0, 0));
        inputBuscar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                inputBuscarActionPerformed(evt);
            }
        });

        btnBuscarSeller.setBackground(new java.awt.Color(113, 0, 234));
        btnBuscarSeller.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnBuscarSeller.setForeground(new java.awt.Color(255, 255, 255));
        btnBuscarSeller.setText("BUSCAR");
        btnBuscarSeller.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnBuscarSellerActionPerformed(evt);
            }
        });

        BtnConAsignar.setBackground(new java.awt.Color(113, 0, 234));
        BtnConAsignar.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        BtnConAsignar.setForeground(new java.awt.Color(255, 255, 255));
        BtnConAsignar.setText("VENDEDORES CON ASIGNACION");
        BtnConAsignar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BtnConAsignarActionPerformed(evt);
            }
        });

        BtnSinAsignar.setBackground(new java.awt.Color(113, 0, 234));
        BtnSinAsignar.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        BtnSinAsignar.setForeground(new java.awt.Color(255, 255, 255));
        BtnSinAsignar.setText("VENDEDORES SIN ASIGNACION");
        BtnSinAsignar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BtnSinAsignarActionPerformed(evt);
            }
        });

        TituloInformativo.setFont(new java.awt.Font("Segoe UI", 1, 24)); // NOI18N
        TituloInformativo.setForeground(new java.awt.Color(113, 0, 234));
        TituloInformativo.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        TituloInformativo.setText("VENDEDORES");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(TituloInformativo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jScrollPane1)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(BtnConAsignar)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 99, Short.MAX_VALUE)
                        .addComponent(BtnSinAsignar))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(inputBuscar)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(btnBuscarSeller)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jButton2)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(TituloInformativo)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnBuscarSeller, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(inputBuscar, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(BtnConAsignar, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(BtnSinAsignar, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 344, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );
    }// </editor-fold>//GEN-END:initComponents

    
    private void initAlternComponets(){
        
        BtnConAsignar.setVisible(false);
        
        modelo = (DefaultTableModel) tablaVendedor.getModel();
        
        this.tablaVendedor.getColumn("VER").setCellRenderer(new ButtonRenderer());
        this.tablaVendedor.getColumn("VER").setCellEditor(new ButtonEditor(new JCheckBox()));
        
        this.tablaVendedor.getColumn("EDITAR").setCellRenderer(new ButtonRenderer());
        this.tablaVendedor.getColumn("EDITAR").setCellEditor(new ButtonEditor(new JCheckBox()));
        
        this.tablaVendedor.getColumn("OPCION").setCellRenderer(new ButtonRenderer());
        this.tablaVendedor.getColumn("OPCION").setCellEditor(new ButtonEditor(new JCheckBox())); 
    }
    
    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
        // ACA VA EL CODIGO PARA MOSTRAR LA VENTANA PARA REGISTAR UN PARQUEADERO
        System.out.println("\n SE APRETO EL BOTON DE CREAR VENDEDOR \n");
        
        // HACEMOS LA INSTANCIA DE LA VENTANA QUE QUEREMOS CREAR Y LA MOSTRAMOS
        CreateSeller mostrarFrame = new CreateSeller(this);
        mostrarFrame.setVisible(true);
        
        this.main.setVisible(false);
        
    }//GEN-LAST:event_jButton2ActionPerformed

    private void BtnConAsignarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BtnConAsignarActionPerformed
        BtnConAsignar.setVisible(false);
        BtnSinAsignar.setVisible(true);
        mostrarVendedores();
    }//GEN-LAST:event_BtnConAsignarActionPerformed

    private void BtnSinAsignarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BtnSinAsignarActionPerformed
        
        BtnConAsignar.setVisible(true);
        BtnSinAsignar.setVisible(false);
        mostrarVendedoresSinAsignar();
      
    }//GEN-LAST:event_BtnSinAsignarActionPerformed

    private void btnBuscarSellerActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnBuscarSellerActionPerformed
        // ACA VA EL CODIGO PARA BUSCAR USUARIO
        System.out.println("\n SE APRETO EL BOTON DE BUSCAR USUARIO \n");
        
        String cedula = inputBuscar.getText();
        if(cedula != null && !cedula.isEmpty()) {
            // MAPEAMOS LOS DATOS
            Map<String, String> consultaUser = new HashMap<>();
            consultaUser.put("cedula",cedula);
            String consultarUsuario = consumo.consumoPOST("http://localhost/APIenPHP/API-Personas/VerificarPersona.php",consultaUser);
            System.out.println("consultar usuario: " + consultarUsuario);
            JsonObject jsonResponse = gson.fromJson(consultarUsuario, JsonObject.class);

            boolean status = jsonResponse.get("status").getAsBoolean();
            if (status) {
                modelo.setRowCount(0);
                JsonArray usuario = jsonResponse.getAsJsonArray("registros");
                for(int i = 0; i < usuario.size(); i++ ){
                    JsonObject viewUser = usuario.get(i).getAsJsonObject();
                    String nombre = viewUser.get("nombre").getAsString();
                    String apellido = viewUser.get("apellidos").getAsString();
                    String cedulaB = viewUser.get("cedula").getAsString();   

                    JButton btnVer = new JButton("VER");
                    btnVer.setBorderPainted(false);
                    btnVer.setContentAreaFilled(false);
                    btnVer.setForeground(new Color(207,191,255));
                    btnVer.setFont(font);

                    JButton btnEditar = new JButton("EDITAR");                      
                    btnEditar.setBorderPainted(false);
                    btnEditar.setContentAreaFilled(false);
                    btnEditar.setForeground(new Color(39, 80, 49));
                    btnEditar.setFont(font);

                    JButton btnDesligar = new JButton("Desligar");          
                    btnDesligar.setBorderPainted(false);
                    btnDesligar.setContentAreaFilled(false);
                    btnDesligar.setForeground(new Color(255, 0, 0));                
                    btnDesligar.setFont(font);

                     // Crear un botón de edición para cada fila
                    final int posicion = i;

                     btnVer.addActionListener(new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent e) {
                            accionClickBotonVer( posicion );
                        }
                    });

                    btnEditar.addActionListener(new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent e) {
                            accionClickBotonEditar( posicion );
                        }
                    });

                    btnDesligar.addActionListener(new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent e) {
                            accionClickBotonDesligar( posicion );
                        }
                    });
                    
                    Object[] fila = new Object[]{cedulaB,nombre,apellido,btnVer,btnEditar,btnDesligar};

                    modelo.addRow(fila);
                }
            }else{
                GeneratingAlert alert = new GeneratingAlert("ERROR", "VENDEDOR NO ENCONTRADO");
                alert.setVisible(true);
                inputBuscar.setText("");
                mostrarVendedores();
            }
        }else {
            //HACEMOS APARECER UNA ALERTA
            GeneratingAlert mostrarFrame = new GeneratingAlert("ERROR","POR FAVOR INGRESE UN DATO");
            mostrarFrame.setVisible(true);
            mostrarVendedores();
        }
    }//GEN-LAST:event_btnBuscarSellerActionPerformed

    private void inputBuscarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_inputBuscarActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_inputBuscarActionPerformed

    public void mostrarVendedores(){
              
        TituloInformativo.setText("USUARIOS CON PARQUEADERO ASOCIADO:");
        // PETICION PARA OBTENER TODOS LOS PARQUEADEROS 
        String obtenerPersonas = consumo.consumoGET("http://localhost/APIenPHP/API-Personas/ObtenerPersonas.php");
        
        if( obtenerPersonas != null ){
            JsonObject jsonTemp  = gson.fromJson(obtenerPersonas, JsonObject.class);
            
            JsonArray personas = jsonTemp.getAsJsonArray("registros");
            System.out.println(personas);
            modelo.setRowCount(0);
            
             for(int i = 0; i < personas.size(); i++ ){
                JsonObject viewParking = personas.get(i).getAsJsonObject();
                String nombre = viewParking.get("nombre").getAsString();
                String apellido = viewParking.get("apellidos").getAsString();
                String documento = viewParking.get("cedula").getAsString(); 
                
                JButton btnVer = new JButton("VER");
                btnVer.setBorderPainted(false);
                btnVer.setContentAreaFilled(false);
                btnVer.setForeground(new Color(207,191,255));
                btnVer.setFont(font);

                JButton btnEditar = new JButton("EDITAR");                      
                btnEditar.setBorderPainted(false);
                btnEditar.setContentAreaFilled(false);
                btnEditar.setForeground(new Color(39, 80, 49));
                btnEditar.setFont(font);

                JButton btnDesligar = new JButton("Desligar");          
                btnDesligar.setBorderPainted(false);
                btnDesligar.setContentAreaFilled(false);
                btnDesligar.setForeground(new Color(255, 0, 0));                
                btnDesligar.setFont(font);
            
                 // Crear un botón de edición para cada fila
                final int posicion = i;
                
                 btnVer.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonVer( posicion );
                    }
                });
                
                btnEditar.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonEditar( posicion );
                    }
                });
                
                btnDesligar.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonDesligar( posicion );
                    }
                });
                
                Object[] fila = new Object[]{documento,nombre,apellido,btnVer,btnEditar, btnDesligar};
                
                modelo.addRow(fila);
                
            }
        }else{ 
            System.out.println("entro");
        }
    }
    
    public void mostrarVendedoresSinAsignar(){
        TituloInformativo.setText("USUARIOS CON PARQUEADEROS SIN ASOCIAR:");
        
        String obtenerPersonas = consumo.consumoGET("http://localhost/APIenPHP/API-Personas/ObtenerPersonasSinAsignar.php");
         
         if( obtenerPersonas != null ){
            JsonObject jsonTemp  = gson.fromJson(obtenerPersonas, JsonObject.class);
            
            JsonArray personas = jsonTemp.getAsJsonArray("registros");
            System.out.println(personas);
            modelo.setRowCount(0);
            
             for(int i = 0; i < personas.size(); i++ ){
                JsonObject viewParking = personas.get(i).getAsJsonObject();
                String nombre = viewParking.get("nombre").getAsString();
                String apellido = viewParking.get("apellidos").getAsString();
                String documento = viewParking.get("cedula").getAsString(); 
                
                JButton btnVer = new JButton("VER");
                btnVer.setBorderPainted(false);
                btnVer.setContentAreaFilled(false);
                btnVer.setForeground(new Color(207,191,255));
                btnVer.setFont(font);

                JButton btnEditar = new JButton("EDITAR");                      
                btnEditar.setBorderPainted(false);
                btnEditar.setContentAreaFilled(false);
                btnEditar.setForeground(new Color(39, 80, 49));
                btnEditar.setFont(font);

                JButton btnAsociar = new JButton("ASOCIAR");                      
                btnAsociar.setBorderPainted(false);
                btnAsociar.setContentAreaFilled(false);
                btnAsociar.setForeground(new Color(39, 80, 49));
                btnAsociar.setFont(font);
            
                 // Crear un botón de edición para cada fila
                final int posicion = i;
                
                 btnVer.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonVer( posicion );
                    }
                });
                
                btnEditar.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonEditar( posicion );
                    }
                });
                
                btnAsociar.addActionListener(new ActionListener() {
                    @Override
                    public void actionPerformed(ActionEvent e) {
                        accionClickBotonAsociar( posicion );
                    }
                });
                
                Object[] fila = new Object[]{documento,nombre,apellido,btnVer,btnEditar, btnAsociar};
                
                modelo.addRow(fila);
                
            }
        }else{
            System.out.println("NO SE ENCONTRO");
        }
    }
    
    public void accionClickBotonVer(int fila) {
        
        String cedula = (String) modelo.getValueAt(fila, 0);
        VerUsuario frame = new VerUsuario(this,cedula);
        frame.setVisible(true);
       
        this.main.setVisible(false);
       
    }
    
    public void accionClickBotonEditar(int fila){
        System.out.println("\n SE DIO CLICK EN EL BOTON DE EDITAR \n");
        
        String cedula = (String) modelo.getValueAt(fila, 0);
        EditarUsuario frame = new EditarUsuario(this,cedula);
        frame.setVisible(true);
        
        this.main.setVisible(false);
        
        
       
    }
    
    public void accionClickBotonDesligar(int fila){
        System.out.println("\n SE DIO CLICK EN EL BOTON DE DESLIGAR \n");
        
        String cedula = (String) modelo.getValueAt(fila, 0);
        String nombre = (String) modelo.getValueAt(fila, 1);
        String apellido = (String) modelo.getValueAt(fila, 2);
        
        // Ejemplo de cómo mostrar los datos en la consola
        System.out.println("");
        System.out.println("Se hizo clic en el botón de edición en la fila " + fila);
        System.out.println("Documento: " + cedula);
        System.out.println("Nombre: " + nombre);
        System.out.println("Apellido: " + apellido);
        System.out.println("");

        //VERIFICAR QUE LA PERSONA QUE QUEREMOS DESLIGAR SI EXISTE
        Map<String, String> queryData = new HashMap<>();
        queryData.put("cedula",cedula);
        
        String verificar = consumo.consumoPOST("http://localhost/APIenPHP/API-Personas/VerificarPersona.php", queryData);
        
        if( verificar != null ){
            
            this.main.dispose();
            
              
            //HACEMOS EL CAMBIO DE VENTANA PARA MOSTRAR EL FORM DONDE EDITAMOS EL PARQUEADERO 
            AlertConfirmarDesligar mostrarFrame = new AlertConfirmarDesligar(cedula,this);
            mostrarFrame.setVisible(true);
        }
    }
    
     public void accionClickBotonAsociar(int fila) {
        
        String cedula = (String) modelo.getValueAt(fila, 0);
        AsignarParqueadero frame = new AsignarParqueadero(this,cedula);
        frame.setVisible(true);
       
        this.main.dispose();
       
    }
    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BtnConAsignar;
    private javax.swing.JButton BtnSinAsignar;
    private javax.swing.JLabel TituloInformativo;
    private javax.swing.JButton btnBuscarSeller;
    private javax.swing.JTextField inputBuscar;
    private javax.swing.JButton jButton2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable tablaVendedor;
    // End of variables declaration//GEN-END:variables
}
