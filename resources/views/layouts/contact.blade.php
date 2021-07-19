@push('styles')
<style>
    .contact-box {
        background-color: #222;
        color: #eee;
    }

    #map_canvas {
        border: #eee 2px solid;
        border-radius: 8px;
        height: 300px;
        width: 100%
    }

    .contact-info p {
        font-size: 16px
    }

</style>
@endpush
<div class="contact-box p-5" id="search">
    <h2 class="mb-4 text-center">Kontak Kami</h2>
    <div class="px-3 row">
        <div class="col-7 px-3">
            <h4>Lokasi :</h4>
            <div id="map_canvas" class="rounded-lg"></div>
        </div>
        <div class="col-5 px-3 contact-info">
            <h4>Alamat :</h4>
            <p>Jalan Prof. DR. G.A. Siwabessy, Kampus
                Universitas Indonesia, Depok, 16425</p>
            <br>
            <h4>Jam Operasional :</h4>
            <p>Senin - Jumat : 07:30 - 16:00</p>
            <p>Sabtu - Minggu : Libur</p>
            <br>
            <p>Email : abc@efg.com</p>
            <p>Nomor : 021-123-4567</p>
        </div>
    </div>
</div>

@push('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZcRnZNUo8RkcCbO2bdM--pnf0_N8Uydw&libraries=geometry,drawing&ext=.js">
</script>
<script>
    function initMap() {
        const myLatLng = {
            lat: -6.370290317012335,
            lng: 106.8237992632583
        };
        const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 15,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    }

    initMap()

</script>
@endpush
