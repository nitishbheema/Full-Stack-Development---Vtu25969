import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.client.RestTemplate;
import java.util.Map;

@RestController
@RequestMapping("/courses")
public class CourseController {
    @Autowired RestTemplate restTemplate;

    @GetMapping("/student/{id}")
    public Map<String, Object> getCourseForStudent(@PathVariable int id) {
        Map student = restTemplate.getForObject("http://localhost:8081/students/" + id, Map.class);
        return Map.of("student", student, "course", "Full Stack Development", "credits", 4);
    }
}
