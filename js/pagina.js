const page = window.location.pathname;
const home = document.getElementById("home");
const login = document.getElementById("login");
const itens = document.querySelectorAll(".div-condicional");
console.log(page);
if(page != "/controle-estoque/") {
  var navLinks = document.querySelectorAll('.nav-link').forEach(link => {
    if(link.href.includes(`${page}`)) {
      console.log(link.href);
      link.firstElementChild.classList.remove('link-enabled');
      link.firstElementChild.classList.add('link-disabled');
    }
  })
} else if (page == "/controle-estoque/" && itens.length === 2) {
  home.classList.add('link-disabled');
  home.classList.remove('link-enabled');
}

const container = document.querySelector("#ul-header");


console.log(itens.length);

if(itens.length === 1) {
  container.style.justifyContent = "flex-start";
  login.classList.remove("link-disabled");
  login.classList.add("link-enabled");
}