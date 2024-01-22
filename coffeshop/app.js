
function displaycart(){
   let j = 0;
   document.getElementById("count").innerHTML=cart.length;
   j++
 return("<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>");
}
