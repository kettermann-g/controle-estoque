const page = window.location.pathname;
console.log(page);
const navLinks = document.querySelectorAll('.nav-link').forEach(link => {
  if(link.href.includes(`${page}`)) {
    link.firstElementChild.classList.add('link-disabled');
    link.firstElementChild.classList.remove('link-enabled');
  }
})

const container = document.querySelector("#ul-header");
const itens = document.querySelectorAll(".div-condicional");

console.log(itens.length);

if(itens.length === 1) {
  container.style.justifyContent = "flex-end";
} else {
  container.style.justifyContent = "space-between";
}