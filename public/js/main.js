/////////////////up to top


const up = document.querySelector(".up-top");

window.addEventListener("scroll",()=>{
    if(window.scrollY >200){
        up.classList.add("show-up-top");
    }
    else{
        up.classList.remove("show-up-top"); 
    }
})

up.addEventListener("click",()=>{
    document.documentElement.scrollTop=0;
})



// function for search in technicien

const btnCat = document.querySelectorAll(".btn-cat");
const btnCity = document.querySelectorAll(".btn-city");

let idCat = 0;
let city = "";

btnCat.forEach(btn => {
    btn.addEventListener("click",()=>{
        idCat = btn.children[0].innerHTML;
    })
});

btnCity.forEach(btn => {
    btn.addEventListener("click",()=>{
        city = btn.innerHTML;
        window.location.replace(`http://localhost/project-khadamat/TechController/searchTech?job=${idCat}&city=${city}&search=`);
    })
});




// feedback

const feedback = document.querySelectorAll(".start-feedback");
const btnAdd = document.querySelector(".btn-feedback");
const btnFeedback = document.querySelectorAll(".btn-feed");

let starts = 0;
let idTech = 0;


btnFeedback.forEach(btn => {
    btn.addEventListener("click",()=>{
        idTech = btn.children[0].innerHTML;
    })
});

feedback.forEach(start => {
    start.addEventListener("click",()=>{
        console.log();
        if(start.classList.contains("text-yellow")){
            start.classList.remove("text-yellow");
            starts--;
        }
        else{
            start.classList.add("text-yellow");
            starts++;
        }
    })
});


btnAdd.addEventListener("click",()=>{
    window.location.replace(`http://localhost/project-khadamat/TechController/addFeedback/${idTech}?starts=${starts}`);
})