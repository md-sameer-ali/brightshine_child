<?php
function create_slug($string) {
    // Convert the string to lowercase
    $slug = strtolower($string);
    
    // Replace any non-alphanumeric characters or spaces with a hyphen
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    
    // Trim any trailing hyphens
    $slug = trim($slug, '-');
    
    return $slug;
}
get_header();
$terms_of_service_content = get_field('terms_of_service_content');
$page_info = get_queried_object();
?>
<!-- <section class="common_banner_area_main bs_details_page">
	<div class="container">
		<div class="common_banner_area">
			<div class="common_heading_banner">
				<h2>Our Articles</h2>
			</div>
		</div>
	</div>
</section> -->
<section class="our_values_area_main term_of_service blog_details">
    <div class="container">
        <div class="row gx-xl-5 justify-content-between flex-wrap-reverse">
            <div class="col-xxl-9 col-lg-8">
                <div class="blog_details_content_wrapper">
                    <!-- <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href=" /blogs/">Blogs</a></li>
                        </ol>
                    </nav> -->
                    <div class="details_page_title mb-4">
                        <h1><?php echo $page_info->post_title; ?></h1>
                    </div>

                    <div class="blog_details_meta mb-4">
                        <ul class="d-flex">
                            <li>
                                <i class="fa-regular fa-calendar-days"></i>
                                <span><?php echo custom_date_format($page_info->post_date);?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="common_para which_type_of_cleaning mb-4 mb-lg-5">
                        <?php echo $page_info->post_content; ?>
                    </div>
                    <?php 
                            if( have_rows('content_area') ): 
                                while ( have_rows('content_area') ) : the_row();
                                    if( get_row_layout() == 'content_layout' ):
                                        $content_heading = get_sub_field('content_heading');
                                        $content_details = get_sub_field('content_details');
                                        $content_image = get_sub_field('content_image');
                                        $want_sub_content = get_sub_field('want_sub_content');
                                        $sub_contents = get_sub_field('sub_contents');
                    ?>
                                        <div class="common_para which_type_of_cleaning mb-4 mb-lg-5">
                                            <?php if($content_heading) : ?>
                                                <h2 id="<?php echo create_slug($content_heading); ?>"><?php echo $content_heading; ?></h2>
                                            <?php endif; ?>
                                            <?php if($content_details) : ?>
                                                <?php echo $content_details; ?>
                                            <?php endif; ?>
                                            <?php if($content_image) : ?>
                                                <img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>">
                                            <?php endif; ?>
                                            <?php if($want_sub_content) : ?>
                                                        <?php
                                                                foreach($sub_contents as $key => $each_sub_content) :
                                                                    $sub_content_title = $each_sub_content['sub_content_title'];
                                                                    $sub_content_details = $each_sub_content['sub_content_details'];
                                                                    $sub_content_image = $each_sub_content['sub_content_image'];
                                                            
                                                        ?>
                                                                    <?php if($sub_content_title) : ?>                                                                
                                                                        <h3 id="<?php echo create_slug($sub_content_title); ?>_<?php echo $key; ?>" ><?php echo $sub_content_title; ?></h3>
                                                                    <?php endif; ?>
                                                                    <?php if($sub_content_image) : ?>
                                                                        <?php echo $sub_content_details; ?>
                                                                    <?php endif; ?>
                                                                    <?php if($sub_content_image) : ?>
                                                                        <img src="<?php echo $sub_content_image['url']; ?>" alt="<?php echo $sub_content_image['alt']; ?>">
                                                        <?php
                                                                    endif;
                                                                endforeach;
                                                         ?>
                                            <?php endif; ?>
                                        </div>
                                
                    <?php
                                    endif;
                                endwhile;
                            endif; 
                    ?>
                    <div class="new_landing_faq_wrapper">
                        <div class="faqs-area">
                            <div class="accordion-container">
                            <?php 
                                        if( have_rows('content_area') ): 
                                            while ( have_rows('content_area') ) : the_row();
                                                if( get_row_layout() == 'blog_faqs_layout' ):
                                                    $faq_section_heading = get_sub_field('faq_section_heading');
                                ?>
                                                        <div class="common_para which_type_of_cleaning mb-4">
                                                            <h2 id="<?php echo create_slug($faq_section_heading); ?>" ><?php echo $faq_section_heading; ?></h2>
                                                        </div>
                                <?php            
                                                endif;
                                            endwhile;
                                        endif; 
                                ?>
                            
                                <div class="total_faqs_points_area">
                                <?php 
                                        if( have_rows('content_area') ): 
                                            while ( have_rows('content_area') ) : the_row();
                                                if( get_row_layout() == 'blog_faqs_layout' ):
                                                    $blog_faqs = get_sub_field('blog_faqs');
                                                    foreach($blog_faqs as $each_blog_faq) :
                                                        $question = $each_blog_faq['question'];
                                                        $answer = $each_blog_faq['answer'];
                                ?>
                                                        <div class="set">
                                                            <a href="#">
                                                                <?php echo $question; ?> <i class="fa fa-plus"></i>
                                                            </a>
                                                            <div class="content">
                                                                <p><?php echo $answer; ?></p>
                                                            </div>
                                                        </div>
                                <?php               endforeach;
                                                endif;
                                            endwhile;
                                        endif; 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-xxl-3 col-lg-4">
                <div class="blog_details_left mb-4 mb-lg-0">
                    <div class="bd_left_head d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Table of Contents</h4>
                        <button class="blog_key_toggle_btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                    </div>
                    <div class="bd_left_body">
                        <ul>
                        <?php 
                            if( have_rows('content_area') ): 
                                while ( have_rows('content_area') ) : the_row();
                                    if( get_row_layout() == 'content_layout' ):
                                        $content_heading = get_sub_field('content_heading');
                                        $want_sub_content = get_sub_field('want_sub_content');
                                        $sub_contents = get_sub_field('sub_contents');
                        ?>
                        
                                            <li><a href="#<?php echo create_slug($content_heading); ?>"><?php echo $content_heading; ?></a>
                                                <?php if($want_sub_content) : ?>
                                                    <ul>
                                                        <?php
                                                                foreach($sub_contents as $key => $each_sub_content):
                                                                    $sub_content_title = $each_sub_content['sub_content_title'];
                                                        ?>
                                                                        <li><a href="#<?php echo create_slug($sub_content_title); ?>_<?php echo $key; ?>"><?php echo $sub_content_title; ?></a></li>
                                                        <?php   endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                    <?php endif; ?>
                                    <?php
                                    if( get_row_layout() == 'blog_faqs_layout' ):
                                        $faq_section_heading = get_sub_field('faq_section_heading');
                                    ?>
                                        <li><a href="#<?php echo create_slug($faq_section_heading); ?>"><?php echo $faq_section_heading; ?></a></li>

                        <?php
                                    endif;
                                endwhile;
                            endif; 
                        ?>
        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our_values_area_main related_blog">
	<div class="container">
		<div class="section_head">
			<div class="row justify-content-between align-items-center">
				<div class="common_heading text-start col-auto">
					<h2 class="mb-0">Related Blogs</h2>
				</div>
				<div class="col-auto">
					<a href="/articles/" class="common_btn">View All</a>
				</div>
			</div>
		</div>
		<div class="row gx-xl-5 justify-content-center">
        <?php 
            $current_post_id = get_the_ID(); // Current post ID
            $current_post_categories = wp_get_post_categories($current_post_id);
            $blog_posts = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'post__not_in' => array ($current_post_id),
                'category__in' => $current_post_categories,
                'orderby', 'rand'
            );

            $blog_post_query = new WP_Query($blog_posts);

            $all_blogs = $blog_post_query->posts;

            if($all_blogs) :
                foreach($all_blogs as $each_blog) :
        ?>                  
			<div class="col-lg-4 col-md-6">
				<a href="#" class="youtube_blog_item mb-4 mb-lg-0 d-block">
					<div class="yblog_item_img mb-3">
                        <?php echo get_the_post_thumbnail($each_blog->ID); ?>
					</div>
					<div class="common_heading_small chs_normal">
						<h3><?php echo $each_blog->post_title; ?></h3>
					</div>
				</a>
			</div>
		<?php endforeach; wp_reset_postdata(); endif;?>
		</div>
	</div>
</section>

<?php get_footer(); ?>