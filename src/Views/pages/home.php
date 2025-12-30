<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Atrask renginius viskam, ką mėgsti</h1>
        <p>Rask ir dalyvauk renginiuose, bendrauk su organizatoriais arba sukurk savo renginį</p>

        <div class="search-box">
            <input
                type="text"
                class="search-input"
                placeholder="Ieškoti renginių"
                id="searchInput"
            >
            <input
                type="text"
                class="search-input"
                placeholder="Vieta"
                id="locationInput"
            >
            <button class="btn btn-primary" type="button" onclick="searchEvents()">
                Ieškoti
            </button>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="categories" aria-label="Renginių kategorijos">
    <div class="categories-content">
        <div class="category" role="button" tabindex="0" onclick="filterByCategory('music')">
            <span class="category-icon">🎵</span>
            <span class="category-label">Muzika</span>
        </div>

        <div class="category" role="button" tabindex="0" onclick="filterByCategory('arts')">
            <span class="category-icon">🎨</span>
            <span class="category-label">Menas</span>
        </div>

        <div class="category" role="button" tabindex="0" onclick="filterByCategory('charity')">
            <span class="category-icon">❤️</span>
            <span class="category-label">Labdara</span>
        </div>

        <div class="category" role="button" tabindex="0" onclick="filterByCategory('business')">
            <span class="category-icon">💼</span>
            <span class="category-label">Verslas</span>
        </div>

        <div class="category" role="button" tabindex="0" onclick="filterByCategory('education')">
            <span class="category-icon">📚</span>
            <span class="category-label">Švietimas</span>
        </div>

        <div class="category" role="button" tabindex="0" onclick="filterByCategory('food')">
            <span class="category-icon">🍽️</span>
            <span class="category-label">Maistas ir gėrimai</span>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="events-section" id="events">
    <div class="section-header">
        <div>
            <h2>Renginiai tavo mieste</h2>
            <p>Atrask įdomiausius įvykius šalia tavęs</p>
        </div>

        <!-- optional button; wire later -->
        <a class="btn btn-outline" href="/events">Peržiūrėti visus</a>
    </div>

    <div class="events-grid" id="eventsGrid">
        <div class="loading">Įkeliami renginiai...</div>
    </div>
</section>

<!-- Create anchor target (so /#create works from header) -->
<section class="events-section" id="create">
    <div class="section-header">
        <div>
            <h2>Sukurti renginį</h2>
            <p>Pateik savo renginį ir pasiek daugiau žmonių</p>
        </div>

        <a class="btn btn-primary" href="/create">Sukurti renginį</a>
    </div>

    <div class="loading">
        Ši dalis gali būti atskirame puslapyje (/create). Čia palikta kaip „anchor“ ir CTA.
    </div>
</section>

<!-- Help anchor target (so /#help works) -->
<section class="events-section" id="help">
    <div class="section-header">
        <div>
            <h2>Pagalba</h2>
            <p>Dažniausi klausimai ir kontaktai</p>
        </div>
    </div>

    <div class="loading">
        Parašyk mums: <strong>support@cityevents.lt</strong> (vėliau pakeisi į realų).
    </div>
</section>
