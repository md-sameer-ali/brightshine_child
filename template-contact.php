<?php
// Template Name: Contact Us Page
get_header();
$directory = get_stylesheet_directory_uri();

$contact_small_heading = get_field('contact_small_heading');
$contact_big_heading = get_field('contact_big_heading');
$contact_page_details_text = get_field('contact_page_details_text');
$contact_number = get_field('contact_number');
$contact_email = get_field('contact_email');
$contact_background_image = get_field('contact_background_image');
?>

    <!-- ================= CONTACT AREA ============== -->
    <?php if($contact_big_heading) : ?>
    <section class="common_banner_area_main contact_area_main" style="background-image: url(<?php echo $contact_background_image['sizes']['large'];?>);">
        <div class="container">
            <div class="common_banner_area contact_area">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact_area_details">
                            <?php if($contact_small_heading) : ?>
                                <div class="common_heading_small">
                                    <h3><?php echo $contact_small_heading; ?></h3>
                                </div>
                            <?php endif; ?>
                            <div class="common_heading_banner">
                                <h2><?php echo $contact_big_heading; ?></h2>
                            </div>
                            <div class="common_para">
                                <?php echo $contact_page_details_text; ?>
                            </div>
                            <div class="contact_number">
                                <p>Get a quote: </p>
                                <div class="all_contact_details">
                                    <a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a>
                                    <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="main_form_area">
                            <?php echo do_shortcode('[contact-form-7 id="8c3d0a0" title="Contact form 1"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

<?php get_footer(); ?>