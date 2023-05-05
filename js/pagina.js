const page = window.location.pathname;
console.log(page);
const navLinks = document.querySelectorAll('.nav-link').forEach(link => {
  if(link.href.includes(`${page}`)) {
    link.firstElementChild.classList.add('link-disabled');
    link.firstElementChild.classList.remove('link-enabled');
  }
})