document.getElementById("menu-toggle").addEventListener("click", function() {
    var menuItems = document.querySelector(".menu-items");
    menuItems.style.display = menuItems.style.display === "block" ? "none" : "block";
});
let flag = true ;
let det = document.getElementById("dis");

function displayChg(){
    if(flag) {
        det.style.display = "block";
        flag = false ;
    }
    else {
        det.style.display = "none";
        flag = true;
    }
}

// let but = document.querySelector("section button");
// let change = document.querySelector(".changeDetails");
//
// // console.log("shady");
//
// but.onclick = function(event) {
//     // console.log(event.target);
//     change.classList.toggle("show");
// }

function newpage() {
    alert("Go to bookdetails!");
}

// Favorite


let favorite = true ;
let toggleFav = document.querySelectorAll("#fav")
function fav(e) {
    let ClkEl = e.target ;
    if(favorite) {
        ClkEl.style.color = "red";
        ClkEl.classList.add("fa-solid");
        favorite = false;
    }
    else {
        ClkEl.style.color = "black";
        ClkEl.classList.remove("fa-solid");
        favorite = true;
    }
}

toggleFav.forEach(el => {
    el.addEventListener("click" , fav)
});
