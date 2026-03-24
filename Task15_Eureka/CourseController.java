import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.cloud.client.ServiceInstance;
import org.springframework.cloud.client.discovery.DiscoveryClient;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.client.RestTemplate;
import java.util.*;

@RestController
@RequestMapping("/courses")
public class CourseController {
    @Autowired private DiscoveryClient discoveryClient;
    @Autowired private RestTemplate restTemplate;

    @GetMapping("/student/{id}")
    public Map<String, Object> getCourseForStudent(@PathVariable int id) {
        List<ServiceInstance> instances = discoveryClient.getInstances("student-service");
        String url = instances.get(0).getUri() + "/students/" + id;
        Map student = restTemplate.getForObject(url, Map.class);
        return Map.of("student", student, "course", "Full Stack Dev");
    }
}
