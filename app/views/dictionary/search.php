<div class="row">
    <div class="col-12">
        <!-- Search Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-bold text-primary">
                    <i class="fas fa-book me-2"></i><?php echo $trans->get('indonesian_dictionary'); ?>
                </h1>
            </div>
            <div>
                <a href="/dictionary" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> <?php echo $trans->get('back_to_dictionary'); ?>
                </a>
            </div>
        </div>

        <!-- Search Box - Fixed for Mobile -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-3">
                <!-- Mobile: Stacked layout -->
                <div class="d-block d-md-none">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-2" id="dictionarySearchMobile"
                            placeholder="<?php echo $trans->get('search_dictionary'); ?>"
                            value="<?php echo htmlspecialchars($searchTerm); ?>" style="border-radius: 10px;">
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="button" id="searchButtonMobile">
                        <i class="fas fa-search me-2"></i><?php echo $trans->get('search'); ?>
                    </button>
                </div>

                <!-- Desktop: Side by side layout -->
                <div class="d-none d-md-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg border-2" id="dictionarySearchDesktop"
                            placeholder="<?php echo $trans->get('search_dictionary'); ?>"
                            value="<?php echo htmlspecialchars($searchTerm); ?>">
                        <button class="btn btn-primary px-4" type="button" id="searchButtonDesktop">
                            <i class="fas fa-search me-2"></i><?php echo $trans->get('search'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Results -->
        <?php if (!empty($searchTerm)): ?>
            <div class="mb-4">
                <h2 class="h4 fw-bold">
                    <?php echo $trans->get('search_results'); ?> for "<?php echo htmlspecialchars($searchTerm); ?>"
                </h2>
                <p class="text-muted">Found <?php echo count($results); ?> result(s)</p>
            </div>

            <?php if (empty($results)): ?>
                <!-- No Results -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted"><?php echo $trans->get('no_results'); ?></h4>
                        <p class="text-muted"><?php echo $trans->get('try_different_word'); ?></p>
                        <div class="mt-3">
                            <button class="btn btn-primary me-2 try-word" data-word="rumah">rumah</button>
                            <button class="btn btn-outline-primary me-2 try-word" data-word="makan">makan</button>
                            <button class="btn btn-outline-primary try-word" data-word="cantik">cantik</button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Results -->
                <?php foreach ($results as $result): ?>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <!-- Word Header -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h3 class="h2 fw-bold text-primary mb-1"><?php echo ucfirst($result['word']); ?></h3>
                                    <?php if (!empty($result['pronunciation'])): ?>
                                        <p class="text-muted mb-1">
                                            <i class="fas fa-volume-up me-1"></i>
                                            <?php echo $result['pronunciation']; ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($result['partOfSpeech'])): ?>
                                        <span class="badge bg-secondary"><?php echo $result['partOfSpeech']; ?></span>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-outline-primary btn-sm"
                                    onclick="speakWord('<?php echo $result['word']; ?>')">
                                    <i class="fas fa-volume-up me-1"></i> Pronounce
                                </button>
                            </div>

                            <!-- Definitions -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">
                                    <i class="fas fa-list me-2"></i><?php echo $trans->get('definitions'); ?>
                                </h5>
                                <?php foreach ($result['definitions'] as $index => $definition): ?>
                                    <div
                                        class="definition-item mb-3 pb-3 <?php echo $index < count($result['definitions']) - 1 ? 'border-bottom' : ''; ?>">
                                        <div class="d-flex align-items-start mb-2">
                                            <span class="badge bg-primary me-2"><?php echo $index + 1; ?></span>
                                            <div>
                                                <p class="mb-1 fw-bold"><?php echo $definition['meaning']; ?></p>
                                                <?php if (!empty($definition['translation'])): ?>
                                                    <p class="text-success mb-1">
                                                        <i class="fas fa-language me-1"></i>
                                                        <?php echo $definition['translation']; ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if (!empty($definition['examples'])): ?>
                                            <div class="ms-4">
                                                <h6 class="text-muted mb-2">
                                                    <i class="fas fa-comment me-1"></i><?php echo $trans->get('examples'); ?>:
                                                </h6>
                                                <?php foreach ($definition['examples'] as $example): ?>
                                                    <p class="text-muted mb-2 ps-3 border-start border-3 border-light">
                                                        <i>"<?php echo $example; ?>"</i>
                                                    </p>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Synonyms and Antonyms -->
                            <div class="row">
                                <?php if (!empty($result['synonyms'])): ?>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="fw-bold text-success">
                                            <i class="fas fa-sync-alt me-1"></i><?php echo $trans->get('synonyms'); ?>
                                        </h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php foreach ($result['synonyms'] as $synonym): ?>
                                                <span
                                                    class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">
                                                    <?php echo $synonym; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($result['antonyms'])): ?>
                                    <div class="col-md-6 mb-3">
                                        <h6 class="fw-bold text-danger">
                                            <i class="fas fa-exchange-alt me-1"></i><?php echo $trans->get('antonyms'); ?>
                                        </h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php foreach ($result['antonyms'] as $antonym): ?>
                                                <span
                                                    class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25">
                                                    <?php echo $antonym; ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <!-- In-content Ad -->
            <div class="text-center my-4">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=YOUR_ADSENSE_ID"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-gw-3+1f-3d+2z"
                    data-ad-client="YOUR_ADSENSE_ID" data-ad-slot="INCONTENT_SLOT"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

        <?php else: ?>
            <!-- No Search Term -->
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Search Indonesian Dictionary</h4>
                    <p class="text-muted">Enter a word in the search box above to find its meaning and examples</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- JavaScript for Search Page -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile elements
        const searchInputMobile = document.getElementById('dictionarySearchMobile');
        const searchButtonMobile = document.getElementById('searchButtonMobile');

        // Desktop elements
        const searchInputDesktop = document.getElementById('dictionarySearchDesktop');
        const searchButtonDesktop = document.getElementById('searchButtonDesktop');

        const tryWordButtons = document.querySelectorAll('.try-word');

        // Search functionality
        function performSearch(query) {
            if (query) {
                window.location.href = '/dictionary/search?q=' + encodeURIComponent(query);
            }
        }

        // Mobile search
        if (searchButtonMobile) {
            searchButtonMobile.addEventListener('click', function () {
                const query = searchInputMobile.value.trim();
                performSearch(query);
            });
        }

        // Desktop search
        if (searchButtonDesktop) {
            searchButtonDesktop.addEventListener('click', function () {
                const query = searchInputDesktop.value.trim();
                performSearch(query);
            });
        }

        // Enter key search for both inputs
        function setupInputEvents(inputElement) {
            inputElement.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    const query = this.value.trim();
                    performSearch(query);
                }
            });
        }

        if (searchInputMobile) setupInputEvents(searchInputMobile);
        if (searchInputDesktop) setupInputEvents(searchInputDesktop);

        // Try word buttons
        tryWordButtons.forEach(button => {
            button.addEventListener('click', function () {
                const word = this.getAttribute('data-word');
                // Set value for both mobile and desktop inputs
                if (searchInputMobile) searchInputMobile.value = word;
                if (searchInputDesktop) searchInputDesktop.value = word;
                performSearch(word);
            });
        });

        // Auto-focus on appropriate input
        if (window.innerWidth >= 768 && searchInputDesktop) {
            searchInputDesktop.focus();
            searchInputDesktop.select();
        } else if (searchInputMobile) {
            searchInputMobile.focus();
            searchInputMobile.select();
        }

        // Text-to-speech for word pronunciation
        window.speakWord = function (word) {
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(word);
                utterance.lang = 'id-ID';
                utterance.rate = 0.8;
                window.speechSynthesis.speak(utterance);
            } else {
                alert('Text-to-speech not supported in your browser');
            }
        };
    });
</script>