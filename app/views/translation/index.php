<div class="row">
    <div class="col-12">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary"><?php echo $trans->get('translation_tool'); ?></h1>
            <p class="lead text-muted">Translate text between English and Indonesian instantly</p>
        </div>

        <!-- Translation Interface -->
        <div class="card border-0 shadow-lg">
            <div class="card-body p-4">
                <!-- Language Selection -->
                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label fw-bold">From</label>
                            <select class="form-select form-select-lg" id="sourceLang">
                                <option value="en">English</option>
                                <option value="id">Indonesian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="swapLanguages"
                                title="<?php echo $trans->get('swap_languages'); ?>">
                                <i class="fas fa-exchange-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label fw-bold">To</label>
                            <select class="form-select form-select-lg" id="targetLang">
                                <option value="id">Indonesian</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Translation Areas -->
                <div class="row">
                    <!-- Source Text -->
                    <div class="col-md-6 mb-3">
                        <div class="position-relative">
                            <textarea class="form-control form-control-lg" id="sourceText" rows="8"
                                placeholder="<?php echo $trans->get('enter_text_here'); ?>"
                                style="resize: none;"></textarea>
                            <div class="position-absolute bottom-0 end-0 m-2">
                                <small class="text-muted">
                                    <span id="charCount">0</span> characters,
                                    <span id="wordCount">0</span> words
                                </small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="clearSource">
                                <i class="fas fa-eraser"></i> <?php echo $trans->get('clear'); ?>
                            </button>
                        </div>
                    </div>

                    <!-- Target Text -->
                    <div class="col-md-6 mb-3">
                        <div class="position-relative">
                            <textarea class="form-control form-control-lg" id="targetText" rows="8"
                                placeholder="<?php echo $trans->get('translated_text'); ?>" readonly
                                style="resize: none; background-color: #f8f9fa;"></textarea>
                            <div class="position-absolute top-0 end-0 m-2">
                                <button type="button" class="btn btn-outline-primary btn-sm" id="copyTranslation"
                                    style="display: none;">
                                    <i class="fas fa-copy"></i> <?php echo $trans->get('copy'); ?>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-2">
                                <div id="translationStatus" class="small"></div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary" id="translateBtn" disabled>
                                <i class="fas fa-language"></i> <?php echo $trans->get('translate'); ?>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <small class="text-muted">Try these:</small>
                            <button type="button" class="btn btn-outline-info btn-sm quick-text"
                                data-text="Hello, how are you?">
                                Hello, how are you?
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm quick-text"
                                data-text="Thank you very much">
                                Thank you very much
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm quick-text" data-text="Apa kabar?">
                                Apa kabar?
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm quick-text"
                                data-text="Terima kasih banyak">
                                Terima kasih banyak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="fas fa-bolt fa-2x text-white"></i>
                    </div>
                    <h4>Fast Translation</h4>
                    <p class="text-muted">Get instant translations with our optimized processing</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="fas fa-check-circle fa-2x text-white"></i>
                    </div>
                    <h4>Accurate Results</h4>
                    <p class="text-muted">High-quality translations with context awareness</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px;">
                        <i class="fas fa-mobile-alt fa-2x text-white"></i>
                    </div>
                    <h4>Mobile Friendly</h4>
                    <p class="text-muted">Works perfectly on all devices and screen sizes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Translation Interface -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sourceText = document.getElementById('sourceText');
        const targetText = document.getElementById('targetText');
        const sourceLang = document.getElementById('sourceLang');
        const targetLang = document.getElementById('targetLang');
        const translateBtn = document.getElementById('translateBtn');
        const swapBtn = document.getElementById('swapLanguages');
        const clearSourceBtn = document.getElementById('clearSource');
        const copyTranslationBtn = document.getElementById('copyTranslation');
        const charCount = document.getElementById('charCount');
        const wordCount = document.getElementById('wordCount');
        const translationStatus = document.getElementById('translationStatus');
        const quickTextBtns = document.querySelectorAll('.quick-text');

        // Update character and word count
        function updateCounts() {
            const text = sourceText.value;
            charCount.textContent = text.length;
            wordCount.textContent = text.trim() ? text.trim().split(/\s+/).length : 0;
            translateBtn.disabled = text.trim().length === 0;
        }

        // Swap languages
        swapBtn.addEventListener('click', function () {
            const temp = sourceLang.value;
            sourceLang.value = targetLang.value;
            targetLang.value = temp;

            // Also swap text if both fields have content
            if (sourceText.value && targetText.value) {
                const tempText = sourceText.value;
                sourceText.value = targetText.value;
                targetText.value = tempText;
                updateCounts();
            }
        });

        // Clear source text
        clearSourceBtn.addEventListener('click', function () {
            sourceText.value = '';
            targetText.value = '';
            updateCounts();
            copyTranslationBtn.style.display = 'none';
            translationStatus.textContent = '';
        });

        // Copy translated text
        copyTranslationBtn.addEventListener('click', function () {
            targetText.select();
            document.execCommand('copy');

            // Show feedback
            const originalText = copyTranslationBtn.innerHTML;
            copyTranslationBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(() => {
                copyTranslationBtn.innerHTML = originalText;
            }, 2000);
        });

        // Quick text buttons
        quickTextBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                sourceText.value = this.getAttribute('data-text');
                updateCounts();
                performTranslation();
            });
        });

        // Perform translation
        function performTranslation() {
            const text = sourceText.value.trim();
            if (!text) return;

            const direction = sourceLang.value + '-' + targetLang.value;

            // Show loading state
            translationStatus.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Translating...';
            translateBtn.disabled = true;
            translateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Translating...';

            // AJAX request
            fetch('/api/translate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'text=' + encodeURIComponent(text) + '&direction=' + direction
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        targetText.value = data.translatedText;
                        translationStatus.innerHTML = '<i class="fas fa-check text-success"></i> Translation complete';
                        copyTranslationBtn.style.display = 'block';
                    } else {
                        translationStatus.innerHTML = '<i class="fas fa-times text-danger"></i> Error occurred';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    translationStatus.innerHTML = '<i class="fas fa-times text-danger"></i> Error occurred';
                })
                .finally(() => {
                    translateBtn.disabled = false;
                    translateBtn.innerHTML = '<i class="fas fa-language"></i> Translate';
                });
        }

        // Translate button click
        translateBtn.addEventListener('click', performTranslation);

        // Auto-translate on Enter (Ctrl+Enter or Cmd+Enter)
        sourceText.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                performTranslation();
            }
        });

        // Real-time count updates
        sourceText.addEventListener('input', updateCounts);

        // Initialize counts
        updateCounts();
    });
</script>