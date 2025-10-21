<div class="row">
    <div class="col-md-8 mx-auto">
        <h1><?php echo $contact_title; ?></h1>
        <p>Contact us using the form below:</p>
        <form>
            <div class="mb-3">
                <label class="form-label"><?php echo $trans->get('name'); ?></label>
                <input type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><?php echo $trans->get('email'); ?></label>
                <input type="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><?php echo $trans->get('message'); ?></label>
                <textarea class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $trans->get('send'); ?></button>
        </form>
    </div>
</div>