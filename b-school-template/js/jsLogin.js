// document.querySelector("#show-login").addEventListener("click",function(){
//     document.querySelector(".popup").classList.add("active");
// });

// document.querySelector(".popup .close-btn").addEventListener("click",function(){
//     document.querySelector(".popup").classList.add("active");
// });

let bopen = document.querySelector("#open");
let bclose = document.querySelector("#close");


function afficher() {
  document.querySelector("#con").style.display = "block";
}

function masquer() {
  document.querySelector("#con").style.display = "none";
}

bopen.addEventListener("click", afficher);
bclose.addEventListener("click", masquer);
