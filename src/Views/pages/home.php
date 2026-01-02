<!-- Hero Section -->
<section class="relative overflow-hidden text-white text-center px-6 py-20 bg-gradient-to-br from-[#ff6b35] to-[#f73378]">
  <!-- glow blobs (replacement for ::before/::after) -->
  <div class="pointer-events-none absolute w-[300px] h-[300px] -top-[100px] -right-[100px] rounded-full bg-white/10 blur-[60px]"></div>
  <div class="pointer-events-none absolute w-[250px] h-[250px] -bottom-[80px] -left-[80px] rounded-full bg-white/10 blur-[60px]"></div>

  <div class="relative z-10 max-w-[800px] mx-auto">
    <h1 class="text-[2rem] md:text-[3rem] font-bold mb-4">
      Atrask renginius viskam, ką mėgsti
    </h1>
    <p class="text-xl mb-8 opacity-95">
      Rask ir dalyvauk renginiuose, bendrauk su organizatoriais arba sukurk savo renginį
    </p>

    <div class="bg-white p-4 rounded-xl shadow-[0_10px_40px_rgba(0,0,0,0.15)] max-w-[700px] mx-auto flex flex-col md:flex-row md:flex-wrap gap-3">
      <input
        type="text"
        class="flex-1 min-w-[200px] px-4 py-3 border border-[#e5e7eb] rounded-lg text-base text-[#333] focus:outline-none focus:border-[#ff6b35]"
        placeholder="Ieškoti renginių"
        id="searchInput"
      >
      <input
        type="text"
        class="flex-1 min-w-[200px] px-4 py-3 border border-[#e5e7eb] rounded-lg text-base text-[#333] focus:outline-none focus:border-[#ff6b35]"
        placeholder="Vieta"
        id="locationInput"
      >
      <button
        class="px-6 py-2 rounded-lg font-semibold bg-[#ff6b35] text-white hover:bg-[#e85a2a] hover:-translate-y-[1px] transition-all"
        onclick="searchEvents()"
        type="button"
      >
        Ieškoti
      </button>
    </div>
  </div>
</section>

<!-- Categories -->
<section class="bg-white px-6 py-8 border-b border-[#e5e7eb]">
  <div class="max-w-[1200px] mx-auto flex justify-center gap-8 flex-wrap">
    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('music')">
      <span class="text-2xl">🎵</span>
      <span class="text-sm font-semibold text-[#333]">Muzika</span>
    </div>

    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('arts')">
      <span class="text-2xl">🎨</span>
      <span class="text-sm font-semibold text-[#333]">Menas</span>
    </div>

    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('charity')">
      <span class="text-2xl">❤️</span>
      <span class="text-sm font-semibold text-[#333]">Labdara</span>
    </div>

    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('business')">
      <span class="text-2xl">💼</span>
      <span class="text-sm font-semibold text-[#333]">Verslas</span>
    </div>

    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('education')">
      <span class="text-2xl">📚</span>
      <span class="text-sm font-semibold text-[#333]">Švietimas</span>
    </div>

    <div class="flex flex-col items-center gap-2 cursor-pointer py-3 px-6 rounded-lg transition-all hover:bg-[#f8f9fa]" onclick="filterByCategory('food')">
      <span class="text-2xl">🍽️</span>
      <span class="text-sm font-semibold text-[#333]">Maistas ir gėrimai</span>
    </div>
  </div>
</section>

<!-- Events Section -->
<section class="max-w-[1200px] mx-auto px-6 py-12" id="events">
  <div class="flex items-center justify-between mb-8">
    <div>
      <h2 class="text-[2rem] text-[#333] font-semibold">Renginiai tavo mieste</h2>
      <p class="text-[#6b7280] mt-2">Atrask įdomiausius įvykius šalia tavęs</p>
    </div>

    <button
      type="button"
      class="px-6 py-2 rounded-lg font-semibold border-2 border-[#e5e7eb] text-[#333] hover:border-[#ff6b35] hover:text-[#ff6b35] transition-all"
    >
      Peržiūrėti visus
    </button>
  </div>

  <div
    id="eventsGrid"
    class="grid gap-8 grid-cols-1 md:[grid-template-columns:repeat(auto-fill,minmax(300px,1fr))]"
  >
    <div class="text-center py-8 text-[#6b7280]">Įkeliami renginiai...</div>
  </div>
</section>
