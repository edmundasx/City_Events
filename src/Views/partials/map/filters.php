<aside class="space-y-6 text-sm">
    <div>
        <h2 class="text-sm font-semibold text-white">Filtrai</h2>
        <p id="activeFiltersMeta" class="mt-2 text-xs text-slate-400">0 filtrų taikoma</p>
        <div id="activeChips" class="mt-3 flex flex-wrap gap-2"></div>
        <button
            id="clearAllBtn"
            type="button"
            class="mt-2 block text-xs text-orange-400 transition hover:text-orange-300"
        >
            Išvalyti viską
        </button>
    </div>

    <div class="space-y-3">
        <h3 class="text-xs font-semibold uppercase tracking-wide text-slate-400">Kategorija</h3>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="category"
                value="business"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Verslas
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="category"
                value="food"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Maistas ir gėrimai
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="category"
                value="health"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Sveikata
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="category"
                value="music"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Muzika
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="category"
                value="art"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Menas
        </label>
        <button class="text-xs text-orange-400 transition hover:text-orange-300">
            Rodyti daugiau
        </button>
    </div>

    <div class="space-y-3">
        <h3 class="text-xs font-semibold uppercase tracking-wide text-slate-400">Data</h3>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="radio"
                name="dateRange"
                value="today"
                class="h-3 w-3 border-white/30 text-orange-500"
            />
            Šiandien
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="radio"
                name="dateRange"
                value="tomorrow"
                class="h-3 w-3 border-white/30 text-orange-500"
            />
            Rytoj
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="radio"
                name="dateRange"
                value="weekend"
                class="h-3 w-3 border-white/30 text-orange-500"
                checked
            />
            Šį savaitgalį
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="radio"
                name="dateRange"
                value="custom"
                class="h-3 w-3 border-white/30 text-orange-500"
            />
            Pasirinkti datą...
        </label>
    </div>

    <div class="space-y-3">
        <h3 class="text-xs font-semibold uppercase tracking-wide text-slate-400">Rajonas</h3>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="district"
                value="Senamiestis"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Senamiestis
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="district"
                value="Šnipiškės"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Šnipiškės
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="district"
                value="Naujamiestis"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Naujamiestis
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="district"
                value="Užupis"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Užupis
        </label>
    </div>

    <div class="space-y-3">
        <h3 class="text-xs font-semibold uppercase tracking-wide text-slate-400">Kaina</h3>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="price"
                value="free"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Nemokami
        </label>
        <label class="flex items-center gap-2 text-xs text-slate-200">
            <input
                type="checkbox"
                name="price"
                value="paid"
                class="h-3 w-3 rounded border-white/30 bg-transparent text-orange-500"
            />
            Mokami
        </label>
    </div>
</aside>
