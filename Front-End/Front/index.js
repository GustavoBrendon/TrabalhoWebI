import { checkSeLogadoNaApiEMontaLink } from "./autenticacao/check.js";

window.addEventListener("pageshow", () => {
  checkSeLogadoNaApiEMontaLink(document.querySelector("#link_login"));
});

window.revelar = ScrollReveal({ reset: true });

revelar.reveal(".section-main", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "top",
});

revelar.reveal(".ava_cli1", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "left",
});

revelar.reveal(".ava_cli2", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "bottom",
});

revelar.reveal(".ava_cli3", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "right",
});

revelar.reveal(".div1", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "left",
});

revelar.reveal(".div2", {
  duration: 2000,
  distance: "90px",
  delay: 500,
  origin: "right",
});
