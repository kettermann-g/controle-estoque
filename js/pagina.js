const page = window.location.pathname;
const home = document.getElementById("home");
console.log(page);
if(page != "/controle-estoque/") {
  var navLinks = document.querySelectorAll('.nav-link').forEach(link => {
    if(link.href.includes(`${page}`)) {
      console.log(link.href);
      link.firstElementChild.classList.remove('link-enabled');
      link.firstElementChild.classList.add('link-disabled');
    }
  })
}

const container = document.querySelector("#ul-header");
const itens = document.querySelectorAll(".div-condicional");

console.log(itens.length);

if(itens.length === 1) {
  container.style.justifyContent = "flex-end";
} else {
  container.style.justifyContent = "space-between";
}