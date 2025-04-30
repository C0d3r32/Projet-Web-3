

const image = new Image();
image.src = "images.jpeg";
image.onload = function() {
document.body.appendChild(image);
};

document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("seriesContainer");
  const input = document.getElementById("searchInput");

  function afficherSeries(liste) {
      container.innerHTML = "";
      liste.forEach(serie => {
        const div = document.createElement("div");
        div.className = "serie-card";
        div.innerHTML = `
          <h2>${serie.titre}</h2>
          <p><strong>Tags:</strong> ${serie.tags.join(", ")}</p>
          <p><strong>Saisons:</strong> ${serie.saisons}</p>
        `;
        container.appendChild(div);
      });
    }
  
  input.addEventListener("input", () => {
      const val = input.value.toLowerCase();
      const filtres = seriesData.filter(s =>
        s.titre.toLowerCase().includes(val)
      );
      afficherSeries(filtres);
    });
  
    afficherSeries(seriesData);
  });

/*
document.addEventListener("DOMContentLoaded", function() {
  const searchButton = document.querySelector("form button");
  searchButton.addEventListener("click", function(event) {
      event.preventDefault();
      alert("Vous avez lancé une recherche !");
  });
});
*/