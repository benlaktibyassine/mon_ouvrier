
// confirmation delete
console.log("sabir");
const btnDelete = document.querySelector(".btnDelete");
const btnConfirm = document.getElementById("btnConfirm");
let id = 0;

btnDelete.addEventListener("click",()=>{
    id = btnDelete.children[0].innerHTML;
})

btnConfirm.addEventListener("click",(e)=>{
    window.location.replace(`http://localhost/project-khadamat/TechController/deleteUser/${id}`);
})