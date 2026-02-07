/* public/assets/js/map-page.js */

function escapeHtml(s) {
  return String(s).replace(
    /[&<>"']/g,
    (m) =>
      ({
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#039;",
      })[m],
  );
}

function readFilters() {
  const categories = [
    ...document.querySelectorAll('input[name="category"]:checked'),
  ].map((i) => i.value);
  const districts = [
    ...document.querySelectorAll('input[name="district"]:checked'),
  ].map((i) => i.value);
  const prices = [
    ...document.querySelectorAll('input[name="price"]:checked'),
  ].map((i) => i.value);
  const dateRangeEl = document.querySelector('input[name="dateRange"]:checked');

  return {
    categories,
    districts,
    prices,
    dateRange: dateRangeEl ? dateRangeEl.value : null,
  };
}

function matchesPrice(e, prices) {
  if (!prices || prices.length === 0) return true;
  const isFree = !!e.is_free || Number(e.price_eur) === 0;
  const wantsFree = prices.includes("free");
  const wantsPaid = prices.includes("paid");
  if (wantsFree && wantsPaid) return true;
  if (wantsFree) return isFree;
  if (wantsPaid) return !isFree;
  return true;
}

function matchesDateRange(dateStr, dateRange) {
  if (!dateRange || !dateStr) return true;
  const d = new Date(dateStr);
  if (Number.isNaN(d.getTime())) return true;

  const now = new Date();
  const startOfToday = new Date(
    now.getFullYear(),
    now.getMonth(),
    now.getDate(),
  );

  if (dateRange === "today") {
    const end = new Date(startOfToday.getTime() + 24 * 60 * 60 * 1000);
    return d >= startOfToday && d < end;
  }

  if (dateRange === "tomorrow") {
    const start = new Date(startOfToday.getTime() + 24 * 60 * 60 * 1000);
    const end = new Date(start.getTime() + 24 * 60 * 60 * 1000);
    return d >= start && d < end;
  }

  if (dateRange === "weekend") {
    const day = startOfToday.getDay(); // 0 Sun ... 6 Sat
    const daysToSat = (6 - day + 7) % 7;
    const sat = new Date(
      startOfToday.getTime() + daysToSat * 24 * 60 * 60 * 1000,
    );
    const mon = new Date(sat.getTime() + 2 * 24 * 60 * 60 * 1000);
    return d >= sat && d < mon;
  }

  return true; // custom ignored
}

function filterEvents(all, f) {
  return all.filter((e) => {
    const cat = String(e.category || "").toLowerCase();
    const district = String(e.district || "");

    const catOk = f.categories.length === 0 || f.categories.includes(cat);
    const distOk = f.districts.length === 0 || f.districts.includes(district);
    const dateOk = matchesDateRange(e.event_date || e.date, f.dateRange);
    const priceOk = matchesPrice(e, f.prices);

    return catOk && distOk && dateOk && priceOk;
  });
}

function uncheckValue(name, value) {
  const el = document.querySelector(
    `input[name="${name}"][value="${CSS.escape(value)}"]`,
  );
  if (el) el.checked = false;
}

function uncheckRadio(name) {
  const checked = document.querySelector(`input[name="${name}"]:checked`);
  if (checked) checked.checked = false;
}

function renderChips(f) {
  const chips = [];

  if (f.dateRange === "today")
    chips.push({ label: "Šiandien", clear: () => uncheckRadio("dateRange") });
  if (f.dateRange === "tomorrow")
    chips.push({ label: "Rytoj", clear: () => uncheckRadio("dateRange") });
  if (f.dateRange === "weekend")
    chips.push({
      label: "Šį savaitgalį",
      clear: () => uncheckRadio("dateRange"),
    });

  f.categories.forEach((v) =>
    chips.push({ label: v, clear: () => uncheckValue("category", v) }),
  );
  f.districts.forEach((v) =>
    chips.push({ label: v, clear: () => uncheckValue("district", v) }),
  );
  f.prices.forEach((v) =>
    chips.push({
      label: v === "free" ? "Nemokami" : "Mokami",
      clear: () => uncheckValue("price", v),
    }),
  );

  const wrap = document.getElementById("activeChips");
  const meta = document.getElementById("activeFiltersMeta");
  if (!wrap || !meta) return;

  meta.textContent = `${chips.length} filtrų taikoma`;

  wrap.innerHTML = chips
    .map(
      (c, idx) => `
    <button
      type="button"
      class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-slate-950/30 px-3 py-1 text-xs font-semibold text-slate-100 hover:border-white/25"
      data-chip="${idx}"
      title="Pašalinti filtrą"
    >
      ${escapeHtml(c.label)}
      <span class="text-slate-400">×</span>
    </button>
  `,
    )
    .join("");

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
  const vilnius = [54.6872, 25.2797];
  map = L.map("map").setView(vilnius, 12);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "&copy; OpenStreetMap",
  }).addTo(map);

  markersLayer = L.layerGroup().addTo(map);
}

function renderMarkers(events) {
  markersLayer.clearLayers();

  const withCoords = events.filter(
    (e) => Number.isFinite(Number(e.lat)) && Number.isFinite(Number(e.lng)),
  );

  withCoords.forEach((e) => {
    const marker = L.marker([Number(e.lat), Number(e.lng)]);
    marker.bindPopup(`
      <div style="font-weight:700">${escapeHtml(e.title || "Renginys")}</div>
      <div>${escapeHtml(e.location || "")}</div>
    `);
    marker.addTo(markersLayer);
  });

  if (withCoords.length > 0) {
    const bounds = L.latLngBounds(
      withCoords.map((e) => [Number(e.lat), Number(e.lng)]),
    );
    map.fitBounds(bounds.pad(0.2));
  }
}

function updateCount(n) {
  const el = document.getElementById("resultCount");
  if (el) el.textContent = String(n);
}

function apply() {
  const all = Array.isArray(window.__MAP_EVENTS__) ? window.__MAP_EVENTS__ : [];
  const f = readFilters();
  const filtered = filterEvents(all, f);

  renderChips(f);
  updateCount(filtered.length);
  renderMarkers(filtered);

  // Hide/show server-rendered cards
  const cards = document.querySelectorAll("[data-event-card='1']");
  cards.forEach((card) => {
    const id = Number(card.getAttribute("data-event-id"));
    const visible = filtered.some((e) => Number(e.id) === id);
    card.style.display = visible ? "" : "none";
  });

  // Empty-state message (matches your screenshot)
  const wrap = document.getElementById("resultsWrap");
  if (wrap) {
    const anyVisible = [...cards].some((c) => c.style.display !== "none");
    if (!anyVisible) {
      wrap.innerHTML = `<div class="py-10 text-center text-sm text-slate-300">Šiuo metu renginių nėra.</div>`;
    }
  }
}

function clearAll() {
  document
    .querySelectorAll('input[type="checkbox"]')
    .forEach((i) => (i.checked = false));
  const weekend = document.querySelector(
    'input[name="dateRange"][value="weekend"]',
  );
  if (weekend) weekend.checked = true;
}

window.addEventListener("DOMContentLoaded", () => {
  initMap();

  document
    .querySelectorAll(
      'input[name="category"], input[name="district"], input[name="price"], input[name="dateRange"]',
    )
    .forEach((i) => i.addEventListener("change", apply));

  const clearBtn = document.getElementById("clearAllBtn");
  if (clearBtn)
    clearBtn.addEventListener("click", () => {
      clearAll();
      apply();
    });

  apply();
});
