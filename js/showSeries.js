document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("seriesContainer");
  const input = document.getElementById("searchInput");

  const seriesArray = Object.values(seriesData).map(item => JSON.parse(item));

  function afficherSeries(liste) {
      if (!Array.isArray(liste)) {
          console.error("Expected array but got:", liste);
          return;
      }
      
      container.innerHTML = "";
      if (liste.length === 0) {
          container.innerHTML = "<p>No series found.</p>";
          return;
      }
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
      const filtres = seriesArray.filter(s =>
          s.titre.toLowerCase().includes(val)
      );
      afficherSeries(filtres);
  });

  afficherSeries(seriesArray);
});
