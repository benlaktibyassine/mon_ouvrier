
// confirmation delete
let btnDelete = document.querySelectorAll(".btnDelete");
let btnConfirm = document.getElementById("btnConfirm");
let id = 0;
let tableRole = '';

btnDelete.forEach(value => {
    value.addEventListener("click",()=>{
        id = value.children[0].innerHTML;
        tableRole = value.children[1].innerHTML;
    })
});

btnConfirm.addEventListener("click",(e)=>{
    if(tableRole == 'admin'){
        window.location.replace(`http://localhost/project-khadamat/AdminController/deleteAdmin/${id}`);
    }
    else{
        window.location.replace(`http://localhost/project-khadamat/TechController/deleteUser/${id}`);
    }
})