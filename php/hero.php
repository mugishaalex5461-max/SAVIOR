<?php
// Hero partial - sliding background images
?>
<section class="hero" aria-label="Site hero">
    <div class="hero-slides" aria-hidden="false">
        <div class="hero-slide" style="background-image: url('/SAVIOR_SSS/images/background.jpg')"></div>
        <div class="hero-slide" style="background-image: url('/SAVIOR_SSS/images/students.jpeg')"></div>
    </div>

    <?php
    // Determine per-page hero titles. Header sets $current_page.
    $hero_title = SCHOOL_NAME;
    $hero_motto = SCHOOL_MOTTO;
    $hero_sub = SCHOOL_TYPE . ' | ' . PROGRAMS;

    if (isset($current_page)) {
        switch ($current_page) {
            case 'about':
                $hero_title = 'About ' . SCHOOL_NAME;
                $hero_sub = 'Our Story, Mission & Vision';
                break;
            case 'news':
                $hero_title = 'News & Events';
                $hero_sub = 'Stay updated with school news';
                break;
            case 'staff':
                $hero_title = 'Our Staff';
                $hero_sub = 'Meet the dedicated team at ' . SCHOOL_NAME;
                break;
            case 'gallery':
                $hero_title = 'Gallery';
                $hero_sub = 'Moments from SAVIOR SSS';
                break;
            case 'admissions':
                $hero_title = 'Admissions';
                $hero_sub = 'Join SAVIOR SSS Today';
                break;
            case 'contact':
                $hero_title = 'Contact Us';
                $hero_sub = 'Get in touch with SAVIOR SSS';
                break;
            case 'academics':
                $hero_title = 'Academics';
                $hero_sub = 'Excellence in O-Level & A-Level Education';
                break;
            case 'index':
            default:
                // keep defaults (school name & motto)
                break;
        }
    }
    ?>

    <div class="hero-content">
        <h1><?php echo $hero_title; ?></h1>
        <?php if (!empty($hero_motto)) : ?>
            <p class="hero-motto"><?php echo $hero_motto; ?></p>
        <?php endif; ?>
        <?php if (!empty($hero_sub)) : ?>
            <p class="hero-subtitle"><?php echo $hero_sub; ?></p>
        <?php endif; ?>
        <div class="hero-buttons">
            <a href="admissions.php" class="btn btn-primary">Apply Now</a>
            <a href="about.php" class="btn btn-secondary">Learn More</a>
        </div>
        <div class="hero-calendar" id="heroCalendar">
            <div class="hc-header">
                <button class="hc-prev" aria-label="Previous month">‹</button>
                <div class="hc-month" id="hcMonthYear">Month Year</div>
                <button class="hc-next" aria-label="Next month">›</button>
            </div>
            <div class="hc-grid">
                <div class="hc-weekdays">
                    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                </div>
                <div class="hc-days" id="hcDays"></div>
            </div>
        </div>
    </div>

    <div class="hero-overlay" aria-hidden="true"></div>
</section>
