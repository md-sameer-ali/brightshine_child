<?php
// Template Name: Business Cleaning Services Page
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');

$home_service_cleaning_heading = get_field('home_service_cleaning_heading');
$home_service_cleaning_details = get_field('home_service_cleaning_details');
$home_service_cleaning_section_image = get_field('home_service_cleaning_section_image');


$scope_table_heading = get_field('scope_table_heading');
$scope_table_sub_heading = get_field('scope_table_sub_heading');
$scope_points_area = get_field('scope_points_area');
$table_main_headings_area = get_field('table_main_headings_area');
$per_heading_content_area = get_field('per_heading_content_area');

$residential_cleaning_heading = get_field('residential_cleaning_heading'); 
$residential_cleaning_details = get_field('residential_cleaning_details');
$residential_cleaning_section_button = get_field('residential_cleaning_section_button');
$residential_cleaning_image_1 = get_field('residential_cleaning_image_1');
$residential_cleaning_image_2 = get_field('residential_cleaning_image_2');
$residential_cleaning_image_3 = get_field('residential_cleaning_image_3');

$service_pricing_title = get_field('service_pricing_title');
$rate_per_hour = get_field('rate_per_hour');
$in_which_currency_ = get_field('in_which_currency_');
$services_get_in_this_rate_points = get_field('services_get_in_this_rate_points');
$pricing_section_button = get_field('pricing_section_button');

$how_it_works_heading = get_field('how_it_works_heading', 'options');
$how_it_works_section_image = get_field('how_it_works_section_image', 'options');
$how_it_works_points_area = get_field('how_it_works_points_area', 'options');

$faq_section_heading = get_field('faq_section_heading', 'options');
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
                    <?php endif;?>
                    <div class="common_heading_banner">
                        <h2><?php echo $banner_big_heading; ?></h2>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ================= RESIDENTIAL CLEANING AREA ============== -->
    <?php if($residential_cleaning_heading) : ?>
        <section class="about_area_main residential_cleaning_area_main">
            <div class="container">
                <div class="about_area">
                    <div class="tab_content_details">
                        <div class="row">
                            <div class="col-xl-6 fixing_class">
                                <div class="tab_content_photo_area wow fadeInDown" data-wow-offset="100">
                                    <div class="photo_collection_area">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="collection_photo">
                                                    <img src="<?php echo $residential_cleaning_image_1['sizes']['large']; ?>" alt="img">
                                                    <img src="<?php echo $residential_cleaning_image_2['sizes']['large']; ?>" alt="img">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="big_photo_area">
                                                    <img src="<?php echo $residential_cleaning_image_3['sizes']['large']; ?>" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="tab_content_details_area wow fadeInDown" data-wow-offset="100">
                                    <div class="tab_content_text_details">
                                        <div class="cleaning_topics p-0">
                                            <h3><?php echo $residential_cleaning_heading; ?></h3>
                                            <div class="common_para which_type_of_cleaning">
                                                <?php echo $residential_cleaning_details; ?>
                                                <a href="<?php echo $residential_cleaning_section_button['url']; ?>" class="common_btn"><?php echo $residential_cleaning_section_button['title']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($scope_table_heading) : ?>
                        <div class="scope_table_area_main">
                            <div class="small_container">
                                <h3><?php echo $scope_table_heading; ?></h3>
                                <?php if($scope_table_sub_heading) : ?>
                                    <div class="sub_head">
                                        <h4><?php echo $scope_table_sub_heading; ?></h4>
                                    </div>
                                <?php endif; ?>
                                <!-- Scope points loop-->
                                <?php if($scope_points_area) : ?>
                                    <div class="service_points_area">
                                        <?php
                                            foreach($scope_points_area as $each_scope_point):
                                                $scope_point_text = $each_scope_point['scope_point_text'];
                                        ?>
                                        <div class="service_point">
                                            <p><?php echo $scope_point_text; ?></p>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                                
                                <div class="table_area_main">
                                <i class="fa-solid fa-chevron-down scroll_down_arrow"></i>
                                    <table>
                                        <thead>
                                            <tr>
                                                <!-- Table Heading loop-->
                                                <?php 
                                                    foreach($table_main_headings_area as $each_table_heading):
                                                        $table_main_heading = $each_table_heading['table_main_heading'];
                                                ?>
                                                        <th><?php echo $table_main_heading; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table Row loop-->
                                            <?php 
                                                foreach($per_heading_content_area as $each_heading_content_row) :
                                                    $per_heading_points_row = $each_heading_content_row['per_heading_points_row'];
                                            ?>
                                                    <tr>
                                                        <!-- Table Service Points loop-->
                                                        <?php 
                                                            foreach($per_heading_points_row as $each_heading_point_item):
                                                                $per_service_details = $each_heading_point_item['per_service_details'];
                                                        ?>
                                                            <td><?php echo $per_service_details; ?></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                            <?php endforeach; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- ================= PRICING AREA ============== -->

     <!-- ================= HOW IT WORKS AREA ============== -->
     <?php if($how_it_works_points_area) : ?>
        <section class="how_it_works_area_main">
            <div class="container">
                <div class="how_it_works_area">
                    <div class="common_heading">
                        <h2><?php echo $how_it_works_heading; ?></h2>
                    </div>
                    <div class="how_it_works_content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="how_it_works_points_area_main wow fadeInDown" data-wow-offset="100">
                                    <ol class="how_it_works_points_area">
                                        <?php
                                            foreach($how_it_works_points_area as $each_work_point) :
                                                $how_it_works_point = $each_work_point['how_it_works_point'];
                                        ?>
                                                <li class="how_it_works_point">
                                                    <p><?php echo $how_it_works_point; ?></p>
                                                </li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="common_photo_design_area wow fadeInDown" data-wow-offset="100">
                                    <img src="<?php echo $how_it_works_section_image['sizes']['large']; ?>" alt="<?php echo $how_it_works_section_image['alt']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
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
            <section class="faqs-area-main">
                <div class="container">
                    <div class="small_container">
                        <div class="faqs-area wow fadeInDown" data-wow-offset="100">
                            <div class="accordion-container">
                                <div class="common_heading">
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

<?php get_footer(); ?>