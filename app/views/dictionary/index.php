<div class="row">
    <div class="col-12">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary mb-3">
                <i class="fas fa-book me-2"></i><?php echo $trans->get('indonesian_dictionary'); ?>
            </h1>
            <p class="lead text-muted">
                <?php echo $trans->get('dictionary_description'); ?>
            </p>
        </div>

        <!-- Search Section - Fixed for Mobile -->
        <div class="card border-0 shadow-lg">
            <div class="card-body p-3 p-md-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <!-- Mobile: Stacked layout -->
                        <div class="d-block d-md-none">
                            <form action="/dictionary/search" method="GET" class="mb-2">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control form-control-lg border-2" name="q"
                                        id="dictionarySearchMobile"
                                        placeholder="<?php echo $trans->get('search_dictionary'); ?>"
                                        style="border-radius: 15px;">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-3 mt-2">
                                    <i class="fas fa-search me-2"></i><?php echo $trans->get('search'); ?>
                                </button>
                            </form>
                        </div>

                        <!-- Desktop: Side by side layout -->
                        <div class="d-none d-md-block">
                            <form action="/dictionary/search" method="GET">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control form-control-lg border-2" name="q"
                                        id="dictionarySearchDesktop"
                                        placeholder="<?php echo $trans->get('search_dictionary'); ?>"
                                        style="border-radius: 15px 0 0 15px;">
                                    <button class="btn btn-primary px-4" type="submit"
                                        style="border-radius: 0 15px 15px 0;">
                                        <i class="fas fa-search me-2"></i><?php echo $trans->get('search'); ?>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-3 text-center">
                            <small class="text-muted">
                                Try:
                                <a href="/dictionary/search?q=rumah"
                                    class="text-primary text-decoration-none">rumah</a>,
                                <a href="/dictionary/search?q=makan"
                                    class="text-primary text-decoration-none">makan</a>,
                                <a href="/dictionary/search?q=cantik"
                                    class="text-primary text-decoration-none">cantik</a>,
                                <a href="/dictionary/search?q=belajar"
                                    class="text-primary text-decoration-none">belajar</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simple Info Section -->
        <div class="row mt-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="text-muted">
                    <p>
                        <i class="fas fa-info-circle me-2"></i>
                        Search for any Indonesian word to get detailed definitions, examples, and English translations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Simple JavaScript for auto-focus -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Auto-focus on desktop search input
        const desktopSearch = document.getElementById('dictionarySearchDesktop');
        if (desktopSearch) {
            desktopSearch.focus();
        }

        // For mobile, focus on input when the page loads
        const mobileSearch = document.getElementById('dictionarySearchMobile');
        if (mobileSearch && window.innerWidth < 768) {
            mobileSearch.focus();
        }
    });
</script>