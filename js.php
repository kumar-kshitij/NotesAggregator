<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- jQuery -->
<script src="jquery-3.2.1.min.js"></script>

<!-- jQuery UI -->
<script src="jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
    	
    	$('[data-toggle="tooltip"]').tooltip(); 
	
	});
	
	$(document).ready(function(){
		
		$(".btn-delete").on("click", function(){
			var selected = $(this).attr("id");
			var doc_id = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure you want to delete this document?");
			
			if(confirmed==true){
				$.get("index.php?page=1&id="+doc_id);
			}
		});

		$(".btn-like").on("click", function(){
			var selected = $(this).attr("id");
			var doc_id = selected.split("like_").join("");
			
			$.get("index.php?page=2&id="+doc_id);
		});

	});
	
	function checkID() {
		jQuery.ajax({
		url: "check_availability.php",
		data:'id='+$("#id").val(),
		type: "POST",
		success:function(data){
			//$("#user-availability-status").html(data);
			
		},
		error:function (){}
		});
	}

	function checkPassword() {
		if($("#pwd").val()==$("#re-pwd").val()){
			
		}
	}

	function checkEmail() {
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
			//$("#email-availability-status").html(data);
			
		},
		error:function (){}
		});
	}

</script>