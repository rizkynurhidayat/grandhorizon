document.addEventListener("DOMContentLoaded", () => {
    
    /* ================= 1. SLIDER LOGIC (Fasilitas Perumahan) ================= */
    const track = document.querySelector('.slider-track');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    const dotsContainer = document.querySelector('#dots-container');

    // Fungsi helper untuk ambil elemen terbaru (biar sinkron sama database)
    const getSlides = () => document.querySelectorAll('.slider-track img');
    const getDots = () => document.querySelectorAll('.dot');

    if (track && nextBtn && prevBtn) {
        let index = 0;

        function updateSlider() {
            const slides = getSlides();
            const dots = getDots();

            // Animasi geser track
            track.style.transform = `translateX(-${index * 100}%)`;

            // Update Lampu Indikator (Dots)
            dots.forEach(dot => dot.classList.remove('active'));
            if (dots[index]) {
                dots[index].classList.add('active');
            }
        }

        nextBtn.addEventListener('click', () => {
            const slides = getSlides();
            index = (index + 1) % slides.length;
            updateSlider();
        });

        prevBtn.addEventListener('click', () => {
            const slides = getSlides();
            index = (index - 1 + slides.length) % slides.length;
            updateSlider();
        });

        // Delegasi klik pada dot (Lampu Indikator)
        if (dotsContainer) {
            dotsContainer.addEventListener('click', (e) => {
                if (e.target.classList.contains('dot')) {
                    const dotsArray = Array.from(getDots());
                    index = dotsArray.indexOf(e.target);
                    updateSlider();
                }
            });
        }
    }

    /* ================= 2. REVEAL ANIMATION (Efek Muncul) ================= */
    const reveals = document.querySelectorAll(".reveal");
    const observerOptions = { threshold: 0.2 };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                // Delay bertahap biar keren
                setTimeout(() => {
                    entry.target.classList.add("show");
                }, idx * 120);
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    reveals.forEach(el => revealObserver.observe(el));

    /* ================= 3. FORM VALIDATION (Hubungi Kami) ================= */
    const contactForm = document.querySelector('form[action*="hubungi-kami"]');
    if (contactForm) {
        const inputs = contactForm.querySelectorAll('input, textarea, select');

        const validateInput = (input) => {
            if (input.checkValidity()) {
                input.classList.add("success");
                input.classList.remove("error");
            } else {
                input.classList.add("error");
                input.classList.remove("success");
            }
        };

        inputs.forEach(input => {
            input.addEventListener("input", () => validateInput(input));
            input.addEventListener("change", () => validateInput(input));
        });
    }
});

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

    // // SUBMIT
    // form.addEventListener("submit", function (e) {
    //     e.preventDefault();

    //     if (
    //         nama.classList.contains("success") &&
    //         hp.classList.contains("success") &&
    //         email.classList.contains("success") &&
    //         jadwal.classList.contains("success") &&
    //         pesan.classList.contains("success")
    //     ) {
    //         alert("✅ Form berhasil dikirim!");
    //         form.reset();
    //         document.querySelectorAll(".success").forEach(el =>
    //             el.classList.remove("success")
    //         );
    //     } else {
    //         alert("❌ Lengkapi semua data dengan benar");
    //     }
    // });

});

// untuk standar. nama = 3 huruf, email = 6 karakter dan harus ada "@",
//  nomor hp = 10 angka (agar keliatan asli dan tdk fake), jadwal = wajib diisi
// pesan = minimal 10 karakter