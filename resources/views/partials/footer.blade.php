<!-- ================= FOOTER ================= -->
<footer class="footer">

    <div class="footer-container">

        @php
            // Hitung rata-rata rating dari semua komentar yang punya rating
            $jumlahRating = App\Models\Komentar::whereNotNull('rating')->count();
            $rataRating   = $jumlahRating
                ? round(App\Models\Komentar::whereNotNull('rating')->avg('rating'), 1)
                : 0;
        @endphp

        <div class="row g-4">

            <!-- KOLOM 1: KONTAK -->
            <div class="col-12 col-md-4">

                <h3>Kontak Kami</h3>

                <div class="contact-list">

                    <a href="tel:+6282122624424" class="contact-item">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        <span>+62 821 226 2442</span>
                    </a>

                    <a
                        href="https://instagram.com/smkn4kotabogor"
                        target="_blank"
                        rel="noopener"
                        class="contact-item"
                    >
                        <i class="bi bi-instagram contact-icon"></i>
                        <span>@smkn4kotabogor</span>
                    </a>

                    <a href="mailto:smkn4@smkn4bogor.sch.id" class="contact-item">
                        <i class="bi bi-envelope-fill contact-icon"></i>
                        <span>smkn4@smkn4bogor.sch.id</span>
                    </a>

                    <a
                        href="https://youtube.com/@smknegeri4bogor905"
                        target="_blank"
                        rel="noopener"
                        class="contact-item"
                    >
                        <i class="bi bi-youtube contact-icon"></i>
                        <span>@smknegeri4bogor905</span>
                    </a>

                    <a
                        href="https://www.google.com/maps/search/?api=1&query=-6.6410733,106.8248083"
                        target="_blank"
                        rel="noopener"
                        class="contact-item address"
                    >
                        <i class="bi bi-geo-alt-fill contact-icon"></i>
                        <span>
                            Jl. Raya Tajur, Kp. Buntar RT.02/RW.08,
                            Kel. Muarasari, Kec.<br>
                            Bogor Selatan Kota Bogor, Jawa Barat 16137
                        </span>
                    </a>

                </div>

            </div>


            <!-- KOLOM 2: RATING + KIRIM KOMENTAR -->
            <div class="col-12 col-md-4">

                <h3>Kirim Komentar</h3>


                <!-- RATA-RATA RATING (bisa dilihat semua orang) -->
                <div class="footer-rating">

                    <div class="footer-rating-stars">

                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= round($rataRating) ? 'bi-star-fill' : 'bi-star' }}"></i>
                        @endfor

                    </div>

                    <span class="footer-rating-text">
                        @if ($jumlahRating > 0)
                            {{ number_format($rataRating, 1) }} / 5 · {{ $jumlahRating }} penilaian
                        @else
                            Belum ada penilaian
                        @endif
                    </span>

                </div>


                @if (session('sukses_komentar'))
                    <div class="footer-sukses">
                        {{ session('sukses_komentar') }}
                    </div>
                @endif


                <form
                    method="POST"
                    action="{{ route('komentar.store') }}"
                    class="footer-form"
                >
                    @csrf

                    <input
                        type="text"
                        name="nama"
                        maxlength="100"
                        placeholder="Nama kamu"
                        class="footer-input"
                        required
                    >


                    <!-- INPUT BINTANG (klik untuk pilih) -->
                    <div class="footer-stars-label">Beri rating:</div>

                    <div class="footer-stars-input" id="starInput">

                        <input type="hidden" name="rating" id="ratingInput" value="5">

                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star-fill" data-value="{{ $i }}"></i>
                        @endfor

                    </div>


                    <textarea
                        name="pesan"
                        rows="3"
                        maxlength="1000"
                        placeholder="Tulis komentar atau saran untuk sekolah..."
                        class="footer-input"
                        required
                    >{{ old('pesan') }}</textarea>

                    <button type="submit" class="footer-btn">
                        Kirim Komentar
                    </button>

                </form>

            </div>


            <!-- KOLOM 3: LOKASI SEKOLAH -->
            <div class="col-12 col-md-4">

                <h3>Lokasi Sekolah</h3>

                <iframe
                    class="footer-map"
                    src="https://www.google.com/maps?q=-6.6410733,106.8248083&hl=id&z=16&output=embed"
                    loading="lazy"
                    allowfullscreen
                    title="Lokasi SMKN 4 Bogor"
                ></iframe>

            </div>

        </div>

        <div class="footer-copyright">
            Copyright © 2025 - 2026 SMKN 4 Bogor.
        </div>

    </div>

</footer>


<!-- ================= SCRIPT PILIH BINTANG ================= -->
<script>
    const starInput   = document.getElementById('starInput');
    const ratingValue = document.getElementById('ratingInput');

    if (starInput) {
        const stars = starInput.querySelectorAll('i');

        // Nyalain bintang sesuai angka (1-5)
        const apply = (val) => {
            stars.forEach(s => {
                const on = Number(s.dataset.value) <= val;
                s.classList.toggle('bi-star-fill', on);
                s.classList.toggle('bi-star', !on);
            });
        };

        stars.forEach(s => {
            // Hover: preview
            s.addEventListener('mouseenter', () => apply(Number(s.dataset.value)));
            // Klik: pilih (disimpan di input tersembunyi)
            s.addEventListener('click', () => {
                ratingValue.value = Number(s.dataset.value);
            });
        });

        // Keluar dari area: kembali ke nilai yang dipilih
        starInput.addEventListener('mouseleave', () => apply(Number(ratingValue.value)));

        // Kondisi awal: 5 bintang
        apply(5);
    }
</script>