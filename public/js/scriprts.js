/* ================= AMBIL ELEMENT HTML ================= */

// jukut elemen "rel" sg bakalan digeser kiri–kanan
const track = document.querySelector('.slider-track');

// jukut  kabeh gambar neng njero slider (jumlah slide)
const slides = document.querySelectorAll('.slider-track img');

// jukut kabeh dot indikator (bulatan bawah)
const dots = document.querySelectorAll('.dot');

// jukut tombol panah kiri
const prevBtn = document.querySelector('.prev');

// jukut tombol panah kanan
const nextBtn = document.querySelector('.next');


/* ================= SAFETY CHECK ================= */
/*
   go mastikna :
   - element slider ana neng halaman
   - ben JS ora error dong class drg ketemu
*/
if (track && nextBtn && prevBtn) {

    // index = posisi slide aktif skrg
    // 0 = slide pertama, 1 = slide kedua, dst.....
    let index = 0;


    /* ================= FUNGSI UPDATE SLIDER ================= */
    function updateSlider() {

        /*
            Nggeser track ke kiri
            contoh:
            index = 1 → translateX(-100%)
            index = 2 → translateX(-200%)
        */
        track.style.transform = `translateX(-${index * 100}%)`;

        // hapus class "active" neng kabeh dot
        dots.forEach(dot => dot.classList.remove('active'));

        // tambahna class "active" maring dot sesuai slide aktif
        if (dots[index]) {
            dots[index].classList.add('active');
        }
    }


    /* ================= TOMBOL NEXT ================= */
    nextBtn.addEventListener('click', () => {

        /*
            index + 1 = ben pindah ke slide berikut e
            % slides.length = ben muter ke awal lagi
        */
        index = (index + 1) % slides.length;
        updateSlider();
    });


    /* ================= TOMBOL PREV ================= */
    prevBtn.addEventListener('click', () => {

        /*
            index - 1 = mundur
            + slides.length = ben ora  negatif, maksude index -1 kue laka.
            % slides.length = ben muter maring slide terakhir
        */
        index = (index - 1 + slides.length) % slides.length;
        updateSlider();
    });


    /* ================= DOT CLICK ================= */
    // go mindah indikator
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            index = i;
            updateSlider();
        });
    });

} 

// tambahan. dot = lampu indikator 

const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // delay bertahap
                setTimeout(() => {
                    entry.target.classList.add("show");
                }, index * 120);

                observer.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.2,
    }
);

reveals.forEach(el => observer.observe(el));


// form
document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("contactForm");
    const nama = document.getElementById("nama");
    const hp = document.getElementById("hp");
    const email = document.getElementById("email");
    const jadwal = document.getElementById("jadwal");
    const pesan = document.getElementById("pesan");

    function error(input) {
        input.classList.add("error");
        input.classList.remove("success");
    }

    function success(input) {
        input.classList.add("success");
        input.classList.remove("error");
    }

    // REALTIME VALIDATION
    nama.addEventListener("input", () => {
        nama.value.trim().length >= 3 ? success(nama) : error(nama);
    });

    hp.addEventListener("input", () => {
        hp.value = hp.value.replace(/[^0-9]/g, "");
        hp.value.length >= 10 ? success(hp) : error(hp);
    });

    email.addEventListener("input", () => {
        email.value.includes("@") && email.value.includes(".")
            ? success(email)
            : error(email);
    });

    jadwal.addEventListener("change", () => {
        jadwal.value ? success(jadwal) : error(jadwal);
    });

    pesan.addEventListener("input", () => {
        pesan.value.trim().length >= 10 ? success(pesan) : error(pesan);
    });

    // SUBMIT
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        if (
            nama.classList.contains("success") &&
            hp.classList.contains("success") &&
            email.classList.contains("success") &&
            jadwal.classList.contains("success") &&
            pesan.classList.contains("success")
        ) {
            alert("✅ Form berhasil dikirim!");
            form.reset();
            document.querySelectorAll(".success").forEach(el =>
                el.classList.remove("success")
            );
        } else {
            alert("❌ Lengkapi semua data dengan benar");
        }
    });

});

// untuk standar. nama = 3 huruf, email = 6 karakter dan harus ada "@",
//  nomor hp = 10 angka (agar keliatan asli dan tdk fake), jadwal = wajib diisi
// pesan = minimal 10 karakter