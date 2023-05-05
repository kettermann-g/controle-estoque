const page = window.location.pathname;
console.log(page);
const navLinks = document.querySelectorAll('nav ul a').forEach(link => {
  console.log(link.href)
})

const liClasseEnabled = document.querySelectorAll(".link-enabled");

const texto = "olha sooo mouse subiu na classe";
const texto2 = "olha sooo mouse SAIU da classe";

// liClasseEnabled.addEventListener("mouseenter", function() {
//   console.log(texto);
// } )

// liClasseEnabled.addEventListener("mouseleave", function() {
//   console.log(texto2);
// } )

liClasseEnabled.forEach((li) => {
  li.addEventListener("mouseenter", function() {
    console.log(texto);
  });

  li.addEventListener("mouseleave", function() {
    console.log(texto2);
  });
});