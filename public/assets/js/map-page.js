(() => {
  function initMapPage() {
    const el = document.getElementById("ce-map");
    if (!el) return;

    if (window.__CE_MAP_INIT__) return;
    window.__CE_MAP_INIT__ = true;

    if (typeof L === "undefined") {
      console.error(
        "Leaflet is not loaded. Load leaflet.js before map-page.js",
      );
      return;
    }

    let events = [];
    try {
      events = JSON.parse(el.dataset.events || "[]");
    } catch (e) {
      console.error("Bad map events JSON", e);
    }

    const map = L.map("ce-map", { zoomControl: false }).setView(
      [54.6872, 25.2797],
      12,
    );

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    const markers = [];
    for (const ev of events) {
      if (typeof ev.lat !== "number" || typeof ev.lng !== "number") continue;

      const m = L.marker([ev.lat, ev.lng]).addTo(map);

      // Keep popup simple (avoid injecting raw HTML from DB)
      const title = (ev.title || "").toString();
      const loc = (ev.location || "").toString();
      const date = (ev.date || "").toString();

      m.bindPopup(
        `<div style="min-width:200px">
          <div style="font-weight:600">${escapeHtml(title)}</div>
          <div style="font-size:12px;opacity:.8">${escapeHtml(loc)}</div>
          <div style="font-size:12px;opacity:.8">${escapeHtml(date)}</div>
        </div>`,
      );

  wrap.querySelectorAll("[data-chip]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const idx = Number(btn.getAttribute("data-chip"));
      chips[idx]?.clear?.();
      apply();
    });
  });
}

/* Leaflet map */
let map;
let markersLayer;

function initMap() {
  if (typeof window.L === "undefined") return;
  const mapEl = document.getElementById("map");
  if (!mapEl) return;
  const vilnius = [54.6872, 25.2797];
  map = L.map(mapEl).setView(vilnius, 12);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "&copy; OpenStreetMap",
  }).addTo(map);

  markersLayer = L.layerGroup().addTo(map);
}

function renderMarkers(events) {
  if (!markersLayer) return;
  markersLayer.clearLayers();

  const withCoords = events.filter(
    (e) => Number.isFinite(Number(e.lat)) && Number.isFinite(Number(e.lng)),
  );
      markers.push(m);
    }

    if (markers.length) {
      const group = L.featureGroup(markers);
      map.fitBounds(group.getBounds().pad(0.2));
    }

    document
      .getElementById("ce-zoom-in")
      ?.addEventListener("click", () => map.zoomIn());
    document
      .getElementById("ce-zoom-out")
      ?.addEventListener("click", () => map.zoomOut());
  }

  function escapeHtml(s) {
    return String(s)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initMapPage);
  } else {
    initMapPage();
  }
})();
