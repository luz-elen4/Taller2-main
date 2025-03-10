<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta sale="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
<body>

<?php

require_once '../vendor/autoload.php';
use taller2\Models\Sale;
use taller2\Controllers\SaleController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $sale = $_POST['sale'] ?? '';
    $price = $_POST['price'] ?? '';
    $date = $_POST['date'] ?? '';

    if (!empty($sale) && !empty($price) && !empty($date)) {
        $SaleController = new SaleController('../sales.json');

        
        $Sale = new Sale($sale, $price, $date);
        $SaleController->add($Sale);
        $SaleController->generateSalePDF($Sale);
        header('Location: sales.php?status=success');
        exit();
    } else {
        
        $error = "Todos los campos son obligatorios.";
    }
}
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="index.php">
            <img src="https://d17nlwiklbtu7t.cloudfront.net/90375/club/logo/square_1715956373-2-0024-3760-CALDAS_LOGOs.png" alt="Logo" class="d-inline-block align-text-top" style="width: 40px; height: 40px;">
             
        </a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item">
                        <a class="nav-link fs-4" href="index.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-primary fs-4" aria-current="page" href="sales.php">Sales</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" class="p-4 border rounded shadow-sm bg-light">
               
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                
                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div class="alert alert-success">
                        Salee añadido correctamente.
                    </div>
                <?php endif; ?>

                
                <div class="mb-3">
                    <label for="sale" class="form-label">Name of sale:</label>
                    <input type="text" id="sale" name="sale" class="form-control" placeholder="Escribe el nombre" value="<?php echo isset($sale) ? htmlspecialchars($sale) : ''; ?>" required>
                </div>

                
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" placeholder="Enter the price" step="0.01" min="0" required>
                </div>

               
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo isset($date) ? htmlspecialchars($date) : ''; ?>" required>
                </div>
                
                
                <button id="add" class="btn btn-success w-100">Agregar</button>
            </form>
        </div>
    </div>
</div>
</body>