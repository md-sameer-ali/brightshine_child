<?php 
get_header();
$directory = get_stylesheet_directory_uri();
$banner_slider_area = get_field('banner_slider_area');
$banner_get_quote_text = get_field('banner_get_quote_text');
$banner_contact_number = get_field('banner_contact_number');
$social_media_area = get_field('social_media_area');

$service_section_heading = get_field('service_section_heading');
$service_section_small_heading = get_field('service_section_small_heading');
$cleaning_tab_contents = get_field('cleaning_tab_contents');


$our_values_section_heading = get_field('our_values_section_heading');
$our_values_area = get_field('our_values_area');

$service_location_map = get_field('service_location_map');
$map_details_title = get_field('map_details_title');
$map_text_area = get_field('map_text_area');

$testimonials_section_heading = get_field('testimonials_section_heading', 'options');
$reviews_area = get_field('reviews_area', 'options');


?>
    <!-- ================= BANNER AREA ============== -->
    <?php if($banner_slider_area) : ?> 
        <section class="banner_area_main">
            <div class="color_with_contact">
                <div class="contact_number_area">
                    <p><?php echo $banner_get_quote_text; ?> <a href="tel:<?php echo $banner_contact_number; ?>"><?php echo $banner_contact_number; ?></a></p>
                </div>
            </div>
            <div class="color_with_social">
                <?php if($social_media_area) : ?>
                    <div class="social_area">
                        <p>Follow Us On:</p>
                        <ul>
                            <?php 
                                foreach($social_media_area as $each_social_media) :
                                    $add_social_media_icon = $each_social_media['add_social_media_icon'];
                                    $social_media_link = $each_social_media['social_media_link'];
                            ?>
                            <li class="social_item">
                                <a href="<?php echo $social_media_link; ?>">
                                    <?php echo $add_social_media_icon; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="banner_slider_area">
                <div class="swiper bannerSwiper">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($banner_slider_area as $each_banner_slide) :
                                $banner_background_image = $each_banner_slide['banner_background_image'];
                                $banner_small_heading = $each_banner_slide['banner_small_heading'];
                                $banner_big_heading = $each_banner_slide['banner_big_heading'];
                                $banner_button = $each_banner_slide['banner_button'];
                        ?>
                                    <div class="swiper-slide">
                                        <div class="banner_content">
                                            <img src="<?php echo $banner_background_image['sizes']['large']; ?>" alt="<?php echo $banner_background_image['alt']; ?>">
                                            <div class="container">
                                                <div class="banner_text_area">
                                                    <h3><?php echo $banner_small_heading; ?></h3>
                                                    <div class="common_heading_banner">
                                                        <?php echo $banner_big_heading; ?>
                                                    </div>
                                                    <?php if($banner_button) : ?>
                                                        <a href="<?php echo $banner_button['url']; ?>" class="common_btn mt-4"><?php echo $banner_button['title']; ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= SERVICES AREA ============== -->
    <?php if($cleaning_tab_contents): ?>
        <section class="services_area_main common_bg_color">
            <div class="container">
                <div class="services_area">
                    <div class="common_heading">
                        <h2><?php echo $service_section_heading; ?></h2>
                    </div>
                    <div class="common_heading_small">
                        <h3><?php echo $service_section_small_heading; ?></h3>
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
                                                                            <h3><?php echo $tab_name; ?></h3>
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
    <!-- ================= OUR VALUES AREA ============== -->
    <?php if($our_values_area) : ?>
        <section class="our_values_area_main">
            <div class="container">
                <div class="small_container">
                    <div class="our_values_area">
                        <div class="common_heading">
                            <h2><?php echo $our_values_section_heading; ?></h2>
                        </div>
                        <div class="our_values_card_area">
                            <?php
                                foreach($our_values_area as $each_values) :
                                    $value_card_icon = $each_values['value_card_icon'];
                                    $value_heading = $each_values['value_heading'];
                                    $value_details = $each_values['value_details'];
                            ?>
                                        <div class="process_card wow fadeInDown" data-wow-offset="150">
                                            <div class="icon_heading_area">
                                                <div class="card_icon_area_main our_value_icon">
                                                    <?php echo $value_card_icon; ?>
                                                </div>
                                                <div class="common_heading_small">
                                                    <h3><?php echo $value_heading; ?></h3>
                                                </div>
                                            </div>
                                            <div class="common_para">
                                                <p><?php echo $value_details; ?></p>
                                            </div>
                                        </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= MAP LOCATION ============== -->
    <?php if($service_location_map) : ?>
        <section class="bright_map_area_main">
            <div class="container">
                <div class="bright_map_area">
                    <div class="row align-items-center flex-wrap-reverse">
                        <div class="col-lg-6">
                            <div class="bright_map">
                                <?php echo $service_location_map;  ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bright_map_text_area ps-lg-5">
                                <div class="cleaning_topics">
                                    <h3><?php echo $map_details_title; ?></h3>
                                    <div class="common_para which_type_of_cleaning">
                                        <?php echo $map_text_area;  ?>
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
    
    <!-- ================= LATEST ARTICLES AREA ============== -->
    <?php 
        $blog_posts = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 2,
        );

        $blog_post_query = new WP_Query($blog_posts);

        if($blog_post_query->posts) :
            if($do_you_want_to_add_blog_section_on_home_page) :
    ?>
        <section class="latest_article_area_main">
            <div class="container">
                <div class="small_container">
                    <div class="latest_article_area">
                        <div class="common_heading">
                            <h2>Latest Articles</h2>
                        </div>
                        <div class="article_area_main">
                            <?php 
                                foreach($blog_post_query->posts as $each_post) :
                            ?>
                                    <div class="article_box wow fadeInDown" data-wow-offset="100" data-wow-duration="1.5s">
                                        <div class="common_photo_design_area">
                                            <?php echo get_the_post_thumbnail($each_post->ID); ?>
                                        </div>
                                        <span class="date_main"><?php echo date('j.n.Y', strtotime($each_post->post_modified)); ?></span>
                                        <h3><?php echo $each_post->post_excerpt; ?></h3>
                                        <a href="<?php echo get_the_permalink($each_post->ID); ?>" class="common_btn">Read more</a>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; endif; ?>

<?php get_footer(); ?>