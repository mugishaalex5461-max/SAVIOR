<?php include 'php/header.php'; ?>

<?php include 'php/hero.php'; ?>

<main>
    <div class="container content-page">
        <section class="gallery-section">
            <div class="gallery-grid">
                <?php
                // Prefer the project's config file in the php/ folder. If missing, show friendly fallback.
                $config_path = __DIR__ . '/php/config.php';

                if (!file_exists($config_path)) {
                    ?>
                    <div class="placeholder full-width">
                        <i class="fas fa-images"></i>
                        <p>all images in this folder</p>
                    </div>
                    <?php
                } else {
                    require_once $config_path;

                    $gallery_query = $conn->query("SELECT * FROM gallery WHERE is_active = 1 ORDER BY uploaded_at DESC");

                    if ($gallery_query && $gallery_query->num_rows > 0) {
                        while ($image = $gallery_query->fetch_assoc()) {
                            ?>
                            <div class="gallery-item">
                                <div class="gallery-image">
                                    <img src="/SAVIOR_SSS/uploads/<?php echo rawurlencode($image['filename']); ?>" alt="<?php echo htmlspecialchars($image['title']); ?>">
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        // No DB entries - fall back to scanning the images folder
                        $imgDir = __DIR__ . '/images';
                        $files = [];
                        if (is_dir($imgDir)) {
                            $files = glob($imgDir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                        }

                        if (!empty($files)) {
                            foreach ($files as $f) {
                                $fname = basename($f);
                                ?>
                                <div class="gallery-item">
                                    <div class="gallery-image">
                                        <img src="/SAVIOR_SSS/images/<?php echo rawurlencode($fname); ?>" alt="<?php echo htmlspecialchars($fname); ?>">
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="placeholder full-width">
                                <i class="fas fa-images"></i>
                                <p>all images in this folder</p>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>

            <div class="gallery-info">
                <h3>Share Your Moments</h3>
                <p>Do you have photos from SAVIOR SSS events? We'd love to feature them in our gallery. Contact us at:</p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo SCHOOL_EMAIL; ?>"><?php echo SCHOOL_EMAIL; ?></a></p>
            </div>
        </section>
    </div>
</main>

<?php include 'php/footer.php'; ?>
