import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.*;
import org.springframework.stereotype.Service;
import java.util.List;

@Service
public class StudentService {
    @Autowired StudentRepository repo;

    public Page<Student> getStudentsPaginated(int page, int size) {
        return repo.findAll(PageRequest.of(page, size));
    }

    public List<Student> getSortedByName() {
        return repo.findAll(Sort.by(Sort.Direction.ASC, "name"));
    }

    public List<Student> getByDept(String dept) {
        return repo.findByDepartment(dept);
    }
}
