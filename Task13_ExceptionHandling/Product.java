import jakarta.persistence.*;
import jakarta.validation.constraints.*;

@Entity
public class Product {
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @NotBlank(message = "Product name is required")
    private String name;

    @Min(value = 1, message = "Price must be at least 1")
    private double price;

    @Min(value = 0, message = "Stock cannot be negative")
    private int stock;

    public int getId() { return id; }
    public void setId(int id) { this.id = id; }
    public String getName() { return name; }
    public void setName(String name) { this.name = name; }
    public double getPrice() { return price; }
    public void setPrice(double price) { this.price = price; }
    public int getStock() { return stock; }
    public void setStock(int stock) { this.stock = stock; }
}
