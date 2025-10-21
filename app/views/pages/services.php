<div class="row">
    <div class="col-12">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary"><?php echo $trans->get('services'); ?></h1>
            <p class="lead text-muted"><?php echo $trans->get('services_description'); ?></p>
        </div>

        <!-- Services Grid -->
        <div class="row mb-5">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-language fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('translation_service'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('translation_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-primary">Free & Premium</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-success mb-3">
                            <i class="fas fa-book fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('dictionary_service'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('dictionary_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-success">Free & Premium</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-info mb-3">
                            <i class="fas fa-file-alt fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('document_translation'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('document_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-info">Premium</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-warning mb-3">
                            <i class="fas fa-globe fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('website_translation'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('website_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-warning">Business</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-danger mb-3">
                            <i class="fas fa-check-circle fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('proofreading'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('proofreading_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-danger">Premium</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm service-card">
                    <div class="card-body text-center p-4">
                        <div class="text-secondary mb-3">
                            <i class="fas fa-comments fa-3x"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('consultation'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('consultation_description'); ?></p>
                        <div class="mt-3">
                            <span class="badge bg-secondary">Business</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold"><?php echo $trans->get('how_it_works'); ?></h2>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div
                        class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3 step-circle">
                        <span class="text-white fw-bold fs-4">1</span>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('step_1'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('step_1_desc'); ?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div
                        class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3 step-circle">
                        <span class="text-white fw-bold fs-4">2</span>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('step_2'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('step_2_desc'); ?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div
                        class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3 step-circle">
                        <span class="text-white fw-bold fs-4">3</span>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('step_3'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('step_3_desc'); ?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div
                        class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3 step-circle">
                        <span class="text-white fw-bold fs-4">4</span>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('step_4'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('step_4_desc'); ?></p>
                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold"><?php echo $trans->get('pricing'); ?></h2>
            </div>

            <!-- Free Plan -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-header text-center py-4 bg-light">
                        <h3 class="h4"><?php echo $trans->get('free_plan'); ?></h3>
                        <div class="price display-4 fw-bold text-dark"><?php echo $trans->get('free_price'); ?></div>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('free_feature_1'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('free_feature_2'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('free_feature_3'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('free_feature_4'); ?>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="/"
                                class="btn btn-outline-primary w-100"><?php echo $trans->get('get_started'); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Premium Plan -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-lg premium-card">
                    <div class="card-header text-center py-4 bg-primary text-white">
                        <span
                            class="badge bg-warning position-absolute top-0 start-50 translate-middle px-3">Popular</span>
                        <h3 class="h4"><?php echo $trans->get('premium_plan'); ?></h3>
                        <div class="price display-4 fw-bold"><?php echo $trans->get('premium_price'); ?></div>
                        <small class="text-white-50"><?php echo $trans->get('premium_period'); ?></small>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_1'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_2'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_3'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_4'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_5'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('premium_feature_6'); ?>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="/" class="btn btn-primary w-100"><?php echo $trans->get('choose_plan'); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Plan -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-header text-center py-4 bg-dark text-white">
                        <h3 class="h4"><?php echo $trans->get('business_plan'); ?></h3>
                        <div class="price display-4 fw-bold"><?php echo $trans->get('business_price'); ?></div>
                        <small class="text-white-50"><?php echo $trans->get('business_period'); ?></small>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_1'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_2'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_3'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_4'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_5'); ?>
                            </li>
                            <li class="mb-2"><i
                                    class="fas fa-check text-success me-2"></i><?php echo $trans->get('business_feature_6'); ?>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="/page/contact"
                                class="btn btn-outline-dark w-100"><?php echo $trans->get('contact_sales'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-4">
                    <h2 class="fw-bold"><?php echo $trans->get('faq'); ?></h2>
                </div>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq1">
                                <?php echo $trans->get('faq_1'); ?>
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo $trans->get('faq_1_answer'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2">
                                <?php echo $trans->get('faq_2'); ?>
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo $trans->get('faq_2_answer'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3">
                                <?php echo $trans->get('faq_3'); ?>
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo $trans->get('faq_3_answer'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4">
                                <?php echo $trans->get('faq_4'); ?>
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo $trans->get('faq_4_answer'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="bg-primary text-white rounded p-5">
                    <h3 class="fw-bold mb-3"><?php echo $trans->get('ready_to_start'); ?></h3>
                    <p class="mb-4 opacity-75">Start translating instantly with our free service or upgrade for advanced
                        features.</p>
                    <a href="/" class="btn btn-light btn-lg me-3"><?php echo $trans->get('start_translating'); ?></a>
                    <a href="/page/contact"
                        class="btn btn-outline-light btn-lg"><?php echo $trans->get('contact'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>