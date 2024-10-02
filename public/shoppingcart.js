$(document).ready(function(){

	cartNoti();
	showTable();
$('.searchbtn').on('click',function(){
    var searchItem=$('#searchvalue').val();
    console.log(searchItem);

    $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
       });

       $.post('search',{item:searchItem},function(response){
         console.log(response);
        var data=response;
        console.log(data);
        var datasearch='';
        $.each(data,function(i,v){
          var id=v.id;
          var name=v.name;
          var photo=JSON.parse(v.photo);
          pho=baseurl+'/'+photo[0];
          console.log(baseurl);
     //      photo = "'<?php echo asset('"+photo[0]+"')?>";

          var unitiprice= v.price;
          var discount = v.discount;
          var price='';

          if(discount)
          {
            price=discount;
          }
          else
          {
            price=price;
          }
          datasearch+='<div class="product__item__pic set-bg" data-setbg='+pho+' style="background-image:url('+pho+')" >';
          datasearch+=  `          
                               
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                        
                                        <li><a href="javascript:void(0)" class="addtocartBtn" data-id="{{$id}}" data-name="{{$name}}" data-codeno="{{$codeno}}" data-unitiprice="{{$price}}" data-discount="{{$discount}}" data-photo="{{$photo}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>




          <div class="product__discount__item__text">
                                    <h5><a href="#">${name}</a></h5>

                                    <div class="product__item__price">
                                    
                                      ${price}
                                        
                                    

                                        
                                    </div>
                                </div>`;
                              //  $(".go").css("background-image", "url(" + pho + ")");
        });
        $('#searchMenu_Mine').html(datasearch);

       })
       // location.href="searchitem";
        
       
})


$('.addtocartBtn').on('click',function(){


	var id= $(this).data('id');
	var name= $(this).data('name');
	var codeno=$(this).data('codeno');
	var photo=$(this).data('photo');
	var price=$(this).data('unitiprice');
	var discount =$(this).data('discount');
	var qty=1;

	var mycart= {id:id,codeno:codeno,name:name,photo:photo,price:price,discount:discount,qty:qty};
	console.log(mycart);

var cart=localStorage.getItem('cart');

	var cartArray;

	if(cart==null)
	{
		cartArray = Array();
	}
	else
	{
       cartArray = JSON.parse(cart);
	}
     
       var status= false;

       $.each(cartArray ,function(i,v)
       {
       		if(id==v.id)
       		{
       			v.qty++;
       			status=true;
       		}
       })

       if(!status)
       {
       	cartArray.push(mycart);

       }
       var cartData= JSON.stringify(cartArray);
       localStorage.setItem("cart",cartData);

       cartNoti();
	// if(!cart)
	// {
 //        var cart = '{"mycart":[]}';
	// }

 //      cart = JSON.parse(cart);
 //      var mycart= cart.mycart;
 //      var length = mycart.length;

 //      //increase qty when
 //      //localStorage-id new-id same

 //      for (var i=0; i<length ; i++) 
 //      {
 //          if(id == mycart[i].id) 
 //          {
 //          	mycart[i].qty +=1;
 //          	var exit=1;
 //          }
 //      }

	console.log("ID:"+id+
		        "Name:"+name+
		        "Codeno:"+codeno+
		        "Photo:"+photo+
		        "Price:"+price+
		        "Discount:"+discount);
});

// plus
    $('#shoppingcart_table').on('click','.inc',function ()
{   
       
       var id=$(this).data('id');
      // alert(id);
       var itemString=localStorage.getItem("cart");
       var itemArray=JSON.parse(itemString);
       $.each(itemArray,function (i,v) {
              if (i==id)
               {
                     v.qty++;
               }
       })
      cart=JSON.stringify(itemArray);
       localStorage.setItem("cart",cart);
       showTable();
       cartNoti();
       });

    //minus
$('#shoppingcart_table').on('click','.des',function ()
{
       var id=$(this).data('id');
       var itemString=localStorage.getItem("cart");
       var itemArray=JSON.parse(itemString);
       $.each(itemArray,function (i,v) {
              if (i==id)
               {
                     v.qty--;
                     if (v.qty==0) 
                     {
                        itemArray.splice(id,1);
                     }
               }
       })
       cart=JSON.stringify(itemArray);
       localStorage.setItem("cart",cart);
       showTable();
       cartNoti();
       });

//remove
$('#shoppingcart_table').on('click','.icon_close',function ()
{ 
     
       var id=$(this).data('id');
       var itemString=localStorage.getItem("cart");
       var itemArray=JSON.parse(itemString);
       $.each(itemArray,function (i,v) {
              if (i==id)
               {
                      
                     
                        itemArray.splice(id,1);
                     
               }
       })
       cart=JSON.stringify(itemArray);
       localStorage.setItem("cart",cart);
       showTable();
       cartNoti();
       });

//checkout 

$('.checkoutbtn').on('click' ,function(){

       var cart= localStorage.getItem('cart');
       var cartArray=JSON.parse(cart);
       var note = $('#note').val();
       $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
       });

       $.post('/order',{data:cart,note:note},function(response){

        localStorage.clear();
        location.href="ordersuccess";

       });
       //alert('hello');

       // $.post('storeorder.php',{
       //        cart:cartArray,
       //        note:note
       // },function(response){
       //        localStorage.clear();
       //        location.href="ordersuccess.php";
       // })

       console.log(note);
       console.log(cart);
})




       function cartNoti()
       {
       		var cart = localStorage.getItem('cart');
       		var total=0;
       		var noti=0;
       		if (cart)
       		 {
       		 	var cartArray = JSON.parse(cart);

       		 	$.each(cartArray,function(i,v){

       		 		var unitprice=v.price;
       		 		var discount=v.discount;
       		 		var qty= v.qty;
       		 		if(discount){
       		 			var price = discount;
       		 		}
       		 		else{
       		 			var price= unitprice;
       		 		}
       		 		var subtotal = price * qty;

       		 		noti += qty++;
       		 		total += subtotal ++;
       		 	})

       		 	$('.shoppingcartNoti').html(noti);
       		 	$('.shoppingcartTotal').html(total+'Ks');

       		 }
       		 else
       		 {
       		 	$('.shoppingcartNoti').html(0);
       		 	$('.shoppingcartTotal').html(0+'Ks');
       		 }
       }


       function showTable(){
       	var cart = localStorage.getItem('cart');

       	if(cart)
       	{
       		$('.shoppingcart_div').show();
       		$('.noneshoppingcart_div').hide();

       		var cartArray = JSON.parse(cart);
       		var shoppingcartData='';

       		if(cartArray.length >0 )
       		{
       			var total=0;

       			$.each(cartArray, function(i,v){
       				var id= v.id;
       				var codeno = v.codeno;
       				var name= v.name;
       				var unitprice= v.price;
       				var discount= v.discount;
       				var photo= v.photo;
       				var qty=v.qty;

       				if(discount)
       				{
       					var price=discount;
       				}
       				else
       				{
       					var price = unitprice;
       				}
       				var subtotal= price * qty;

       				 shoppingcartData += `<tr >
       				 			<td class="shoping__cart__item">
                                        <img src="${photo}" class="cartImg" width="200px">
                                        <h5>${name}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${price}
                                    </td>

                                    
                                    

       				 							<td>`;

       				 					if(discount>0)
       				 					{
       				 						shoppingcartData += `<td class="shoping__cart__price">
                                        <p class="text-danger"> ${discount} </p>
       				 						<p class="font-weight-lighter">
       				 						<del> ${unitprice} </del>
       				 						</p>
                                    </td>
       				 						`;

       				 					 }
       				 					 else
       				 					   {
       				 				shoppingcartData +=`<td class="shoping__cart__price">
       				 				<p class="text-danger">
       				 									${unitprice} Ks
       				 									</p>
       				 									</td>

       				 				                    `;
       				 					     }



       				 		  shoppingcartData+=`</td>
       				 		  	             <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                            <button class="btn des qtybtn" data-id="${i}"> <span >-</span></button>
                                                <input type="text" value="${qty}">
                                               <button class="btn inc qtybtn " data-id="${i}"> <span >+</span> </button>

                                            </div>
                                        </div>
                                    </td>
       				 							<td class="shoping__cart__total">
       				 							  <p> ${subtotal} </p>
       				 							</td>

       				 							<td class="shoping__cart__item__close">
                                        <span class="icon_close" data-id="${i}"></span>
                                    </td>



       				                     </tr>`;
       				    total+=subtotal++;
       			});
       			$('#shoppingcart_table').html(shoppingcartData);
       		}
       		else
       		{

       		$('.shoppingcart_div').hide();
       		$('.noneshoppingcart_div').show();
       		}

       	}
       	else
       	{
       		$('.shoppingcart_div').hide();
       		$('.noneshoppingcart_div').show();
       	}
       }





});