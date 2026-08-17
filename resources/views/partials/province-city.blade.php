{{-- Province + city selects with dependent filtering. --}}
<div class="field">
    <label for="{{ $prefix }}_province">Chapter (Province) *</label>
    <select id="{{ $prefix }}_province" name="province" required>
        <option value="">— Select Province/Territory —</option>
        @foreach (['Alberta','British Columbia','Manitoba','New Brunswick','Newfoundland and Labrador','Northwest Territories','Nova Scotia','Nunavut','Ontario','Prince Edward Island','Quebec','Saskatchewan','Yukon','Other'] as $prov)
            <option value="{{ $prov }}">{{ $prov }}</option>
        @endforeach
    </select>
    <span class="hint">Choose your province first.</span>
</div>
<div class="field">
    <label for="{{ $prefix }}_city">Pod (City) *</label>
    <select id="{{ $prefix }}_city" name="city" required>
        <option value="">— Select City —</option>
    </select>
    <span class="hint">Then pick a city. If not listed, select Other.</span>
</div>

@once
@push('scripts')
<script>
window.HM_CITIES = {
    'British Columbia': ['Vancouver', 'Surrey', 'Burnaby', 'Richmond', 'Victoria'],
    'Alberta': ['Calgary', 'Edmonton', 'Red Deer', 'Lethbridge'],
    'Saskatchewan': ['Saskatoon', 'Regina'],
    'Manitoba': ['Winnipeg'],
    'Ontario': ['Toronto', 'Mississauga', 'Brampton', 'Hamilton', 'Ottawa', 'Kitchener', 'London', 'Markham', 'Vaughan', 'Windsor', 'Ajax', 'Whitby', 'Oshawa', 'Pickering'],
    'Quebec': ['Quebec City', 'Laval', 'Gatineau', 'Montreal'],
    'Nova Scotia': ['Halifax'],
    'Newfoundland and Labrador': ["St. John's"],
};
window.hmBindProvinceCity = function (provId, cityId) {
    const prov = document.getElementById(provId), city = document.getElementById(cityId);
    if (!prov || !city) return;
    prov.addEventListener('change', () => {
        const cities = window.HM_CITIES[prov.value] || [];
        city.innerHTML = '<option value="">— Select City —</option>' +
            cities.map(c => `<option value="${c}">${c}</option>`).join('') +
            '<option value="Other">Other</option>';
    });
};

</script>
@endpush
@endonce

@push('scripts')
<script>hmBindProvinceCity('{{ $prefix }}_province', '{{ $prefix }}_city');</script>
@endpush
