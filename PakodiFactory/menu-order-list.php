﻿
Currently editing:  
/home/pakod3fq/public_html/menu-order-list.php
 Encoding:    Reopen  Switch to Code Editor     Close  Save

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Robots" content="index, follow"/>
<title>:: Pakodi Factory ::</title>

<meta name="Description"  content="" />

<meta name="Keywords" content="" />

<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/carousel.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/css_002.css">

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<script type="text/javascript">

function addFood(obj){
	$('#loadImage').show();
setTimeout(function() {
		var foodItemName = $(obj).closest('table').find('td:eq(0)').text();
	var foodItemSize = $(obj).prev().prev().text();
	var foodItemPrice = $(obj).prev().text();

	var foodItemLength = $('#foodItems').children().length;
	
	
	var addFood = '<table width="100%" border="0" class="foodItemTab-'+(foodItemLength+1)+' "align="center" cellpadding="0" cellspacing="0"><tr><td colspan="2" align="left" valign="middle" height="10"></td></tr>';
			addFood += '<tr><td align="left" valign="middle"><span class="count">1</span> <span class="cart-select-title">'+foodItemName+' ('+foodItemSize+')</span></td><td align="left" valign="middle">&nbsp;</td></tr>';	
			addFood +='<tr><td align="left" valign="middle"><div class="btn-group" role="group" aria-label="..."><button type="button" class="btn btn-default count2" onclick="deleteExtraFood(this)">-</button><button type="button" class="btn btn-default count2" onclick="addExtraFood(this)">+</button></div></td><td align="right" valign="middle" class="cart-select-title2">'+foodItemPrice+'</td></tr>';
			addFood +='<tr><td colspan="2" align="left" valign="middle" class="line">&nbsp;<input type="text" class="foodItemHidden-'+(foodItemLength+1)+'" style="display:none;" name="selectedFood" value="'+foodItemName+'"></td></tr></table>';
	$('#foodItems').append(addFood);
	$(obj).removeAttr('onclick');
	$('#loadImage').hide();
	if(foodItemLength > 1){
		$('#foodItems').css('overflow-y','scroll');
	}
				}, 1000);

	
}
function addExtraFood(extraFoodObj){
	var oldValue = $(extraFoodObj).closest('table').find('span').first().text();
	var newValue = (parseInt(oldValue)+1);
	$(extraFoodObj).closest('table').find('span').first().text(newValue);

	var price = $(extraFoodObj).closest('table').find('.cart-select-title2').text();
	var parsedPrice = parseInt(price.split('Rs.')[1]);
		var actualPrice = parsedPrice/oldValue;
	$(extraFoodObj).closest('table').find('.cart-select-title2').text('Rs.'+actualPrice*newValue);
}

function deleteExtraFood(extraFoodObj){
	var oldValue = $(extraFoodObj).closest('table').find('span').first().text();
	
if(oldValue == 0 || oldValue == 1){
		$(extraFoodObj).closest('table').remove();
	}else{
	var newValue = (parseInt(oldValue)-1);
	
	$(extraFoodObj).closest('table').find('span').first().text(newValue);

	var price = $(extraFoodObj).closest('table').find('.cart-select-title2').text();
	var parsedPrice = parseInt(price.split('Rs.')[1]);
	var actualPrice = parsedPrice/oldValue;
	$(extraFoodObj).closest('table').find('.cart-select-title2').text('Rs.'+actualPrice*newValue);
	}


}

function loadMenuCheckout(){
		var foodItemTitleName = '';
	       var subtotal = 0;
		   var totalPrice = 0;
			var foodListContent  = '';
			 var i=1;
			var orderedItems = $('#foodItems').find('table').length;
			if(orderedItems>0){
				$('#foodItems').find('table').each (function() {
				  var foodItemTitle = $('.foodItemTab-'+i+'  .cart-select-title').text();
				  var itemsCount = $('.foodItemTab-'+i+' .count').text();
				  var itemPrice = $('.foodItemTab-'+i+' .cart-select-title2').text();
					var parseItemPrice = parseInt(itemPrice.split('Rs.')[1]);
				
					 foodListContent += '<div class="row foodItemDiv-'+i+'">';
					foodListContent += '<div class="col-md-1"><i class="fa fa-times-circle close-icon"></i></div>';
					foodListContent += '<div class="col-md-7 order-title checkoutOrderItem">'+foodItemTitle+'</div>';
					foodListContent += '<div class="col-md-2"><div class="input-group bootstrap-touchspin"><span class="input-group-btn"><button type="button" class="btn btn-default bootstrap-touchspin-down" onclick="deleteCheckOutFoodItems(this,'+parseItemPrice+')">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>';
					foodListContent += '<input type="text" name="demo7"  value="'+itemsCount+'" id="demo7" class="form-control foodAddressItemCount" style="display: block;"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span><span class="input-group-btn"><button type="button" class="btn btn-default bootstrap-touchspin-up" onclick="addCheckOutFoodItems(this,'+parseItemPrice+')">+</button></span></div></div>';
					foodListContent += '<div class="col-md-2 order-txt foodAddressPrice">'+itemPrice+'</div></div><hr/>';
					foodItemTitleName += foodItemTitle+',';
					subtotal = subtotal+parseItemPrice;

				  i = i+1;
					
}); 
totalPrice = totalPrice+subtotal+30;
		if((totalPrice-30)>250){
			if($('.foodListCont').length > 0){
				$('.foodListCont').append(foodListContent);
			}	
			
				
				$('.subTotalPrice').text('Rs.'+subtotal);		
				$('.totalPrice').text('Rs.'+totalPrice);
			 $('.orderListDiv').hide();
	         $('#menuCheckOutDiv').show(); 
				}else{
					alert('your order should be atleast Rs.250');
				}
}else{
	alert('Please select food items');
		//alert('your order should be atleast Rs.250');
}
	
}

function addCheckOutFoodItems(obj,price){
	var oldItemCount  =	$(obj).closest('div').find('input').val();
	var newItemCount = (parseInt(oldItemCount)+1);
	$(obj).closest('div').find('input').val(newItemCount);
	var prices = parseInt($(obj).closest('div').parent().next().text().split('Rs.')[1]);
	
	var actualPrice = prices/parseInt(oldItemCount);
	$(obj).closest('div').parent().next().text('Rs.'+(actualPrice*newItemCount));

	var subTotalPrice = parseInt($('.subTotalPrice').text().split('Rs.')[1]);
	$('.subTotalPrice').text('Rs.'+(subTotalPrice+actualPrice));

	var totalPrice = parseInt($('.totalPrice').text().split('Rs.')[1]);
	$('.totalPrice').text('Rs.'+(totalPrice+actualPrice));
}

function deleteCheckOutFoodItems(obj,price){
	var oldItemCount  =	$(obj).closest('div').find('input').val();
	var newItemCount = (parseInt(oldItemCount)-1);
	if(newItemCount != 0){
	$(obj).closest('div').find('input').val(newItemCount);
	var prices = parseInt($(obj).closest('div').parent().next().text().split('Rs.')[1]);
	
	var actualPrice = prices/parseInt(oldItemCount);
	$(obj).closest('div').parent().next().text('Rs.'+(actualPrice*newItemCount));

	var subTotalPrice = parseInt($('.subTotalPrice').text().split('Rs.')[1]);
	$('.subTotalPrice').text('Rs.'+(subTotalPrice-actualPrice));

	var totalPrice = parseInt($('.totalPrice').text().split('Rs.')[1]);
	$('.totalPrice').text('Rs.'+(totalPrice-actualPrice));
	}
	
}


function loadMenuAddress(){
var totalFoodPrice = $('.totalPrice').text().split('Rs.')[1];
	if((totalFoodPrice-30) > 250){
      var subtotal = 0;
		   var totalPrice = 0;
			var foodListContent  = '';
			 var i=1;
			 var foodArray = [];
			 	foodListContent += '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
				$('.foodListCont').find('.row').each (function() {
				  var foodItemTitle = $('.foodItemDiv-'+i+'  .checkoutOrderItem').text();
				  var itemsCount = $('.foodItemDiv-'+i+' .foodAddressItemCount').val();
				  var itemPrice = $('.foodItemDiv-'+i+' .foodAddressPrice').text();
					var parseItemPrice = parseInt(itemPrice.split('Rs.')[1]);
					subtotal = subtotal+parseItemPrice;
				
					 foodListContent += '<tr><td colspan="2" align="left" valign="middle" height="10"></td></tr>';
					foodListContent += '<tr><td align="left" valign="middle"><span class="cart-select-title"><span class="txt2">'+itemsCount+'x</span> '+foodItemTitle+'</span></td><td align="right" valign="middle" class="cart-select-title2">Rs.'+(parseItemPrice)+'</td></tr>';
					foodListContent += '<tr><td colspan="2" align="left" valign="middle" class="line">&nbsp;</td></tr>';
					
					
				foodArray[i-1]= itemsCount+' - '+foodItemTitle;

				  i = i+1;
					
			}); 
					foodListContent += '<tr><td colspan="2" align="left" valign="middle">&nbsp;</td></tr>';
					foodListContent += '<tr><td align="left" valign="middle" class="sub-title">Subtotal</td><td align="right" valign="middle" class="sub-price addressSubPrice">Rs.'+subtotal+'</td></tr>';
					foodListContent += '<tr><td align="left" valign="middle" class="sub-title">Delivery fee</td><td align="right" valign="middle" class="sub-price">Rs.30.00 </td></tr>';
					foodListContent += '<tr><td align="left" valign="middle" class="sub-title2 ">Total</td><td align="right" valign="middle" class="sub-price2 addressTotalPrice">Rs.'+(subtotal+30)+'</td></tr>';
					foodListContent += '<tr><td colspan="2" align="left" valign="middle">&nbsp;</td></tr>';
				foodListContent += '</table>';
			if($('.foodOrderItems').length > 0){
				$('.foodOrderItems').append(foodListContent);
			}	
			totalPrice = totalPrice+subtotal+250+30;
				//$('.subTotalPrice').text(subtotal);		
				//$('.totalPrice').text(totalPrice);
			 $('.orderListDiv').hide();
	         $('#menuCheckOutDiv').hide(); 	
	         $('#menuAddressDiv').show();	
			$('#foodItemsList').val(foodArray);
}else{
		alert('your order should be atleast Rs.250');
	}
}
function showOrderList(){
	
	      $('#menuCheckOutDiv').children().remove(); 	
			$('#menuCheckOutDiv').hide();
	    $('#menuAddressDiv').children().remove();	
	         $('#menuAddressDiv').hide();
			  $('.orderListDiv').show();
}

</script>

<style type="text/css">
body {padding-top:90px;}
.item img {width:100%;}
.cart{position:fixed;}
.carousel-control.left, .carousel-control.right {background-image:none !important;	opacity:1;}
#topcontrol {background:url(images/top-arrow.png) no-repeat center center, #000000; height: 50px; width: 50px;}
</style>

<style type="text/css">
.sticky-container{
padding: 0px;
margin: 0px;
position: fixed;
right: -119px;
top:730px;
width: 200px;

}
#foodItems{max-height: 170px;}
.sticky li{
list-style-type: none;
background-color: #333;
color: #efefef;
height: 43px;
padding: 0px;
margin: 0px 0px 1px 0px;
-webkit-transition:all 0.25s ease-in-out;
-moz-transition:all 0.25s ease-in-out;
-o-transition:all 0.25s ease-in-out;
transition:all 0.25s ease-in-out;
cursor: pointer;
filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); 
filter: gray; 
-webkit-filter: grayscale(100%); 

}

.sticky li:hover{
margin-left: -115px;
filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
-webkit-filter: grayscale(0%);
}

.sticky li img{
float: left;
margin: 5px 5px;
margin-right: 10px;

}

.sticky li p{
padding: 0px;
margin: 0px;
text-transform: uppercase;
line-height: 43px;

}

/** content **/
.content{
margin-top: 150px;
margin-left: 100px;
width: 700px;
}
p{
color: #ecf0f1;
font-family: "Lato";
line-height: 28px;
font-size: 15px;
padding-top: 50px;
}

p.credit{
padding-top: 20px;
font-size: 12px;
}

p a{
color: #ecf0f1;
}

/** fork icon**/
.fork{
position: absolute;
top:0px;
left: 0px;
}
</style>
<style class="firebugResetStyles" type="text/css" charset="utf-8">/* See license.txt for terms of usage */
/** reset styling **/
.firebugResetStyles {
    z-index: 2147483646 !important;
    top: 0 !important;
    left: 0 !important;
    display: block !important;
    border: 0 none !important;
    margin: 0 !important;
    padding: 0 !important;
    outline: 0 !important;
    min-width: 0 !important;
    max-width: none !important;
    min-height: 0 !important;
    max-height: none !important;
    position: fixed !important;
    transform: rotate(0deg) !important;
    transform-origin: 50% 50% !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    background: transparent none !important;
    pointer-events: none !important;
    white-space: normal !important;
}
style.firebugResetStyles {
    display: none !important;
}

.firebugBlockBackgroundColor {
    background-color: transparent !important;
}

.firebugResetStyles:before, .firebugResetStyles:after {
    content: "" !important;
}
/**actual styling to be modified by firebug theme**/
.firebugCanvas {
    display: none !important;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
.firebugLayoutBox {
    width: auto !important;
    position: static !important;
}

.firebugLayoutBoxOffset {
    opacity: 0.8 !important;
    position: fixed !important;
}

.firebugLayoutLine {
    opacity: 0.4 !important;
    background-color: #000000 !important;
}

.firebugLayoutLineLeft, .firebugLayoutLineRight {
    width: 1px !important;
    height: 100% !important;
}

.firebugLayoutLineTop, .firebugLayoutLineBottom {
    width: 100% !important;
    height: 1px !important;
}

.firebugLayoutLineTop {
    margin-top: -1px !important;
    border-top: 1px solid #999999 !important;
}

.firebugLayoutLineRight {
    border-right: 1px solid #999999 !important;
}

.firebugLayoutLineBottom {
    border-bottom: 1px solid #999999 !important;
}

.firebugLayoutLineLeft {
    margin-left: -1px !important;
    border-left: 1px solid #999999 !important;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
.firebugLayoutBoxParent {
    border-top: 0 none !important;
    border-right: 1px dashed #E00 !important;
    border-bottom: 1px dashed #E00 !important;
    border-left: 0 none !important;
    position: fixed !important;
    width: auto !important;
}

.firebugRuler{
    position: absolute !important;
}

.firebugRulerH {
    top: -15px !important;
    left: 0 !important;
    width: 100% !important;
    height: 14px !important;
    background: url("data:image/png,%89PNG%0D%0A%1A%0A%00%00%00%0DIHDR%00%00%13%88%00%00%00%0E%08%02%00%00%00L%25a%0A%00%00%00%04gAMA%00%00%D6%D8%D4OX2%00%00%00%19tEXtSoftware%00Adobe%20ImageReadyq%C9e%3C%00%00%04%F8IDATx%DA%EC%DD%D1n%E2%3A%00E%D1%80%F8%FF%EF%E2%AF2%95%D0D4%0E%C1%14%B0%8Fa-%E9%3E%CC%9C%87n%B9%81%A6W0%1C%A6i%9A%E7y%0As8%1CT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AATE9%FE%FCw%3E%9F%AF%2B%2F%BA%97%FDT%1D~K(%5C%9D%D5%EA%1B%5C%86%B5%A9%BDU%B5y%80%ED%AB*%03%FAV9%AB%E1%CEj%E7%82%EF%FB%18%BC%AEJ8%AB%FA'%D2%BEU9%D7U%ECc0%E1%A2r%5DynwVi%CFW%7F%BB%17%7Dy%EACU%CD%0E%F0%FA%3BX%FEbV%FEM%9B%2B%AD%BE%AA%E5%95v%AB%AA%E3E5%DCu%15rV9%07%B5%7F%B5w%FCm%BA%BE%AA%FBY%3D%14%F0%EE%C7%60%0EU%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5JU%88%D3%F5%1F%AE%DF%3B%1B%F2%3E%DAUCNa%F92%D02%AC%7Dm%F9%3A%D4%F2%8B6%AE*%BF%5C%C2Ym~9g5%D0Y%95%17%7C%C8c%B0%7C%18%26%9CU%CD%13i%F7%AA%90%B3Z%7D%95%B4%C7%60%E6E%B5%BC%05%B4%FBY%95U%9E%DB%FD%1C%FC%E0%9F%83%7F%BE%17%7DkjMU%E3%03%AC%7CWj%DF%83%9An%BCG%AE%F1%95%96yQ%0Dq%5Dy%00%3Et%B5'%FC6%5DS%95pV%95%01%81%FF'%07%00%00%00%00%00%00%00%00%00%F8x%C7%F0%BE%9COp%5D%C9%7C%AD%E7%E6%EBV%FB%1E%E0(%07%E5%AC%C6%3A%ABi%9C%8F%C6%0E9%AB%C0'%D2%8E%9F%F99%D0E%B5%99%14%F5%0D%CD%7F%24%C6%DEH%B8%E9rV%DFs%DB%D0%F7%00k%FE%1D%84%84%83J%B8%E3%BA%FB%EF%20%84%1C%D7%AD%B0%8E%D7U%C8Y%05%1E%D4t%EF%AD%95Q%BF8w%BF%E9%0A%BF%EB%03%00%00%00%00%00%00%00%00%00%B8vJ%8E%BB%F5%B1u%8Cx%80%E1o%5E%CA9%AB%CB%CB%8E%03%DF%1D%B7T%25%9C%D5(%EFJM8%AB%CC'%D2%B2*%A4s%E7c6%FB%3E%FA%A2%1E%80~%0E%3E%DA%10x%5D%95Uig%15u%15%ED%7C%14%B6%87%A1%3B%FCo8%A8%D8o%D3%ADO%01%EDx%83%1A~%1B%9FpP%A3%DC%C6'%9C%95gK%00%00%00%00%00%00%00%00%00%20%D9%C9%11%D0%C0%40%AF%3F%EE%EE%92%94%D6%16X%B5%BCMH%15%2F%BF%D4%A7%C87%F1%8E%F2%81%AE%AAvzr%DA2%ABV%17%7C%E63%83%E7I%DC%C6%0Bs%1B%EF6%1E%00%00%00%00%00%00%00%00%00%80cr%9CW%FF%7F%C6%01%0E%F1%CE%A5%84%B3%CA%BC%E0%CB%AA%84%CE%F9%BF)%EC%13%08WU%AE%AB%B1%AE%2BO%EC%8E%CBYe%FE%8CN%ABr%5Dy%60~%CFA%0D%F4%AE%D4%BE%C75%CA%EDVB%EA(%B7%F1%09g%E5%D9%12%00%00%00%00%00%00%00%00%00H%F6%EB%13S%E7y%5E%5E%FB%98%F0%22%D1%B2'%A7%F0%92%B1%BC%24z3%AC%7Dm%60%D5%92%B4%7CEUO%5E%F0%AA*%3BU%B9%AE%3E%A0j%94%07%A0%C7%A0%AB%FD%B5%3F%A0%F7%03T%3Dy%D7%F7%D6%D4%C0%AAU%D2%E6%DFt%3F%A8%CC%AA%F2%86%B9%D7%F5%1F%18%E6%01%F8%CC%D5%9E%F0%F3z%88%AA%90%EF%20%00%00%00%00%00%00%00%00%00%C0%A6%D3%EA%CFi%AFb%2C%7BB%0A%2B%C3%1A%D7%06V%D5%07%A8r%5D%3D%D9%A6%CAu%F5%25%CF%A2%99%97zNX%60%95%AB%5DUZ%D5%FBR%03%AB%1C%D4k%9F%3F%BB%5C%FF%81a%AE%AB'%7F%F3%EA%FE%F3z%94%AA%D8%DF%5B%01%00%00%00%00%00%00%00%00%00%8E%FB%F3%F2%B1%1B%8DWU%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*UiU%C7%BBe%E7%F3%B9%CB%AAJ%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5J%95*U%AAT%A9R%A5*%AAj%FD%C6%D4%5Eo%90%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5%86%AF%1B%9F%98%DA%EBm%BBV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%ADV%AB%D5j%B5Z%AD%D6%E4%F58%01%00%00%00%00%00%00%00%00%00%00%00%00%00%40%85%7F%02%0C%008%C2%D0H%16j%8FX%00%00%00%00IEND%AEB%60%82") repeat-x !important;
    border-top: 1px solid #BBBBBB !important;
    border-right: 1px dashed #BBBBBB !important;
    border-bottom: 1px solid #000000 !important;
}

.firebugRulerV {
    top: 0 !important;
    left: -15px !important;
    width: 14px !important;
    height: 100% !important;
    background: url("data:image/png,%89PNG%0D%0A%1A%0A%00%00%00%0DIHDR%00%00%00%0E%00%00%13%88%08%02%00%00%00%0E%F5%CB%10%00%00%00%04gAMA%00%00%D6%D8%D4OX2%00%00%00%19tEXtSoftware%00Adobe%20ImageReadyq%C9e%3C%00%00%06~IDATx%DA%EC%DD%D1v%A20%14%40Qt%F1%FF%FF%E4%97%D9%07%3BT%19%92%DC%40(%90%EEy%9A5%CB%B6%E8%F6%9Ac%A4%CC0%84%FF%DC%9E%CF%E7%E3%F1%88%DE4%F8%5D%C7%9F%2F%BA%DD%5E%7FI%7D%F18%DDn%BA%C5%FB%DF%97%BFk%F2%10%FF%FD%B4%F2M%A7%FB%FD%FD%B3%22%07p%8F%3F%AE%E3%F4S%8A%8F%40%EEq%9D%BE8D%F0%0EY%A1Uq%B7%EA%1F%81%88V%E8X%3F%B4%CEy%B7h%D1%A2E%EBohU%FC%D9%AF2fO%8BBeD%BE%F7X%0C%97%A4%D6b7%2Ck%A5%12%E3%9B%60v%B7r%C7%1AI%8C%BD%2B%23r%00c0%B2v%9B%AD%CA%26%0C%1Ek%05A%FD%93%D0%2B%A1u%8B%16-%95q%5Ce%DCSO%8E%E4M%23%8B%F7%C2%FE%40%BB%BD%8C%FC%8A%B5V%EBu%40%F9%3B%A72%FA%AE%8C%D4%01%CC%B5%DA%13%9CB%AB%E2I%18%24%B0n%A9%0CZ*Ce%9C%A22%8E%D8NJ%1E%EB%FF%8F%AE%CAP%19*%C3%BAEKe%AC%D1%AAX%8C*%DEH%8F%C5W%A1e%AD%D4%B7%5C%5B%19%C5%DB%0D%EF%9F%19%1D%7B%5E%86%BD%0C%95%A12%AC%5B*%83%96%CAP%19%F62T%86%CAP%19*%83%96%CA%B8Xe%BC%FE)T%19%A1%17xg%7F%DA%CBP%19*%C3%BA%A52T%86%CAP%19%F62T%86%CA%B0n%A9%0CZ%1DV%C6%3D%F3%FCH%DE%B4%B8~%7F%5CZc%F1%D6%1F%AF%84%F9%0F6%E6%EBVt9%0E~%BEr%AF%23%B0%97%A12T%86%CAP%19%B4T%86%CA%B8Re%D8%CBP%19*%C3%BA%A52huX%19%AE%CA%E5%BC%0C%7B%19*CeX%B7h%A9%0C%95%E1%BC%0C%7B%19*CeX%B7T%06%AD%CB%5E%95%2B%BF.%8F%C5%97%D5%E4%7B%EE%82%D6%FB%CF-%9C%FD%B9%CF%3By%7B%19%F62T%86%CA%B0n%D1R%19*%A3%D3%CA%B0%97%A12T%86uKe%D0%EA%B02*%3F1%99%5DB%2B%A4%B5%F8%3A%7C%BA%2B%8Co%7D%5C%EDe%A8%0C%95a%DDR%19%B4T%C66%82fA%B2%ED%DA%9FC%FC%17GZ%06%C9%E1%B3%E5%2C%1A%9FoiB%EB%96%CA%A0%D5qe4%7B%7D%FD%85%F7%5B%ED_%E0s%07%F0k%951%ECr%0D%B5C%D7-g%D1%A8%0C%EB%96%CA%A0%A52T%C6)*%C3%5E%86%CAP%19%D6-%95A%EB*%95q%F8%BB%E3%F9%AB%F6%E21%ACZ%B7%22%B7%9B%3F%02%85%CB%A2%5B%B7%BA%5E%B7%9C%97%E1%BC%0C%EB%16-%95%A12z%AC%0C%BFc%A22T%86uKe%D0%EA%B02V%DD%AD%8A%2B%8CWhe%5E%AF%CF%F5%3B%26%CE%CBh%5C%19%CE%CB%B0%F3%A4%095%A1%CAP%19*Ce%A8%0C%3BO*Ce%A8%0C%95%A12%3A%AD%8C%0A%82%7B%F0v%1F%2FD%A9%5B%9F%EE%EA%26%AF%03%CA%DF9%7B%19*Ce%A8%0C%95%A12T%86%CA%B8Ze%D8%CBP%19*Ce%A8%0C%95%D1ae%EC%F7%89I%E1%B4%D7M%D7P%8BjU%5C%BB%3E%F2%20%D8%CBP%19*Ce%A8%0C%95%A12T%C6%D5*%C3%5E%86%CAP%19*Ce%B4O%07%7B%F0W%7Bw%1C%7C%1A%8C%B3%3B%D1%EE%AA%5C%D6-%EBV%83%80%5E%D0%CA%10%5CU%2BD%E07YU%86%CAP%19*%E3%9A%95%91%D9%A0%C8%AD%5B%EDv%9E%82%FFKOee%E4%8FUe%A8%0C%95%A12T%C6%1F%A9%8C%C8%3D%5B%A5%15%FD%14%22r%E7B%9F%17l%F8%BF%ED%EAf%2B%7F%CF%ECe%D8%CBP%19*Ce%A8%0C%95%E1%93~%7B%19%F62T%86%CAP%19*Ce%A8%0C%E7%13%DA%CBP%19*Ce%A8%0CZf%8B%16-Z%B4h%D1R%19f%8B%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1%A2%A52%CC%16-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2EKe%98-Z%B4h%D1%A2EKe%D02%5B%B4h%D1%A2EKe%D02%5B%B4h%D1%A2E%8B%96%CA0%5B%B4h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%16-%95a%B6h%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-Z*%C3l%D1%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z%B4T%86%D9%A2E%8B%16-Z%B4T%06-%B3E%8B%16-Z%B4T%06-%B3E%8B%16-Z%B4h%A9%0C%B3E%8B%16-Z%B4h%A9%0CZf%8B%16-Z%B4h%A9%0CZf%8B%16-Z%B4h%D1R%19f%8B%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1%A2%A52%CC%16-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2EKe%98-Z%B4h%D1%A2EKe%D02%5B%B4h%D1%A2EKe%D02%5B%B4h%D1%A2E%8B%96%CA0%5B%B4h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%16-%95a%B6h%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-Z*%C3l%D1%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z%B4T%86%D9%A2E%8B%16-Z%B4T%06-%B3E%8B%16-Z%B4T%06-%B3E%8B%16-Z%B4h%A9%0C%B3E%8B%16-Z%B4h%A9%0CZf%8B%16-Z%B4h%A9%0CZf%8B%16-Z%B4h%D1R%19f%8B%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1R%19%B4%CC%16-Z%B4h%D1%A2%A52%CC%16-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2%A52h%99-Z%B4h%D1%A2EKe%98-Z%B4h%D1%A2EKe%D02%5B%B4h%D1%A2EKe%D02%5B%B4h%D1%A2E%8B%96%CA0%5B%B4h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%96%CA%A0e%B6h%D1%A2E%8B%16-%95a%B6h%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-%95A%CBl%D1%A2E%8B%16-Z*%C3l%D1%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z*%83%96%D9%A2E%8B%16-Z%B4T%86%D9%A2E%8B%16-Z%B4T%06-%B3E%8B%16-Z%B4%AE%A4%F5%25%C0%00%DE%BF%5C'%0F%DA%B8q%00%00%00%00IEND%AEB%60%82") repeat-y !important;
    border-left: 1px solid #BBBBBB !important;
    border-right: 1px solid #000000 !important;
    border-bottom: 1px dashed #BBBBBB !important;
}

.overflowRulerX > .firebugRulerV {
    left: 0 !important;
}

.overflowRulerY > .firebugRulerH {
    top: 0 !important;
}
.fa-plus-circle{
cursor:pointer;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
.fbProxyElement {
    position: fixed !important;
    pointer-events: auto !important;
}
</style>

<!--[if lt IE 8]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->



</head>
<body>

<div class="navbar navbar-default navbar-fixed-top header-height" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="http://pakodifactory.in"><img src="images/pf_logonew.jpg" class="logo" alt="" ></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav nav1 navbar-nav navbar-right">
<li><a href="about-us.php">About Us</a></li>
<li><a href="menu.php">Menu</a></li>
<li><a href="franchising.php">Franchising</a></li>
<li><a href="stores.php">Stores</a></li>
<li><a href="application.php">Application</a></li>
<li><a href="contact-us.php">Contact Us</a></li>
<li><div class="social-icons"><a href="https://www.facebook.com/PakodiFactoryOfficialPage" target="_blank"><img src="images/fb-icon.jpg" alt=""></a> <a href="#"><img src="images/tw-icon.jpg" alt=""></a> <a href="#"><img src="images/g-icon.jpg" alt=""></a></div></li>

</ul>
</div>
<!--/.nav-collapse --> 
</div>
</div>

<div class="clearfix"></div>
<div class="container-fluid section-two menu-bg4">
<div class="container icons orderListDiv">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-11 col-xs-0">
<div class="row">
<div class="menu-head3">Vegetarian</div>
<img src="images/veg-img.jpg" alt="" class="img-responsive">
<div class="white-bg">



<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title" >Mix Veg Pakodi</td>
<td width="26%" class="order-txt" id="">Regular</td>
<td width="23%" class="order-txt">Rs.40</td>
<td width="8%" onclick="addFood(this)" ><i class="fa fa-plus-circle add-icon" ></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.75</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>





<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Onion Pakodi</td>
<td width="26%" class="order-txt">Regular</td>
<td width="23%" class="order-txt">Rs.40</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.75</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Crispy Chilly Veg</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.40</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.75</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Paneer Chilly Pakodi</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.80</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.155</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Spicy Potato Balls</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.40 (5 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.75 (10 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Corn & Spinach Balls</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.45 (5 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.85 (10 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
</div>
<div class="menu-head3">Non-Vegetarian</div>
<img src="images/non-veg-img.jpg" alt="" class="img-responsive">
<div class="white-bg">
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Half Egg Bonda</td>
<td width="26%" class="order-txt">Regular</td>
<td width="23%" class="order-txt">Rs.40 (5pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.75 (8pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chicken Pakodi (Bone)</td>
<td width="26%" class="order-txt">Regular</td>
<td width="23%" class="order-txt">Rs.70</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.135</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chicken Pakodi (Boneless)</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.85</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.165</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chicken Tikka Pakodi</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.85 (6 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.165 (12 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Andhra Special Lollipop</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.70 (3 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.135 (6 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Hot & Spicy Lollipop</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.70 (3 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.135 (6 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chilly Garlic Wings</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.65 (4 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.125 (8 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Peri-Peri Wings</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.65 (4 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.125 (8 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Fish Pakodi</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.120</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.235</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Hot & Spicy Fish</td>
<td width="27%" class="order-txt">Regular</td>
<td width="22%" class="order-txt">Rs.120 (6 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Large</td>
<td class="order-txt">Rs.235 (12 pcs)</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
</div>
<div class="menu-head3">Tandoori</div>
<img src="images/tandoori-img.jpg" alt="" class="img-responsive">
<div class="white-bg">
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Tandoori Kebab</td>
<td class="order-txt">Rs.90 (4 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Chicken Tikka</td>
<td class="order-txt">Rs.90 (8 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Tandoori Wings</td>
<td class="order-txt">Rs.95 (6 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Periperi Lollipops</td>
<td class="order-txt">Rs.95 (4 pcs)</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
</div>
<div class="menu-head3">Rice Bowl</div>
<img src="images/rice-img.jpg" alt="" class="img-responsive">
<div class="white-bg">
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Paneer Rice Bowl</td>
<td class="order-txt">Rs.70</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chicken Rice Bowl</td>
<td width="26%" class="order-txt">With Bone</td>
<td width="23%" class="order-txt">Rs.80</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Boneless</td>
<td class="order-txt">Rs.90</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" class="order-title">Fish Rice Bowl</td>
<td class="order-txt">Rs.100</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
</tbody>
</table>
</div>
<div class="menu-head3">Burgers</div>
<img src="images/burger-img.jpg" alt="" class="img-responsive">
<div class="white-bg">
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Veg Burger</td>
<td width="26%" class="order-txt">Burger Only</td>
<td width="23%" class="order-txt">Rs.45</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Burger Combo</td>
<td class="order-txt">Rs.110</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Paneer Burger</td>
<td width="26%" class="order-txt">Burger Only</td>
<td width="23%" class="order-txt">Rs.60</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Burger Combo</td>
<td class="order-txt">Rs.120</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Chicken Burger</td>
<td width="26%" class="order-txt">Burger Only</td>
<td width="23%" class="order-txt">Rs.75</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Burger Combo</td>
<td class="order-txt">Rs.130</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
<table class="table">
<tbody>
<tr>
<td width="43%" rowspan="2" class="order-title">Fish Burger</td>
<td width="26%" class="order-txt">Burger Only</td>
<td width="23%" class="order-txt">Rs.90</td>
<td width="8%" onclick="addFood(this)"><i class="fa fa-plus-circle add-icon"></i></td>
</tr>
<tr>
<td class="order-txt">Burger Combo</td>
<td class="order-txt">Rs.140</td>
<td onclick="addFood(this)"><i class="fa fa-plus-circle add-icon2"></i></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-md-4 hidden-xs hide">
<div class="cart">
<div class="cart__header"> Your order
<div class="cart__header__title">  </div>
</div>
<ul class="list-group">
<li class="list-group-item"><img src="images/delivery-time-icon.jpg" alt=""> Delivery time:1h</li>
<li class="list-group-item"><img src="images/delivery-icon.jpg" alt=""> Delivery fee:Rs.30.00 <p style="font-size:13px !important; text-align:left !important;">(Delivery within 2 to 3 kms radius)</p></li>
<li class="list-group-item"><img src="images/delivery-money-icon.jpg"  alt=""> Delivery min.:Rs.250.00</li>
<li class="list-group-item"><img src="images/delivery-vouchers-icon.jpg" alt=""> Accepts Vouchers</li>
<li class="list-group-item" id="loadImage" style="display:none; margin:-49px 0 0 110px; position:absolute; background:none;"><img src="images/loader.gif" alt=""></li>
</ul>
<div class="line"></div>

<div id="foodItems">


</div>

<div style="display:none;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="left" valign="middle" height="10"></td>
</tr>
<tr>
<td align="left" valign="middle"><span class="count">1</span> <span class="cart-select-title">Onion Pakodi</span></td>
<td align="left" valign="middle">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle">
<div class="btn-group" role="group" aria-label="...">
<button type="button" class="btn btn-default count2">-</button>
<button type="button" class="btn btn-default count2">+</button>
</div>
</td>
<td align="right" valign="middle" class="cart-select-title2">Rs.150.00 </td>
</tr>
<tr>
<td colspan="2" align="left" valign="middle" class="line">&nbsp;</td>
</tr>
</table>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="left" valign="middle" height="10"></td>
</tr>
<tr>
<td align="left" valign="middle"><span class="count">1</span> <span class="cart-select-title">Onion Pakodi</span></td>
<td align="left" valign="middle">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle">
<div class="btn-group" role="group" aria-label="...">
<button type="button" class="btn btn-default count2">-</button>
<button type="button" class="btn btn-default count2">+</button>
</div>
</td>
<td align="right" valign="middle" class="cart-select-title2">Rs.150.00 </td>
</tr>
<tr>
<td colspan="2" align="left" valign="middle" class="line">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle">&nbsp;</td>
<td align="left" valign="middle">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle"><span class="count">1</span> <span class="cart-select-title">Paneer Chilly Pakodi</span></td>
<td align="left" valign="middle">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle">
<div class="btn-group" role="group" aria-label="...">
<button type="button" class="btn btn-default count2">-</button>
<button type="button" class="btn btn-default count2">+</button>
</div>
</td>
<td align="right" valign="middle" class="cart-select-title2">Rs.150.00 </td>
</tr>
<tr>
<td colspan="2" align="left" valign="middle" class="line">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="left" valign="middle">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="middle" class="sub-title">Subtotal</td>
<td align="right" valign="middle" class="sub-price">Rs.320.00</td>
</tr>

<tr>
<td align="left" valign="middle" class="sub-title">Delivery fee</td>
<td align="right" valign="middle" class="sub-price">Rs.30.00 </td>
</tr>
<tr>
<td align="left" valign="middle" class="sub-title2">Total</td>
<td align="right" valign="middle" class="sub-price2">Rs.350.00</td>
</tr>
<tr>
<td colspan="2" align="left" valign="middle">&nbsp;</td>
</tr>
</table>
</div>
<input type="submit" onclick="loadMenuCheckout()" value="Proceed to checkout" class="btn btn-default checkout-btn"/>
</div>
</div>
</div>
</div>

<div class="col-md-12 hide-lg hide-md show-bg">
<div class="row">
<div class="cart-bg">
<div class="col-md-6"><i class="fa fa-shopping-cart cart-icon1"></i></div>
<div class="col-md-6"><i class="fa fa-chevron-right cart-icon2"></i>
</div>
</div>
</div>
</div>

<div class="container icons" id="menuCheckOutDiv" style="display:none;">
<?php 
     include("menu-checkout.php");
?>
</div>

<div class="container icons" id="menuAddressDiv" style="display:none;">
<?php 
     include("menu-address.php");
?>
</div>


</div>
<div class="clearfix"></div>
<div class="container-fluid footer-bottom">
<div class="container">
<div class="row">
<div class="col-md-12 ft-txt">
<div class="col-md-6">
<div  class="pull-left">© 2015 Pakodi Factory. All Rights Reserved</div >
</div>
<div class="col-md-6">
<div  class="pull-right">Designed and Developed by <a href="http://www.geekadverts.com/" target="_blank">GeekAdverts</a></div >
</div>
</div>
</div>
</div>
</div>

<script>
	$('#myCarousel').carousel({
		interval:3000
	});
</script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> commented this js because validate function is not loaded-->
<script src="libs/demo-assets/bootstrap/js/bootstrap.min.js"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="addons/bootstrap/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>

</body>
</html>
