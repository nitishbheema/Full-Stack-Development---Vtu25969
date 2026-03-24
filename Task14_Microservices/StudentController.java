import org.springframework.web.bind.annotation.*;
import java.util.Map;

@RestController
@RequestMapping("/students")
public class StudentController {
    @GetMapping("/{id}")
    public Map<String, Object> getStudent(@PathVariable int id) {
        return Map.of("id", id, "name", "Arun Kumar", "department", "CSE");
    }
}
