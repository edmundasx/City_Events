(() => {
  let activeCategory = "";

  function normalize(value) {
    return String(value || "")
      .trim()
      .toLowerCase();
  }

  function getHomeCards() {
    return Array.from(document.querySelectorAll("#eventsGrid [data-event-card='1']"));
  }

  function getQueryState() {
    const searchInput = document.getElementById("searchInput");
    const locationInput = document.getElementById("locationInput");

    return {
      search: normalize(searchInput?.value),
      location: normalize(locationInput?.value),
      category: normalize(activeCategory),
    };
  }

  function cardMatches(card, query) {
    const title = normalize(card.dataset.title);
    const location = normalize(card.dataset.location);
    const category = normalize(card.dataset.category);

    const titleMatch = !query.search || title.includes(query.search);
    const locationMatch = !query.location || location.includes(query.location);
    const categoryMatch = !query.category || category === query.category;

    return titleMatch && locationMatch && categoryMatch;
  }

  function applyHomeFilters() {
    const cards = getHomeCards();
    if (!cards.length) return;

    const query = getQueryState();
    const matchingIds = new Set();

    let visibleCount = 0;
    for (const card of cards) {
      const isMatch = cardMatches(card, query);
      card.hidden = !isMatch;
      if (isMatch) {
        matchingIds.add(String(card.dataset.eventId || ""));
        visibleCount += 1;
      }
    }

    const empty = document.querySelector("#eventsGrid .events-empty");
    if (empty) {
      empty.hidden = visibleCount !== 0;
    }

    if (window.__CE_HOME_MAP__) {
      window.__CE_HOME_MAP__.syncMarkers(matchingIds);
    }
  }

  function searchEvents() {
    applyHomeFilters();
  }

  function filterByCategory(category) {
    activeCategory = activeCategory === category ? "" : category;
    applyHomeFilters();
  }

  function escapeHtml(s) {
    return String(s)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }

  function initHomeHeroMap() {
    const mapEl = document.getElementById("homeHeroMap");
    if (!mapEl || typeof L === "undefined") return;

    let events = [];
    try {
      events = JSON.parse(mapEl.dataset.events || "[]");
    } catch {
      events = [];
    }

    const map = L.map(mapEl, { zoomControl: false, scrollWheelZoom: true }).setView(
      [54.6872, 25.2797],
      11,
    );

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    const markerById = new Map();
    const markers = [];

    for (const ev of events) {
      if (typeof ev.lat !== "number" || typeof ev.lng !== "number") continue;

      const marker = L.marker([ev.lat, ev.lng]).addTo(map);
      marker.bindPopup(
        `<b>${escapeHtml(String(ev.title || ""))}</b><br>${escapeHtml(String(ev.location || ""))}`,
      );

      markerById.set(String(ev.id), marker);
      markers.push(marker);
    }

    if (markers.length) {
      const group = L.featureGroup(markers);
      map.fitBounds(group.getBounds().pad(0.25));
    }

    const syncMarkers = (matchingIds) => {
      markerById.forEach((marker, id) => {
        if (matchingIds.has(id)) {
          if (!map.hasLayer(marker)) marker.addTo(map);
        } else if (map.hasLayer(marker)) {
          map.removeLayer(marker);
        }
      });
    };

    window.__CE_HOME_MAP__ = { map, syncMarkers };
  }

  function initHomeSearchBindings() {
    const searchInput = document.getElementById("searchInput");
    const locationInput = document.getElementById("locationInput");
    if (!searchInput || !locationInput) return;

    searchInput.addEventListener("input", applyHomeFilters);
    locationInput.addEventListener("input", applyHomeFilters);

    searchInput.addEventListener("keydown", (event) => {
      if (event.key === "Enter") applyHomeFilters();
    });
    locationInput.addEventListener("keydown", (event) => {
      if (event.key === "Enter") applyHomeFilters();
    });
  }

  function init() {
    initHomeHeroMap();
    initHomeSearchBindings();
    applyHomeFilters();

    window.searchEvents = searchEvents;
    window.filterByCategory = filterByCategory;
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
