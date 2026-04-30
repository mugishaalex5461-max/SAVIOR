<?php
// Footer template
?>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3><?php echo defined('SCHOOL_NAME') ? SCHOOL_NAME : 'SAVIOR SSS'; ?></h3>
                <p><strong>Motto:</strong> <?php echo SCHOOL_MOTTO; ?></p>
                <p><strong>Type:</strong> <?php echo SCHOOL_TYPE; ?></p>
                <p><strong>Programmes:</strong> <?php echo PROGRAMS; ?></p>
            </div>
            
                <div class="footer-section">
                <h4>Contact</h4>
                <p><i class="fas fa-map-marker-alt"></i>
                    <?php
                    $map_query = rawurlencode(SCHOOL_LOCATION . ' ' . SCHOOL_BOX);
                    $map_href = 'https://www.google.com/maps/search/?api=1&query=' . $map_query;
                    ?>
                    <a href="<?php echo $map_href; ?>" target="_blank" rel="noopener"><?php echo SCHOOL_LOCATION; ?></a>
                </p>
                <p><i class="fas fa-envelope"></i>
                    <a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a>
                </p>
                <p><i class="fas fa-phone"></i>
                    <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE1); ?>"><?php echo SCHOOL_PHONE1; ?></a>
                </p>
                <p><i class="fas fa-phone"></i>
                    <a href="tel:<?php echo preg_replace('/[^0-9+]/','',SCHOOL_PHONE2); ?>"><?php echo SCHOOL_PHONE2; ?></a>
                </p>
                <?php if(defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP)): ?>
                    <?php $wa_digits = preg_replace('/[^0-9]/','',SCHOOL_WHATSAPP); ?>
                    <p><i class="fab fa-whatsapp"></i>
                        <a href="https://wa.me/<?php echo $wa_digits; ?>" target="_blank" rel="noopener">Message us on WhatsApp</a>
                    </p>
                <?php endif; ?>
                <p><i class="fas fa-envelope"></i> <small><?php echo SCHOOL_BOX; ?></small></p>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="admissions.php">Admissions</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <?php
                    $fb = defined('SOCIAL_FACEBOOK') ? SOCIAL_FACEBOOK : '';
                    $tw = defined('SOCIAL_TWITTER') ? SOCIAL_TWITTER : '';
                    $ig = defined('SOCIAL_INSTAGRAM') ? SOCIAL_INSTAGRAM : '';
                    $yt = defined('SOCIAL_YOUTUBE') ? SOCIAL_YOUTUBE : '';

                    // WhatsApp first (use SCHOOL_WHATSAPP if defined, otherwise fallback to phone)
                    $wa_href = '';
                    if (defined('SCHOOL_WHATSAPP') && !empty(SCHOOL_WHATSAPP)) {
                        $wa_digits = preg_replace('/[^0-9]/','',SCHOOL_WHATSAPP);
                        $wa_href = 'https://wa.me/' . $wa_digits;
                    } elseif (!empty(SCHOOL_PHONE1)) {
                        $wa_digits = preg_replace('/[^0-9+]/','',SCHOOL_PHONE1);
                        $wa_digits = preg_replace('/[^0-9]/','',$wa_digits);
                        $wa_href = 'https://wa.me/' . $wa_digits;
                    }

                    if (!empty($wa_href)) {
                        echo '<a href="https://web.whatsapp.com/send?phone=' . $wa_digits . '&text=' . rawurlencode('Hello, I would like to get in touch with SAVIOR SSS.') . '&app_absent=0" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i></a>';
                    }

                    $links = [
                        ['url'=>$fb,'icon'=>'fab fa-facebook'],
                        ['url'=>$tw,'icon'=>'fab fa-twitter'],
                        ['url'=>$ig,'icon'=>'fab fa-instagram'],
                        ['url'=>$yt,'icon'=>'fab fa-youtube'],
                    ];

                    foreach ($links as $ln) {
                        $href = !empty($ln['url']) ? $ln['url'] : '#';
                        $target = !empty($ln['url']) ? ' target="_blank" rel="noopener"' : '';
                        echo '<a href="' . $href . '"' . $target . '><i class="' . $ln['icon'] . '"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 <?php echo SCHOOL_NAME; ?>. All rights reserved. | Centre No: <?php echo SCHOOL_CENTRE_NO; ?></p>
        </div>
    </footer>

    <div class="image-viewer" id="imageViewer" aria-hidden="true">
        <button type="button" class="image-viewer-close" id="imageViewerClose" aria-label="Close image">&times;</button>
        <img id="imageViewerImg" alt="Expanded view">
    </div>
    
    <script src="/SAVIOR_SSS/js/script.js"></script>
</body>
</html>
