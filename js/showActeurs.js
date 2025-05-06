document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("actorsContainer");
    const input = document.getElementById("searchInput");

    const acteursArray = acteursData;

    function afficherActeurs(liste) {
        if (!Array.isArray(liste)) {
            console.error("Expected array but got:", liste);
            return;
        }

        container.innerHTML = "";
        if (liste.length === 0) {
            container.innerHTML = "<p>Aucun acteur trouvé.</p>";
            return;
        }

        liste.forEach(acteur => {
            const card = document.createElement("div");
            card.className = "acteur-card";
            card.innerHTML = `
                <img src="${acteur.photo}" alt="Photo de ${acteur.nom}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px 10px 0 0;">
                <h3 style="margin: 10px 0; font-size: 1.2rem; color: #222;">${acteur.nom}</h3>
            `;
            card.style.border = "1px solid #ddd";
            card.style.borderRadius = "10px";
            card.style.boxShadow = "0 2px 8px rgba(0,0,0,0.1)";
            card.style.padding = "15px";
            card.style.margin = "10px";
            card.style.textAlign = "center";
            card.style.backgroundColor = "#fff";
            card.style.cursor = "default";
            card.style.display = "inline-block";
            card.style.verticalAlign = "top";
            card.style.width = "200px";
            container.appendChild(card);
        });
    }

    input.addEventListener("input", () => {
        const val = input.value.toLowerCase();
        const filtres = acteursArray.filter(a => a.nom.toLowerCase().includes(val));
        afficherActeurs(filtres);
    });

    afficherActeurs(acteursArray);
});
