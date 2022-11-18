<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Task</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name">
            <br>

            <label>Description</label>
            <textarea  name="description" rows="4" cols="50">
            </textarea>
            <br>
            <br>        

            <label>Start Date:</label>
            <input type="date" name="start">
            <br>

            <label>Completion Date:</label>
            <input type="date" name="date">
            <br>

            <label>Urgency:</label>
            <input type="radio" name="urgency"
            <?php if (isset($urgency) && $urgency=="Low") echo "checked";?>
            value="Low"><label>Low</label>
            <input type="radio" name="urgency"
            <?php if (isset($urgency) && $urgency=="Medium") echo "checked";?>
            value="Medium"><label>Medium</label>
            <input type="radio" name="urgency"
            <?php if (isset($urgency) && $urgency=="High") echo "checked";?>
            value="High"><label>High</label>
            <br>
            
            <label>Location</label>
            <input type="input" name="location">
            <br>  
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Task">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>