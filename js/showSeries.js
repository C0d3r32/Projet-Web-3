function createTagButtons() {
    const tagSidebar = document.getElementById('tagSidebar');
    if (!tagSidebar || !tagsList) return;

    tagsList.forEach(tag => {
        const button = document.createElement('button');
        button.textContent = tag;
        button.addEventListener('click', () => {
            button.classList.toggle('selected');
            filterSeriesByTags();
        });
        tagSidebar.appendChild(button);
    });
}

function filterSeriesByTags() {
    const selectedTags = Array.from(document.querySelectorAll('#tagSidebar button.selected')).map(button => button.textContent);
    const filteredSeries = seriesArray.filter(serie => {
        const serieTags = serie.tags || [];
        if (selectedTags.length === 0) return true;
        return selectedTags.some(selectedTag =>
            serieTags.some(serieTag => serieTag.toLowerCase() === selectedTag.toLowerCase())
        );
    });
    
    afficherSeries(filteredSeries);
}

function afficherSeries(liste) {
    const container = document.getElementById("seriesContainer");
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
            ${isAdmin ? `<a href="editserie.php?id=${serie.id}" class="edit-button">Edit</a>` : ''}
        `;

        div.addEventListener("click", () => {
            window.location.href = `serie.php?titre=${encodeURIComponent(serie.titre)}`;
        });

        container.appendChild(div);
    });
}


document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("seriesContainer");
    const input = document.getElementById("searchInput");

    seriesArray = Object.values(seriesData).map(item => JSON.parse(item));

    createTagButtons();

    input.addEventListener("input", () => {
        const val = input.value.toLowerCase();
        const searchedSeries = seriesArray.filter(s =>
            s.titre.toLowerCase().includes(val)
        );

        const selectedTags = Array.from(document.querySelectorAll('#tagSidebar button.selected')).map(btn => btn.textContent);

        const finalFiltered = selectedTags.length === 0 ? searchedSeries : searchedSeries.filter(serie => {
            const serieTags = serie.tags || [];
            return selectedTags.some(selectedTag =>
                serieTags.some(serieTag => serieTag.toLowerCase() === selectedTag.toLowerCase())
            );
        });

        afficherSeries(finalFiltered);
    });

    afficherSeries(seriesArray);
});
