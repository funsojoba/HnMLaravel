<div class="calendar-wrap">
    <div class="calendar reveal">
        <div class="cal-head">
            <h3 id="calTitle">…</h3>
            <div class="cal-nav">
                <button type="button" id="calPrev" aria-label="Previous month">‹</button>
                <button type="button" id="calNext" aria-label="Next month">›</button>
            </div>
        </div>
        <div class="cal-grid" id="calGrid"></div>
    </div>
    <div class="event-detail reveal" id="eventDetail">
        <div class="placeholder">
            <div class="big">📅</div>
            <strong>Select a Date</strong>
            <p>Click on a highlighted date in the calendar to view event details.</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function () {
    const grid = document.getElementById('calGrid');
    const title = document.getElementById('calTitle');
    const detail = document.getElementById('eventDetail');
    let events = {};
    let view = new Date(); view.setDate(1);

    const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    const DOW = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

    function render() {
        title.textContent = MONTHS[view.getMonth()] + ' ' + view.getFullYear();
        grid.innerHTML = DOW.map(d => `<div class="dow">${d}</div>`).join('');
        const first = new Date(view.getFullYear(), view.getMonth(), 1);
        const start = new Date(first); start.setDate(1 - first.getDay());
        const todayKey = new Date().toISOString().slice(0, 10);
        for (let i = 0; i < 42; i++) {
            const d = new Date(start); d.setDate(start.getDate() + i);
            const key = d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0');
            const el = document.createElement('div');
            el.className = 'day' + (d.getMonth() !== view.getMonth() ? ' dim' : '') +
                (key === todayKey ? ' today' : '') + (events[key] ? ' has-event' : '');
            el.textContent = d.getDate();
            if (events[key]) el.addEventListener('click', () => show(events[key]));
            grid.appendChild(el);
        }
    }

    function show(list) {
        detail.innerHTML = list.map(ev => `
            ${flierMarkup(ev.flier_url)}
            <span class="eyebrow">${new Date(ev.date + 'T00:00:00').toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</span>
            <h3>${esc(ev.title)}</h3>
            <div class="event-meta">
                ${ev.time ? `<span>🕒 ${esc(ev.time)}</span>` : ''}
                ${ev.location ? `<span>📍 ${esc(ev.location)}</span>` : ''}
            </div>
            <p style="color:var(--muted);font-size:.95rem;">${esc(ev.description || '')}</p>
            <div style="display:flex;gap:.8rem;flex-wrap:wrap;margin-top:1.2rem;">
                ${ev.register_url ? `<a class="btn btn-purple" href="${esc(ev.register_url)}" target="_blank" rel="noopener">Register for this event</a>` : ''}
                ${ev.flier_url && ! isImage(ev.flier_url) ? `<a class="btn btn-outline" href="${esc(ev.flier_url)}" target="_blank" rel="noopener">View Flier</a>` : ''}
            </div>
        `).join('<hr style="margin:1.4rem 0;border:0;border-top:1px solid #eee;">');
    }

    function isImage(url) { return /\.(jpe?g|png|webp|gif)$/i.test(url || ''); }

    function flierMarkup(url) {
        if (! url || ! isImage(url)) return '';
        return `<a href="${esc(url)}" target="_blank" rel="noopener"><img src="${esc(url)}" alt="Event flier" style="width:100%;border-radius:12px;margin-top:1rem;" onerror="this.closest('a').style.display='none'"></a>`;
    }

    function esc(s) { const d = document.createElement('div'); d.textContent = s ?? ''; return d.innerHTML; }

    document.getElementById('calPrev').addEventListener('click', () => { view.setMonth(view.getMonth() - 1); render(); });
    document.getElementById('calNext').addEventListener('click', () => { view.setMonth(view.getMonth() + 1); render(); });

    fetch('{{ route('events.json') }}')
        .then(r => r.json())
        .then(list => {
            list.forEach(ev => { (events[ev.date] = events[ev.date] || []).push(ev); });
            render();
        })
        .catch(render);
})();
</script>
@endpush
