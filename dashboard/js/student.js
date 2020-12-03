// logs out the user

//var form = document.getElementById('update');
var pic = document.getElementById('picForm');
//var prompt = document.getElementById('prompt');
//var close = document.getElementById("close");
var logOut = document.getElementById('logout');
var picture = document.getElementById("picChange");


logOut.addEventListener('click', logout, false);

function logout() {
	location.href = "logout.php";
}

// displays profile pic change 

picture.addEventListener('click', function(){
//alert("ok");
pic.style.display = 'block';
picture.style.display = 'none';
console.log(pic);
}, false);

/** displays update form
prompt.addEventListener('click', show, false);
function show() {
	form.style.display = 'block';
   // pic.style.display = 'block';
	close.style.display = 'inline';
}

// hides the update form
close.addEventListener("click", hide, false);

function hide() {
	form.style.display = 'none';
    //pic.style.display = 'none';
	close.style.display = 'none';
}



$(document).ready(function() {
    // logs student in
$("#submit").click(function(event){
	            event.preventDefault();
	            var first_name = $("#fname").val();
                var last_name = $("#lname").val();
                var user = $("#usr").val();
                var pwd = $("#pwd").val();

           $.post("update_details.php", {
            	first_name : first_name,
            	last_name : last_name,
            	username : user,
            	pwd : pwd

            }, function(data, status){
            	$("#ajax").html(data);
            	console.log(firstName, lastName);
            });
       });***/
/**
// uploads profile pic asynchronously
$("#picture").click(function(event){
  event.preventDefault();
  var file_name = $("#actual_img").val();
  $.post("new_pic.php", {
   file_name : file_name  
  }, function (data, status) {
      $("#result").html(data);
      console.log(file_name, data, status);
  })
})          
});