package 作业二;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.Iterator;

import javax.swing.JOptionPane;



public class Employee implements Comparable {
	private String name;
	private int id;
	private int grade;
	private String tel;

	public Employee() {
		super();
	};

	public Employee(String name, int id, int grade, String tel) {
		this.name = name;
		this.id = id;
		this.grade = grade;
		this.tel = tel;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public int getGrade() {
		return grade;
	}

	public void setGrade(int grade) {
		this.grade = grade;
	}

	public String getTel() {
		return tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	public Employee Add(ArrayList<Employee> a1) {
		String q = JOptionPane.showInputDialog("请输入职员姓名：");
		int w = Integer.parseInt(JOptionPane.showInputDialog("请输入4位数字身份代号："));
		int e = Integer.parseInt(JOptionPane.showInputDialog("请输入组号："));
		String r = JOptionPane.showInputDialog("请输入职员联系方式：");
		
		Employee s1 = new Employee(q, w, e, r);
		a1.add(s1);
		return s1;
	}

	public void Delete(ArrayList<Employee> a1) {
		String i1 = JOptionPane.showInputDialog("请输入要开除职员姓名：");
		Employee s1 = new Employee();
		Iterator<Employee> it = a1.iterator();
		while (it.hasNext()) {
			s1 = it.next();
			if (s1.getName().equalsIgnoreCase(i1))
				break;
		}
		a1.remove(s1);
		JOptionPane.showMessageDialog(null, "操做成功！");
	}

	public Employee Chazhao(ArrayList<Employee> a1) {
		String i1 = JOptionPane.showInputDialog("请输入要查找职员姓名：");
		Employee s1 = new Employee();
		Iterator<Employee> it = a1.iterator();
		while (it.hasNext()) {
			s1 = it.next();
			if (s1.getName().equalsIgnoreCase(i1))
				break;
		}
		return s1;
	}

	public void Xiugai(ArrayList<Employee> a1) {
		String s = JOptionPane.showInputDialog("请输入要修改职员姓名：");
		Employee s1 = new Employee();
		Iterator<Employee> it = a1.iterator();
		while (it.hasNext()) {
			s1 = it.next();
			if (s1.getName().equalsIgnoreCase(s))
				break;
		}
		int j = a1.indexOf(s1);
		String q = JOptionPane.showInputDialog("请输入新职员姓名：");
		int w = Integer.parseInt(JOptionPane.showInputDialog("请输入4位数字身份代号："));
		int e = Integer.parseInt(JOptionPane.showInputDialog("请输入组号："));
		String r = JOptionPane.showInputDialog("请输入职员联系方式：");
		Employee s2 = new Employee(q, w, e, r);
		a1.set(j, s2);
		JOptionPane.showMessageDialog(null, "修改成功！");

	}

	@Override
	public int compareTo(Object o) {
		if (!(o instanceof Employee)) {
			return -1;
		}
		Employee s = (Employee) o;
		return name.compareTo(s.getName());
	}

	@Override
	public String toString() {
		return "姓名：" + name + "   代号：" + id + "  组号：" + grade + "  手机号：" + tel
				+ "\n";
	}

}