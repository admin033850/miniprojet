
$(".btn-signup").on("click", function(){
	$(".mask").addClass("active2");
});


function closeModal2(){
	$(".mask").removeClass("active2");
};


$(".close, .mask").on("click", function(){
	closeModal2();
});
$(document).keyup(function(e) {
	if (e.keyCode == 27) {
		closeModal2();
	}
});





$(".btn-login").on("click", function(){
	$(".mask2").addClass("active3");
});


function closeModal(){
	$(".mask2").removeClass("active3");
};


$(".close, .mask2").on("click", function(){
	closeModal();
});

$(document).keyup(function(e) {
	if (e.keyCode == 27) {
		closeModal();
	}
});



		 $(document).ready(function(){
		     $('#division').on('change',function(){
		         var divID = $(this).val();
		         if(divID){
		             $.ajax({
		                 type:'POST',
		                 url:'ajaxData.php',
		                 data:'Div_id='+divID,
		                 success:function(html){
		                     $('#module').html(html);
		                 }
		             });
		         }else{
		             $('#module').html('<option value="">Select country first</option>');
		         }
		     });

		 });


 $(document).ready(function(){
	 $('.menu-toggle').click(function() {
	 	$('.sidebar').toggleClass('active')
	});
 });
 window.onscroll = function() {myFunction()};

 var navbar = document.getElementById("sticky-top");
 var sticky = navbar.offsetTop;

 function myFunction() {
   if (window.pageYOffset >= sticky) {
     navbar.classList.add("sticky");
   } else {
     navbar.classList.remove("sticky");
   }
 };
