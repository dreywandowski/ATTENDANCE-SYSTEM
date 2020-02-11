
		// this is used to load files from the server using AJAX
		$(document).ready(function() {
			/**$("#aj").click(function(){
				$.get("ajax.txt", function(data,status){
					$("#ajax").html(data);
					alert(status);

				}) 
			});
**/
		// user validation through AJAX
				$("#login").submit(function (event) {
				event.preventDefault();
				var login = $("#user").val();
				var password = $("#passd").val();
				var role = $('input[name=staff]:checked').val();

				$.post("validate_login.php", {
                    username : login,
					password : password,
					staff : role
				},  function(data,status){
					$("#ajax").html(data);
					console.log(login, password, (role));
			});
			});
/**				
// live validation while user is registering
		$("#username").blur(function(event){
            var user = $(this).val();
            console.log(username);
           $.get("redirect.php", {
            	username : username
            }, function(data, status){
            	$("#usercheck").html(data);
            	console.log(username);
       });    
	});**/
	});
