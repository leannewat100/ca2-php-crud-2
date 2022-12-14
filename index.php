<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];


// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
?>

<div class="container">
<?php
include('includes/header.php');
?>
<h1></h1>

<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>
<?php foreach ($categories as $category) : ?>
   <li>
   <a class="btn btn-light catbtn" href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>    
</aside>

<section>
<!-- display a table of records -->
<h2><?php echo $category_name; ?></h2>
<div class="table-responsive tasklist">
<table class="table">
    
<tr>
<th>Name</th>
<th>Description</th>
<th>Start Date</th>
<th>Completion Date</th>
<th>Urgency</th>
<th>Location</th>
<th>Delete</th>
</tr>

<?php foreach ($records as $record) : ?>
<tr>


<td><?php echo $record['name']; ?></td>
<td><?php echo $record['description']; ?></td>
<td><?php echo $record['start']; ?></td>
<td><?php echo $record['date']; ?></td>
<td><?php echo $record['urgency']; ?></td>
<td><?php echo $record['location']; ?></td>

<td><form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="record_id"
value="<?php echo $record['recordID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $record['categoryID']; ?>">
<input class="btn btn-light delbtn" type="submit" value="Delete">
</form></td>


</tr>
<?php endforeach; ?>
</table>
</div>

</section>

   
<?php
include('includes/footer.php');
?>