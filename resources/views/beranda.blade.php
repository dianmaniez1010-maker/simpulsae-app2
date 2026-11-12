@extends('layouts.app')

@section('title', 'Beranda - Simpul SAE Pasar Induk Among Tani')

@section('page-styles')
<style>
    /* NAVBAR HP & HAMBURGER MENU */
    .menu-toggle {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 1001;
    }
    .menu-toggle span {
        width: 100%;
        height: 3px;
        background-color: #073f45;
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    /* Pilihan Bahasa ID / EN Bersebelahan */
    .lang-group {
        display: inline-flex;
        background: rgba(0, 83, 71, 0.08);
        border: 1px solid #cce5dc;
        border-radius: 20px;
        padding: 2px;
        overflow: hidden;
    }
    .lang-btn {
        background: transparent;
        color: #005347;
        border: 0;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.2s;
    }
    .lang-btn.active {
        background: #00845e;
        color: #ffffff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    /* HERO SECTION - SELAPUT PUTIH DI KANAN DIHILANGKAN AGAR GAMBAR ASLI TERLIHAT JELAS */
    .hero {
        min-height: 440px;
        position: relative;
        overflow: hidden;
        background-color: #eaf8fc;
        background-image: linear-gradient(90deg, rgba(234, 248, 252, 0.96) 0%, rgba(234, 248, 252, 0.85) 45%, rgba(234, 248, 252, 0.1) 65%, rgba(0, 0, 0, 0) 100%), url("{{ asset('images/hero1.png') }}");
        background-position: center right;
        background-size: cover;
        background-repeat: no-repeat;
        border-bottom: 1px solid #e1efe9;
    }
    .hero-content { width: min(1310px, 100%); margin: auto; padding: 55px 24px 90px; position: relative; z-index: 2; }
    .eyebrow { color: #00885d; font-size: 14px; font-weight: 800; letter-spacing: 1.5px; margin-bottom: 10px; }
    .hero h1 { font: 900 clamp(36px, 5vw, 60px)/1.08 'Plus Jakarta Sans', sans-serif; letter-spacing: -1px; color: #06484b; }
    .hero h1 span { color: #078b5d; }
    .hero h2 { color: #08715b; font: 800 clamp(20px, 3vw, 32px) 'Plus Jakarta Sans', sans-serif; margin: 6px 0 16px; }
    .hero-description { max-width: 540px; font-size: clamp(14px, 1.5vw, 17px); line-height: 1.65; color: #164e5a; font-weight: 500; }
    .hero-buttons { display: flex; flex-wrap: wrap; align-items: center; gap: 16px; margin-top: 24px; }
    .btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 26px; min-height: 48px; border-radius: 30px; font-size: 15px; font-weight: 700; transition: .2s; cursor: pointer; text-decoration: none; }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 15px #006b5025; }
    .btn-primary { color: white; background: linear-gradient(110deg, #009a69, #00664f); }
    .hero-features { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
    .feature-badge { display: inline-flex; align-items: center; gap: 8px; font-size: 15px; font-weight: 800; color: #005347; background: rgba(255, 255, 255, 0.92); padding: 6px 16px 6px 6px; border-radius: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
    .badge-num { width: 28px; height: 28px; border-radius: 50%; background: #00845e; color: white; display: grid; place-items: center; font-size: 14px; font-weight: 800; }

    /* AKSES CEPAT */
    .quick-access { position: relative; z-index: 3; margin-top: -38px; padding: 30px 18px 18px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; background: #ffffffed; border: 1px solid white; border-radius: 19px; box-shadow: 0 9px 25px #164e4a0b; }
    .quick-label { position: absolute; left: 24px; top: 10px; padding: 6px 14px; border-radius: 20px; color: #00845e; background: #e4f7ef; font-size: 12px; font-weight: 800; }
    .quick-card { min-width: 0; margin-top: 10px; padding: 14px 18px; min-height: 75px; display: flex; align-items: center; gap: 16px; border: 1px solid #edf3f1; border-radius: 15px; background: linear-gradient(110deg, white, #f9fbfb); box-shadow: 0 3px 10px #164e4a05; text-decoration: none; }
    .quick-icon { flex: 0 0 52px; height: 52px; display: grid; place-items: center; color: white; font-size: 26px; border-radius: 14px; }
    .icon-green { background: linear-gradient(145deg, #3bc78b, #00885f); }
    .icon-blue { background: linear-gradient(145deg, #5b9cff, #1557cb); }
    .icon-purple { background: linear-gradient(145deg, #ba75f4, #7832cb); }
    .quick-card strong { font-size: 15px; margin-bottom: 4px; color: #06484b; display: block; }
    .quick-card small { font-size: 12px; line-height: 1.4; color: var(--muted); display: block; }
    .arrow { margin-left: auto; color: #00634e; font-size: 26px; }

    /* NAVIGASI DEKSTOP */
    .program-nav { position: sticky; top: 86px; z-index: 900; display: flex; align-items: center; gap: 5px; padding: 9px max(calc((100vw - 1350px)/2), 24px); overflow-x: auto; white-space: nowrap; background: rgba(255,255,255,.97); border-bottom: 1px solid #e4eeea; scrollbar-width: thin; }
    .program-nav a { padding: 9px 13px; border-radius: 999px; color: #315f58; font-size: 13px; font-weight: 700; text-decoration: none; }
    .program-nav a:hover { color: #006d50; background: #eaf7f1; }

    /* SECTION KAK 2026 & PROGRAM */
    .kak-section { padding: 38px 0 8px; scroll-margin-top: 145px; }
    .kak-heading { margin: 0 0 18px; }
    .kak-heading h2 { color: #06484b; font: 800 clamp(22px, 2.6vw, 30px)/1.25 'Plus Jakarta Sans', sans-serif; }
    .kak-heading p { margin-top: 8px; max-width: 760px; color: #58777c; font-size: 15px; line-height: 1.65; }
    .kak-cards, .module-list { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
    .kak-card, .module-item { min-width: 0; padding: 22px; background: #fff; border: 1px solid #e6efeb; border-radius: 18px; box-shadow: 0 8px 24px rgba(10,70,58,.055); }
    .kak-icon { width: 48px; height: 48px; margin-bottom: 15px; display: grid; place-items: center; border-radius: 14px; color: #087b5a; background: #e8f6ef; font-size: 20px; font-weight: 800; }
    .kak-card h3 { margin: 0 0 8px; color: #10483f; font: 800 17px 'Plus Jakarta Sans', sans-serif; }
    .kak-card p, .module-item p { color: #58777c; font-size: 14px; line-height: 1.65; }
    .kak-card a { display: inline-block; margin-top: 13px; color: #00845e; font-size: 13px; font-weight: 800; text-decoration: none; }
    .profile-band { display: grid; grid-template-columns: 1.15fr .85fr; gap: 24px; padding: 25px; border-radius: 20px; background: linear-gradient(120deg, #e9f7f1, #f7fbf9); border: 1px solid #dcefe6; }
    .profile-band h3 { margin-bottom: 9px; color: #10483f; font: 800 20px 'Plus Jakarta Sans', sans-serif; }
    .profile-band p { color: #4d706b; font-size: 14px; line-height: 1.7; }
    .profile-points { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
    .profile-point { padding: 13px; border-radius: 13px; background: #fff; }
    .profile-point strong { display: block; color: #087b5a; font-size: 14px; }
    .profile-point small { display: block; margin-top: 4px; color: #66817b; font-size: 12px; line-height: 1.45; }
    .module-item b { display: block; margin-bottom: 7px; color: #10483f; font-size: 15px; }
    .module-meta { margin-top: 11px; color: #07845f; font-size: 12px; font-weight: 800; }
    .kak-two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
    .kak-panel { padding: 22px; background: #fff; border: 1px solid #e6efeb; border-radius: 18px; }
    .kak-panel h3 { margin-bottom: 12px; color: #10483f; font: 800 17px 'Plus Jakarta Sans', sans-serif; }
    .kak-panel p, .kak-panel li { color: #58777c; font-size: 14px; line-height: 1.65; }
    .kak-panel ul { padding-left: 20px; } .kak-panel li { margin: 7px 0; }
    .output-list { display: grid; gap: 10px; }
    .output-row { display: flex; gap: 12px; align-items: flex-start; padding: 12px; border-radius: 12px; background: #f5faf7; }
    .output-number { flex: 0 0 30px; height: 30px; display: grid; place-items: center; border-radius: 99px; color: #087b5a; background: #dff3e9; font-weight: 800; }
    .output-row strong { display: block; color: #10483f; font-size: 14px; }
    .output-row small { display: block; margin-top: 3px; color: #68827c; font-size: 13px; line-height: 1.5; }
    .info-empty { padding: 18px; border: 1px dashed #c9ded5; border-radius: 12px; color: #66817b; background: #f8fcfa; font-size: 14px; line-height: 1.6; }

    /* PROGRAM UNGGULAN & PROMO APLIKASI */
    .program { padding-top: 36px; }
    .section-heading { display: flex; justify-content: space-between; align-items: flex-end; gap: 16px; margin: 0 8px 18px; }
    .section-heading h2 { font: 800 clamp(20px, 2.5vw, 26px) 'Plus Jakarta Sans', sans-serif; color: #06484b; }
    .section-link { color: #007b57; font-size: 13px; font-weight: 700; white-space: nowrap; text-decoration: none; }
    .program-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
    .program-card { position: relative; display: flex; align-items: flex-start; gap: 18px; min-height: 140px; padding: 22px 20px; border: 1px solid #edf3f1; border-radius: 18px; background: white; box-shadow: 0 5px 16px #194c4508; }
    .program-icon { width: 64px; height: 64px; flex: 0 0 64px; display: grid; place-items: center; color: white; border-radius: 50%; font-size: 30px; background: linear-gradient(135deg, #00885f, #005347); }
    .program-card h3 { font-size: 16px; font-weight: 800; color: #06484b; margin: 2px 0 8px; }
    .program-card p { color: #416a73; font-size: 13px; line-height: 1.6; margin-bottom: 12px; }
    .program-list { list-style: none; padding: 0; margin: 0 0 12px 0; }
    .program-list li { position: relative; padding-left: 14px; font-size: 12px; line-height: 1.5; color: #416a73; margin-bottom: 4px; }
    .program-list li::before { content: "•"; position: absolute; left: 0; color: #00885f; font-weight: bold; }
    .p-card-arrow { color: #007e59; font-size: 18px; font-weight: bold; margin-top: auto; display: inline-block; text-decoration: none; }

    /* PROMO APLIKASI TERPERBAIKI DENGAN RAPI */
    .app-promo { margin-top: 30px; padding: 28px; min-height: 200px; display: grid; grid-template-columns: 1.1fr 1.2fr 1fr .9fr; align-items: center; gap: 24px; border-radius: 16px; background: linear-gradient(105deg, #e9f8f4, #f2fbf9 48%, #e7f6f2); border: 1px solid #d4eae3; }
    .phone-art { min-height: 180px; position: relative; align-self: end; }
    .phone { position: absolute; bottom: -37px; width: 115px; height: 185px; padding: 27px 9px 10px; display: flex; flex-direction: column; gap: 9px; color: #164f4d; background: white; border: 5px solid #132e2d; border-radius: 22px; box-shadow: 0 5px 10px #183d392b; font-size: 9px; }
    .phone-one { left: 3%; transform: rotate(-9deg); }
    .phone-two { left: 32%; bottom: -24px; height: 200px; z-index: 1; }
    .phone-three { left: 60%; transform: rotate(9deg); }
    .phone-notch { position: absolute; top: 5px; left: 30%; width: 40%; height: 5px; background: #132e2d; border-radius: 10px; }
    .phone strong { color: #00855c; font-size: 13px; }
    .phone small { color: #6d8b8b; }
    .fake-lines { height: 35px; margin-top: 4px; background: repeating-linear-gradient(to bottom, #e6f0ed 0 3px, transparent 3px 9px); }
    .qr { width: 57px; height: 57px; align-self: center; margin: 4px; background: repeating-conic-gradient(#103e39 0 25%, white 0 50%) 0 / 8px 8px; border: 5px solid white; }
    .app-copy h2 { font: 800 24px 'Plus Jakarta Sans', sans-serif; margin-bottom: 4px; color: #06484b; }
    .app-copy h2 span { color: #078a5c; }
    .app-copy h3 { font: 700 17px 'Plus Jakarta Sans', sans-serif; margin-bottom: 12px; color: #08715b; }
    .app-copy p { color: #37676b; font-size: 13px; line-height: 1.6; margin-bottom: 14px; }
    .feature-list { display: grid; gap: 12px; padding-left: 20px; border-left: 1px solid #d3eae3; }
    .feature { display: flex; align-items: center; gap: 12px; }
    .feature-icon { flex: 0 0 30px; width: 30px; height: 30px; display: grid; place-items: center; border-radius: 9px; color: white; background: #078c69; font-size: 14px; }
    .feature strong { font-size: 13px; margin-bottom: 2px; color: #06484b; display: block; }
    .feature small { color: #59817e; font-size: 11px; display: block; }

    /* RAPIKAN SEKSI SCAN QR APK */
    .app-download { display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center; gap: 10px; border-left: 1px solid #d3eae3; padding-left: 16px; width: 100%; }
    .qr-download-card { background: #ffffff; padding: 14px; border-radius: 14px; box-shadow: 0 4px 15px rgba(0, 84, 73, 0.08); border: 1px solid #dcefe8; display: flex; flex-direction: column; align-items: center; gap: 8px; width: 100%; max-width: 170px; }
    #qr-apk { width: 130px; height: 130px; display: flex; justify-content: center; align-items: center; }
    #qr-apk img { border-radius: 6px; }
    .qr-download-card strong { display: block; font-size: 12px; font-weight: 800; color: #06484b; line-height: 1.3; }
    .qr-download-card small { display: block; color: #59817e; font-size: 11px; font-weight: 600; line-height: 1.2; }

    /* DIREKTORI & BERITA (DIBUAT 2 KOLOM SEIMBANG) */
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 28px; }
    .info-card { min-width: 0; min-height: 160px; padding: 22px; background: white; border: 1px solid #eef4f2; border-radius: 16px; box-shadow: 0 5px 18px #1c55500a; display: flex; flex-direction: column; justify-content: space-between; }
    .info-card h3 { font-size: 17px; font-weight: 800; margin-bottom: 6px; color: #06484b; }
    .info-card p { color: #5a7c80; font-size: 13px; line-height: 1.5; margin-bottom: 12px; }
    .info-title { display: flex; justify-content: space-between; gap: 10px; }
    .market-thumb { flex: 0 0 auto; width: 80px; height: 50px; border-radius: 8px; background: url("{{ asset('images/hero-market.jpg') }}") center / cover; }
    .search-form { display: flex; height: 46px; border: 1px solid #d4e7df; border-radius: 12px; background: #fff; box-shadow: 0 4px 14px rgba(13,83,62,.05); overflow: hidden; margin-top: 8px; }
    .search-form input { width: 100%; min-width: 0; padding: 0 14px; border: 0; outline: 0; background: #fbfdfd; font: 14px 'DM Sans', sans-serif; color: #164e45; }
    .search-form button { flex: 0 0 48px; border: 0; color: white; background: #007c59; font-size: 21px; cursor: pointer; }
    .small-link { display: block; margin-top: 10px; text-align: right; color: #007b57; font-size: 12px; font-weight: 700; text-decoration: none; }
    .search-result { margin-top: 6px; color: #007b57; font-size: 13px; min-height: 18px; }

    /* MEDIA QUERIES RESPONSIVE (TABLET & HP) */
    @media(max-width: 1050px) {
        .container { width: calc(100% - 32px); }
        .quick-access { grid-template-columns: 1fr; }
        .program-grid, .app-promo, .info-grid, .kak-cards, .module-list { grid-template-columns: 1fr; }
        .feature-list, .app-download { border-left: none; padding-left: 0; border-top: 1px solid #d3eae3; padding-top: 16px; }
        .app-download { border-top: 1px solid #d3eae3; }
    }

    @media (max-width: 850px) {
        .menu-toggle { display: flex; }
        .program-nav { display: none; } /* Navigasi dipindah ke menu hamburger */

        /* Nav-actions diubah jadi menu overlay HP */
        .nav-actions {
            position: fixed;
            top: 86px;
            right: -100%;
            width: 280px;
            height: calc(100vh - 86px);
            background: #ffffff;
            flex-direction: column;
            align-items: stretch;
            padding: 24px 20px;
            gap: 16px;
            box-shadow: -8px 10px 25px rgba(0,0,0,0.15);
            transition: right 0.3s ease;
            z-index: 999;
            overflow-y: auto;
        }
        .nav-actions.active {
            right: 0;
        }

        /* Navigasi Link HP di dalam Hamburger */
        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border-bottom: 1px solid #e5efe9;
            padding-bottom: 16px;
            margin-bottom: 8px;
        }
        .mobile-nav-links a {
            padding: 10px 14px;
            border-radius: 8px;
            color: #073f45;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }
        .mobile-nav-links a:hover {
            background: #eaf7f1;
            color: #00845e;
        }

        .mobile-action-group {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .mobile-action-group .lang-group {
            justify-content: center;
            width: 100%;
        }
        .mobile-action-group .lang-btn {
            flex: 1;
            text-align: center;
            padding: 8px 0;
        }
        .btn-admin-header {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<!-- TOOLBAR DESKTOP NAVIGASI HALAMAN -->
<nav class="program-nav" aria-label="Navigasi informasi digitalisasi pasar">
    <a href="#beranda" data-id="Beranda" data-en="Home">Beranda</a>
    <a href="#profil-pasar" data-id="Profil Pasar" data-en="Market Profile">Profil Pasar</a>
    <a href="#program-2026" data-id="Program 2026" data-en="2026 Program">Program 2026</a>
    <a href="#pelatihan-2026" data-id="Pelatihan" data-en="Training">Pelatihan</a>
    <a href="#monitoring-2026" data-id="Monitoring" data-en="Monitoring">Monitoring</a>
    <a href="#laporan-2026" data-id="Laporan" data-en="Reports">Laporan</a>
    <a href="#berita" data-id="Berita" data-en="News">Berita</a>
</nav>

<main>
    <!-- HERO UTAMA (BACKGROUND GAMBAR & OVERLAY RAPI) -->
    <section class="hero" id="beranda">
        <div class="hero-content">
            <p class="eyebrow" data-id="DIGITALISASI PASAR" data-en="MARKET DIGITALIZATION">DIGITALISASI PASAR</p>
            <h1>Simpul <span>SAE</span></h1>
            <h2 data-id="Pasar Induk Among Tani" data-en="Among Tani Central Market">Pasar Induk Among Tani</h2>
            <p class="hero-description" data-id="Sistem informasi retribusi pasar yang terintegrasi untuk mewujudkan pasar yang tertib, transparan, dan modern. Bersama kita dukung digitalisasi Pasar Induk Among Tani Kota Batu." data-en="An integrated market retribution information system to realize an orderly, transparent, and modern market. Together we support the digitalization of Batu City Among Tani Central Market.">
                Sistem informasi retribusi pasar yang terintegrasi untuk mewujudkan pasar yang tertib, transparan, dan modern. Bersama kita dukung digitalisasi Pasar Induk Among Tani Kota Batu.
            </p>
            <div class="hero-buttons">
                
                <div class="hero-features">
                    <span class="feature-badge"><span class="badge-num">1</span> SMART</span>
                    <span class="feature-badge"><span class="badge-num">2</span> <span data-id="AKURAT" data-en="ACCURATE">AKURAT</span></span>
                    <span class="feature-badge"><span class="badge-num">3</span> <span data-id="EFISIEN" data-en="EFFICIENT">EFISIEN</span></span>
                </div>
            </div>
        </div>
    </section>

    <!-- AKSES CEPAT -->
    <section class="quick-access container">
        <span class="quick-label" data-id="AKSES CEPAT" data-en="QUICK ACCESS">AKSES CEPAT</span>
        <a href="{{ url('/login?role=pedagang') }}" class="quick-card">
            <span class="quick-icon icon-green">♙</span>
            <span>
                <strong data-id="Login Pedagang" data-en="Merchant Login">Login Pedagang</strong>
                <small data-id="Cek tagihan & lakukan pembayaran" data-en="Check bills & make payments">Cek tagihan &amp; lakukan pembayaran</small>
            </span>
            <span class="arrow">›</span>
        </a>
        <a href="{{ url('/login?role=petugas') }}" class="quick-card">
            <span class="quick-icon icon-blue">♜</span>
            <span>
                <strong data-id="Login Petugas" data-en="Officer Login">Login Petugas</strong>
                <small data-id="Pencatatan pembayaran & layanan" data-en="Payment recording & services">Pencatatan pembayaran &amp; layanan</small>
            </span>
            <span class="arrow">›</span>
        </a>
        <a href="https://retribusi.simpulsae.id/auth" class="quick-card">
    <span class="quick-icon icon-purple">⚙</span>
    <span>
        <strong>Login Admin</strong>
        <small>Kelola data dan laporan</small>
    </span>
    <span class="arrow">›</span>
</a>
    </section>

    <!-- PROFIL SINGKAT PASAR -->
    <section class="kak-section container" id="profil-pasar">
        <div class="kak-heading">
            <p class="eyebrow" data-id="PROFIL SINGKAT" data-en="BRIEF PROFILE">PROFIL SINGKAT</p>
            <h2 data-id="Pasar Induk Among Tani Kota Batu" data-en="Batu City Among Tani Central Market">Pasar Induk Among Tani Kota Batu</h2>
            <p data-id="Portal informasi dan layanan digital Pasar Induk Among Tani. Pada Tahun Anggaran 2026, penguatan diarahkan pada peningkatan kapasitas SDM, optimalisasi E-Retribusi, serta pengelolaan kanal informasi digital pasar." data-en="Information portal and digital services of Among Tani Central Market. In Fiscal Year 2026, strengthening is directed towards increasing HR capacity, optimizing E-Retribution, and managing digital market information channels.">Portal informasi dan layanan digital Pasar Induk Among Tani. Pada Tahun Anggaran 2026, penguatan diarahkan pada peningkatan kapasitas SDM, optimalisasi E-Retribusi, serta pengelolaan kanal informasi digital pasar.</p>
        </div>
        <div class="profile-band">
            <div>
                <h3 data-id="Transformasi Digital Pasar — Tahap II" data-en="Market Digitalization Transformation — Phase II">Transformasi Digital Pasar — Tahap II</h3>
                <p data-id="Program ini mendukung petugas penarik E-Retribusi, pengelola UPT, dan perwakilan pedagang agar semakin siap memanfaatkan layanan digital secara tertib, tepat, dan berkelanjutan." data-en="This program supports E-Retribution collectors, UPT managers, and merchant representatives to be more prepared to utilize digital services in an orderly, precise, and sustainable manner.">Program ini mendukung petugas penarik E-Retribusi, pengelola UPT, dan perwakilan pedagang agar semakin siap memanfaatkan layanan digital secara tertib, tepat, dan berkelanjutan.</p>
            </div>
            <div class="profile-points">
                <div class="profile-point"><strong>35 <span data-id="Hari Kerja" data-en="Working Days">Hari Kerja</span></strong><small data-id="Jangka waktu pelaksanaan sesuai KAK 2026" data-en="Implementation period according to 2026 TOR">Jangka waktu pelaksanaan sesuai KAK 2026</small></div>
                <div class="profile-point"><strong>Pasar Induk Among Tani</strong><small data-id="Lokasi pelaksanaan kegiatan" data-en="Activity implementation location">Lokasi pelaksanaan kegiatan</small></div>
                <div class="profile-point"><strong data-id="Penguatan SDM" data-en="HR Capacity Building">Penguatan SDM</strong><small data-id="Bimtek dan pendampingan lapangan" data-en="Technical guidance and field mentoring">Bimtek dan pendampingan lapangan</small></div>
                <div class="profile-point"><strong data-id="Integrasi Digital" data-en="Digital Integration">Integrasi Digital</strong><small>Simpul SAE, Website Simpul SAE, &amp; @pasarbatu.id</small></div>
            </div>
        </div>
    </section>

    <!-- PROGRAM DIGITALISASI SESUAI KAK 2026 -->
    <section class="kak-section container" id="program-2026">
        <div class="kak-heading">
            <p class="eyebrow" data-id="FOKUS KEGIATAN • TAHUN 2026" data-en="ACTIVITY FOCUS • 2026">FOKUS KEGIATAN • TAHUN 2026</p>
            <h2 data-id="Program Digitalisasi Pasar Tahap II" data-en="Market Digitalization Program Phase II">Program Digitalisasi Pasar Tahap II</h2>
            <p data-id="Tiga fokus utama pengembangan dan pendampingan sesuai Kerangka Acuan Kerja Digitalisasi Pasar Induk Among Tani Tahun 2026." data-en="Three main focuses of development and mentoring according to the Terms of Reference for Among Tani Central Market Digitalization 2026.">Tiga fokus utama pengembangan dan pendampingan sesuai Kerangka Acuan Kerja Digitalisasi Pasar Induk Among Tani Tahun 2026.</p>
        </div>
        <div class="kak-cards">
            <article class="kak-card">
                <div class="kak-icon">▣</div>
                <h3 data-id="Optimalisasi E-Retribusi Simpul SAE" data-en="Simpul SAE E-Retribution Optimization">Optimalisasi E-Retribusi Simpul SAE</h3>
                <p data-id="Pelatihan operasional aplikasi, pencatatan transaksi secara real-time, serta penanganan dan mitigasi kendala sistem bagi petugas penarik retribusi." data-en="Application operational training, real-time transaction recording, and system issue handling and mitigation for retribution collectors.">Pelatihan operasional aplikasi, pencatatan transaksi secara real-time, serta penanganan dan mitigasi kendala sistem bagi petugas penarik retribusi.</p>
                <a href="#pelatihan-2026" data-id="Lihat materi pelatihan →" data-en="View training materials →">Lihat materi pelatihan →</a>
            </article>
            <article class="kak-card">
                <div class="kak-icon">▤</div>
                <h3 data-id="Pengembangan Website Simpul SAE" data-en="UPT Website Development">Pengembangan Website Simpul SAE</h3>
                <p data-id="Penyusunan arsitektur informasi, pengembangan kanal informasi UPT, dan pendampingan tata kelola konten website pasar." data-en="Information architecture compilation, UPT information channel development, and market website content governance mentoring.">Penyusunan arsitektur informasi, pengembangan kanal informasi UPT, dan pendampingan tata kelola konten website pasar.</p>
                <a href="#website-upt" data-id="Lihat arah pengembangan →" data-en="View development direction →">Lihat arah pengembangan →</a>
            </article>
            <article class="kak-card">
                <div class="kak-icon">◎</div>
                <h3 data-id="Pengelolaan Media Sosial" data-en="Social Media Management">Pengelolaan Media Sosial</h3>
                <p data-id="Penguatan strategi konten, branding, dan tata kelola akun media sosial resmi pasar @pasarbatu.id." data-en="Content strategy strengthening, branding, and governance of the official market social media account @pasarbatu.id.">Penguatan strategi konten, branding, dan tata kelola akun media sosial resmi pasar @pasarbatu.id.</p>
                <a href="#media-sosial" data-id="Lihat pengelolaan kanal →" data-en="View channel management →">Lihat pengelolaan kanal →</a>
            </article>
        </div>
    </section>

    <!-- PELATIHAN DAN PENDAMPINGAN -->
    <section class="kak-section container" id="pelatihan-2026">
        <div class="kak-heading">
            <p class="eyebrow" data-id="PENGUATAN KAPASITAS SDM" data-en="HR CAPACITY BUILDING">PENGUATAN KAPASITAS SDM</p>
            <h2 data-id="Pelatihan & Pendampingan" data-en="Training & Mentoring">Pelatihan &amp; Pendampingan</h2>
            <p data-id="Bimbingan teknis terstruktur dan coaching clinic langsung di lapangan bagi petugas penarik E-Retribusi, pengelola UPT Pasar, serta perwakilan pedagang." data-en="Structured technical guidance and field coaching clinic for E-Retribution collectors, Market UPT managers, and merchant representatives.">Bimbingan teknis terstruktur dan coaching clinic langsung di lapangan bagi petugas penarik E-Retribusi, pengelola UPT Pasar, serta perwakilan pedagang.</p>
        </div>
        <div class="module-list">
            <article class="module-item">
                <b data-id="01. Operasional Simpul SAE" data-en="01. Simpul SAE Operations">01. Operasional Simpul SAE</b>
                <p data-id="Pengoperasian aplikasi Simpul SAE, alur pencatatan transaksi, dan troubleshooting kendala aplikasi." data-en="Operation of Simpul SAE web application, transaction recording workflow, and application troubleshooting.">Pengoperasian aplikasi Simpul SAE, alur pencatatan transaksi, dan troubleshooting kendala aplikasi.</p>
                <div class="module-meta">MODUL BIMTEK 1</div>
            </article>
            <article class="module-item" id="website-Simpul SAE">
                <b data-id="02. Website Simpul SAE & Branding Digital" data-en="02. Simpul SAE Website & Digital Branding">02. Website Simpul SAE &amp; Branding Digital</b>
                <p data-id="Arsitektur informasi Website Simpul SAE, strategi konten, dan pengelolaan identitas digital @pasarbatu.id." data-en="UPT Website information architecture, content strategy, and @pasarbatu.id digital identity management.">Arsitektur informasi Website Simpul SAE, strategi konten, dan pengelolaan identitas digital @pasarbatu.id.</p>
                <div class="module-meta">MODUL BIMTEK 2</div>
            </article>
            <article class="module-item" id="media-sosial">
                <b data-id="03. Transaksi Non-Tunai & Rekonsiliasi" data-en="03. Non-Cash Transactions & Reconciliation">03. Transaksi Non-Tunai &amp; Rekonsiliasi</b>
                <p data-id="Pemahaman transaksi non-tunai dan rekonsiliasi data retribusi untuk mendukung pencatatan yang tertib." data-en="Understanding non-cash transactions and retribution data reconciliation to support orderly recording.">Pemahaman transaksi non-tunai dan rekonsiliasi data retribusi untuk mendukung pencatatan yang tertib.</p>
                <div class="module-meta">MODUL BIMTEK 3</div>
            </article>
        </div>
    </section>

    <!-- MONITORING DAN EVALUASI -->
    <section class="kak-section container" id="monitoring-2026">
        <div class="kak-heading">
            <p class="eyebrow" data-id="PEMANTAUAN PELAKSANAAN" data-en="IMPLEMENTATION MONITORING">PEMANTAUAN PELAKSANAAN</p>
            <h2 data-id="Monitoring & Evaluasi" data-en="Monitoring & Evaluation">Monitoring &amp; Evaluasi</h2>
            <p data-id="Pemantauan pelaksanaan pendampingan. Data capaian dan hasil evaluasi ditampilkan setelah diinput oleh pengelola program." data-en="Monitoring of mentoring implementation for 35 working days. Achievement data and evaluation results are displayed after being entered by the program manager.">Pemantauan pelaksanaan pendampingan selama 35 hari kerja. Data capaian dan hasil evaluasi ditampilkan setelah diinput oleh pengelola program.</p>
        </div>
        <div class="kak-two-col">
            <div class="kak-panel">
                <h3 data-id="Aspek yang Dipantau" data-en="Monitored Aspects">Aspek yang Dipantau</h3>
                <ul>
                    <li data-id="Kompetensi petugas dalam mengoperasikan Simpul SAE." data-en="Officers' competence in operating Simpul SAE.">Kompetensi petugas dalam mengoperasikan Simpul SAE.</li>
                    <li data-id="Ketertiban pencatatan transaksi E-Retribusi." data-en="Orderliness of E-Retribution transaction recording.">Ketertiban pencatatan transaksi E-Retribusi.</li>
                    <li data-id="Perkembangan Website Simpul SAE dan pengelolaan @pasarbatu.id." data-en="Simpul SAE Website development and @pasarbatu.id management.">Perkembangan Website Simpul SAE dan pengelolaan @pasarbatu.id.</li>
                    <li data-id="Partisipasi peserta dalam Bimtek dan pendampingan lapangan." data-en="Participants' participation in Technical Guidance and field mentoring.">Partisipasi peserta dalam Bimtek dan pendampingan lapangan.</li>
                    <li data-id="Kendala pelaksanaan dan tindak lanjut perbaikannya." data-en="Implementation obstacles and follow-up improvements.">Kendala pelaksanaan dan tindak lanjut perbaikannya.</li>
                </ul>
            </div>
            <div class="kak-panel">
                <h3 data-id="Ringkasan Progres" data-en="Progress Summary">Ringkasan Progres</h3>
                <div class="output-list">
                    <div class="output-row">
                        <span class="output-number">1</span>
                        <div>
                            <strong data-id="Pelaksanaan Bimtek" data-en="Technical Guidance Execution">Pelaksanaan Bimtek</strong>
                            <small data-id="Status dan dokumentasi diisi oleh pengelola kegiatan." data-en="Status and documentation filled by activity manager.">Status dan dokumentasi diisi oleh pengelola kegiatan.</small>
                        </div>
                    </div>
                    <div class="output-row">
                        <span class="output-number">2</span>
                        <div>
                            <strong data-id="Pendampingan Lapangan" data-en="Field Mentoring">Pendampingan Lapangan</strong>
                            <small data-id="Catatan pendampingan dan kendala dicatat secara berkala." data-en="Mentoring notes and issues are recorded periodically.">Catatan pendampingan dan kendala dicatat secara berkala.</small>
                        </div>
                    </div>
                    <div class="output-row">
                        <span class="output-number">3</span>
                        <div>
                            <strong data-id="Evaluasi Adopsi Digital" data-en="Digital Adoption Evaluation">Evaluasi Adopsi Digital</strong>
                            <small data-id="Hasil evaluasi kepatuhan retribusi digital dilaporkan sesuai data." data-en="Digital retribution compliance evaluation results are reported accordingly.">Hasil evaluasi kepatuhan retribusi digital dilaporkan sesuai data.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LAPORAN DAN DOKUMENTASI -->
    <section class="kak-section container" id="laporan-2026">
        <div class="kak-heading">
            <p class="eyebrow" data-id="KELUARAN KEGIATAN" data-en="ACTIVITY OUTPUTS">KELUARAN KEGIATAN</p>
            <h2 data-id="Laporan & Dokumentasi" data-en="Reports & Documentation">Laporan &amp; Dokumentasi</h2>
            <p data-id="Dokumen pelaksanaan disusun bertahap sebagai bahan evaluasi dan rekomendasi bagi Diskumperindag Kota Batu." data-en="Implementation documents are prepared in stages as evaluation and recommendation materials for Batu City Diskumperindag.">Dokumen pelaksanaan disusun bertahap sebagai bahan evaluasi dan rekomendasi bagi Diskumperindag Kota Batu.</p>
        </div>
        <div class="kak-cards">
            <article class="kak-card">
                <div class="kak-icon">01</div>
                <h3 data-id="Laporan Pendahuluan" data-en="Preliminary Report">Laporan Pendahuluan</h3>
                <p data-id="Rencana kerja 35 hari kerja, jadwal Bimtek Simpul SAE, dan konsep awal Website Simpul SAE." data-en="35-day work plan, Simpul SAE Technical Guidance schedule, and initial UPT Website concept.">Rencana kerja 35 hari kerja, jadwal Bimtek Simpul SAE, dan konsep awal Website Simpul SAE.</p>
            </article>
            <article class="kak-card">
                <div class="kak-icon">02</div>
                <h3 data-id="Laporan Antara" data-en="Interim Report">Laporan Antara</h3>
                <p data-id="Progres Bimtek, hasil evaluasi awal Simpul SAE, dan perkembangan Website Simpul SAE." data-en="Technical Guidance progress, initial Simpul SAE evaluation results, and UPT Website development.">Progres Bimtek, hasil evaluasi awal Simpul SAE, dan perkembangan Website Simpul SAE.</p>
            </article>
            <article class="kak-card">
                <div class="kak-icon">03</div>
                <h3 data-id="Laporan Akhir" data-en="Final Report">Laporan Akhir</h3>
                <p data-id="Evaluasi adopsi E-Retribusi, integrasi @pasarbatu.id dan Website Simpul SAE, serta rekomendasi." data-en="E-Retribution adoption evaluation, @pasarbatu.id and UPT Website integration, and recommendations.">Evaluasi adopsi E-Retribusi, integrasi @pasarbatu.id dan Website Simpul SAE, serta rekomendasi.</p>
            </article>
        </div>
    </section>

    <!-- PROGRAM UNGGULAN -->
    <section class="program container" id="program">
        <div class="section-heading">
            <div>
                <p class="eyebrow" data-id="PROGRAM UNGGULAN" data-en="FEATURED PROGRAMS">PROGRAM UNGGULAN</p>
                <h2 data-id="Solusi Digital untuk Pasar yang Lebih Baik" data-en="Digital Solutions for a Better Market">Solusi Digital untuk Pasar yang Lebih Baik</h2>
            </div>
            <a href="#aplikasi" class="section-link" data-id="Lihat Semua Program →" data-en="View All Programs →">Lihat Semua Program →</a>
        </div>

        <div class="program-grid">
            <article class="program-card">
                <span class="program-icon">📱</span>
                <div>
                    <h3 data-id="Aplikasi Simpul SAE" data-en="Simpul SAE App">Aplikasi Simpul SAE</h3>
                    <p data-id="Aplikasi sistem informasi terintegrasi untuk mengotomatisasi berbagai aspek pengelolaan pasar: perizinan, pedagang, lapak/kios, dan pengumpulan retribusi." data-en="Integrated information system application to automate various aspects of market management: licensing, merchants, stalls/kiosks, and retribution collection.">
                        Aplikasi sistem informasi terintegrasi untuk mengotomatisasi berbagai aspek pengelolaan pasar: perizinan, pedagang, lapak/kios, dan pengumpulan retribusi.
                    </p>
                    <a href="#aplikasi" class="p-card-arrow">›</a>
                </div>
            </article>

            <article class="program-card">
                <span class="program-icon">📢</span>
                <div>
                    <h3 data-id="Digital Marketing" data-en="Digital Marketing">Digital Marketing</h3>
                    <ul class="program-list">
                        <li data-id="Memanfaatkan Saluran Digital" data-en="Leveraging Digital Channels">Memanfaatkan Saluran Digital</li>
                        <li data-id="Target yang Terukur" data-en="Measurable Targeting">Target yang Terukur</li>
                        <li data-id="Interaktif & Data-Driven" data-en="Interactive & Data-Driven">Interaktif &amp; Data-Driven</li>
                        <li data-id="Jangkauan Luas" data-en="Wide Reach">Jangkauan Luas</li>
                        <li data-id="Peningkatan Reputasi Brand" data-en="Brand Reputation Enhancement">Peningkatan Reputasi Brand</li>
                    </ul>
                    <a href="#berita" class="p-card-arrow">›</a>
                </div>
            </article>

            <article class="program-card">
                <span class="program-icon">🎪</span>
                <div>
                    <h3 data-id="Pasar Kreatif SAE" data-en="SAE Creative Market">Pasar Kreatif SAE</h3>
                    <ul class="program-list">
                        <li data-id="Event Offline/Online: bazar kuliner, pameran produk khas, musik" data-en="Offline/Online events: culinary bazaar, local product exhibition, music">Event Offline/Online: bazar kuliner, pameran produk khas, musik</li>
                        <li data-id="Pasar Virtual & Live Streaming" data-en="Virtual Market & Live Streaming">Pasar Virtual &amp; Live Streaming</li>
                        <li data-id="Kolaborasi influencer lokal" data-en="Local influencer collaboration">Kolaborasi influencer lokal</li>
                        <li>Hashtag: <b>#pasarbatu</b></li>
                    </ul>
                    <a href="#tenant" class="p-card-arrow">›</a>
                </div>
            </article>
        </div>
    </section>

    <!-- PROMOSI APLIKASI (DISUSUN RAPI TERMASUK QR SCAN APK) -->
    <section class="app-promo container" id="aplikasi">
        <div class="phone-art">
            <div class="phone phone-one">
                <div class="phone-notch"></div>
                <b data-id="Tagihan Retribusi" data-en="Retribution Bill">Tagihan Retribusi</b>
                <small data-id="Total Tagihan" data-en="Total Bill">Total Tagihan</small>
                <strong>Rp 150.000</strong>
                <span data-id="Bayar Sekarang" data-en="Pay Now">Bayar Sekarang</span>
                <div class="fake-lines"></div>
            </div>
            <div class="phone phone-two">
                <div class="phone-notch"></div>
                <b>Scan QRIS</b>
                <div class="qr"></div>
                <small data-id="Scan untuk membayar" data-en="Scan to pay">Scan untuk membayar</small>
            </div>
            <div class="phone phone-three">
                <div class="phone-notch"></div>
                <b data-id="Riwayat Pembayaran" data-en="Payment History">Riwayat Pembayaran</b>
                <strong>Rp 100.000</strong>
                <div class="fake-lines"></div>
            </div>
        </div>

        <div class="app-copy">
            <h2>Aplikasi <span>Simpul SAE</span></h2>
            <h3 data-id="Dalam Genggaman Anda" data-en="In Your Hands">Dalam Genggaman Anda</h3>
            <p data-id="Kelola tagihan retribusi, lakukan pembayaran melalui tunai atau digital, dan pantau riwayat transaksi dengan mudah. Aplikasi tersedia untuk Android." data-en="Manage retribution bills, make cash or digital payments, and monitor transaction history easily. The app is available for Android.">
                Kelola tagihan retribusi, lakukan pembayaran melalui tunai atau digital, dan pantau riwayat transaksi dengan mudah. Aplikasi tersedia untuk Android.
            </p>
            <a href="{{ asset('downloads/simpul-sae-app.apk') }}" class="btn btn-primary" aria-label="Unduh APK Resmi Simpul SAE">
                ↓ &nbsp; <span data-id="Unduh APK Resmi" data-en="Download Official APK">Unduh APK Resmi</span>
            </a>
        </div>

        <div class="feature-list">
            <div class="feature">
                <span class="feature-icon">▣</span>
                <p>
                    <strong data-id="Cek Tagihan Retribusi" data-en="Check Retribution Bills">Cek Tagihan Retribusi</strong>
                    <small data-id="Semua jenis retribusi dalam satu aplikasi" data-en="All types of retributions in one app">Semua jenis retribusi dalam satu aplikasi</small>
                </p>
            </div>
            <div class="feature">
                <span class="feature-icon">▤</span>
                <p>
                    <strong data-id="Pembayaran Mudah" data-en="Easy Payment">Pembayaran Mudah</strong>
                    <small data-id="Tunai di loket atau QRIS / transfer" data-en="Cash at counter or QRIS / transfer">Tunai di loket atau QRIS / transfer</small>
                </p>
            </div>
            <div class="feature">
                <span class="feature-icon">◷</span>
                <p>
                    <strong data-id="Riwayat Transaksi" data-en="Transaction History">Riwayat Transaksi</strong>
                    <small data-id="Lengkap dan transparan" data-en="Complete and transparent">Lengkap dan transparan</small>
                </p>
            </div>
            <div class="feature">
                <span class="feature-icon">♧</span>
                <p>
                    <strong data-id="Notifikasi & Pengingat" data-en="Notifications & Reminders">Notifikasi &amp; Pengingat</strong>
                    <small data-id="Jangan lewat masa jatuh tempo" data-en="Don't miss the due date">Jangan lewat masa jatuh tempo</small>
                </p>
            </div>
        </div>

        <!-- SCAN QR DOWNLOAD APK RAPI -->
        <div class="app-download">
            <div class="qr-download-card">
                <div id="qr-apk"></div>
                <strong data-id="Scan untuk Download APK" data-en="Scan to Download APK">Scan untuk Download APK</strong>
                <small data-id="Arahkan kamera HP ke QR Code" data-en="Point mobile camera to QR Code">Arahkan kamera HP ke QR Code</small>
            </div>
        </div>
    </section>

    <!-- INFORMASI BAWAH (2 KOLOM SEIMBANG: TENANT & BERITA) -->
    <section class="info-grid container">
        <!-- DIREKTORI TENANT -->
        <article class="info-card" id="tenant">
            <div>
                <div class="info-title">
                    <div>
                        <h3 data-id="Direktori Tenant" data-en="Tenant Directory">Direktori Tenant</h3>
                        <p data-id="Temukan pedagang dan kios di Pasar Induk Among Tani." data-en="Find merchants and kiosks in Among Tani Central Market.">Temukan pedagang dan kios di Pasar Induk Among Tani.</p>
                    </div>
                    <div class="market-thumb"></div>
                </div>
                <form class="search-form" id="tenantSearch">
                    <input type="text" id="tenantInput" aria-label="Cari tenant">
                    <button type="submit" aria-label="Cari">⌕</button>
                </form>
                <p class="search-result" id="searchResult"></p>
            </div>
            <a href="#tenant" class="small-link" data-id="Lihat Semua Tenant →" data-en="View All Tenants →">Lihat Semua Tenant →</a>
        </article>

        <!-- BERITA & PENGUMUMAN -->
        <article class="info-card" id="berita">
            <div>
                <div class="info-title">
                    <div>
                        <h3 data-id="Berita & Pengumuman" data-en="News & Announcements">Berita &amp; Pengumuman</h3>
                        <p data-id="Informasi terbaru seputar pasar dan program Simpul SAE." data-en="Latest information regarding the market and Simpul SAE program.">Informasi terbaru seputar pasar dan program Simpul SAE.</p>
                    </div>
                </div>
                <div class="info-empty" data-id="Informasi kegiatan, pengumuman, dan berita terbaru Pasar Induk Among Tani akan ditampilkan di bagian ini setelah dipublikasikan oleh pengelola." data-en="Activity information, announcements, and latest news of Among Tani Central Market will be displayed in this section after being published by the manager.">
                    Informasi kegiatan, pengumuman, dan berita terbaru Pasar Induk Among Tani akan ditampilkan di bagian ini setelah dipublikasikan oleh pengelola.
                </div>
            </div>
            <a href="#berita" class="small-link" data-id="Lihat Semua Berita →" data-en="View All News →">Lihat Semua Berita →</a>
        </article>
    </section>
</main>
@endsection

@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // 1. GENERATE QR CODE APK DOWNLOAD
    const qrArea = document.getElementById("qr-apk");
    if (qrArea) {
        const linkAPK = "{{ url('/downloads/simpul-sae-app.apk') }}";
        new QRCode(qrArea, {
            text: linkAPK,
            width: 120,
            height: 120,
            colorDark: "#003d32",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }

    // 2. ANIMASI MENGETIK PLACEHOLDER PADA PENCARIAN TENANT
    const tenantInput = document.getElementById('tenantInput');
    const tenantForm = document.getElementById('tenantSearch');
    const searchResult = document.getElementById('searchResult');

    if (tenantInput) {
        const prompts = [
            'Cari nama pedagang...',
            'Cari nomor kios...',
            'Cari jenis usaha...'
        ];
        let promptIndex = 0, charIndex = 0, deleting = false, typingTimer = null, userIsTyping = false;

        function animateTenantPlaceholder() {
            if (userIsTyping || tenantInput.value) return;
            const phrase = prompts[promptIndex];
            charIndex += deleting ? -1 : 1;
            tenantInput.setAttribute('placeholder', phrase.slice(0, Math.max(0, charIndex)));
            
            if (!deleting && charIndex >= phrase.length) {
                deleting = true;
                typingTimer = setTimeout(animateTenantPlaceholder, 1400);
                return;
            }
            if (deleting && charIndex <= 0) {
                deleting = false;
                promptIndex = (promptIndex + 1) % prompts.length;
            }
            typingTimer = setTimeout(animateTenantPlaceholder, deleting ? 45 : 85);
        }

        animateTenantPlaceholder();

        tenantInput.addEventListener('focus', function () {
            userIsTyping = true;
            if (typingTimer) clearTimeout(typingTimer);
            tenantInput.setAttribute('placeholder', 'Ketik nama pedagang atau nomor kios...');
        });

        tenantInput.addEventListener('blur', function () {
            if (!tenantInput.value.trim()) {
                userIsTyping = false;
                charIndex = 0; deleting = false;
                animateTenantPlaceholder();
            }
        });
    }

    if (tenantForm && tenantInput && searchResult) {
        tenantForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const query = tenantInput.value.trim();
            if (query === '') {
                searchResult.textContent = (currentLang === 'en') ? 'Please enter merchant name, kiosk number, or business type.' : 'Masukkan nama pedagang, nomor kios, atau jenis usaha.';
                return;
            }
                searchResult.textContent = (currentLang === 'en') ? `Keyword "${query}" ready to be connected to Laravel tenant data.` : `Kata kunci "${query}" siap dihubungkan ke data tenant Laravel.`;
        });
    }
});
</script>
@endsection