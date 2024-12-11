<?php
// Template Name: About Page
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');

$our_history_heading = get_field('our_history_heading');
$history_details = get_field('history_details');

$about_section_image = get_field('about_section_image');
$about_small_heading = get_field('about_small_heading');
$about_big_heading = get_field('about_big_heading');
$founder_details = get_field('founder_details');
$about_details = get_field('about_details');
$about_section_button = get_field('about_section_button');

$our_team_heading = get_field('our_team_heading');
$our_team_sub_heading = get_field('our_team_sub_heading');
$team_details = get_field('team_details');
$team_image = get_field('team_image');
$do_want_to_show_you_team_members = get_field('do_want_to_show_you_team_members');

$team_members_area = get_field('team_members_area');

$schedule_section_heading = get_field('schedule_section_heading');
$schedule_section_button = get_field('schedule_section_button');
?>

    <!-- ================= COMMON BANNER AREA ============== -->
    <?php if($banner_big_heading) : ?>
        <section class="common_banner_area_main" style="background-image: url(<?php echo $banner_background_image['sizes']['large']; ?>);">
            <div class="container">
                <div class="common_banner_area">
                    <?php if($banner_small_heading) : ?>
                        <div class="common_heading_small">
                            <h3><?php echo $banner_small_heading; ?></h3>
                        </div>
                    <?php endif; ?>
                    <div class="common_heading_banner">
                        <h2><?php echo $banner_big_heading; ?></h2>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= OUR HISTORY AREA ============== -->
    <?php if($our_history_heading) : ?>
        <section class="common_bg_color our_history_area_main">
            <div class="container">
                <div class="small_container">
                    <div class="our_history_area">
                        <div class="common_heading wow slideInLeft" data-wow-offset="100" data-wow-duration="1.2s">
                            <h2><?php echo $our_history_heading; ?></h2>
                        </div>
                        <div class="common_para wow slideInRight" data-wow-offset="100" data-wow-duration="1.2s">
                            <?php echo $history_details; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= ABOUT US PAGE ABOUT AREA ============== -->
    <?php if($about_section_image) : ?>
        <section class="about_area_main about_us_page_about">
            <div class="container">
                <div class="about_area">
                    <div class="tab_content_details">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="tab_content_photo_area wow fadeInDown" data-wow-offset="100" data-wow-duration="1.2s">
                                    <div class="common_photo_design_area">
                                        <img src="<?php echo $about_section_image['sizes']['large']; ?>" alt="<?php echo $about_section_image['alt']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="tab_content_details_area wow slideInRight" data-wow-offset="100">
                                    <div class="tab_content_details">
                                        <?php if($about_small_heading): ?>
                                            <div class="common_heading_small">
                                                <h3><?php echo $about_small_heading; ?></h3>
                                            </div>
                                        <?php endif; ?>
                                        <div class="common_heading">
                                            <h2><?php echo $about_big_heading; ?></h2>
                                        </div>
                                        <div class="founder_text">
                                            <p><?php echo $founder_details; ?></p>
                                        </div>
                                        <div class="cleaning_topics">
                                            <div class="common_para which_type_of_cleaning">
                                                <?php echo $about_details;?>
                                                <a href="<?php echo $about_section_button['url']; ?>" class="common_btn"><?php echo $about_section_button['title']; ?></a>
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
    <!-- ================= OUR TEAM AREA ============== -->
    <?php if($team_image) : ?>
        <section class="our_team_area_main" style="background-image: url(<?php echo $team_image['sizes']['large']; ?>);">
            <div class="container">
                <div class="small_container">
                    <div class="our_team_area">
                        <div class="common_heading">
                            <h2><?php echo $our_team_heading; ?></h2>
                        </div>
                        <div class="about_our_team_box wow bounceInUp" data-wow-offset="100" data-wow-duration="1.2s">
                            <div class="cleaning_topics">
                                <?php if($our_team_sub_heading): ?>
                                    <h3><?php echo $our_team_sub_heading; ?></h3>
                                <?php endif; ?>
                                <div class="common_para which_type_of_cleaning">
                                    <?php echo $team_details; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
  
    
<?php get_footer(); ?>