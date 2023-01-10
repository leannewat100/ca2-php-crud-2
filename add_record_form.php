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
        <form class="tform was-validated" action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

              <div class="row g-3">
  <div class="col-md-6">
  <label>Category:</label class="form-label">
  <select name="category_id" class="form-select">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
  </div>
  <div class="col-md-6">
  <label>Name:</label class="form-label">
    <input type="input" name="name" class="form-control" placeholder="Task name" aria-label="Task name" required>
    <div class="valid-feedback">
      Perfect!
    </div>
  </div>

<div class="col-12">
<label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Short description of task" required></textarea>
  <div class="valid-feedback">
      Looks good!
    </div>
  </div>


  <div class="col-md-6">
  <label class="form-label">Start Date:</label>
    <input type="date" name="start" class="form-control"  required>
  </div>
  <div class="col-md-6">
  <label class="form-label">Completion Date:</label>
    <input type="date" name="date" class="form-control"  required>
  </div>



  <div class="col-md-6">
  <label class="form-label">Urgency:</label>
  <div class="form-check">
            <input type="radio" class="form-check-input" name="urgency"
            <?php if (isset($urgency) && $urgency=="Low") echo "checked";?>
            value="Low" id="validationFormCheck1" required>
            <label class="form-check-label" for="validationFormCheck1">Low</label>
 </div>
 <div class="form-check">
            <input type="radio" class="form-check-input"  name="urgency"
            <?php if (isset($urgency) && $urgency=="Medium") echo "checked";?>
            value="Medium" id="validationFormCheck2" required>
            <label class="form-check-label" for="validationFormCheck2">Medium</label>
            </div>          
 <div class="form-check">            
            <input type="radio" class="form-check-input"  name="urgency"
            <?php if (isset($urgency) && $urgency=="High") echo "checked";?>
            value="High" id="validationFormCheck3" required>
            <label class="form-check-label" for="validationFormCheck3">High</label>
            </div>
            <br>
  </div>

  <div class="col-md-6">
  <label>Location</label class="form-label">
            <input type="input" class="form-control" name="location" placeholder="Task Location">
  </div>
         
            </div>
 
            <label>&nbsp;</label>
            <div class="d-grid gap-2 col-2 mx-auto">
            <input class="btn btn-light delbtn" type="submit" value="Add Task">
            </div>
            <br>
        </form>
        
    <?php
include('includes/footer.php');
?>