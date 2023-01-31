	
	$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "./save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addAdminModal').modal('hide');
						alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var first_name=$(this).attr("data-first-name");
		var last_name=$(this).attr("data-last-name");
		var email=$(this).attr("data-email");
		var password=$(this).attr("data-password");
		$('#id_u').val(id);
		$('#first_name_u').val(first_name);
		$('#last_name_u').val(last_name);
		$('#email_u').val(email);
		$('#password_u').val(password);
	});
	
	$(document).on('click','#update',function(e) {
		var password = $('#password_u').val();
		var encryptedPassword = crypto.subtle.digest("SHA-256", new TextEncoder().encode(password));
		var data = $("#update_form").serialize();
		data = data.replace("password_u=" + password, "password_u=" + encryptedPassword);
		$.ajax({
			data: data,
			type: "post",
			url: "./save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editAdminModal').modal('hide');
						alert('Data updated successfully !'); 
						location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "./save.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteAdminModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Please select records."); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "./save.php",
					cache:false,
					data:{
						type: 4,						
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {	
							$("#"+ids[i]).remove(); 
						}	
					} 
				}); 
			}  
		} 
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});
