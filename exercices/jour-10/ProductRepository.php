<?php

class Product {
    public static array $arrayProducts = [];

    public function __construct(
        private string $name,
        private string $description,
        private float $price,
        private int $stock,
        private string $category,
        private int $id,
        private ?DateTimeImmutable $dateCreation = null
        
    ) {
        self::$arrayProducts[] = $this;
        $this->dateCreation = $dateCreation?? new DateTimeImmutable();
        
    }
    public function getId():int{
        return $this->id;
    }
    public function getStock():int{
        return $this->stock;
    }
    public function getDescription():string{
        return $this->description;
    }
    public function getDateCreation():DateTimeImmutable{
        return $this->dateCreation;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function setPrice(float $newPrice):void{
        $this->price = $newPrice;
    }
    public function getCategory(): string {
        return $this->category;
    }
}


//----------------------------------------------------------------------------------------------------//
class ProductRepository{

    public function __construct(private PDO $pdo) {}
    
    // READ - Un seul
    public function find(int $id): ?Product    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        
        return $data ? $this->hydrate($data) : null;
    }
    
    // READ - Tous
    public function findAll(): array    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
    
    // CREATE
    public function save(Product $product): void    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, description, price, stock, category, created_at) VALUES (?, ?, ?,?,?, ?)"
        );
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getStock(),
            $product->getCategory(),
            $product->getDateCreation()->format('Y-m-d H:i:s')

            

        ]);
    }
    
    // UPDATE
    public function update(Product $product): void    {
        $stmt = $this->pdo->prepare(
            "UPDATE products SET name = ?, description = ?, price = ?, stock = ? , category = ? WHERE id = ?"
        );
        $stmt->execute([
            $product->getName(),
            $product->getDescription(),
            $product->getPrice(),
            $product->getStock(),
            $product->getCategory(),
            $product->getId()
        ]);
    }
   
    // DELETE
    public function delete(int $id): void    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
    
    // Hydratation : tableau → objet
    private function hydrate(array $data): Product    {
        return new Product(
            id: (int) $data['id'],
            name: $data['name'],
            description: $data['description'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category: $data['category'],
            dateCreation:new DateTimeImmutable($data['created_at'])
        );
    }
}
//--------------------------------------------------------------------------------//
