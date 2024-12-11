<?php
// Template Name: Landing
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');



$faq_section_heading = get_field('faq_section_heading', 'options');

$testimonials_section_heading = get_field('testimonials_section_heading', 'options');
$reviews_area = get_field('reviews_area', 'options');
?>
    <!-- ================= COMMON BANNER AREA ============== -->
    <?php if($banner_big_heading) : ?>
        <section class="banner_new_landing_wrapper" style="background-image: url(<?php echo $banner_background_image['url']; ?>);">
            <div class="container">
                <div class="banner_new_landing_area text-center">
                    <h2><?php echo $banner_big_heading; ?></h2>
                    <?php if($banner_small_heading) : ?>
                        <p><?php echo $banner_small_heading; ?></p>
                    <?php endif; ?>
                    <a href="/get-estimate/" class="common_btn calling_btn">Get Estimate</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= WELCOME AREA ============== -->
    <?php
    $welcome_heading = get_field('welcome_heading');
    $welcome_text_area = get_field('welcome_text_area');
    $welcome_button = get_field('welcome_button');
    if($welcome_heading) : ?>
        <section class="common_padding welcome_wrapper">
            <div class="container">
                <div class="welcome_area">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="welcome_title_area">
                                <div class="common_section_title_area">
                                    <h2><?php echo $welcome_heading; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="welcome_details_area">
                                <div class="common_para">
                                    <p><?php echo $welcome_text_area; ?></p>
                                </div>
                                <a href="<?php echo $welcome_button['url']; ?>" class="common_btn"><?php echo $welcome_button['title']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= SERVICES AREA ============== -->
    <?php
    $services_heading = get_field('services_heading');
    $services_small_description = get_field('services_small_description');
    $cleaning_tab_contents = get_field('cleaning_tab_contents');
    if($cleaning_tab_contents) : ?>
        <section class="services_area_main">
            <div class="container">
                <div class="services_area">
                    <div class="common_section_title_area text-center">
                        <h2><?php echo $services_heading; ?></h2>
                        <div class="common_para">
                            <?php echo $services_small_description; ?>
                        </div>
                    </div>
                    <div class="service_tab_area">
                        <div class="tabs">
                            <div class="tab_top_area">
                                <ul id="tabs-nav" class="tab_ul">
                                    <?php 
                                        foreach($cleaning_tab_contents as $key=> $tab_name_item) :
                                            $tab_name = $tab_name_item['tab_name'];
                                    ?>
                                                <li><a href="#tab<?php echo $key; ?>"><?php echo $tab_name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul> <!-- END tabs-nav -->
                            </div>
                            <div id="tabs-content">
                                <!-- Tab loop-->
                                <?php 
                                    foreach($cleaning_tab_contents as $key=> $tab_name_item) :
                                        $tab_name = $tab_name_item['tab_name'];
                                        $tab_heading = $tab_name_item['tab_heading'];
                                        $tab_details = $tab_name_item['tab_details'];
                                        $tab_image = $tab_name_item['tab_image'];
                                        $request_a_quote_button = $tab_name_item['request_a_quote_button'];
                                ?>
                                            <div id="tab<?php echo $key; ?>" class="tab-content">
                                                <div class="tab_content_details">
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-6">
                                                            <div class="tab_content_photo_area <?php echo ($key==0) ? "wow fadeInDown" : "" ?>" data-wow-offset="100">
                                                                <div class="common_photo_design_area">
                                                                    <img src="<?php echo $tab_image['sizes']['large']; ?>" alt="<?php echo $tab_image['alt']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-6">
                                                            <div class="tab_content_details_area <?php echo ($key==0) ? "wow fadeInDown" : "" ?>"
                                                                data-wow-offset="100" data-wow-duration="1.2s">
                                                                <div class="tab_content_text_details">
                                                                    <div class="cleaning_topics">
                                                                        <div class="common_para which_type_of_cleaning">
                                                                            <?php echo $tab_details; ?>
                                                                            <?php if($request_a_quote_button) : ?>
                                                                                <a href="<?php echo $request_a_quote_button['url']; ?>" class="common_btn"><?php echo $request_a_quote_button['title']; ?></a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php endforeach; ?>
                            </div> <!-- END tabs-content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= WHY AREA ============== -->
    <?php
    $why_heading = get_field('why_heading');
    $why_small_description = get_field('why_small_description');
    $why_cards = get_field('why_cards');
    if($why_cards) : ?>
        <section class="common_padding common_bg_light_green why_wrapper">
            <div class="container">
                <div class="why_area">
                    <div class="common_section_title_area text-center">
                        <h2><?php echo $why_heading ; ?></h2>
                        <div class="common_para">
                            <?php echo $why_small_description; ?>
                        </div>
                    </div>
                    <div class="why_cards_wrapper">
                        <div class="row">
                            <?php
                                foreach($why_cards as $each_why_cards):
                                    $card_icon = $each_why_cards['card_icon'];
                                    $card_heading = $each_why_cards['card_heading'];
                                    $card_details = $each_why_cards['card_details'];
                            ?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="why_card_area text-center">
                                        <img src="<?php echo $card_icon['url']; ?>" alt="<?php echo $card_icon['alt']; ?>">
                                        <h3><?php echo $card_heading; ?></h3>
                                        <p><?php echo $card_details; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= MEET OWNER  ============== -->
    <?php
    $meet_heading = get_field('meet_heading');
    $meet_sub_heading = get_field('meet_sub_heading');
    $meet_small_description = get_field('meet_small_description');
    $owners_image = get_field('owners_image');
    $quote_image = get_field('quote_image');
    $owner_quote = get_field('owner_quote');
    $owner_name = get_field('owner_name');
    $meet_section_button = get_field('meet_section_button');
    if($owner_quote) : ?>
        <section class="common_padding meet_owner_wrapper">
            <div class="container">
                <div class="meet_owner_area text-center">
                    <div class="common_section_title_area">
                        <h2><?php echo $meet_heading; ?></h2>
                        <h5><?php echo $meet_sub_heading; ?></h5>
                        <div class="common_para">
                            <?php echo $meet_small_description; ?>
                        </div>
                    </div>
                    <div class="owner_details_area">
                        <img src="<?php echo $owners_image['url']; ?>" alt="<?php echo $owners_image['alt']; ?>"
                            class="owner_img">
                        <img src="<?php echo $quote_image['url']; ?>" alt="<?php echo $quote_image['alt']; ?>"
                            class="quote_img">
                        <p><?php echo $owner_quote; ?></p>
                        <span><?php echo $owner_name; ?></span>
                    </div>
                    <a href="<?php echo $meet_section_button['url']; ?>"
                        class="common_btn"><?php echo $meet_section_button['title']; ?></a>
                </div>
            </div>
        </section>  
    <?php endif; ?>
    <!-- ================= FAQs AREA ============== -->
    <?php
    $faq_posts = array(
        'post_type' => 'faqs',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );

    $faq_query = new WP_Query($faq_posts);


    if($faq_query->posts):
    ?>
        <section class="faqs-area-main common_bg_light_green new_landing_faq_wrapper">
            <div class="container">
                <div class="small_container">
                    <div class="faqs-area wow fadeInDown" data-wow-offset="100">
                        <div class="accordion-container">
                            <div class="common_section_title_area text-center">
                                <h2><?php echo $faq_section_heading; ?></h2>
                            </div>
                            <div class="total_faqs_points_area">
                                <?php
                                    foreach($faq_query->posts as $each_faq):
                                        $faqs_answer = get_field('faqs_answer' ,$each_faq->ID);
                                ?>
                                                <div class="set">
                                                    <a href="#">
                                                        <?php echo $each_faq->post_title; ?>
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="content">
                                                        <?php echo $faqs_answer; ?>
                                                    </div>
                                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= TESTIMONIAL AND WHY CHOOSE US ============== -->
    <?php if($reviews_area) : ?>
        <section class="testimonials_and_why_area_main">
            <div class="small_container">
                <div class="testimonials_and_why_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial_slider_area wow fadeInDown" data-wow-offset="100" data-wow-duration="1.5s">
                                <div class="common_section_title_area text-center">
                                    <h2><?php echo $testimonials_section_heading; ?></h2>
                                </div>
                                <div class="swiper testimonialSwiper">
                                    <div class="swiper-wrapper">
                                        <?php 
                                            foreach($reviews_area as $each_review) :
                                                $review_given_person_image = $each_review['review_given_person_image'];
                                                $review_content = $each_review['review_content'];
                                                $review_given_person_name = $each_review['review_given_person_name'];
                                        ?>
                                                    <div class="swiper-slide">
                                                        <div class="testimonial_content_area">
                                                            <?php if($review_given_person_image): ?>
                                                                <div class="testimonial_person">
                                                                    <img src="<?php echo $review_given_person_image['sizes']['medium']; ?>" alt="img">
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="testimonial_content">
                                                                <?php echo $review_content; ?>
                                                            </div>
                                                            <div class="testimonial_person_name">
                                                                <p><?php echo $review_given_person_name; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-button-next arrow t_next"></div>
                                    <div class="swiper-button-prev arrow t_prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
     <!-- ================= CONTACT US  ============== -->
     <?php
    $contact_heading = get_field('contact_heading');
    $contact_details_and_timing = get_field('contact_details_and_timing');
    $contact_number = get_field('contact_number');
    $form_heading = get_field('form_heading');
    if($contact_heading) : ?>
        <section class="common_padding common_bg_light_green contact_service_request" id="contact_service_request">
            <div class="container">
                <div class="row align-items-center gap-4 gap-md-5 gap-xl-0">
                    <div class="col-xl-6">
                        <div class="contact_service_details pe-4 pe-lg-5">
                            <div class="common_section_title_area mb-4 mb-lg-5">
                                <h2><?php echo $contact_heading; ?></h2>
                                <div class="common_para">
                                    <?php echo $contact_details_and_timing; ?>
                                </div>
                            </div>
                            <a href="tel:<?php echo $contact_number; ?>" class="calling_btn">Call: <strong><?php echo $contact_number; ?></strong></a>
                        </div>
                    </div>
                    <div class="col-xl-6 right">
                        <div class="new_landing_contact_form_wrapper">
                            <h2><?php echo $form_heading; ?></h2>
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