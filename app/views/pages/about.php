<div class="row">
    <div class="col-12">
        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary"><?php echo $trans->get('about_us'); ?></h1>
            <p class="lead text-muted"><?php echo $trans->get('about_description'); ?></p>
        </div>

        <!-- Mission & Vision -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-bullseye fa-3x text-primary"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('our_mission'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('mission_text'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-eye fa-3x text-success"></i>
                        </div>
                        <h3 class="card-title h4"><?php echo $trans->get('our_vision'); ?></h3>
                        <p class="card-text text-muted"><?php echo $trans->get('vision_text'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bold"><?php echo $trans->get('why_choose_us'); ?></h2>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-check-circle fa-2x text-white"></i>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('feature_1_title'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('feature_1_desc'); ?></p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-bolt fa-2x text-white"></i>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('feature_2_title'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('feature_2_desc'); ?></p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-friendly fa-2x text-white"></i>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('feature_3_title'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('feature_3_desc'); ?></p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-dollar-sign fa-2x text-white"></i>
                    </div>
                    <h4 class="h5"><?php echo $trans->get('feature_4_title'); ?></h4>
                    <p class="text-muted small"><?php echo $trans->get('feature_4_desc'); ?></p>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3"><?php echo $trans->get('team'); ?></h2>
                <p class="text-muted mb-4"><?php echo $trans->get('team_description'); ?></p>
                
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                                <h4 class="h5">John Doe</h4>
                                <p class="text-muted small">Founder & CEO</p>
                                <p class="small text-muted">Language expert with 10+ years experience</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                                    <i class="fas fa-user fa-3x text-muted"></i>
                                </div>
                                <h4 class="h5">Jane Smith</h4>
                                <p class="text-muted small">Lead Developer</p>
                                <p class="small text-muted">Full-stack developer and UI/UX designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="bg-light rounded p-5">
                    <h3 class="fw-bold mb-3"><?php echo $trans->get('contact_cta'); ?></h3>
                    <a href="/page/contact" class="btn btn-primary btn-lg">
                        <?php echo $trans->get('contact'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>