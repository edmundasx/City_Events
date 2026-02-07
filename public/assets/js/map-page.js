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

    const map = L.map(el, { zoomControl: false }).setView(
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
