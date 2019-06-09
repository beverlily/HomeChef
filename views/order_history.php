<?php
   include 'views/partials/header.php';
   include 'views/partials/menu.php';

   //if user isn't logged in, redirects them to the log in page
   isset($_SESSION['USERID']) ? $userId = $_SESSION['USERID'] :  header('Location: ../sign_in');
   $o = new Order();
   $orders = $o->getAllOrders($userId);
   $orderItem = new OrderItem();
   ?>
<main>
   <div class="page-wrapper">
      <div id="orders">
         <h2>Order History</h2>
         <ul id="order-list">
            <?php foreach($orders as $order):?>
            <li class='order'>
               	   <span class="item-title">Ordered on:</span> <?=explode(' ',trim($order->purchase_time))[0]?>
                   <br />
               	   <br />
               	   <div class="item-title">Chef:</div> <?="$order->chef_firstName $order->chef_lastName"?>
               	   <br />
                   <br />
                   <br />
                   <!--Order items-->
                <ul id="order-item-list">
                 <?php
                 $orderItems = $orderItem->getOrderItems($order->id);

                 foreach($orderItems as $item){
        					  $price = $item->quantity*$item->price;
                    $chef_id = $item->chef_id;

        					  echo
        					  "<li class='flex-container'>
        						  <img src='images/$item->image' alt='$item->title' class='order-item' />
        						 <div>
        							   <h3 class='item-title'>$item->title</h3>
        							   <div>Quantity: $item->quantity</div>
        							 <div>$$price</div>
        							 <br />
        							 </div>
        					  </li>";
      					  }
                  $totalPrice = number_format($order->total_price,2);
                  echo "<span class='item-title'>Order total: $$totalPrice</span>";?>
                </ul>
              </li>
            <?php endforeach;?>
         </ul>
      </div>
   </div>
   <!-- end of page wrapper-->
</main>
<?php
include 'views/partials/footer.php';
