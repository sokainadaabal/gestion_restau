const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container=document.querySelector(".container");


sign_up_btn.addEventListener("click",()=>{
container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click",()=>{
    container.classList.remove("sign-up-mode");
    });
$(document).ready(function () {
        $(".hamburger .hamburger__inner").click(function () {
          $(".wrapper").toggleClass("active");
        });
        $(".top_navbar .dropdown-toggle").click(function () {
          $(".profile_dd").toggleClass("active");
        });
      });
