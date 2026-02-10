package com.example.emp;

import org.springframework.beans.factory.BeanFactory;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class App {
    public static void main(String[] args) {

        BeanFactory factory =
            new ClassPathXmlApplicationContext("spring.xml");

        EmployeeService service =
            factory.getBean(EmployeeService.class);

        service.addEmployee(1, "Arjun", "CSE");
        service.addEmployee(2, "Sneha", "IT");
        service.addEmployee(3, "Rahul", "ECE");

        service.displayEmployees();
    }
}
