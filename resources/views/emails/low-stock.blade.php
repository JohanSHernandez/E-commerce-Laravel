<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Low Stock Alert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .alert {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .product-info {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Low Stock Alert</h1>
    </div>
    <div class="content">
        <div class="alert">
            <strong>Warning:</strong> The following product is running low on stock.
        </div>
        
        <div class="product-info">
            <h2>{{ $product->name }}</h2>
            <p><strong>Current Stock:</strong> {{ $product->stock }} units</p>
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        </div>
        
        <p>Please take action to restock this item as soon as possible.</p>
        
        <a href="{{ route('products.edit', $product) }}" class="button">Update Stock</a>
    </div>
</body>
</html>