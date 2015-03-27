<!DOCTYPE html>
<html>

<head>
<?php $page_title = 'AKON Merchandise - Shop by UMAIR YAQUOOB'; ?>
<?php include("header.php"); ?>
</head>

<body>

    <h1>AKON Merchandise</h1>
    
    <p>
    Choose the Items you'd like to order, your shipping state, and preferred shipping method, and we'll give you an estimated total with tax.
	</p>
    
    
    <form class="cart" id="cart-merchandise">
    <div class="item">
	    <h2>T-shirt</h2>
	    <p>Mens Basic T-shirt. Available in Small, Medium and Large</p>
	    <label>Please select a size:</label>
	    <select name="tee" >
        <option value="Small">Small</option><option value="Medium">Medium</option>
        <option value="Large">Large</option>
        </select>
	    <div class="info">
	    <span>Price: £10/T-shirt</span>
	    </div>
	    
	    <div class="order">
	    <label for="txt-q-tshirt">Quantity:</label>
	    <input type="text" id="txt-q-tshirt" size="3" placeholder="0">
	    </div>
    </div>
    
    <div class="item">
        <h2>Scarf</h2>
        <p>Ideal for keeping you warm in colder conditions.</p>
        
        <div class="info">
        <span>Price: £8/Scarf</span>
        </div>
        
        <div class="order">
        <label for="txt-q-scarf">Quantity:</label>
        <input type="text" id="txt-q-scarf" size="3" placeholder="0">
        </div>
    </div>
    
    <div class="item">
        <h2>Hoodie</h2>
        <p>This hoodie is prefect for everyday wear.</p>
        
        <div class="info">
        <span>Price: £20/Hoodie</span>
        </div>
        
        <div class="order">
        <label for="txt-q-hoodie">Quantity:</label>
        <input type="text" id="txt-q-hoodie" size="3" placeholder="0">
        </div>
    </div>
    
    <div id="summary">
    	<h2>Estimate Order</h2>    	
    	<div class="group country">
	    	<label for="s-country">Countries:</label>
	    	<select id="s-country">
		    	<option value="">- select -</option>
		    	<option value="US">United States (7.5% tax)</option>
				<option value="CD">Canada</option>
				<option value="UK">United Kingdom </option>
				<option value="EU">Eurozone</option>
	    	</select>
    	</div>
    	
    	<div class="group method">
	    	<label for="r-method-pickup">Delivery Method:</label><br>
			<input type="radio" value="pickup" name="r_method" id="r-method-pickup" checked> <label for="r-method-pickup">Pickup (free)</label><br>
			
			<input type="radio" value="next" name="r_method" id="r-method-next"> <label for="r-method-next">Next Day (£8 /First-Class)</label><br>
			
			<input type="radio" value="three" name="r_method" id="r-method-three"> <label for="r-method-three">3-days (£4/Delivered-Three Days)</label>
    	</div>
    	
    	<div class="group special">
	    	<label for="c-special-gift">Special:</label><br>
			<input type="checkbox" value="YES" id="c-special-gift"> <label for="c-special-gift">This is a gift</label><br>
    	</div>
    	
    	<div class="group calc">
    		<p>
    		<label for="btn-estimate">Click to estimate:</label>
    		<input type="submit" value="Estimate Total" id="btn-estimate">
    		<input type="text" id="txt-estimate" placeholder="$0.00">
    		</p>
    		
    		<div id="results"></div>
    	</div>
    </div>
        
    </form>
    
  </div>
<script type='text/javascript'  src='jquery-1.11.2.min.js'></script>

<script>
"use scrict";

// this only works in IE9 and above, but fine everywhere else
document.getElementById("cart-merchandise").addEventListener( "submit", estimateOrder, false );

function estimateOrder(event) {
	// do not try to submit this form
	event.preventDefault();
	
	if (document.getElementById('s-country').value === '') {
		alert('Please choose your country to deliver.');
		
		// trigger a focus event on the offending field
		document.getElementById('s-country').focus();
		return;
	}
	
	// collect the quantity of each kind of clothing 
	// we're sanitizing these values since the user could put in any old thing
	var itmTshirt = parseInt(document.getElementById('txt-q-tshirt').value, 10) || 0,
		itmScarf = parseInt(document.getElementById('txt-q-scarf').value, 10) || 0,
		itmHoodie = parseInt(document.getElementById('txt-q-hoodie').value, 10) || 0;
	
	var totalItems = itmTshirt + itmScarf + itmHoodie;
		
	// collect the state
	var state = document.getElementById('s-country').value;
	var taxFactor = 1;
	if (state === 'US') taxFactor = 1.075; // 7.5% tax in United States
	// collect the radio button's value
	var method = document.getElementById('cart-merchandise').r_method,
		methodValue = '';
		
	for (var i = 0; i < method.length; i++) {
		if (method[i].checked) {
			methodValue = method[i].value;
			break;
		}
	}
	
	var deliveryPrice = 0;
	switch (methodValue) {
		case 'pickup' :
			// we don't charge for in-person pick-up
			deliveryPrice = 0;
			break;
		case 'next' :
			// Next Day: $8 for fast delivery within one day of purchase. 
			deliveryPrice = 8;
			break;
		case 'three' :
			// Three Days: $4 additional for three days delivery  
			deliveryPrice = 4;
			break;
	}
			console.log('delivery price: ' + deliveryPrice);
	
	var estimate = (itmTshirt * 10 + itmScarf * 8 + itmHoodie * 20) * taxFactor + deliveryPrice;
	
	document.getElementById('txt-estimate').value = '£' + estimate.toFixed(2);
	
	document.getElementById('results').innerHTML = 'Total items: ' + totalItems + '<br>';
	document.getElementById('results').innerHTML += 'Total delivery: £' + deliveryPrice.toFixed(2) + '<br>';
	document.getElementById('results').innerHTML += 'Total tax: ' + ((taxFactor - 1) * 100).toFixed(2) + '%';
}
</script>
<?php include("footer.php"); ?>
</body>
</html>