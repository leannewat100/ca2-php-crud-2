<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
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
<br>
    <h1>Category List</h1>
    
    <div class="table-responsive cate">
    <table class="table table-bordered-dark align-middle">
        
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
      
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form class="table deltable" action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input class="btn btn-light cbtn" type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>
    <br>

    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">
          <div class="row">
          <div class="col-md-4 catname">
        <input type="input" class="form-control" name="name" placeholder="Category Name" required>
        </div>
        <div class="col-sm-2">
        <input id="add_category_button" class="form-control btn btn-light addbtn" type="submit" value="Add">
        </div>
        </div>
    </form>
    <br>

    <?php
include('includes/footer.php');
?>