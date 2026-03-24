import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class EmployeeController {
    @Autowired
    private EmployeeService employeeService;

    public void run() {
        Employee e1 = new Employee();
        e1.setId(1); e1.setName("Ravi"); e1.setDepartment("CSE");

        Employee e2 = new Employee();
        e2.setId(2); e2.setName("Priya"); e2.setDepartment("ECE");

        employeeService.addEmployee(e1);
        employeeService.addEmployee(e2);

        System.out.println("All Employees:");
        employeeService.getAllEmployees().forEach(e ->
            System.out.println(e.getId() + " | " + e.getName() + " | " + e.getDepartment())
        );
    }
}
