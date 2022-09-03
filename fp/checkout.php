<?php include "files/header.php"; ?>
<?php 

	global $connect;
	
	$ip = getIp();
	
	$total = 0;
	
	$t_price = "select * from cart where ip_add = '$ip'";
	
	$run_price = mysqli_query($connect, $t_price);
	
	while($row_t_price = mysqli_fetch_array($run_price)){
		
		$pro_id_t = $row_t_price['p_id'];
		
		$price_pro = "select * from products where p_id = '$pro_id_t'";
		
		$run_price_pro = mysqli_query($connect, $price_pro);
		
		while($row_price_pro = mysqli_fetch_array($run_price_pro)){
			
			$pro_price = array($row_price_pro['p_price']);
			
			$pro_name = $row_price_pro['p_title'];
			
			$values = array_sum($pro_price);			
			
			$total +=$values;
			
		}
	}
	
	$get_qty = "select * from cart where p_id = '$pro_id_t'";
	
	$run_qty = mysqli_query($connect, $get_qty);
	
	$row_qty = mysqli_fetch_array($run_qty);
	
	$qty = $row_qty['qty'];
	
	if($qty==0){
		
		$qty = 1;
	
	}
	else{
		
		$qty = $qty;
		
		$total = $total*$qty;
		
	}

?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="item_number" value="<?php echo $pro_id_t; ?>"/>
<input  type="hidden" name="quantity" value="<?php echo $qty;?>"/>
</form>


<center>

<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=ILS" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"ILS","value":<?php echo $total; ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
			window.location.replace("paypal_success.php");
          });
        },

        onError: function(err) {
          console.log(err);
		  window.location.replace("paypal_failed.php");
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
  
  
  </center>
  <?php include "files/footer.php"; ?>