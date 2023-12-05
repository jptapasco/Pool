
package botones;

import Main.Login;
import java.awt.Color;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import javax.swing.JPanel;


public class Controller implements MouseListener {
    private final Login view;
    
    public final void events(){
        view.btn_ingresar.addMouseListener(this);
    }
    
    public Controller (Login view){
        this.view = view;
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
        
        if(evt.equals(view.btn_ingresar)){
            changeBackground(view.container_btn_ingresar, new Color(61,103,71));
        }
    }

    @Override
    public void mouseEntered(MouseEvent me) {
        
        Object evt = me.getSource();
        
        if(evt.equals(view.btn_ingresar)){
            changeBackground(view.container_btn_ingresar, new Color(39,80,49));
        }
    }
    
    private void changeBackground(JPanel panel, Color color){
        panel.setBackground(color);
    }
}
