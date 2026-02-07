<section class="space-y-3">
    <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
        <div class="relative h-[520px]">
            <img
                src="https://staticmap.openstreetmap.de/staticmap.php?center=54.6872,25.2797&zoom=12&size=600x900&maptype=mapnik"
                alt="Vilniaus žemėlapis"
                class="h-full w-full object-cover"
                loading="lazy"
            />
            <div class="absolute left-3 top-3 flex flex-col overflow-hidden rounded-lg border border-white/10 bg-black/60 text-white">
                <button class="h-8 w-8 text-lg">+</button>
                <div class="h-px w-full bg-white/10"></div>
                <button class="h-8 w-8 text-lg">−</button>
            </div>
            <div class="absolute bottom-2 right-2 text-[10px] text-slate-300">
                Leaflet | © OpenStreetMap
            </div>
        </div>
    </div>
</section>
