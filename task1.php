<?php
/**
 * task 1 page
 */
include_once("classes/functions.php");

$crud = new Ecom();


$query = "SELECT 
    category.Name,
    COUNT(Item.Number) AS total
FROM
    category 
INNER JOIN Item_category_relations ON category.Id = Item_category_relations.categoryId
INNER JOIN Item ON Item_category_relations.ItemNumber = Item.Number
GROUP BY category.Id
ORDER BY total DESC";
$result = $crud->task1($query);
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">HOME</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="task1.php">task 1</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="task2.php">task 2</a>
            </li>
        </ul>
        </nav>
        <div class="jumbotron text-center">
            <h1>this is task 1</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Total Items</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($result as $key => $res) {
                //while($res = mysqli_fetch_array($result)) { 		
                    echo "<tr>";
                    echo "<td>".$res['Name']."</td>";
                    echo "<td>".$res['total']."</td>";	
                    
                }
                ?>
            </tbody>
        </table>


    </body>
</html>