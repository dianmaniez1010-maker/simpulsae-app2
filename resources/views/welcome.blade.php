<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="appHtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Simpul SAE Pasar Induk Among Tani</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --sae-forest: #10483f;
            --sae-mint: #9cddc2;
            --sae-green: #079c70;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: 'DM Sans', sans-serif;
            background: #10483f;
            -webkit-font-smoothing: antialiased;
        }

        /* WELCOME SCREEN 1 LAYAR PENUH */
        #welcome-screen {
            width: 100vw;
            height: 100vh;
            height: 100svh;
            padding: 12px 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            background: #10483f;
            overflow-y: auto;
        }

        .welcome-topbar {
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .welcome-identity {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .welcome-identity img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            background: #fff;
            border-radius: 50%;
            padding: 3px;
        }

        .welcome-identity strong {
            display: block;
            color: #fff;
            font: 800 13px/1.2 'Plus Jakarta Sans', sans-serif;
        }

        .welcome-identity small {
            display: block;
            margin-top: 2px;
            color: #c9e8dc;
            font-size: 10px;
            font-weight: 600;
        }

        .welcome-top-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .welcome-year {
            padding: 5px 12px;
            border-radius: 30px;
            color: #6de4b5;
            background: #075b47;
            font: 800 11px 'DM Sans', sans-serif;
            letter-spacing: .04em;
        }

        /* Tombol Ganti Bahasa ID / EN Bersebelahan */
        .lang-group {
            display: inline-flex;
            background: rgba(0, 0, 0, 0.22);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            padding: 2px;
            overflow: hidden;
        }

        .lang-btn {
            background: transparent;
            color: #c9e8dc;
            border: 0;
            padding: 5px 11px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
        }

        .lang-btn.active {
            background: #079c70;
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        /* FOTO / CAROUSEL UTAMA (JUMBO / UKURAN SANGAT BESAR DI ATAS) */
        .welcome-carousel {
            position: relative;
            width: min(1280px, 100%);
            margin: 4px auto;
            flex: 1;
            max-height: 62vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            isolation: isolate;
        }

        .welcome-photo-button {
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            min-height: 360px;
            padding: 0;
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            background: #dceae4;
            cursor: zoom-in;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
            transition: transform .35s ease, box-shadow .35s ease;
        }

        .welcome-photo-button.is-raised {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.5);
            cursor: zoom-out;
        }

        .welcome-photo-button .welcome-photo {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transform: scale(1.02);
            transition: opacity .8s ease, transform 1.2s ease;
        }

        .welcome-photo-button .welcome-photo.is-active {
            opacity: 1;
            transform: scale(1);
        }

        .welcome-photo-hint {
            position: absolute;
            right: 14px;
            bottom: 14px;
            padding: 6px 12px;
            border-radius: 20px;
            background: rgba(8, 48, 41, 0.82);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            backdrop-filter: blur(4px);
        }

        .welcome-slide-arrow {
            position: absolute;
            top: 50%;
            z-index: 3;
            width: 44px;
            height: 44px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            background: rgba(8, 55, 46, 0.8);
            color: #fff;
            font-size: 26px;
            line-height: 1;
            transform: translateY(-50%);
            cursor: pointer;
            backdrop-filter: blur(5px);
            display: grid;
            place-items: center;
        }
        .welcome-slide-arrow.prev { left: 14px; }
        .welcome-slide-arrow.next { right: 14px; }

        .welcome-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 6px;
        }

        .welcome-dot {
            width: 8px;
            height: 8px;
            padding: 0;
            border: 0;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: width .25s, background .25s;
        }
        .welcome-dot.active {
            width: 24px;
            background: #35c894;
        }

        /* TEKS KONTEN & TOMBOL DI BAWAH FOTO */
        .welcome-content {
            color: #fff;
            width: min(800px, 100%);
            margin: 0 auto;
            text-align: center;
        }

        .welcome-eyebrow {
            margin-bottom: 2px;
            color: var(--sae-mint);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .12em;
        }

        .welcome-content h1 {
            margin: 0;
            color: #fff;
            font: 900 clamp(22px, 3.2vw, 34px)/1.1 'Plus Jakarta Sans', sans-serif;
            letter-spacing: -.03em;
        }

        .welcome-content h2 {
            margin: 2px 0 4px;
            color: var(--sae-mint);
            font: 800 clamp(16px, 2.2vw, 22px)/1.2 'Plus Jakarta Sans', sans-serif;
        }

        .welcome-description {
            color: #e4f2ec;
            max-width: 650px;
            margin: 0 auto 10px;
            font-size: clamp(12px, 1.2vw, 14px);
            line-height: 1.45;
        }

        .welcome-enter {
            min-height: 42px;
            padding: 0 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 999px;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(110deg, #0bb982, #07845f);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
            font: 800 13px 'DM Sans', sans-serif;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .welcome-enter:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.35);
        }

        .welcome-footer-text {
            color: rgba(195, 224, 213, 0.7);
            margin-top: 6px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .03em;
        }

        .welcome-down {
            align-self: center;
            width: 22px;
            height: 22px;
            margin: 2px 0 -8px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: #10483f;
            background: #fff;
            font-size: 13px;
        }

        /* RESPONSIVE HP */
        @media (max-width: 700px) {
            #welcome-screen { padding: 10px 14px; }
            .welcome-carousel { max-height: 45vh; }
            .welcome-photo-button { min-height: 220px; }
            .welcome-content h1 { font-size: 20px; }
            .welcome-content h2 { font-size: 15px; }
            .welcome-description { font-size: 12px; margin-bottom: 6px; }
            .welcome-enter { min-height: 38px; padding: 0 20px; font-size: 12px; }
        }
    </style>
</head>
<body>

<section id="welcome-screen" aria-label="Halaman penyambutan Digitalisasi Pasar 2026">
    <!-- TOPBAR -->
    <header class="welcome-topbar">
        <div class="welcome-identity">
            <img src="{{ asset('images/logo-kotabatu.png') }}" alt="Logo Pemerintah Kota Batu" onerror="this.style.display='none'">
            <div>
                <strong data-id="PEMERINTAH KOTA BATU" data-en="BATU CITY GOVERNMENT">PEMERINTAH KOTA BATU</strong>
                <small>DISKUMPERINDAG</small>
            </div>
        </div>
        <div class="welcome-top-actions">
            <!-- Pilihan Bahasa ID / EN Bersebelahan -->
            <div class="lang-group">
                <button type="button" class="lang-btn active" id="btnId" onclick="setLanguage('id')">ID</button>
                <button type="button" class="lang-btn" id="btnEn" onclick="setLanguage('en')">EN</button>
            </div>
            <span class="welcome-year" data-id="TAHUN 2026" data-en="YEAR 2026">TAHUN 2026</span>
        </div>
    </header>
    
    <!-- FOTO UTAMA JUMBO DI ATAS -->
    <div class="welcome-carousel" aria-label="Galeri Pasar Induk Among Tani">
        <button type="button" class="welcome-photo-button" id="welcomePhotoButton" aria-label="Perbesar foto pasar" aria-pressed="false">
            <img class="welcome-photo is-active" src="{{ asset('images/welcome-pasar.jpg') }}" alt="Tampak depan Pasar Induk Among Tani Kota Batu">
            <img class="welcome-photo" src="{{ asset('images/hero1.png') }}" alt="Suasana Pasar Induk Among Tani">
            <img class="welcome-photo" src="{{ asset('images/welcome-pasar2.png') }}" alt="Area dan aktivitas Pasar Induk Among Tani">
            <span class="welcome-photo-hint" data-id="Klik foto untuk memperbesar" data-en="Click photo to enlarge">Klik foto untuk memperbesar</span>
        </button>
        <button type="button" class="welcome-slide-arrow prev" aria-label="Foto sebelumnya" id="welcomePrev">‹</button>
        <button type="button" class="welcome-slide-arrow next" aria-label="Foto berikutnya" id="welcomeNext">›</button>
        <div class="welcome-dots" role="group" aria-label="Pilih foto pasar">
            <button type="button" class="welcome-dot active" aria-label="Foto 1" aria-current="true"></button>
            <button type="button" class="welcome-dot" aria-label="Foto 2"></button>
            <button type="button" class="welcome-dot" aria-label="Foto 3"></button>
        </div>
    </div>

    <!-- TEKS & TOMBOL MASUK KE SECTION BERANDA DASHBOARD -->
    <div class="welcome-content">
        <p class="welcome-eyebrow" data-id="SELAMAT DATANG DI" data-en="WELCOME TO">SELAMAT DATANG DI</p>
        <h1 data-id="DIGITALISASI PASAR" data-en="MARKET DIGITALIZATION">DIGITALISASI PASAR</h1>
        <h2 data-id="INDUK AMONG TANI" data-en="AMONG TANI CENTRAL MARKET">INDUK AMONG TANI</h2>
        <p class="welcome-description" data-id="Mewujudkan ekosistem pasar yang modern, transparan, dan terintegrasi melalui transformasi digital." data-en="Realizing a modern, transparent, and integrated market ecosystem through digital transformation.">Mewujudkan ekosistem pasar yang modern, transparan, dan terintegrasi melalui transformasi digital.</p>
        
        <!-- Langsung mengarah ke halaman dashboard bagian beranda (#beranda) -->
        <a href="{{ url('/beranda#beranda') }}" class="welcome-enter">
        <span aria-hidden="true">⊕</span> <span data-id="MASUK DASHBOARD" data-en="ENTER DASHBOARD">MASUK DASHBOARD</span>
        </a>
        
        <p class="welcome-footer-text" data-id="PASAR INDUK AMONG TANI • KOTA BATU • 2026" data-en="AMONG TANI CENTRAL MARKET • BATU CITY • 2026">PASAR INDUK AMONG TANI • KOTA BATU • 2026</p>
    </div>

</section>

<script>
    let currentLang = localStorage.getItem('simpul_lang') || 'id';

    function setLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('simpul_lang', lang);
        
        const btnId = document.getElementById('btnId');
        const btnEn = document.getElementById('btnEn');
        if (btnId && btnEn) {
            btnId.classList.toggle('active', lang === 'id');
            btnEn.classList.toggle('active', lang === 'en');
        }
        
        document.querySelectorAll('[data-id]').forEach(el => {
            const text = el.getAttribute(`data-${lang}`);
            if (text) el.textContent = text;
        });
    }

    (function () {
        setLanguage(currentLang);

        const carousel = document.querySelector('.welcome-carousel');
        if (!carousel) return;
        const photos = Array.from(carousel.querySelectorAll('.welcome-photo'));
        const dots = Array.from(carousel.querySelectorAll('.welcome-dot'));
        const photoButton = document.getElementById('welcomePhotoButton');
        let current = 0, timer = null;

        function showPhoto(index) {
            current = (index + photos.length) % photos.length;
            photos.forEach((photo, i) => photo.classList.toggle('is-active', i === current));
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === current);
                if (i === current) dot.setAttribute('aria-current', 'true');
                else dot.removeAttribute('aria-current');
            });
        }
        function restartTimer() {
            if (timer) clearInterval(timer);
            timer = setInterval(() => showPhoto(current + 1), 5000);
        }
        dots.forEach((dot, i) => dot.addEventListener('click', () => { showPhoto(i); restartTimer(); }));
        document.getElementById('welcomePrev')?.addEventListener('click', () => { showPhoto(current - 1); restartTimer(); });
        document.getElementById('welcomeNext')?.addEventListener('click', () => { showPhoto(current + 1); restartTimer(); });
        photoButton?.addEventListener('click', () => {
            const raised = photoButton.classList.toggle('is-raised');
            photoButton.setAttribute('aria-pressed', raised ? 'true' : 'false');
        });
        carousel.addEventListener('mouseenter', () => { if (timer) clearInterval(timer); });
        carousel.addEventListener('mouseleave', restartTimer);
        showPhoto(0);
        restartTimer();
    })();
</script>

</body>
</html>