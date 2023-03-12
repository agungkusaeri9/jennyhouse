<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        Jennyhouse Official Shop

                        Jennyhouse adalah produk kosmetik dan perawatan rambut  yang banyak dipakai oleh Selebritis dan public figure dari Korea Selatan. Semua produk kami sudah tersertifikasi BPOM 100% dan Vegan.
                        <br>
                        <br>
                        🛒 Jam Operasional :
                        Senin - Jumat, Pk. 08.00 - 17.00
                        Order setelah jam 4 sore akan dikirim di hari berikutnya.
                        orderan instant hanya dilayani di jam Oprasional.
                    </p>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <div class="footer-social d-flex align-items-center">
                        @forelse ($socmeds as $socmed)
                        <a href="{{ $socmed->link }}"><i class="fa fa-{{ \Str::lower($socmed->name) }}"></i></a>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

        </div>
    </div>
</footer>
