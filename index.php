<?php
$products = [
    ["name" => "Teddy Bear", "description" => "Soft and cuddly.", "price" => 10.99, "image" => "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Color Pencils", "description" => "12 vibrant colors.", "price" => 3.49, "image" => "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Story Book", "description" => "Fun tales to read.", "price" => 5.99, "image" => "https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Puzzle Game", "description" => "Mind-bending fun.", "price" => 7.99, "image" => "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Toy Car", "description" => "Fast and fun.", "price" => 4.99, "image" => "https://images.unsplash.com/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Building Blocks", "description" => "Create your own world.", "price" => 8.99, "image" => "https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Robot Toy", "description" => "Walks and talks.", "price" => 15.99, "image" => "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Doll House", "description" => "A cozy little home.", "price" => 22.49, "image" => "https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Action Figure", "description" => "Heroic adventures await.", "price" => 12.99, "image" => "https://images.unsplash.com/photo-1518717758536-85ae29035b6d?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Board Game", "description" => "Fun for the whole family.", "price" => 18.99, "image" => "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Remote Car", "description" => "Control the speed.", "price" => 19.99, "image" => "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Magic Cube", "description" => "Twist and solve.", "price" => 6.99, "image" => "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Plush Rabbit", "description" => "Super soft and cute.", "price" => 11.49, "image" => "https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Water Gun", "description" => "Summer fun guaranteed.", "price" => 5.99, "image" => "https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Yo-Yo", "description" => "Classic toy for tricks.", "price" => 2.99, "image" => "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Kite", "description" => "Fly high in the sky.", "price" => 7.49, "image" => "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Train Set", "description" => "All aboard!", "price" => 24.99, "image" => "https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Mini Drone", "description" => "Fly and flip.", "price" => 29.99, "image" => "https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Bubble Maker", "description" => "Endless bubbles.", "price" => 3.99, "image" => "https://images.unsplash.com/photo-1509228468518-180dd4864904?auto=format&fit=crop&w=100&q=80"],
    ["name" => "Jump Rope", "description" => "Stay active and fit.", "price" => 2.49, "image" => "https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=100&q=80"]
];

$search = isset($_GET['search']) ? strtolower($_GET['search']) : "";

$filtered = array_filter($products, function($product) use ($search) {
    return strpos(strtolower($product["name"]), $search) !== false || strpos(strtolower($product["description"]), $search) !== false;
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Mini Product Catalog</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
    </form>
    <div class="products-container">
        <?php if (count($filtered) > 0): ?>
            <?php foreach ($filtered as $product): ?>
                <div class="product">
                    <a href="product_detail.php?id=<?= array_search($product, $filtered) ?>">
                        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                        <div class="product-content">
                            <strong><?= $product['name'] ?></strong>
                            <div class="product-description"><?= $product['description'] ?></div>
                            <div class="product-price">$<?= number_format($product['price'], 2) ?></div>
                            <div class="view-details">View Details</div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-products">No products found.</p>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>Copyright &copy; 2025.5.28 Mini Product Catalog</p>
        <p>Developed by JieLiang Xu, Sidharth and Alphine</p>
    </div>
</body>
</html>
