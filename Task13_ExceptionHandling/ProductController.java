import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.validation.annotation.Validated;
import org.springframework.web.bind.annotation.*;
import jakarta.validation.Valid;

@RestController
@RequestMapping("/api/products")
public class ProductController {

    @Autowired
    private ProductRepository repo;

    @PostMapping
    public ResponseEntity<Product> create(@Valid @RequestBody Product p) {
        return ResponseEntity.status(201).body(repo.save(p));
    }

    @GetMapping("/{id}")
    public Product getById(@PathVariable int id) {
        return repo.findById(id).orElseThrow(() -> new ProductNotFoundException(id));
    }
}
