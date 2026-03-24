import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import java.util.List;

public interface StudentRepository extends JpaRepository<Student, Integer> {

    List<Student> findByDepartment(String department);

    @Query("SELECT s FROM Student s WHERE YEAR(CURRENT_DATE) - YEAR(s.dob) > :age")
    List<Student> findOlderThan(@Param("age") int age);

    List<Student> findByDepartmentOrderByNameAsc(String department);
}
