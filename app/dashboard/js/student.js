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
console.log(pic);
}, false);

