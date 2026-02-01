const links = document.querySelectorAll(".sidebar .nav-link");
const paginaAtual = window.location.pathname.split("/").pop();

links.forEach((link) => {
  const href = link.getAttribute("href");

  if (href === paginaAtual) {
    link.classList.add("active");
  } else {
    link.classList.remove("active");
  }
});

console.log('teste')