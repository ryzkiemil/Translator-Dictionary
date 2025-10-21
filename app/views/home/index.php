<div class="row">
    <div class="col-12">
        <!-- Simple Header -->
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold text-primary mb-2">
                <i class="fas fa-language me-2"></i>TranslateNow
            </h1>
            <p class="text-muted">
                <?php echo $trans->get('free_translation'); ?>
                <?php if (isset($is_free) && $is_free): ?>
                    <span class="badge bg-success ms-2">Free</span>
                <?php endif; ?>
            </p>
            <small class="text-muted">Powered by <?php echo $provider ?? 'Translation API'; ?></small>
        </div>

        <!-- Main Translation Interface -->
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <!-- Language Selection Bar -->
                <div class="row align-items-center mb-4">
                    <div class="col-md-5">
                        <div class="d-flex align-items-center">
                            <span class="badge bg-primary me-2"><?php echo $trans->get('from'); ?></span>
                            <select class="form-select form-select-lg border-0 bg-light" id="sourceLang">
                                <option value="en">🇺🇸 <?php echo $trans->get('english'); ?></option>
                                <option value="id">🇮🇩 <?php echo $trans->get('indonesian'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <button type="button" class="btn btn-outline-primary btn-lg rounded-circle" id="swapLanguages">
                            <i class="fas fa-exchange-alt"></i>
                        </button>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex align-items-center">
                            <span class="badge bg-success me-2"><?php echo $trans->get('to'); ?></span>
                            <select class="form-select form-select-lg border-0 bg-light" id="targetLang">
                                <option value="id">🇮🇩 <?php echo $trans->get('indonesian'); ?></option>
                                <option value="en">🇺🇸 <?php echo $trans->get('english'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Translation Areas -->
                <div class="row g-4">
                    <!-- Source Text Area -->
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <textarea class="form-control form-control-lg border-2" id="sourceText" rows="6"
                                placeholder="<?php echo $trans->get('type_text_here'); ?>"
                                style="resize: none; font-size: 1.1rem; min-height: 200px;"></textarea>
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <span class="badge bg-secondary">
                                    <span id="charCount">0</span> <?php echo $trans->get('characters'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div>
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="clearSource">
                                    <i class="fas fa-eraser"></i> <?php echo $trans->get('clear'); ?>
                                </button>
                                <button type="button" class="btn btn-outline-info btn-sm ms-2" id="speakSource">
                                    <i class="fas fa-volume-up"></i> <?php echo $trans->get('speak'); ?>
                                </button>
                            </div>
                            <button type="button" class="btn btn-primary" id="translateBtn" disabled>
                                <i class="fas fa-language me-2"></i> <?php echo $trans->get('translate'); ?>
                            </button>
                        </div>
                    </div>

                    <!-- Target Text Area -->
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <textarea class="form-control form-control-lg border-2 bg-light" id="targetText" rows="6"
                                placeholder="<?php echo $trans->get('translation_will_appear'); ?>" readonly
                                style="resize: none; font-size: 1.1rem; min-height: 200px;"></textarea>
                            <div class="position-absolute top-0 end-0 m-3">
                                <button type="button" class="btn btn-success btn-sm" id="copyTranslation"
                                    style="display: none;">
                                    <i class="fas fa-copy me-1"></i> <?php echo $trans->get('copy'); ?>
                                </button>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                <div id="translationStatus" class="small"></div>
                            </div>
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <button type="button" class="btn btn-outline-success btn-sm" id="speakTranslation"
                                    style="display: none;">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="mt-3">
                            <div class="d-flex flex-wrap gap-2" id="quickActions" style="display: none;">
                                <small
                                    class="text-muted align-self-center"><?php echo $trans->get('quick_actions'); ?>:</small>
                                <button type="button" class="btn btn-outline-primary btn-sm quick-action"
                                    data-action="copy">
                                    <i class="fas fa-copy"></i> <?php echo $trans->get('copy'); ?>
                                </button>
                                <button type="button" class="btn btn-outline-success btn-sm quick-action"
                                    data-action="speak">
                                    <i class="fas fa-volume-up"></i> <?php echo $trans->get('listen'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Translation -->
<script>
    // Get translation texts from PHP
    const translationTexts = {
        please_enter_text: "<?php echo $trans->get('please_enter_text'); ?>",
        translating: "<?php echo $trans->get('translating'); ?>",
        translation_complete: "<?php echo $trans->get('translation_complete'); ?>",
        translation_failed: "<?php echo $trans->get('translation_failed'); ?>",
        network_error: "<?php echo $trans->get('network_error'); ?>",
        text_copied: "<?php echo $trans->get('text_copied'); ?>",
        copied: "<?php echo $trans->get('copy'); ?>",
        translate: "<?php echo $trans->get('translate'); ?>" // Add this missing key
    };

    document.addEventListener('DOMContentLoaded', function () {
        // DOM Elements
        const sourceText = document.getElementById('sourceText');
        const targetText = document.getElementById('targetText');
        const sourceLang = document.getElementById('sourceLang');
        const targetLang = document.getElementById('targetLang');
        const translateBtn = document.getElementById('translateBtn');
        const swapBtn = document.getElementById('swapLanguages');
        const clearSourceBtn = document.getElementById('clearSource');
        const copyTranslationBtn = document.getElementById('copyTranslation');
        const speakSourceBtn = document.getElementById('speakSource');
        const speakTranslationBtn = document.getElementById('speakTranslation');
        const charCount = document.getElementById('charCount');
        const translationStatus = document.getElementById('translationStatus');
        const quickActions = document.getElementById('quickActions');
        const quickActionBtns = document.querySelectorAll('.quick-action');

        // Update character count
        function updateCounts() {
            const text = sourceText.value;
            const chars = text.length;

            charCount.textContent = chars;
            translateBtn.disabled = chars === 0;

            // Visual feedback for long text
            if (chars > 1000) {
                charCount.parentElement.className = 'badge bg-warning';
            } else {
                charCount.parentElement.className = 'badge bg-secondary';
            }
        }

        // Swap languages function
        function swapLanguages() {
            // Swap language values
            const tempLang = sourceLang.value;
            sourceLang.value = targetLang.value;
            targetLang.value = tempLang;

            // Swap text content if both have text
            if (sourceText.value.trim() && targetText.value.trim()) {
                const tempText = sourceText.value;
                sourceText.value = targetText.value;
                targetText.value = tempText;
                updateCounts();
            }

            // Clear translation UI
            hideTranslationUI();
        }

        // Add event listener to swap button
        if (swapBtn) {
            swapBtn.addEventListener('click', swapLanguages);
        }

        // Clear source text
        clearSourceBtn.addEventListener('click', function () {
            sourceText.value = '';
            targetText.value = '';
            updateCounts();
            hideTranslationUI();
        });

        // Text-to-speech functions
        function speakText(text, lang) {
            if ('speechSynthesis' in window) {
                // Cancel any ongoing speech
                window.speechSynthesis.cancel();

                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = lang === 'en' ? 'en-US' : 'id-ID';
                utterance.rate = 0.8;
                utterance.pitch = 1;
                window.speechSynthesis.speak(utterance);
            } else {
                alert('Text-to-speech not supported in your browser');
            }
        }

        // Speak source text
        speakSourceBtn.addEventListener('click', function () {
            const text = sourceText.value.trim();
            if (text) {
                speakText(text, sourceLang.value);
            }
        });

        // Speak translated text
        speakTranslationBtn.addEventListener('click', function () {
            const text = targetText.value.trim();
            if (text) {
                speakText(text, targetLang.value);
            }
        });

        // Copy translated text
        copyTranslationBtn.addEventListener('click', function () {
            if (!targetText.value.trim()) return;

            targetText.select();
            navigator.clipboard.writeText(targetText.value).then(() => {
                // Show feedback
                const originalHTML = copyTranslationBtn.innerHTML;
                copyTranslationBtn.innerHTML = '<i class="fas fa-check"></i> ' + translationTexts.copied + '!';
                setTimeout(() => {
                    copyTranslationBtn.innerHTML = '<i class="fas fa-copy me-1"></i> ' + translationTexts.copied;
                }, 2000);
            });
        });

        // Quick actions
        quickActionBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                const text = targetText.value.trim();
                if (!text) return;

                switch (action) {
                    case 'copy':
                        navigator.clipboard.writeText(text).then(() => {
                            showTempMessage(translationTexts.text_copied);
                        });
                        break;
                    case 'speak':
                        speakText(text, targetLang.value);
                        break;
                }
            });
        });

        // Show temporary message
        function showTempMessage(message) {
            translationStatus.innerHTML = `<i class="fas fa-info-circle"></i> ${message}`;
            setTimeout(() => {
                if (targetText.value.trim()) {
                    translationStatus.innerHTML = '<i class="fas fa-check-circle text-success"></i> ' + translationTexts.translation_complete;
                } else {
                    translationStatus.textContent = '';
                }
            }, 3000);
        }

        // Show/hide translation UI elements
        function showTranslationUI() {
            copyTranslationBtn.style.display = 'block';
            speakTranslationBtn.style.display = 'block';
            quickActions.style.display = 'flex';
        }

        function hideTranslationUI() {
            copyTranslationBtn.style.display = 'none';
            speakTranslationBtn.style.display = 'none';
            quickActions.style.display = 'none';
            translationStatus.textContent = '';
        }

        // Perform translation
        function performTranslation() {
            const text = sourceText.value.trim();
            if (!text) {
                translationStatus.innerHTML = '<span class="text-warning">' + translationTexts.please_enter_text + '</span>';
                return;
            }

            const direction = sourceLang.value + '-' + targetLang.value;

            // Show loading state
            translationStatus.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + translationTexts.translating;
            translateBtn.disabled = true;
            translateBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>' + translationTexts.translating;

            // FIXED: Use relative path instead of absolute URL
            fetch('/api/translate', {  // Changed from full URL to relative path
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest' // Add this header for AJAX detection
                },
                body: 'text=' + encodeURIComponent(text) + '&direction=' + direction
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        targetText.value = data.data.translatedText; // Fixed: access nested data
                        translationStatus.innerHTML = '<span class="text-success"><i class="fas fa-check-circle"></i> ' + translationTexts.translation_complete + '</span>';
                        showTranslationUI();
                    } else {
                        translationStatus.innerHTML = '<span class="text-danger">' + (data.message || translationTexts.translation_failed) + '</span>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    translationStatus.innerHTML = '<span class="text-danger">' + translationTexts.network_error + '</span>';

                    // Fallback: Show mock translation for demo
                    const mockTranslation = text + ' [Demo Translation]';
                    targetText.value = mockTranslation;
                    translationStatus.innerHTML = '<span class="text-success"><i class="fas fa-check-circle"></i> ' + translationTexts.translation_complete + ' (Demo)</span>';
                    showTranslationUI();
                })
                .finally(() => {
                    translateBtn.disabled = false;
                    translateBtn.innerHTML = '<i class="fas fa-language me-2"></i>' + translationTexts.translate;
                });
        }

        // Translate button click
        translateBtn.addEventListener('click', performTranslation);

        // Auto-translate on Enter (Ctrl+Enter)
        sourceText.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                performTranslation();
            }
        });

        // Real-time count updates
        sourceText.addEventListener('input', updateCounts);

        // Auto-focus on source text
        sourceText.focus();

        // Initialize
        updateCounts();
        hideTranslationUI();
    });
</script>