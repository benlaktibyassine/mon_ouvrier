const toggle = document.getElementById("header-toggle")
const nav = document.getElementById("nav-bar")
const bodypd = document.getElementById("body-pd")
const headerpd = document.getElementById("header")

// Validate that all variables exist
toggle.addEventListener('click', ()=>{
    // show navbar
    console.log("sabir");
    nav.classList.toggle('showSideBar')
    // // change icon
    toggle.classList.toggle('bx-x')
    // // add padding to body
    bodypd.classList.toggle('body-pd')
    // // add padding to header
    headerpd.classList.toggle('body-pd')
})