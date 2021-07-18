
@push('styles')
<style>
    .contact-box {
        background-color: #222;
        color: #eee;
    }
    .map {
        border: #eee 2px solid;
        border-radius: 8px;
        height: 300px
    }
    .contact-info p{
        font-size: 16px
    }
</style>
@endpush
<div class="contact-box p-5" id="search">
    <h2 class="mb-4 text-center">Kontak Kami</h2>
    <div class="px-3 row">
        <div class="col-7 px-3">
            <h4>Lokasi :</h4>
            <div class="map">
                a
            </div>
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
