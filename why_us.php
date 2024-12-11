<?php
// Template Name: Why Us Page
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');

$testimonials_section_heading = get_field('testimonials_section_heading', 'options');
$reviews_area = get_field('reviews_area', 'options');

$why_us_ponits_area = get_field('why_us_ponits_area');
$why_points_section_button = get_field('why_points_section_button');

$mission_and_vision_image = get_field('mission_and_vision_image');
$mission_vision_content = get_field('mission_vision_content');

?>
    <!-- ================= COMMON BANNER AREA ============== -->
    <?php if($banner_big_heading) : ?>
        <section class="common_banner_area_main" style="background-image: url(<?php echo $banner_background_image['sizes']['large']; ?>);">
            <div class="container">
                <div class="common_banner_area">
                    <div class="common_heading_small">
                        <h3><?php echo $banner_small_heading; ?></h3>
                    </div>
                    <div class="common_heading_banner">
                        <h2><?php echo $banner_big_heading; ?></h2>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= WHY CHOOSE US POINTS ============== -->
    <?php if($why_us_ponits_area) : ?>
        <section class="common_bg_color our_values_area_main why_page_points_area_main">
            <div class="container">
                <div class="small_container">
                    <div class="our_values_area">
                        <div class="our_values_card_area">
                            <?php
                                foreach($why_us_ponits_area as $each_values) :
                                    $why_us_points_heading = $each_values['why_us_points_heading'];
                                    $why_us_details = $each_values['why_us_details'];
                                    $why_points_card_icon = $each_values['why_points_card_icon'];
                            ?>
                                        <div class="process_card wow fadeInDown" data-wow-offset="150">
                                            <div class="icon_heading_area">
                                                <?php if($why_points_card_icon) : ?>
                                                    <div class="card_icon_area_main">
                                                        <?php echo $why_points_card_icon; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="common_heading_small">
                                                    <h3><?php echo $why_us_points_heading; ?></h3>
                                                </div>
                                            </div>
                                            <div class="common_para">
                                                <p><?php echo $why_us_details; ?></p>
                                            </div>
                                        </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if($why_points_section_button): ?>
                            <div class="card_section_button_area">
                                <a href="<?php echo $why_points_section_button['url']; ?>" class="common_btn"><?php echo $why_points_section_button['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
     <!-- ================= MISSION AND VISION SECTION ============== -->
     <?php if($why_us_ponits_area) : ?>
        <section class="common_padding mission_vision_area_main">
            <div class="container">
                <div class="mission_vision_area">
                    <div class="tab_content_details">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tab_content_photo_area">
                                    <div class="common_photo_design_area">
                                        <img src="<?php echo $mission_and_vision_image['sizes']['large']; ?>" alt="<?php echo $mission_and_vision_image['alt']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tab_content_details_area">
                                    <div class="tab_content_details">
                                        <div class="cleaning_topics px-0">
                                            <div class="common_para which_type_of_cleaning">
                                                <?php echo $mission_vision_content; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="common_heading">
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


    <?php get_footer();?>