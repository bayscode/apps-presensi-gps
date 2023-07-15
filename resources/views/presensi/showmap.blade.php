<style>
    #map {
        height: 250px;
    }
</style>
<div id="map"></div>
Copy kode koordinat <b>{{ $presensi->lokasi_in }}</b>
lalu paste <a target="_blank" href="https://maps.google.com/maps?ll=0,0&z=0&t=h&hl=en-US&gl=US&mapclient=embed"><svg
        xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24"
        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
        <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
        <path d="M12 2l0 2"></path>
        <path d="M12 20l0 2"></path>
        <path d="M20 12l2 0"></path>
        <path d="M2 12l2 0"></path>
    </svg>Maps</a>

<script>
    var lokasi = "{{ $presensi->lokasi_in }}";
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude, longitude], 18);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map); // Titik koordinat user
    var circle = L.circle([-2.9439482818677742, 104.78323950961261], { // Titik koordinat kantor
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 20
    }).addTo(map);
    var popup = L.popup()
        .setLatLng([latitude, longitude])
        .setContent("{{ $presensi->nama_lengkap }}")
        .openOn(map);
</script>
