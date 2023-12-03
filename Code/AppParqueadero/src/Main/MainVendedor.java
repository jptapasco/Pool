package Main;

import java.awt.Dimension;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;

public class MainVendedor extends javax.swing.JFrame {
    
    String nit;
    String nombre;
    String direccion;
    String telefono;
    String user;
    String id_asignacion;
    
    public MainVendedor( String nit, String nombre,String direccion,String telefono, String user, String id_asignacion ) {
        this.nit = nit;
        this.nombre = nombre;
        this.direccion = direccion;
        this.telefono = telefono;
        this.user = user;
        this.id_asignacion = id_asignacion;
        initComponents();
        
        try {
            // Cargar la imagen desde el archivo en el directorio de recursos
            BufferedImage originalImage = ImageIO.read(getClass().getResource("/Img/carrito.png"));

            // Redimensionar la imagen al tamaño deseado
            Image resizedImage = originalImage.getScaledInstance(125, 125, Image.SCALE_SMOOTH);

            // Crear un ImageIcon a partir de la imagen redimensionada
            ImageIcon imageIcon = new ImageIcon(resizedImage);

            // Asignar el ImageIcon al JLabel
            etq_img.setIcon(imageIcon);
        } catch (IOException e) {
            // Manejo de errores en caso de que la imagen no se pueda cargar

        }
        
        // Centrar la ventana en la pantalla
        Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
        int screenWidth = (int) screenSize.getWidth();
        int screenHeight = (int) screenSize.getHeight();
        int frameWidth = getWidth();
        int frameHeight = getHeight();
        setLocation((screenWidth - frameWidth) / 2, (screenHeight - frameHeight) / 2);
    }
   
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        btnEntrada = new javax.swing.JButton();
        btnParqueadero = new javax.swing.JButton();
        btnCerrarSesion = new javax.swing.JButton();
        btnTarifas = new javax.swing.JButton();
        btnHistorial = new javax.swing.JButton();
        etq_img = new javax.swing.JLabel();
        panelPrincipal = new javax.swing.JPanel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setResizable(false);

        jPanel1.setBackground(new java.awt.Color(227, 204, 251));

        btnEntrada.setBackground(new java.awt.Color(113, 0, 234));
        btnEntrada.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnEntrada.setForeground(new java.awt.Color(255, 255, 255));
        btnEntrada.setText("ENTRADA");
        btnEntrada.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        btnEntrada.setBorderPainted(false);
        btnEntrada.setFocusPainted(false);
        btnEntrada.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnEntradaActionPerformed(evt);
            }
        });

        btnParqueadero.setBackground(new java.awt.Color(113, 0, 234));
        btnParqueadero.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnParqueadero.setForeground(new java.awt.Color(255, 255, 255));
        btnParqueadero.setText("PARQUEADERO");
        btnParqueadero.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        btnParqueadero.setBorderPainted(false);
        btnParqueadero.setFocusPainted(false);
        btnParqueadero.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnParqueaderoActionPerformed(evt);
            }
        });

        btnCerrarSesion.setBackground(new java.awt.Color(212, 179, 249));
        btnCerrarSesion.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnCerrarSesion.setForeground(new java.awt.Color(255, 255, 255));
        btnCerrarSesion.setText("CERRAR SESION");
        btnCerrarSesion.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        btnCerrarSesion.setBorderPainted(false);
        btnCerrarSesion.setFocusPainted(false);
        btnCerrarSesion.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnCerrarSesionActionPerformed(evt);
            }
        });

        btnTarifas.setBackground(new java.awt.Color(113, 0, 234));
        btnTarifas.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnTarifas.setForeground(new java.awt.Color(255, 255, 255));
        btnTarifas.setText("TARIFAS");
        btnTarifas.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        btnTarifas.setBorderPainted(false);
        btnTarifas.setFocusPainted(false);
        btnTarifas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnTarifasActionPerformed(evt);
            }
        });

        btnHistorial.setBackground(new java.awt.Color(113, 0, 234));
        btnHistorial.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        btnHistorial.setForeground(new java.awt.Color(255, 255, 255));
        btnHistorial.setText("HISTORIAL");
        btnHistorial.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        btnHistorial.setBorderPainted(false);
        btnHistorial.setFocusPainted(false);
        btnHistorial.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnHistorialActionPerformed(evt);
            }
        });

        etq_img.setIcon(new javax.swing.ImageIcon(getClass().getResource("/Img/login-icon.png"))); // NOI18N
        etq_img.setMaximumSize(new java.awt.Dimension(125, 125));
        etq_img.setMinimumSize(new java.awt.Dimension(125, 125));
        etq_img.setPreferredSize(new java.awt.Dimension(125, 125));

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(41, 41, 41)
                .addComponent(etq_img, javax.swing.GroupLayout.PREFERRED_SIZE, 125, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(41, Short.MAX_VALUE))
            .addComponent(btnParqueadero, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(btnEntrada, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(btnHistorial, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(btnTarifas, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(btnCerrarSesion, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(etq_img, javax.swing.GroupLayout.PREFERRED_SIZE, 125, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(31, 31, 31)
                .addComponent(btnParqueadero, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(1, 1, 1)
                .addComponent(btnEntrada, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(1, 1, 1)
                .addComponent(btnHistorial, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(1, 1, 1)
                .addComponent(btnTarifas, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btnCerrarSesion, javax.swing.GroupLayout.PREFERRED_SIZE, 45, javax.swing.GroupLayout.PREFERRED_SIZE))
        );

        panelPrincipal.setBackground(new java.awt.Color(255, 255, 255));

        javax.swing.GroupLayout panelPrincipalLayout = new javax.swing.GroupLayout(panelPrincipal);
        panelPrincipal.setLayout(panelPrincipalLayout);
        panelPrincipalLayout.setHorizontalGroup(
            panelPrincipalLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 751, Short.MAX_VALUE)
        );
        panelPrincipalLayout.setVerticalGroup(
            panelPrincipalLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 501, Short.MAX_VALUE)
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(1, 1, 1)
                .addComponent(panelPrincipal, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(panelPrincipal, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void btnCerrarSesionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnCerrarSesionActionPerformed
        Login cerrrarSesion = new Login();
        dispose();
    }//GEN-LAST:event_btnCerrarSesionActionPerformed

    private void btnParqueaderoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnParqueaderoActionPerformed

        System.out.println("SE DIO AL BOTON PARQUEADERO");
        
        panelPrincipal.removeAll();

        Parqueadero mostrarPanel = new Parqueadero(this, nit, nombre, direccion, telefono, user);

        mostrarPanel.setSize(panelPrincipal.getSize() );
        panelPrincipal.add( mostrarPanel );

        repaint();
        revalidate();
    }//GEN-LAST:event_btnParqueaderoActionPerformed

    private void btnTarifasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnTarifasActionPerformed

        System.out.println("SE DIO AL BOTON TARIFAS");
        
        panelPrincipal.removeAll();
        
        Tarifas mostrarPanel = new Tarifas(this);

        mostrarPanel.setSize(panelPrincipal.getSize() );
        panelPrincipal.add( mostrarPanel);

        repaint();
        revalidate();
    }//GEN-LAST:event_btnTarifasActionPerformed

    private void btnHistorialActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnHistorialActionPerformed

        System.out.println("SE DIO AL BOTON HISTORIAL");
        
        panelPrincipal.removeAll();
        
        Historial mostrarPanel = new Historial(this);

        mostrarPanel.setSize(panelPrincipal.getSize() );
        panelPrincipal.add( mostrarPanel);

        repaint();
        revalidate();
    }//GEN-LAST:event_btnHistorialActionPerformed

    private void btnEntradaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnEntradaActionPerformed

        System.out.println("SE DIO AL BOTON ENTRADA");
        
        panelPrincipal.removeAll();
        
        Entrada mostrarPanel = new Entrada(this,id_asignacion);

        mostrarPanel.setSize(panelPrincipal.getSize() );
        panelPrincipal.add( mostrarPanel);

        repaint();
        revalidate();
    }//GEN-LAST:event_btnEntradaActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnCerrarSesion;
    private javax.swing.JButton btnEntrada;
    private javax.swing.JButton btnHistorial;
    private javax.swing.JButton btnParqueadero;
    private javax.swing.JButton btnTarifas;
    private javax.swing.JLabel etq_img;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel panelPrincipal;
    // End of variables declaration//GEN-END:variables
}
