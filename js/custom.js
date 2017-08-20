/***********************************************
 *  To display the hidden div on newjobs.php. It
 *  displays the #newContact div which allows the
 *  user to add a new contact if they are not in
 *  the system yet.
 ***********************************************/

 // setting up variables to the correct divs
var button = document.getElementById('showContact');
var contact = document.getElementById('newContact');

// on button click, set showContact css display to "block"
button.onclick = function() {
    contact.style.display = "block";
}