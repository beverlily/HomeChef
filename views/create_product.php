<?php
include 'views/partials/header.php';
include 'views/partials/menu.php';
 ?>

 <main id="main">
   <div class="banner-pages">
     <h2> Add a New Menu Item! </h2>
   </div>
   <form method="post" enctype="multipart/form-data">

     <div class="form-row">
       <label for="title" class="inline"> Menu Title: </label>
       <input type="text" name="title" placeholder="Menu Item Title" />
     </div>
     <div class="form-row">
       <label for="description"> Description: </label>
       <input type="text" name="description" placeholder="Description of Item" id="product_description"/>
    </div>

    <div class="form-row">
			<label for="product_image">Image:</label>
			<input type="file" name="product_image" id="product_image">
		</div>

   <div class="form-row">
     <label for="password"> Price: </label>
     <input type="text" name="price" placeholder="Menu Item Price"><br />
   </div>


     <button type="submit" name="add_product"> Add Item! </button>
   </form>
 </main>

  <?php  include 'views/partials/footer.php'; ?>
