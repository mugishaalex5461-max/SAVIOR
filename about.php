<?php include 'php/header.php'; ?>

<?php include 'php/hero.php'; ?>

<main>
    <div class="container content-page">
        <div class="about-grid">
            <section class="about-card">
                <h2>Who We Are</h2>
                <p>SAVIOR Secondary School is a mixed day and boarding institution situated in Nyakinama, Bufumbira, Western Uganda, along the Kisoro-Busanza Road. Established with a commitment to educational excellence, we serve students from across the region and beyond.</p>

                <h3>Our Motto</h3>
                <p><strong>"<?php echo SCHOOL_MOTTO; ?>"</strong> - This principle guides every aspect of our educational journey, encouraging students to persevere through challenges and achieve academic and personal success.</p>
            </section>

            <section class="about-card">
                <h3>School Information</h3>
                <ul class="info-list">
                    <li><strong>Name:</strong> <?php echo SCHOOL_NAME; ?></li>
                    <li><strong>Location:</strong>
                        <?php $map_q = rawurlencode(SCHOOL_LOCATION . ' ' . SCHOOL_BOX); ?>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $map_q; ?>" target="_blank" rel="noopener"><?php echo SCHOOL_LOCATION; ?></a>
                    </li>
                    <li><strong>Address:</strong> <small><?php echo SCHOOL_BOX; ?></small></li>
                    <li><strong>Type:</strong> <?php echo SCHOOL_TYPE; ?></li>
                    <li><strong>Programmes:</strong> <?php echo PROGRAMS; ?></li>
                    <li><strong>Centre No:</strong> <?php echo SCHOOL_CENTRE_NO; ?></li>
                </ul>

                <h3>Contact Details</h3>
                <ul class="info-list">
                    <li><strong>Main Line:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>"><?php echo SCHOOL_PHONE1; ?></a></li>
                    <li><strong>Director:</strong> <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_DIRECTOR_PHONE); ?>"><?php echo SCHOOL_DIRECTOR_PHONE; ?></a></li>
                    <li><strong>Email:</strong> <a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a></li>
                    <?php if(defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP)): ?>
                        <?php $wa = preg_replace('/[^0-9]/','',SCHOOL_WHATSAPP); ?>
                        <li><strong>WhatsApp:</strong> <a href="https://web.whatsapp.com/send?phone=<?php echo $wa; ?>&text=<?php echo rawurlencode('Hello SAVIOR SSS, I would like to enquire.'); ?>&app_absent=0" target="_blank" rel="noopener"><?php echo SCHOOL_WHATSAPP; ?></a></li>
                    <?php endif; ?>
                </ul>
            </section>

            <section class="about-card">
                <h3>Our Facilities</h3>
                <p>SAVIOR SSS boasts modern facilities designed to support both academic and extracurricular activities:</p>
                <ul class="features-list">
                    <li><i class="fas fa-building"></i> Spacious Classrooms with Modern Equipment</li>
                    <li><i class="fas fa-microscope"></i> Well-Equipped Science Laboratories</li>
                    <li><i class="fas fa-laptop"></i> Computer Laboratory with Internet Access</li>
                    <li><i class="fas fa-book"></i> Well-Stocked Library</li>
                    <li><i class="fas fa-utensils"></i> Modern Dining Hall</li>
                    <li><i class="fas fa-dorm"></i> Comfortable Boarding Facilities</li>
                    <li><i class="fas fa-futbol"></i> Sports Grounds & Facilities</li>
                    <li><i class="fas fa-heartbeat"></i> Health Center</li>
                </ul>
            </section>

            <section class="about-card">
                <h3>Our Commitment</h3>
                <p>We are committed to:</p>
                <ul class="values-list">
                    <li>Providing quality education in both Arts and Science streams</li>
                    <li>Developing students' academic, social, and personal competencies</li>
                    <li>Fostering a culture of discipline, respect, and integrity</li>
                    <li>Creating a safe and supportive learning environment</li>
                    <li>Preparing students for higher education and professional success</li>
                </ul>
            </section>

            <section class="about-card about-map-card">
                <h3>Our Location</h3>
                <p><?php echo SCHOOL_LOCATION; ?></p>
                <?php $map_q2 = rawurlencode(SCHOOL_LOCATION . ' ' . SCHOOL_NAME); ?>
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $map_q2; ?>" target="_blank" rel="noopener" class="map-link">
                    <div class="map-placeholder" role="button" aria-label="Open Google Maps for <?php echo htmlspecialchars(SCHOOL_NAME); ?>">
                        <i class="fas fa-map"></i>
                        <p>Open live map on Google Maps</p>
                    </div>
                </a>
            </section>
        </div>
    </div>
</main>

<?php include 'php/footer.php'; ?>
