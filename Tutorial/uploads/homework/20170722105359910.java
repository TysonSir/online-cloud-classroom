package ��ҵ��;

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
		String q = JOptionPane.showInputDialog("������ְԱ������");
		int w = Integer.parseInt(JOptionPane.showInputDialog("������4λ������ݴ��ţ�"));
		int e = Integer.parseInt(JOptionPane.showInputDialog("��������ţ�"));
		String r = JOptionPane.showInputDialog("������ְԱ��ϵ��ʽ��");
		
		Employee s1 = new Employee(q, w, e, r);
		a1.add(s1);
		return s1;
	}

	public void Delete(ArrayList<Employee> a1) {
		String i1 = JOptionPane.showInputDialog("������Ҫ����ְԱ������");
		Employee s1 = new Employee();
		Iterator<Employee> it = a1.iterator();
		while (it.hasNext()) {
			s1 = it.next();
			if (s1.getName().equalsIgnoreCase(i1))
				break;
		}
		a1.remove(s1);
		JOptionPane.showMessageDialog(null, "�����ɹ���");
	}

	public Employee Chazhao(ArrayList<Employee> a1) {
		String i1 = JOptionPane.showInputDialog("������Ҫ����ְԱ������");
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
		String s = JOptionPane.showInputDialog("������Ҫ�޸�ְԱ������");
		Employee s1 = new Employee();
		Iterator<Employee> it = a1.iterator();
		while (it.hasNext()) {
			s1 = it.next();
			if (s1.getName().equalsIgnoreCase(s))
				break;
		}
		int j = a1.indexOf(s1);
		String q = JOptionPane.showInputDialog("��������ְԱ������");
		int w = Integer.parseInt(JOptionPane.showInputDialog("������4λ������ݴ��ţ�"));
		int e = Integer.parseInt(JOptionPane.showInputDialog("��������ţ�"));
		String r = JOptionPane.showInputDialog("������ְԱ��ϵ��ʽ��");
		Employee s2 = new Employee(q, w, e, r);
		a1.set(j, s2);
		JOptionPane.showMessageDialog(null, "�޸ĳɹ���");

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
		return "������" + name + "   ���ţ�" + id + "  ��ţ�" + grade + "  �ֻ��ţ�" + tel
				+ "\n";
	}

}