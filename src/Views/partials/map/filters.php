<aside class="map-filters">
    <div>
        <h2 class="map-filters-title">Filtrai</h2>
        <p id="activeFiltersMeta" class="map-filters-meta">0 filtrų taikoma</p>
        <div id="activeChips" class="map-filters-chips"></div>
        <button
            id="clearAllBtn"
            type="button"
            class="map-filters-clear"
        >
            Išvalyti viską
        </button>
    </div>

    <div class="map-filters-section">
        <h3 class="map-filters-subtitle">Kategorija</h3>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="category"
                value="business"
                class="map-filters-checkbox"
            />
            Verslas
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="category"
                value="food"
                class="map-filters-checkbox"
            />
            Maistas ir gėrimai
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="category"
                value="health"
                class="map-filters-checkbox"
            />
            Sveikata
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="category"
                value="music"
                class="map-filters-checkbox"
            />
            Muzika
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="category"
                value="art"
                class="map-filters-checkbox"
            />
            Menas
        </label>
        <button class="map-filters-more">
            Rodyti daugiau
        </button>
    </div>

    <div class="map-filters-section">
        <h3 class="map-filters-subtitle">Data</h3>
        <label class="map-filters-label">
            <input
                type="radio"
                name="dateRange"
                value="today"
                class="map-filters-radio"
            />
            Šiandien
        </label>
        <label class="map-filters-label">
            <input
                type="radio"
                name="dateRange"
                value="tomorrow"
                class="map-filters-radio"
            />
            Rytoj
        </label>
        <label class="map-filters-label">
            <input
                type="radio"
                name="dateRange"
                value="weekend"
                class="map-filters-radio"
                checked
            />
            Šį savaitgalį
        </label>
        <label class="map-filters-label">
            <input
                type="radio"
                name="dateRange"
                value="custom"
                class="map-filters-radio"
            />
            Pasirinkti datą...
        </label>
    </div>

    <div class="map-filters-section">
        <h3 class="map-filters-subtitle">Rajonas</h3>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="district"
                value="Senamiestis"
                class="map-filters-checkbox"
            />
            Senamiestis
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="district"
                value="Šnipiškės"
                class="map-filters-checkbox"
            />
            Šnipiškės
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="district"
                value="Naujamiestis"
                class="map-filters-checkbox"
            />
            Naujamiestis
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="district"
                value="Užupis"
                class="map-filters-checkbox"
            />
            Užupis
        </label>
    </div>

    <div class="map-filters-section">
        <h3 class="map-filters-subtitle">Kaina</h3>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="price"
                value="free"
                class="map-filters-checkbox"
            />
            Nemokami
        </label>
        <label class="map-filters-label">
            <input
                type="checkbox"
                name="price"
                value="paid"
                class="map-filters-checkbox"
            />
            Mokami
        </label>
    </div>
</aside>
