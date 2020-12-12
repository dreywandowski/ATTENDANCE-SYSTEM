// make side nav pop up in mobile view
let modal = document.getElementById("myMenu");
let btn = document.getElementById("myBtn");
btn.onclick = function() { modal.style.display = "block"; }
window.onclick = function(e) {
  if (e.target == modal) { modal.style.display = "none"; }
}


// validate the password on the register page
/* function validation() {
    let password1 = document.getElementById('pwd-i');
    let password2 = document.getElementById('pwd-ii');

    if(password1.value.trim() !== password2.value.trim()) {
        alert('The entered passwords do not match');
        return false;
    } else {
        return true;
    }
}
*/

/*
function menuFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
*/

/*
// Sticky navbar //
window.onscroll = function() { stickyHeader() };
let topContent = document.getElementById('header-content');
let sticky = topContent.offsetTop;

function stickyHeader() {
    if (window.pageYOffset >= sticky) {
        topContent.classList.add("sticky")
    } else {
        topContent.classList.remove("sticky");
    }
}
*/