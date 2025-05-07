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
