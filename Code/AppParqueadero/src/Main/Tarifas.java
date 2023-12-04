package Main;
import Alerts.AlertTarifaUpdate;
import Alerts.AlertErrorUpdateTarifa; 
import com.google.gson.Gson;
import com.google.gson.JsonObject;
import com.google.gson.JsonArray;
import com.google.gson.JsonElement;
import com.google.gson.JsonParser;
import java.util.HashMap;
import java.util.Map;
import javax.swing.DefaultComboBoxModel;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;


public final class Tarifas extends javax.swing.JPanel {
    public MainVendedor main;
    private final Gson gson;
    
    DefaultTableModel modelo;
    public Tarifas(MainVendedor main) {
        this.main = main;
        gson = new Gson();
        initComponents();
        initAlternComponets();
        listaTarifa();
    }

  
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        nitParqueadero2 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tabTarifas = new javax.swing.JTable();
        jLabelTarifas = new javax.swing.JLabel();
        jPanel1 = new javax.swing.JPanel();
        campo_tarifa = new javax.swing.JTextField();
        jLabelTarifa = new javax.swing.JLabel();
        jLabelVehiculo = new javax.swing.JLabel();
        boxVehiculos = new javax.swing.JComboBox<>();
        btnModificar = new javax.swing.JButton();

        nitParqueadero2.setText("NO DISPONIBLE");

        setBackground(new java.awt.Color(255, 255, 255));

        tabTarifas.setBackground(new java.awt.Color(241, 230, 253));
        tabTarifas.setFont(new java.awt.Font("Segoe UI", 1, 14)); // NOI18N
        tabTarifas.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null},
                {null, null, null},
                {null, null, null},
                {null, null, null}
            },
            new String [] {
                "ID TARIFA", "VEHÍCULO", "TARIFA/HORA"
            }
        ) {
            boolean[] canEdit = new boolean [] {
                false, false, false
            };

            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return canEdit [columnIndex];
            }
        });
        tabTarifas.setSelectionBackground(new java.awt.Color(113, 0, 234));
        tabTarifas.setShowGrid(true);
        jScrollPane1.setViewportView(tabTarifas);

        jLabelTarifas.setFont(new java.awt.Font("Segoe UI", 1, 36)); // NOI18N
        jLabelTarifas.setForeground(new java.awt.Color(113, 0, 234));
        jLabelTarifas.setText("TARIFAS");

        jPanel1.setBackground(new java.awt.Color(241, 230, 253));

        campo_tarifa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                campo_tarifaActionPerformed(evt);
            }
        });

        jLabelTarifa.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        jLabelTarifa.setForeground(new java.awt.Color(113, 0, 234));
        jLabelTarifa.setText("TARIFA:");

        jLabelVehiculo.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        jLabelVehiculo.setForeground(new java.awt.Color(113, 0, 234));
        jLabelVehiculo.setText("VEHÍCULO:");

        boxVehiculos.setBackground(new java.awt.Color(255, 255, 255));
        boxVehiculos.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        boxVehiculos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                boxVehiculosActionPerformed(evt);
            }
        });

        btnModificar.setBackground(new java.awt.Color(113, 0, 234));
        btnModificar.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnModificar.setForeground(new java.awt.Color(255, 255, 255));
        btnModificar.setText("MODIFICAR");
        btnModificar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnModificarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(191, 191, 191)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabelVehiculo)
                    .addComponent(jLabelTarifa))
                .addGap(32, 32, 32)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(campo_tarifa, javax.swing.GroupLayout.PREFERRED_SIZE, 244, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(boxVehiculos, javax.swing.GroupLayout.PREFERRED_SIZE, 244, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(190, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btnModificar, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(305, 305, 305))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(39, 39, 39)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(boxVehiculos, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabelVehiculo, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(32, 32, 32)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(campo_tarifa, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabelTarifa, javax.swing.GroupLayout.PREFERRED_SIZE, 32, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 55, Short.MAX_VALUE)
                .addComponent(btnModificar, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(34, 34, 34))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.CENTER)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 370, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabelTarifas))
                .addGap(190, 190, 190))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(36, 36, 36)
                .addComponent(jLabelTarifas, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(29, 29, 29)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 92, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 40, Short.MAX_VALUE)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
        );
    }// </editor-fold>//GEN-END:initComponents

    //Inicializando tabla de vehiculos actuales
    public void initAlternComponets(){
        modelo = (DefaultTableModel) tabTarifas.getModel();

        //Deshabilita la modificación de columnas en la interfaz
        tabTarifas.getTableHeader().setReorderingAllowed(false);

        // Configurar la JTable para ajustar automáticamente el ancho de las columnas
        tabTarifas.setAutoResizeMode(JTable.AUTO_RESIZE_ALL_COLUMNS);

        tabTarifas.setPreferredScrollableViewportSize(tabTarifas.getPreferredSize());
       
    }
    
    private void listaTarifa(){
        ConsumoApi consumo = new ConsumoApi();
        String obtenerTarifas = consumo.consumoGET("http://localhost/APIenPHP/API-tarifas/Obtener.php");

        if (obtenerTarifas != null) {
            JsonObject jsonTemp = gson.fromJson(obtenerTarifas, JsonObject.class);
            JsonArray tarifas = jsonTemp.getAsJsonArray("registros");
            modelo.setRowCount(0);
            String[] opcion = new String[tarifas.size()];

            for (int i = 0; i < tarifas.size(); i++){
                JsonObject verTarifa = tarifas.get(i).getAsJsonObject();
                String id = verTarifa.get("id").getAsString();
                String tipo = verTarifa.get("tipo_vehiculo").getAsString();
                opcion[i] = tipo; // Asignar el tipo al arreglo opcion[]
                String tarifa = verTarifa.get("Tarifa").getAsString();
                Object[] fila = new Object[]{id, tipo, tarifa};
                modelo.addRow(fila);
            }
            boxVehiculos.setModel(new DefaultComboBoxModel<>(opcion));
        }
    }

    
    private void btnModificarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnModificarActionPerformed
        ConsumoApi consumo = new ConsumoApi();
        String nuevoValor = campo_tarifa.getText(); 
        String tipoVehiculo = (String) boxVehiculos.getSelectedItem();
        System.out.println("Tarifa: " + nuevoValor);

        // Envía la solicitud POST a tu API PHP
        Map<String, String> postData = new HashMap<>();
        postData.put("tipo_vehiculo", tipoVehiculo);
        postData.put("tarifa", nuevoValor);
        String cambiarTarifa = consumo.consumoPOST("http://localhost/APIenPHP/API-tarifas/UpdateTarifa.php", postData);
        System.out.println("raspuesta api: "+ cambiarTarifa);
        if (cambiarTarifa != null) {
            JsonObject jsonTemp = gson.fromJson(cambiarTarifa, JsonObject.class);
            boolean status = jsonTemp.get("status").getAsBoolean();
            String message = jsonTemp.get("message").getAsString();

            if (status) {
                System.out.println("Tarifa actualizada correctamente.");
                AlertTarifaUpdate alert = new AlertTarifaUpdate();
                alert.setVisible(true);
                alert.setLocationRelativeTo(null);
                listaTarifa();
            } else {
                System.out.println("Error al actualizar la tarifa: " + message);
                AlertErrorUpdateTarifa alert = new AlertErrorUpdateTarifa();
                alert.setVisible(true);
                alert.setLocationRelativeTo(null);
            }
        } else {
            System.out.println("Error al consumir la API.");
        }
    }//GEN-LAST:event_btnModificarActionPerformed

    
    private void campo_tarifaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_campo_tarifaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_campo_tarifaActionPerformed

    private void boxVehiculosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_boxVehiculosActionPerformed
        
        String opcionSelected = (String) boxVehiculos.getSelectedItem();
        ConsumoApi consumo = new ConsumoApi();
        String obtenerT = consumo.consumoGET("http://localhost/APIenPHP/API-tarifas/obtenerTarifa.php?tipo_vehiculo=" + opcionSelected);

        // Parsear la respuesta JSON
        JsonParser parser = new JsonParser();
        JsonObject jsonObject = parser.parse(obtenerT).getAsJsonObject();

        // Verificar si "tarifa" existe en la respuesta JSON
        JsonElement tarifaElement = jsonObject.get("tarifa");
        if (tarifaElement != null && !tarifaElement.isJsonNull()) {
            // Obtener el valor de la tarifa del JSON
            String tarifa = tarifaElement.getAsString();
            campo_tarifa.setText(tarifa);
        } else {
            campo_tarifa.setText("No se encontró la tarifa");
        }
    }//GEN-LAST:event_boxVehiculosActionPerformed

    
 
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JComboBox<String> boxVehiculos;
    private javax.swing.JButton btnModificar;
    private javax.swing.JTextField campo_tarifa;
    private javax.swing.JLabel jLabelTarifa;
    private javax.swing.JLabel jLabelTarifas;
    private javax.swing.JLabel jLabelVehiculo;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JLabel nitParqueadero2;
    private javax.swing.JTable tabTarifas;
    // End of variables declaration//GEN-END:variables
}
