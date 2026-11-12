@extends('layouts.app')

@section('title', 'Profil Pasar - Simpul SAE Pasar Induk Among Tani')

@section('page-styles')
<style>
    .profil-hero {
        background: linear-gradient(120deg, #06484b 0%, #00845e 100%);
        color: #ffffff;
        padding: 64px 24px 80px;
        position: relative;
        overflow: hidden;
    }
    .profil-hero .eyebrow {
        color: #9cddc2;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 1.5px;
        margin-bottom: 10px;
    }
    .profil-hero h1 {
        font: 900 clamp(28px, 4vw, 46px)/1.15 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 14px;
    }
    .profil-hero p {
        max-width: 740px;
        color: #e2f3ec;
        font-size: 16px;
        line-height: 1.65;
    }

    /* Ringkasan Identitas Pasar */
    .meta-strip {
        position: relative;
        z-index: 3;
        margin-top: -36px;
        background: #ffffff;
        border: 1px solid #e2eee9;
        border-radius: 18px;
        padding: 22px 24px;
        box-shadow: 0 10px 28px rgba(10, 70, 58, 0.08);
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }
    .meta-box small {
        display: block;
        color: #58777c;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .meta-box strong {
        color: #06484b;
        font-size: 15px;
        font-weight: 800;
        line-height: 1.35;
        display: block;
    }

    /* Section Umum */
    .profil-section {
        padding: 48px 0 12px;
    }
    .section-tag {
        color: #00885d;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 1.3px;
        margin-bottom: 6px;
    }
    .profil-section h2 {
        color: #06484b;
        font: 800 clamp(22px, 2.5vw, 28px)/1.25 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 14px;
    }
    .lead-text {
        color: #486b70;
        font-size: 15px;
        line-height: 1.75;
        max-width: 860px;
    }

    /* Grid Maksud & Tujuan */
    .two-col-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 24px;
        margin-top: 24px;
    }
    .card-box {
        background: #ffffff;
        border: 1px solid #e6efeb;
        border-radius: 18px;
        padding: 26px;
        box-shadow: 0 6px 20px rgba(10, 70, 58, 0.045);
    }
    .card-box h3 {
        color: #10483f;
        font: 800 18px 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 12px;
    }
    .card-box p {
        color: #58777c;
        font-size: 14.5px;
        line-height: 1.7;
    }
    .goal-list {
        display: grid;
        gap: 12px;
        margin-top: 10px;
    }
    .goal-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        background: #f5faf7;
        padding: 13px 15px;
        border-radius: 12px;
    }
    .goal-num {
        flex: 0 0 28px;
        height: 28px;
        border-radius: 50%;
        background: #00845e;
        color: #fff;
        font-size: 13px;
        font-weight: 800;
        display: grid;
        place-items: center;
    }
    .goal-item p {
        font-size: 14px;
        color: #164e5a;
        line-height: 1.55;
        margin: 0;
    }

    /* 4 Fokus Transformasi */
    .scope-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
        margin-top: 22px;
    }
    .scope-card {
        background: #ffffff;
        border: 1px solid #e6efeb;
        border-radius: 18px;
        padding: 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
        box-shadow: 0 6px 18px rgba(10, 70, 58, 0.04);
    }
    .scope-badge {
        flex: 0 0 46px;
        height: 46px;
        border-radius: 14px;
        background: #e4f7ef;
        color: #00845e;
        font-weight: 800;
        font-size: 18px;
        display: grid;
        place-items: center;
    }
    .scope-card h3 {
        color: #06484b;
        font: 800 16px 'Plus Jakarta Sans', sans-serif;
        margin-bottom: 6px;
    }
    .scope-card p {
        color: #58777c;
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 960px) {
        .meta-strip, .scope-grid { grid-template-columns: 1fr 1fr; }
        .two-col-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 640px) {
        .meta-strip, .scope-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<main>
    <!-- HEADER PROFIL PASAR -->
    <section class="profil-hero">
        <div class="container">
            <p class="eyebrow">PROFIL & TRANSFORMASI DIGITAL • 2026</p>
            <h1>Pasar Induk Among Tani Kota Batu</h1>
            <p>
                Pusat perdagangan rakyat modern di bawah naungan Dinas Koperasi, Usaha Mikro, Perindustrian dan Perdagangan (Diskumperidag) Kota Batu yang mengintegrasikan layanan E-Retribusi Simpul SAE, Website UPT Pasar, dan kanal digital @pasarbatu.id.
            </p>
        </div>
    </section>

    <!-- STRIP INFORMASI UTAMA -->
    <section class="container">
        <div class="meta-strip">
            <div class="meta-box">
                <small>INSTANSI PENGELOLA</small>
                <strong>Diskumperidag Kota Batu</strong>
            </div>
            <div class="meta-box">
                <small>PROGRAM TAHUN 2026</small>
                <strong>Digitalisasi Pasar Tahap II</strong>
            </div>
            <div class="meta-box">
                <small>EKOSISTEM DIGITAL</small>
                <strong>Simpul SAE • Web UPT • @pasarbatu.id</strong>
            </div>
        </div>
    </section>

    <!-- LATAR BELAKANG, MAKSUD & TUJUAN -->
    <section class="profil-section container">
        <p class="section-tag">TENTANG PROGRAM</p>
        <h2>Penguatan Kapasitas SDM & Ekosistem Digital Pasar</h2>
        <p class="lead-text">
            Pasar Induk Among Tani Kota Batu merupakan pusat perdagangan rakyat modern yang terus mengintegrasikan berbagai kanal layanan digital. Setelah sukses melaksanakan tahap awal akselerasi transaksi digital, program tahun 2026 berfokus pada Digitalisasi Pasar Tahap II melalui penguatan kapasitas Sumber Daya Manusia (SDM) pengelola dan petugas penarik E-Retribusi agar pelayanan pasar semakin tertib, transparan, dan akuntabel.
        </p>

        <div class="two-col-grid">
            <div class="card-box">
                <h3>Maksud Pelaksanaan</h3>
                <p>
                    Menyelenggarakan bimbingan teknis (Bimtek), pendampingan intensif di lapangan, serta penguatan kapasitas SDM bagi pengelola UPT dan petugas penarik E-Retribusi di Pasar Induk Among Tani Kota Batu agar layanan digital berjalan optimal dan berkelanjutan.
                </p>
            </div>
            <div class="card-box">
                <h3>Tujuan Utama Tahap II</h3>
                <div class="goal-list">
                    <div class="goal-item">
                        <span class="goal-num">1</span>
                        <p>Meningkatkan kompetensi teknis petugas penarik E-Retribusi dalam mengoperasikan web dan aplikasi Simpul SAE secara presisi dan akuntabel.</p>
                    </div>
                    <div class="goal-item">
                        <span class="goal-num">2</span>
                        <p>Mengoptimalkan pengelolaan media sosial resmi <strong>@pasarbatu.id</strong> serta mengembangkan Website UPT Pasar Induk Among Tani yang terbaru.</p>
                    </div>
                    <div class="goal-item">
                        <span class="goal-num">3</span>
                        <p>Meningkatkan pemahaman dan kesiapan pedagang serta pengelola pasar dalam ekosistem digital pasar secara berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 PILAR TRANSFORMASI DIGITAL -->
    <section class="profil-section container" style="margin-bottom: 52px;">
        <p class="section-tag">FOKUS PENGEMBANGAN</p>
        <h2>Empat Pilar Digitalisasi Pasar Induk Among Tani</h2>
        <div class="scope-grid">
            <article class="scope-card">
                <div class="scope-badge">01</div>
                <div>
                    <h3>Optimalisasi E-Retribusi (Simpul SAE)</h3>
                    <p>Bimbingan teknis operasional aplikasi web dan mobile Simpul SAE bagi petugas penarik retribusi untuk pencatatan transaksi real-time serta rekonsiliasi data yang tertib.</p>
                </div>
            </article>
            <article class="scope-card">
                <div class="scope-badge">02</div>
                <div>
                    <h3>Pengembangan Website UPT Pasar</h3>
                    <p>Penyusunan arsitektur informasi dan tata kelola Website UPT Pasar Induk Among Tani sebagai pusat informasi resmi bagi masyarakat dan pedagang.</p>
                </div>
            </article>
            <article class="scope-card">
                <div class="scope-badge">03</div>
                <div>
                    <h3>Pengelolaan Media Sosial @pasarbatu.id</h3>
                    <p>Penguatan strategi komunikasi publik, promosi produk unggulan pedagang, serta branding digital Pasar Induk Among Tani melalui kanal @pasarbatu.id.</p>
                </div>
            </article>
            <article class="scope-card">
                <div class="scope-badge">04</div>
                <div>
                    <h3>Pendampingan Lapangan & Evaluasi</h3>
                    <p>Pendampingan langsung (coaching clinic) bagi petugas penarik retribusi, operator UPT, dan perwakilan pedagang untuk memastikan adopsi transaksi digital berjalan lancar.</p>
                </div>
            </article>
        </div>
    </section>
</main>
@endsection