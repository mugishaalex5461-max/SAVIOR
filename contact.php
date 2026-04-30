<?php include 'php/header.php'; ?>

<?php include 'php/hero.php'; ?>

<main>
    <div class="container content-page">
        <div class="contact-container">
            <!-- Contact Form -->
            <section class="contact-form-section">
                <h2>Send us a Message</h2>
                <form class="contact-form" method="POST" action="php/process_contact.php">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" placeholder="What is your inquiry about?" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" placeholder="Please provide details of your inquiry..." required></textarea>
                    </div>

                    <div class="contact-actions">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                        <button type="button" id="sendSmsBtn" class="btn btn-sms" data-sms-to="<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>">Send via SMS</button>
                        <button type="button" id="sendWaBtn" class="btn btn-whatsapp" data-wa-to="<?php echo preg_replace('/[^0-9]/','',defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP) ? SCHOOL_WHATSAPP : SCHOOL_PHONE1); ?>">Send via WhatsApp</button>
                    </div>
                </form>
            </section>

            <!-- Contact Information -->
            <section class="contact-info-section">
                <h2>Contact Information</h2>

                <div class="info-box">
                    <h3><i class="fas fa-map-marker-alt"></i> Location</h3>
                    <p><?php echo SCHOOL_NAME; ?></p>
                    <?php $m = rawurlencode(SCHOOL_LOCATION . ' ' . SCHOOL_BOX); ?>
                    <p><a href="https://www.google.com/maps/search/?api=1&query=<?php echo $m; ?>" target="_blank" rel="noopener"><?php echo SCHOOL_LOCATION; ?></a></p>
                    <p><small><?php echo SCHOOL_BOX; ?></small></p>
                </div>

                <div class="info-box">
                    <h3><i class="fas fa-phone"></i> Phone</h3>
                    <p><strong>Main Line:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>"><?php echo SCHOOL_PHONE1; ?></a></p>
                    <p><strong>Director:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_DIRECTOR_PHONE); ?>"><?php echo SCHOOL_DIRECTOR_PHONE; ?></a></p>
                </div>

                <div class="info-box">
                    <h3><i class="fas fa-envelope"></i> Email</h3>
                    <p><a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a></p>
                </div>

                <?php if(defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP)): ?>
                <div class="info-box">
                    <h3><i class="fab fa-whatsapp"></i> WhatsApp</h3>
                    <?php $wa = preg_replace('/[^0-9]/','',SCHOOL_WHATSAPP); ?>
                    <p><a href="https://web.whatsapp.com/send?phone=<?php echo $wa; ?>&text=<?php echo rawurlencode('Hello, I would like to enquire about admissions.'); ?>&app_absent=0" target="_blank" rel="noopener"><?php echo SCHOOL_WHATSAPP; ?></a></p>
                </div>
                <?php endif; ?>

                <div class="info-box">
                    <h3><i class="fas fa-graduation-cap"></i> School Info</h3>
                    <p><strong>Type:</strong> <?php echo SCHOOL_TYPE; ?></p>
                    <p><strong>Programmes:</strong> <?php echo PROGRAMS; ?></p>
                    <p><strong>Centre No:</strong> <?php echo SCHOOL_CENTRE_NO; ?></p>
                </div>

                <div class="info-box">
                    <h3><i class="fas fa-clock"></i> Office Hours</h3>
                    <p><strong>Monday - Friday:</strong> 8:00 AM - 5:00 PM</p>
                    <p><strong>Saturday:</strong> 9:00 AM - 1:00 PM</p>
                    <p><strong>Sunday:</strong> Closed</p>
                </div>

                <div class="info-box map-box">
                    <h3><i class="fas fa-map"></i> Map</h3>
                    <div class="map-placeholder">
                        <p>Interactive map coming soon</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
