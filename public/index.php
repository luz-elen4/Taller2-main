<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <?php 

        require_once '../vendor/autoload.php';
        use taller2\Controllers\ClientController;
        $ClientController = new ClientController('../clients.json');
        $Clients = $ClientController->readJsonFile();

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
                    <a class="nav-link active text-primary fs-4" aria-current="page" href="index.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-4" href="sales.php">Sales</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    
        <div class="container">
        <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Birthdate</th>
            <th scope="col">Age</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($Clients as $index => $Client){
                    echo "<tr>";
                    echo "<th scope='row'>" . ($index + 1) . "</th>";  // Muestra el índice (1, 2, 3, ...)
                    echo "<td>" . $Client['name'] . "</td>";  // Muestra el nombre
                    echo "<td>{$Client['phone']} </td>";  // Muestra el teléfono
                    echo "<td>".($Client['date']?? '')."</td>";  // Muestra el email
                    echo "<td>".($Client['age']?? '')."</td>";  // Muestra el email
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
        <button id="add" class="btn btn-success w-100" onclick="window.location.href='addClient.php'">Create new Client</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>