import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;

@SpringBootApplication
public class SpringCoreApp {
    public static void main(String[] args) {
        ApplicationContext ctx = SpringApplication.run(SpringCoreApp.class, args);
        EmployeeController controller = ctx.getBean(EmployeeController.class);
        controller.run();
    }
}
