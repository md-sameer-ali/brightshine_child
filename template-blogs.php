<?php
// Template Name: Blogs Page
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');
$blog_page_slider_area = get_field('blog_page_slider_area');
?>


    <!-- ================= COMMON BANNER AREA ============== -->
    <?php if($banner_big_heading) : ?>
        <section class="common_banner_area_main" style="background-image: url(<?php echo $banner_background_image['url']; ?>);">
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
    <!-- ================= POST CARD AREA ============== -->
    <?php 
        $blog_posts = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
        );

        $blog_post_query = new WP_Query($blog_posts);

        $all_blogs = $blog_post_query->posts;

        if($all_blogs) :
    ?>
        <section class="common_bg_color posts_card_area_main">
            <div class="container">
                <div class="small_container">
                    <div class="posts_card_area">
                        <div class="row row_gap_class">
                            <div class="col-lg-6">
                                <a href="<?php echo get_the_permalink($all_blogs[0]->ID); ?>" class="big_card_area wow fadeInDown" data-wow-offset="100" data-wow-duration="1.5s">
                                    <div class="card_image_area">
                                        <?php echo get_the_post_thumbnail($all_blogs[0]->ID, 'large'); ?>
                                    </div>
                                    <span class="date_main"><?php echo date('j.n.Y', strtotime($all_blogs[0]->post_date)); ?></span>
                                    <div class="card_details_area">
                                        <p><?php echo $all_blogs[0]->post_excerpt; ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="small_card_area_main wow fadeInDown" data-wow-offset="100" data-wow-duration="1.5s">
                                    <?php 
                                        foreach($all_blogs as $key=>$each_post) :
                                            if($key === 0){
                                                continue;
                                            }
                                    ?>
                                            <a href="<?php echo get_the_permalink($each_post->ID); ?>" class="small_cards_area">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="small_posts_card_image">
                                                            <?php echo get_the_post_thumbnail($each_post->ID); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="small_posts_details">
                                                            <span class="date_main"><?php echo date('j.n.Y', strtotime($each_post->post_date)); ?></span>
                                                            <div class="card_details_area">
                                                                <p><?php echo $each_post->post_excerpt; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ================= LATEST ARTICLES AREA FOR BLOG PAGE ============== -->
    <?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        $all_blog_posts = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'paged' => $paged,
            'order' => 'ASC',
            'ignore_sticky_posts' => true,
        );

        $all_blog_posts_query = new WP_Query($all_blog_posts);

        $all_blogs_main = $all_blog_posts_query->posts;
       
        if($all_blogs_main) :

    ?>
    <section class="latest_blog_article_area_main" id="latest_blog_section" >
        <div class="container">
            <div class="small_container">
                <div class="latest_article_area">
                    <div class="article_area_main">
                        <div class="row">
                            <?php 
                                foreach($all_blogs_main as $each_blogs) :
                            ?>
                                    <div class="col-lg-4">
                                        <div class="article_box wow fadeInDown" data-wow-offset="100" data-wow-duration="1.5s">
                                            <div class="common_photo_design_area">
                                                <?php echo get_the_post_thumbnail($each_blogs->ID); ?>
                                            </div>
                                            <span class="date_main"><?php echo date('j.n.Y', strtotime($each_blogs->post_date)); ?></span>
                                            <h3><?php echo $each_blogs->post_excerpt; ?></h3>
                                            <a href="<?php echo get_the_permalink($each_blogs->ID); ?>" class="common_btn">Read more</a>
                                        </div>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                    <?php 
                        // Pagination
                        $total_pages = $all_blog_posts_query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                            echo '<nav class="blogpagination">';
                            echo '<div class="pagination pagination-sm">';
                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => __('«'),
                                'next_text' => __('»'),
                                'add_args'  => array(),
                                'add_fragment' => '#latest_blog_section'
                            ));
                            echo '</div>';
                            echo '</nav>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- ================= FEATURED BLOG AREA ============== -->
    <?php
        
        if($blog_page_slider_area) :
    
    ?>
        <!-- <section class="featured_blog_area_main">
            <div class="featured_blog_area">
                <div class="swiper blogSwiper">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($blog_page_slider_area as $each_random_content):
                                $slider_background_image = $each_random_content['slider_background_image'];
                                $slider_heading = $each_random_content['slider_heading'];
                                $slider_details = $each_random_content['slider_details'];
                                $slider_button = $each_random_content['slider_button'];
                        ?>
                                    <div class="swiper-slide">
                                        <div class="blog_content" style="background-image: url(<?php echo $slider_background_image['url']; ?>);" >
                                            <div class="blog_content_details">
                                                <div class="common_heading_banner">
                                                    <h2><?php echo $slider_heading; ?></h2>
                                                </div>
                                                <div class="banner_text_area">
                                                    <p><?php echo $slider_details; ?></p>
                                                </div>
                                                <a href="<?php echo $slider_button['url']; ?>" class="common_btn"><?php echo $slider_button['title']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination common_pagi"></div>
                </div>
            </div>
        </section> -->
    <?php endif; ?>




<?php get_footer(); ?>