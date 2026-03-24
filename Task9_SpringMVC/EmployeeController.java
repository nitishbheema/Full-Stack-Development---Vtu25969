import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import java.util.List;

@Controller
public class EmployeeController {

    @GetMapping("/employees")
    public String showEmployees(Model model) {
        List<Employee> list = List.of(
            new Employee(1, "Arun", "CSE"),
            new Employee(2, "Meena", "ECE")
        );
        model.addAttribute("employees", list);
        return "employees";
    }
}
