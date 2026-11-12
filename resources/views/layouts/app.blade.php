<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="appHtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Simpul SAE - Pasar Induk Among Tani')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #00845e;
            --dark-green: #005347;
            --ink: #073f45;
            --muted: #58777c;
            --bg: #f7fbfa;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; color: var(--ink); background: var(--bg); font-size: 16px; -webkit-font-smoothing: antialiased; }
        a { text-decoration: none; color: inherit; }
        .container { width: min(1350px, calc(100% - 48px)); margin: auto; }

        /* NAVBAR */
        .navbar { min-height: 80px; display: flex; align-items: center; background: #ffffff; border-bottom: 1px solid #e2ebe6; position: sticky; top: 0; z-index: 1000; padding: 8px 0; }
        .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
        .header-logos { display: flex; align-items: center; gap: 12px; }
        .logo-item { display: flex; align-items: center; gap: 8px; }
        .header-logo-img { height: 38px; width: auto; object-fit: contain; }
        .logo-text-group { display: flex; flex-direction: column; }
        .logo-text-group strong { font-size: 12px; font-weight: 800; color: #103F32; line-height: 1.1; }
        .logo-text-group small { font-size: 9px; color: #52665A; font-weight: 700; }
        .logo-divider-line { width: 1px; height: 28px; background: #E3E6D8; }

        .nav-actions { display: flex; align-items: center; gap: 12px; }

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
            padding: 4px 10px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
        }
        .lang-btn.active {
            background: #00845e;
            color: #ffffff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .btn-admin-header {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(110deg, #009a69, #00664f);
            color: white; padding: 8px 16px 8px 8px; border-radius: 30px;
            font-size: 12px; font-weight: 700; box-shadow: 0 4px 12px rgba(0, 107, 80, 0.2);
            transition: all 0.2s ease; white-space: nowrap; text-decoration: none;
        }
        .btn-admin-header:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(0, 107, 80, 0.3); }
        .admin-icon-circle { width: 26px; height: 26px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: grid; place-items: center; font-size: 13px; }

        /* HAMBURGER MENU (MOBILE) */
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 26px;
            height: 18px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            z-index: 1001;
        }
        .menu-toggle span {
            width: 100%;
            height: 2.5px;
            background-color: #073f45;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .mobile-nav-links { display: none; }

        /* FOOTER GLOBAL */
        .footer { display: block; padding: 32px max(calc((100vw - 1380px)/2), 5vw) 18px; background: linear-gradient(100deg, #005449, #00483f); color: white; margin-top: 40px; }
        .footer-main { display: grid; grid-template-columns: 1.1fr 1.5fr .8fr; gap: 32px; align-items: start; max-width: 1380px; margin: 0 auto 24px; }
        .footer-brand { display: flex; align-items: center; gap: 12px; }
        .footer-logo { width: 45px; height: auto; }
        .footer-brand strong { font: 700 17px 'Plus Jakarta Sans', sans-serif; display: block; }
        .footer-brand small { font-size: 11px; display: block; }
        .footer-contact h3, .footer-links h3 { margin: 0 0 10px; color: #fff; font: 800 15px 'Plus Jakarta Sans', sans-serif; }
        .footer-contact p, .footer-contact a, .footer-links a { display: flex; align-items: flex-start; gap: 9px; margin: 0 0 8px; color: #d8eee8; font-size: 14px; line-height: 1.55; text-decoration: none; overflow-wrap: anywhere; }
        .footer-contact a:hover, .footer-links a:hover { color: #8ce5bd; text-decoration: underline; }
        .footer-links { display: flex; flex-direction: column; align-items: flex-start; }
        .footer-links a { margin-bottom: 7px; }
        .footer .copyright { max-width: 1380px; margin: 0 auto; padding-top: 15px; border-top: 1px solid rgba(218,244,234,.2); font-size: 12px; color: #d8eee8; }

        @media(max-width: 950px) {
            .navbar { min-height: 65px; padding: 6px 0; }
            .header-logo-img { height: 26px !important; }
            .logo-divider-line { height: 16px !important; }
            .logo-text-group strong { font-size: 8.5px !important; }
            .logo-text-group small { font-size: 6.5px !important; }

            .menu-toggle { display: flex; }

            /* Menu Drawer HP yang Proporsional */
            .nav-actions {
                position: fixed;
                top: 65px;
                right: -100%;
                width: 250px;
                height: calc(100vh - 65px);
                background: #ffffff;
                flex-direction: column;
                align-items: stretch;
                padding: 18px 16px;
                gap: 14px;
                box-shadow: -8px 10px 25px rgba(0,0,0,0.15);
                transition: right 0.3s ease;
                z-index: 999;
                overflow-y: auto;
            }
            .nav-actions.active { right: 0; }

            .mobile-nav-links {
                display: flex;
                flex-direction: column;
                gap: 6px;
                border-bottom: 1px solid #e5efe9;
                padding-bottom: 12px;
                margin-bottom: 2px;
            }
            .mobile-nav-links a {
                padding: 8px 12px;
                border-radius: 6px;
                color: #073f45;
                font-size: 13px;
                font-weight: 700;
                text-decoration: none;
            }
            .mobile-nav-links a:hover {
                background: #eaf7f1;
                color: #00845e;
            }

            .footer { padding: 26px 18px 16px; }
            .footer-main { grid-template-columns: 1fr; gap: 22px; }
        }

        @yield('page-styles')
    </style>
</head>
<body>

    <!-- NAVBAR GLOBAL -->
    <header class="navbar">
        <div class="container nav-inner">
            <div class="header-logos">
                <div class="logo-item">
                    <img src="{{ asset('images/logo-kotabatu.png') }}" alt="Logo Kota Batu" class="header-logo-img" onerror="this.style.display='none'">
                    <div class="logo-text-group">
                        <strong data-id="KOTA BATU" data-en="BATU CITY">KOTA BATU</strong>
                        <small data-id="PEMERINTAH KOTA" data-en="CITY GOVERNMENT">PEMERINTAH KOTA</small>
                    </div>
                </div>
                <div class="logo-divider-line"></div>
                <div class="logo-item">
                    <img src="{{ asset('images/batu-sae.png') }}" alt="Logo Mbatu Sae" class="header-logo-img" onerror="this.style.display='none'">
                </div>
                <div class="logo-divider-line"></div>
                <div class="logo-item">
                    <img src="{{ asset('images/logo-diskumperindag.png') }}" alt="Logo Diskumperindag" class="header-logo-img" onerror="this.style.display='none'">
                    <div class="logo-text-group">
                        <strong>DISKUMPERINDAG</strong>
                        <small data-id="KOTA BATU" data-en="BATU CITY">KOTA BATU</small>
                    </div>
                </div>
            </div>

            <!-- TOMBOL HAMBURGER MOBILE -->
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- NAV ACTIONS & MENU HP -->
            <div class="nav-actions" id="navActions">
                <div class="mobile-nav-links">
                    <a href="#beranda" data-id="Beranda" data-en="Home" onclick="closeMenu()">Beranda</a>
                    <a href="#profil-pasar" data-id="Profil Pasar" data-en="Market Profile" onclick="closeMenu()">Profil Pasar</a>
                    <a href="#program-2026" data-id="Program 2026" data-en="2026 Program" onclick="closeMenu()">Program 2026</a>
                    <a href="#pelatihan-2026" data-id="Pelatihan" data-en="Training" onclick="closeMenu()">Pelatihan</a>
                    <a href="#monitoring-2026" data-id="Monitoring" data-en="Monitoring" onclick="closeMenu()">Monitoring</a>
                    <a href="#laporan-2026" data-id="Laporan" data-en="Reports" onclick="closeMenu()">Laporan</a>
                    <a href="#berita" data-id="Berita" data-en="News" onclick="closeMenu()">Berita</a>
                </div>

                <div class="lang-group">
                    <button type="button" class="lang-btn active" id="btnId" onclick="setLanguage('id')">ID</button>
                    <button type="button" class="lang-btn" id="btnEn" onclick="setLanguage('en')">EN</button>
                </div>

                <a href="{{ url('/login') }}" class="btn btn-primary btn-admin-header">
                    <span class="admin-icon-circle">👤</span>
                    <span data-id="Login Admin" data-en="Admin Login">Login Admin</span>
                </a>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="footer-main">
            <div class="footer-brand">
                <img src="{{ asset('images/logo-simpulsae2.png') }}" class="footer-logo" alt="Logo Simpul SAE" onerror="this.style.display='none'">
                <span><strong>Simpul SAE</strong><small data-id="Pasar Induk Among Tani" data-en="Among Tani Central Market">Pasar Induk Among Tani</small></span>
            </div>
            <div class="footer-contact" id="kontak">
                <h3 data-id="Kontak Kami" data-en="Contact Us">Kontak Kami</h3>
                <p data-id="Hubungi Diskumperindag Kota Batu untuk informasi lebih lanjut." data-en="Contact Batu City Diskumperindag for further information.">Hubungi Diskumperindag Kota Batu untuk informasi lebih lanjut.</p>
                <a href="tel:0341512345"><span>☎</span> (0341) 512345</a>
                <a href="mailto:diskumperindag@kotabatu.go.id"><span>✉</span> diskumperindag@kotabatu.go.id</a>
                <p class="footer-address"><span>⌖</span> Jl. Panglima Sudirman No. 50, Kota Batu</p>
            </div>
            <div class="footer-links">
                <h3 data-id="Navigasi" data-en="Navigation">Navigasi</h3>
                <a href="#beranda" data-id="Beranda" data-en="Home">Beranda</a>
                <a href="#profil-pasar" data-id="Profil Pasar" data-en="Market Profile">Profil Pasar</a>
                <a href="#program-2026" data-id="Program 2026" data-en="2026 Program">Program 2026</a>
                <a href="#berita" data-id="Berita & Informasi" data-en="News & Info">Berita &amp; Informasi</a>
            </div>
        </div>
        <div class="copyright">© {{ date('Y') }} Simpul SAE · Pasar Induk Among Tani · Pemerintah Kota Batu</div>
    </footer>

    <script>
        let currentLang = localStorage.getItem('simpul_lang') || 'id';

        function setLanguage(lang) {
            currentLang = lang;
            localStorage.setItem('simpul_lang', lang);
            
            document.querySelectorAll('#btnId').forEach(b => b.classList.toggle('active', lang === 'id'));
            document.querySelectorAll('#btnEn').forEach(b => b.classList.toggle('active', lang === 'en'));
            
            document.querySelectorAll('[data-id]').forEach(el => {
                const text = el.getAttribute(`data-${lang}`);
                if (text) {
                    if (el.tagName === 'INPUT' && el.hasAttribute('placeholder')) {
                        el.setAttribute('placeholder', text);
                    } else {
                        el.textContent = text;
                    }
                }
            });
        }

        function closeMenu() {
            const navActions = document.getElementById('navActions');
            if (navActions) navActions.classList.remove('active');
        }

        document.addEventListener("DOMContentLoaded", function () {
            setLanguage(currentLang);

            const menuToggle = document.getElementById('menuToggle');
            const navActions = document.getElementById('navActions');

            if (menuToggle && navActions) {
                menuToggle.addEventListener('click', function () {
                    navActions.classList.toggle('active');
                });
            }
        });
    </script>
    @yield('page-scripts')
</body>
</html>