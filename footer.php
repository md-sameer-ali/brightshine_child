<?php 
$directory = get_stylesheet_directory_uri();
$footer_logo = get_field('footer_logo', 'options');
$footer_short_about = get_field('footer_short_about', 'options');
$footer_menu_heading = get_field('footer_menu_heading', 'options');
$contact_us_heading = get_field('contact_us_heading', 'options');
$business_address = get_field('business_address', 'options');
$business_phone_numbers = get_field('business_phone_numbers', 'options');
$business_emails = get_field('business_emails', 'options');

?>
    <?php if(get_the_ID() != 696 && get_the_ID() != 698 ):?>
    <!-- ================= FOOTER AREA ============== -->
    <footer class="footer_area_main">
        <div class="footer_area">
            <img src="<?php echo $directory ?>/img/ft_bg_design.png" alt="" class="bg_logo_design">
            <div class="container">
                <div class="small_container">
                    <div class="footer_content_area_main">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="logo_and_about">
                                    <a href="<?php echo site_url(); ?>" class="logo_area">
                                        <img src="<?php echo $footer_logo['url']; ?>" alt="logo">
                                    </a>
                                    <div class="common_para">
                                        <p><?php echo $footer_short_about; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="footer_content_area">
                                    <h6><?php echo $footer_menu_heading; ?></h6>
                                    <?php footer_main_nav();?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="footer_content_area">
                                    <h6><?php echo $contact_us_heading; ?></h6>
                                    <ul class="footer_nav_ul">
                                        <?php if($business_address) : ?>
                                        <li>
                                            <div class="contact_info_area">
                                                <span class="icon_area">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </span>
                                                <?php echo $business_address; ?>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($business_phone_numbers) : ?>
                                        <li>
                                            <div class="contact_info_area">
                                                <span class="icon_area">
                                                    <i class="fa-solid fa-phone"></i>
                                                </span>
                                                <div class="contact_info_details_area">
                                                    <?php 
                                                        foreach($business_phone_numbers as $each_number) :
                                                            $contact_number = $each_number['contact_number'];
                                                    ?>
                                                            <a href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($business_emails) : ?>
                                        <li>
                                            <div class="contact_info_area">
                                                <span class="icon_area">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </span>
                                                <div class="contact_info_details_area">
                                                    <?php 
                                                        foreach($business_emails as $each_email) :
                                                            $email_address = $each_email['email_address'];
                                                    ?>
                                                                <a href="mailto:<?php echo $email_address; ?>" target="_blank" ><?php echo $email_address; ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lower_footer">
                        <p>Copyright © <?php echo date("Y"); ?> <a href="<?php echo site_url(); ?>">Brightsineco.</a> All rights reserved.</p>
                        <p class="powered_by">Powered by <a href="https://graylinemedia.com/" target="_blank">Gray Line Media</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php endif; ?>
    <?php wp_footer(); ?>
</body>

</html>