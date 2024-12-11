<?php
function blog_ajax_pagination() {
    // Check nonce for security
    check_ajax_referer('ajax_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Your custom query arguments
    $wp_query = new WP_Query([
        'post_type'        => 'post',
        'posts_per_page'   => 6,
        'post_status'      => 'publish',
        'paged'            => $paged,
        'category__not_in' => array(9),
        'orderby'          => 'date',
        'order'            => 'DESC'
    ]);

    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $thumbnail_url = wp_get_attachment_url($thumbnail_id, 'large');
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $isVideo = get_field('is_this_a_video_blog');
            $time = get_field('time');
            $categories = get_the_category();
            $firstCategory = !empty($categories) ? $categories[0]->name : '';
            ?>
            <div class="col-xl-6 col-12">
                <a href="<?php the_permalink(); ?>" class="new_blog_item d-flex flex-wrap align-items-center">
                    <div class="nblog_item_img">
                        <img src="<?php echo $thumbnail_url ? esc_url($thumbnail_url) : bloginfo('stylesheet_directory') . '/img/placeholder-image.jpg'; ?>" alt="<?php echo $thumbnail_alt ? $thumbnail_alt : $title; ?>">
                    </div>
                    <div class="nblog_item_text ps-4 position-relative">
                        <span class="mb-2 d-inline-flex"><?php echo $firstCategory; ?></span>
                        <h3 class="mb-4"><?php the_title(); ?></h3>
                        <div class="new_blog_meta d-flex justify-content-between">
                            <h6><?php echo $time ? $time : '8 min' ?> <?php echo $isVideo ? 'watch' : 'read'; ?></h6>
                            <h6><?php echo get_the_date('d/m/Y'); ?></h6>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }

        // Pagination
        $big = 999999999; // Need an unlikely integer
        $pages = paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 1,
            'end_size' => 1,
            'prev_text' => __('<i class="fa-solid fa-angle-left"></i>', 'textdomain'),
            'next_text' => __('<i class="fa-solid fa-angle-right"></i>', 'textdomain'),
            'type' => 'array',
        ]);

        if ($pages) {
            ?>
            <div class="mt-4 col-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example" class="blogpagination">
                    <ul class="pagination mb-0">
                        <?php foreach ($pages as $page): ?>
                            <?php 
                                preg_match('/>(\d+)</', $page, $matches); 
                                $page_number = isset($matches[1]) ? $matches[1] : '';
                                $page_class = strpos($page, 'current') !== false ? 'page-item active' : 'page-item';
                                $page_content = str_replace('page-numbers', 'page-link', $page);
                            ?>
                            <li class="<?php echo $page_class; ?>" data-page="<?php echo $page_number; ?>">
                                <?php echo $page_content; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <?php
        }
    } else {
        echo '<div class="col-12">No posts found</div>';
    }

    wp_die(); // Required to terminate immediately and return a proper response
}
add_action('wp_ajax_nopriv_blog_ajax_pagination', 'blog_ajax_pagination');
add_action('wp_ajax_blog_ajax_pagination', 'blog_ajax_pagination');


function blog_ajax_pagination_script(){
?>
<script>
	jQuery(document).ready(function($) {
		$(document).on('click', '.pagination li a', function(e) {
			e.preventDefault();
			
			let page = $(this).closest('li').data('page'); 
			let ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			 let nonce = "<?php echo wp_create_nonce('ajax_nonce'); ?>";
			
			$.ajax({
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'blog_ajax_pagination',
					page: page,
					nonce: nonce
				},
				beforeSend: function() {
					$('.new_blogs_rows').fadeTo('slow', 0.4);
				},
				success: function(response) {
					$('.new_blogs_rows').html(response); 
					$('.new_blogs_rows').fadeTo('slow', 1);
                    $('html, body').animate({
                        scrollTop: $('.new_blogs').offset().top
                    }, 800);
					
					$(".blog_list_btn").addClass('btn_active');
					$(".blog_grid_btn").removeClass('btn_active');
					
				}
			});
		});
	});

</script>
<?php
									  }
add_action('wp_footer', 'blog_ajax_pagination_script');
