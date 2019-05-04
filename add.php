<?php
  include('./includes/header.php');
  include('./database/database.php');
  include('./utils/functions.php');

  // DEBUGGING
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  $allowedTypes = array('jpg', 'jpeg');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST["itemName"])) {
      $errors[] = 'Inventory name is required!';
    } else {
      $inventoryName = cleanValues($_POST["itemName"]);
    }

    if (empty($_POST["description"])) {
      $errors[] = 'Description is required!';
    } else {
      $description = cleanValues($_POST["description"]);
    }

    if (empty($_POST["itemCost"])) {
      $errors[] = 'Inventory items require a cost.';
    } else {
      $itemCost = $_POST["itemCost"];
    }

    if (empty($_POST["itemAmount"])) {
      $errors[] = 'Amount of inventory is needed.';
    } else {
      $itemAmount = $_POST["itemAmount"];
    }

    if (empty($_POST["categoryId"])) {
      $errors[] = 'Please select a category.';
    } else {
      $categoryId = $_POST["categoryId"];
    }

    if (isset($_FILES["itemImage"])) {
      $file = $_FILES['itemImage'];

      $fileName = $_FILES['itemImage']['name'];
      $fileTempName = $_FILES['itemImage']['tmp_name'];
      $fileError = $_FILES['itemImage']['error'];

      $fileNameBreak = explode('.', $fileName);
      $fileType = strtolower(end($fileNameBreak));

      if(in_array($fileType, $allowedTypes)) {
        if($fileError === 0) {
          $uploadDirectory = "images/$fileName";
          move_uploaded_file($fileTempName, $uploadDirectory);
        } else {
          $errors[] = 'Sorry! There was an error uploading your image.';
        }
      } else {
        $errors[] = 'Uploaded image needs to be a jpg file!';
      }
    } else {
      $errors[] = 'Image not found, please add an image to uploads.';
    }

    if (empty($errors)) {
      $query = "INSERT INTO inventory (item_name, item_description, item_cost, item_img, item_category, item_amount)
                VALUES ('$inventoryName', '$description', '$itemCost', '$fileName', '$categoryId', '$itemAmount')";
      $result = mysqli_query($connection, $query);
    }
  }

 ?>
 <body class="container-fluid">
   <main class="main-content row align-items-center justify-content-center">
     <?php
       if (!empty($errors)) {
         echo "<div class='alert alert-danger col-md-12'>";
         echo "<p class=''>Sorry! We had some errors adding to inventory:</p>";
         foreach ($errors as $error) {
           echo "<span class=''> - $error</span><br>\n";
         }
         echo "</div>";
       }
     ?>
       <form enctype="multipart/form-data" class="form-horizontal col-md-8 col-sm-12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label class="control-label col-sm-2" for="item name">Inventory Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="itemName" placeholder="Enter name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="description">Description:</label>
          <div class="col-sm-10">
            <textarea type="password" class="form-control round-0" name="description" rows="10"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Inventory Cost:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="itemCost" value="0.00" step="0.01">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Amount:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="itemAmount" value="0" step="1">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Category:</label>
          <div class="col-sm-10">
            <select class="selectpicker" name="categoryId">
              <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  echo "<option value='"  . $row['category_id'] .  "'>"  . $row['category_name'] .  "</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Image:</label>
          <div class="col-sm-10">
            <input type="file" class="mb-2" name="itemImage">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-lg btn-info">Submit</button>
          </div>
        </div>
      </form>
   </main>
 </body>
 <?php include('./includes/footer.php'); ?>
