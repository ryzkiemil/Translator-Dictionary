<!DOCTYPE html>
<html lang="<?php echo isset($trans) ? $trans->getCurrentLanguage() : 'en'; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo isset($seo_title) ? $seo_title : 'TranslateNow - Free English-Indonesian Translation & Dictionary'; ?>
    </title>
    <meta name="description"
        content="<?php echo isset($seo_description) ? $seo_description : 'Free English-Indonesian translation service and comprehensive dictionary. Accurate translations, word definitions, and language tools.'; ?>">
    <meta name="keywords"
        content="english indonesian translation, indonesian dictionary, kamus indonesia, terjemahan bahasa, free translation">

    <!-- SEO Meta Tags -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <link rel="canonical" href="<?php echo isset($canonical_url) ? $canonical_url : 'https://yourdomain.com'; ?>">

    <!-- Open Graph for Social Media -->
    <meta property="og:title"
        content="<?php echo isset($seo_title) ? $seo_title : 'TranslateNow - Free Translation & Dictionary'; ?>">
    <meta property="og:description"
        content="<?php echo isset($seo_description) ? $seo_description : 'Free English-Indonesian translation service and dictionary'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo isset($canonical_url) ? $canonical_url : 'https://yourdomain.com'; ?>">
    <meta property="og:image" content="https://yourdomain.com/assets/images/og-image.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="<?php echo isset($seo_title) ? $seo_title : 'TranslateNow - Free Translation & Dictionary'; ?>">
    <meta name="twitter:description"
        content="<?php echo isset($seo_description) ? $seo_description : 'Free English-Indonesian translation service and dictionary'; ?>">

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=YOUR_ADSENSE_ID"
        crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Minimal Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2">
        <div class="container">
            <!-- Brand/Logo -->
            <a class="navbar-brand fw-bold text-primary fs-4" href="/">
                <i class="fas fa-language me-2"></i>TranslateNow
            </a>

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent">
                <i class="fas fa-ellipsis-v"></i>
            </button>

            <!-- Language Switcher - Always Visible -->
            <div class="d-flex align-items-center">
                <?php
                $current_page = $_SERVER['REQUEST_URI'] ?? '';
                $is_dictionary_page = strpos($current_page, '/dictionary') !== false;
                ?>

                <?php if ($is_dictionary_page): ?>
                    <a href="/" class="nav-link me-3" title="Go to Translation">
                        <i class="fas fa-exchange-alt me-1"></i>
                        <span class="d-none d-sm-inline">Translation</span>
                    </a>
                <?php else: ?>
                    <a href="/dictionary" class="nav-link me-3" title="Go to Dictionary">
                        <i class="fas fa-book me-1"></i>
                        <span class="d-none d-sm-inline">Dictionary</span>
                    </a>
                <?php endif; ?>

                <!-- Language Switcher -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="languageDropdown"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-globe me-1"></i>
                        <?php echo isset($trans) ? strtoupper($trans->getCurrentLanguage()) : 'EN'; ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/language/switch/en">🇺🇸 English</a></li>
                        <li><a class="dropdown-item" href="/language/switch/id">🇮🇩 Indonesian</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Ad -->
    <div class="container text-center my-3">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=YOUR_ADSENSE_ID"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block" data-ad-client="YOUR_ADSENSE_ID" data-ad-slot="HEADER_SLOT"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <main>
        <div class="container mt-3">