
package botones;

import Main.Login;
import Main.Main;
import java.awt.Color;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.JPanel;


public class Controller implements MouseListener {
    private final Login login;
    private final Main main;

    
    public final void events(){
        login.btn_ingresar.addMouseListener(this);
        main.btnParking.addMouseListener(this);

    }
    
    public Controller (Login login, Main main){
        this.login = login;
        this.main = main;

        events();
    }
    

    @Override
    public void mouseClicked(MouseEvent me) {
        
    }

    @Override
    public void mousePressed(MouseEvent me) {
        
    }

    @Override
    public void mouseReleased(MouseEvent me) {
        
    }

    @Override
    public void mouseExited(MouseEvent me) {
        
        Object evt = me.getSource();
        
        if(evt.equals(login.btn_ingresar)){
            changeBackground(login.container_btn_ingresar, new Color(61,103,71));
        }else if(evt.equals(main.btnParking)){
            changeBackground(login.container_btn_ingresar, new Color(61,103,71));
        }
    }

    @Override
    public void mouseEntered(MouseEvent me) {
        
        Object evt = me.getSource();
        
        if(evt.equals(login.btn_ingresar)){
            changeBackground(login.container_btn_ingresar, new Color(39,80,49));
        }else if(evt.equals(main.btnParking)){
            changeBackground(login.container_btn_ingresar, new Color(39,80,49));
        }
    }
    
    private void changeBackground(JPanel panel, Color color){
        panel.setBackground(color);
    }
}
