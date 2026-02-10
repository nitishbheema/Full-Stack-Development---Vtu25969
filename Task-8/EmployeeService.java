package com.example.emp;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class EmployeeService {

    @Autowired
    private EmployeeRepository repository;

    public void addEmployee(int id, String name, String dept) {
        repository.addEmployee(new Employee(id, name, dept));
    }

    public void displayEmployees() {
        for (Employee e : repository.getAllEmployees()) {
            System.out.println(
                e.getId() + " | " + e.getName() + " | " + e.getDepartment()
            );
        }
    }
}
