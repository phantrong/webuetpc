var rs = document.querySelectorAll('.icon--icon');
var rs2 = [true, true, true];
var j;
console.log(rs[0].parentElement.nextElementSibling);
for(var i=0; i< rs.length; ++i) {
 
  rs[i].onclick = function(e) {
    if(e.target == rs[0]) j=0;
    else if(e.target == rs[1]) j=1;
    else j=2;
    // console.log(e.target)
    if(rs2[j] == true ) {
      e.target.parentElement.nextElementSibling.style.display = "block";
      rs2[j] = false;
    } 
    else {
      e.target.parentElement.nextElementSibling.style.display = "none";
      rs2[j] = true;
    }
  }
}

var productsLink = document.querySelectorAll('.category-item__link')

productsLink[1].onclick = function(e) {
  window.location="shop.php?action=2";
  e.target.style.color = "red";
   e.target.parentElement.parentElement.display = "block";
}