<?php include 'php/header.php'; ?>

<?php include 'php/hero.php'; ?>

<main>
    <!-- Page Header -->
    <section class="page-header">
        <h1>Admissions</h1>
        <p>Join SAVIOR SSS Today</p>
    </section>

    <div class="container content-page">
        <section class="admissions-content">
            <h2>How to Apply</h2>
            <p>We welcome applications from motivated students seeking quality education. Follow the steps below to apply to SAVIOR SSS.</p>

            <!-- Application Process -->
            <div class="steps-container">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Download Application Form</h3>
                    <p>Obtain the application form from our office or download it online</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Complete the Form</h3>
                    <p>Fill in all required information accurately and completely</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Gather Documents</h3>
                    <p>Prepare copies of your academic records and certificates</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Submit Application</h3>
                    <p>Submit your form with all required documents to our office</p>
                </div>
                <div class="step">
                    <div class="step-number">5</div>
                    <h3>Interview & Selection</h3>
                    <p>Attend interview if shortlisted and await admission decision</p>
                </div>
            </div>

            <!-- Requirements -->
            <h3>Admission Requirements</h3>
            <div class="requirements-box">
                <h4>O-Level Applicants</h4>
                <ul>
                    <li>Primary Leaving Examination (PLE) Certificate</li>
                    <li>Birth Certificate or National ID</li>
                    <li>Medical Report</li>
                    <li>Character Reference</li>
                    <li>Proof of Payment of Application Fee</li>
                </ul>
            </div>

            <div class="requirements-box">
                <h4>A-Level Applicants</h4>
                <ul>
                    <li>Uganda Certificate of Education (UCE) with minimum Division 2</li>
                    <li>Academic Transcripts</li>
                    <li>Birth Certificate or National ID</li>
                    <li>Medical Report</li>
                    <li>Character Reference</li>
                </ul>
            </div>

            <!-- Online Application Form -->
            <h3>Quick Application</h3>
            <p>Submit your initial inquiry below and we'll contact you with more information:</p>
            
            <form class="application-form" method="POST" action="php/process_admission.php">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="level">Applying for *</label>
                        <select id="level" name="level" required>
                            <option value="">-- Select Level --</option>
                            <option value="O-Level">O-Level</option>
                            <option value="A-Level">A-Level</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stream">Stream (A-Level only)</label>
                        <select id="stream" name="stream">
                            <option value="">-- Select Stream --</option>
                            <option value="Arts">Arts</option>
                            <option value="Science">Science</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Tell us why you want to join SAVIOR SSS"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Application</button>
            </form>

            <!-- Contact Info -->
                <div class="contact-info-box">
                <h3>Need Help?</h3>
                <p>Contact our admissions office:</p>
                <p><strong>Phone:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>"><?php echo SCHOOL_PHONE1; ?></a></p>
                <p><strong>Director:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_DIRECTOR_PHONE); ?>"><?php echo SCHOOL_DIRECTOR_PHONE; ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a></p>
                <p><strong>Address:</strong> <?php echo SCHOOL_BOX; ?></p>
                <?php if(defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP)): ?>
                    <?php $wa = preg_replace('/[^0-9]/','',SCHOOL_WHATSAPP); ?>
                    <p><strong>WhatsApp:</strong> <a href="https://web.whatsapp.com/send?phone=<?php echo $wa; ?>&text=<?php echo rawurlencode('Hello, I need help with admissions.'); ?>&app_absent=0" target="_blank" rel="noopener"><?php echo SCHOOL_WHATSAPP; ?></a></p>
                <?php endif; ?>
            </div>
        </section>
    </div>
</main>

<?php include 'php/footer.php'; ?>
