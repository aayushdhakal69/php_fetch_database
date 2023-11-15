import javax.swing.*;
import java.awt.*;
import java.sql.*;
import java.awt.event.*;


public class work extends JFrame implements ActionListener {
    JLabel l1,l2,l3;
    JTextField t1,t2,t3;
    JButton b1,b2,b3,b4;
    public work(){
        setVisible(true);
        setTitle("Work");
        setSize(300,300);

        l1 = new JLabel("Roll no: ");
        l2 = new JLabel("Name: ");
        l3 = new JLabel("Address: ");
        t1 = new JTextField(10);
        t2 = new JTextField(10);
        t3 = new JTextField(10);

        b1 = new JButton("Insert");
        b2 = new JButton("Update");
        b3 = new JButton("Delete");
        b4 = new JButton("Show");
        setLayout(new FlowLayout());
        add(l1);
        add(t1);
        add(l2);
        add(t2);
        add(l3);
        add(t3);

        add(b1);
        add(b2);
        add(b3);
        add(b4);

        b1.addActionListener(this);
        b2.addActionListener(this);
        b3.addActionListener(this);
    }    

    public static void main(String[] args) {
        new work();
        // SwingUtilities.invokeLater(() -> {
        //     work app = new work();
        //     app.setVisible(true);
        // });
    }


    @Override
    public void actionPerformed(ActionEvent e) {
        String roll = t1.getText();
        String name = t2.getText();
        String address = t3.getText();

        if (e.getSource() == b1) {
            insertStudent(roll,name,address);
        } else if (e.getSource() == b2) {
            updateStudent(roll,name,address);
        } else if (e.getSource() == b3) {
            deleteStudent(roll,name,address);
        }
    }



    //Now here is particular function for insert, update and delete
    private void insertStudent(String roll, String name,String address) {
        try (Connection connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/contact", "root", "")) {
            String sql = "INSERT INTO hccdetail (id,fname,faddress) VALUES (?,?,?)";
            PreparedStatement preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setString(1, roll);
            preparedStatement.setString(2, name);
            preparedStatement.setString(3, address);
            preparedStatement.executeUpdate();
            System.out.println("Here we GOOOOOO!");
            JOptionPane.showMessageDialog(this, "Student inserted successfully!");
        } catch (SQLException e) {
            e.printStackTrace();
            JOptionPane.showMessageDialog(this, "Error inserting student: " + e.getMessage());
        }
    }

    private void updateStudent(String roll, String name,String address) {
        
    }

    private void deleteStudent(String roll, String name,String address) {
        
    }
}