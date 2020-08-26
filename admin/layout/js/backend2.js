
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
