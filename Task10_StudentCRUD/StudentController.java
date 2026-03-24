import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import java.util.List;

@RestController
@RequestMapping("/students")
public class StudentController {
    @Autowired StudentService service;

    @GetMapping public List<Student> getAll() { return service.getAll(); }
    @PostMapping public Student create(@RequestBody Student s) { return service.save(s); }
    @PutMapping("/{id}") public Student update(@PathVariable int id, @RequestBody Student s) { return service.update(id, s); }
    @DeleteMapping("/{id}") public String delete(@PathVariable int id) { service.delete(id); return "Deleted"; }
}
