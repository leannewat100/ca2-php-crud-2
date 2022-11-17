<?php

// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$start = filter_input(INPUT_POST, 'start');
$date = filter_input(INPUT_POST, 'date');
$location = filter_input(INPUT_POST, 'location'); 

// Validate inputs
if ($category_id == null || $category_id == false ||
    $name == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {


    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO records
                 (categoryID, name, description, start, date, location)
              VALUES
                 (:category_id, :name, :description, :start, :date, :location)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':start', $start);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':location', $location);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}