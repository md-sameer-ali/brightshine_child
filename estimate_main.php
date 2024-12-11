<?php
// Template Name: Estimate Page Main
get_header();
$directory = get_stylesheet_directory_uri();

$banner_small_heading = get_field('banner_small_heading');
$banner_big_heading = get_field('banner_big_heading');
$banner_background_image = get_field('banner_background_image');
$pop_up_form_heading = get_field('pop_up_form_heading');

$home_cleaning_service_tab_name = get_field('home_cleaning_service_tab_name');
$home_cleaning_calculator_heading = get_field('home_cleaning_calculator_heading');
$home_select_your_service_text = get_field('home_select_your_service_text');
$home_how_many_square_feet = get_field('home_how_many_square_feet');
$home_how_many_square_feet_by_default = get_field('home_how_many_square_feet_by_default');
$home_select_your_desired_service_frequency_text = get_field('home_select_your_desired_service_frequency_text');
$home_cleaning_services = get_field('home_cleaning_services');
$home_cleaning_first_button_redirect_link = get_field('home_cleaning_first_button_redirect_link');
$home_cleaning_second_button_redirect_link = get_field('home_cleaning_second_button_redirect_link');

$office_cleaning_service_tab_name = get_field('office_cleaning_service_tab_name');
$office_cleaning_calculator_heading = get_field('office_cleaning_calculator_heading');
$office_select_your_service_text = get_field('office_select_your_service_text');
$office_how_many_square_feet_text = get_field('office_how_many_square_feet_text');
$office_how_many_square_feet = get_field('office_how_many_square_feet');
$office_how_many_square_feet_by_default = get_field('office_how_many_square_feet_by_default');
$office_select_your_desired_service_frequency_text = get_field('office_select_your_desired_service_frequency_text');
$office_cleaning_services = get_field('office_cleaning_services');
$office_cleaning_first_button_redirect_link = get_field('office_cleaning_first_button_redirect_link');
$office_cleaning_second_button_redirect_link = get_field('office_cleaning_second_button_redirect_link');

$moving_cleaning_service_tab_name = get_field('moving_cleaning_service_tab_name');
$moving_and_construction_clean_up_rate_text = get_field('moving_and_construction_clean_up_rate_text');
$moving_and_construction_clean_up_rate = get_field('moving_and_construction_clean_up_rate');
$moving_and_construction_clean_up_form_heading = get_field('moving_and_construction_clean_up_form_heading');
$moving_and_construction_clean_up_button_text = get_field('moving_and_construction_clean_up_button_text');


?>

    <div class="modal modal-lg estimate_page_modal" id="estimate_page_modal_id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="redirect_cut_area d-flex justify-content-end mb-2">
                        <i class="fa-regular fa-circle-xmark modal_cut_redirect"></i>
                    </div>
                    <h2><?php echo $pop_up_form_heading; ?></h2>
                    <div class="main_form_area">
                        <?php echo do_shortcode('[contact-form-7 id="daae1e4" title="Contact form Estimate Page Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-lg estimate_page_modal" id="moving_modal_id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body">
                    <i class="fa-regular fa-circle-xmark modal-cut"></i>
                    <h2><?php echo $moving_and_construction_clean_up_form_heading; ?></h2>
                    <div class="main_form_area">
                        <?php echo do_shortcode('[contact-form-7 id="0ee2244" title="Contact form For Moving and Construction"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
     <!-- ================= ESTIMATE AREA ============== -->
    <section class="services_area_main common_bg_color">
        <div class="container">
            <div class="services_area">
                <div class="service_tab_area">
                    <div class="tabs">
                        <div class="tab_top_area">
                            <ul id="tabs-nav" class="tab_ul">
                                <li><a href="#tab1"><?php echo $home_cleaning_service_tab_name; ?></a></li>
                                <li><a href="#tab2"><?php echo $office_cleaning_service_tab_name; ?></a></li>
                                <li><a href="#tab3"><?php echo $moving_cleaning_service_tab_name; ?></a></li>
                            </ul> <!-- END tabs-nav -->
                        </div>
                        <div id="tabs-content">
                            <div id="tab1" class="tab-content">
                                <div class="tab_content_details">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="total_top_select_box_area">
                                                <div class="free_estimate_area">
                                                    <div class="common_heading">
                                                        <h2><?php echo $home_cleaning_calculator_heading; ?></h2>
                                                    </div>
                                                    <div class="level_of_cleaning">
                                                        <div class="square_ft_input_area">
                                                            <p class="cleaning_level_text"><?php echo $home_select_your_service_text; ?></p>
                                                            <div class="select_area">
                                                                <select name="service_type" class="first_select" id="service_type_select">
                                                                    <?php foreach($home_cleaning_services as $key => $each_service) :
                                                                        $service_type_name = $each_service['service_type_name'];
                                                                        $base_price = $each_service['base_price'];
                                                                        $enable_mini_services = $each_service['enable_mini_services'];
                                                                    ?>
                                                                        <option value="<?php echo $service_type_name; ?>" data-relation=".relation_<?php echo $key; ?>" data-rate="<?php echo $base_price; ?>" data-mini="<?php echo $enable_mini_services; ?>" <?php echo ($key == 0) ? 'selected' : ''; ?>><?php echo $service_type_name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="square_ft_input_area">
                                                            <p class="cleaning_level_text"><?php echo $home_how_many_square_feet; ?></p>
                                                            <input type="number" id='total_square_ft_input' class="squre_ft_input_class"  value="<?php echo $home_how_many_square_feet_by_default; ?>" min="0">
                                                        </div>
                                                        <?php foreach($home_cleaning_services as $key => $each_service) :
                                                                    $enable_frequency = $each_service['enable_frequency'];
                                                                    $enable_mini_services = $each_service['enable_mini_services'];
                                                                    $frequencies = $each_service['frequencies'];
                                                        ?>
                                                                <?php if($enable_frequency) : ?>
                                                                    <?php if($enable_mini_services) : ?>

                                                                    <?php else: ?>
                                                                        <div class="timewise_plan_area common_timewise_plan relation_<?php echo $key; ?>">
                                                                            <p class="cleaning_level_text"><?php echo $home_select_your_desired_service_frequency_text; ?></p>

                                                                            <div class="select_area">
                                                                                <select class="second_select">
                                                                                    <?php 
                                                                                            foreach($frequencies as $each_frequency_item):
                                                                                                $label = $each_frequency_item['label'];
                                                                                                $price = $each_frequency_item['price'];
                                                                                    ?>

                                                                                            <option value="<?php echo $price; ?>"><?php echo $label; ?></option>
                                                                                            
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <?php foreach($home_cleaning_services as $key=> $each_service) :
                                                    $enable_mini_services = $each_service['enable_mini_services'];
                                                    $mini_services = $each_service['mini_services'];
                                                    $addons = $each_service['addons'];
                                                ?>
                                                    <div class="add_ons_area_main_place relation_<?php echo $key; ?>">
                                                        <?php if($enable_mini_services): ?>
                                                            <div class="add_on_group">
                                                                <div class="add_on_title">
                                                                    <p class="cleaning_level_text">Pick 2 or 3 services</p>
                                                                </div>
                                                                <div class="addons_area_main">
                                                                    <?php 
                                                                        foreach($mini_services as $each_mini_services_item):
                                                                            $service_name = $each_mini_services_item['service_name'];
                                                                            $service_price = $each_mini_services_item['service_price'];
                                                                            $service_2nd_price = $each_mini_services_item['service_2nd_price'];
                                                                            $service_quantity = $each_mini_services_item['service_quantity'];
                                                                            $multiply_with_area = $each_mini_services_item['multiply_with_area'];
                                                                            $service_tool_tips_text = $each_mini_services_item['service_tool_tips_text'];

                                                                    ?>

                                                                        <div class="addons_area">
                                                                            <div class="input_with_tooltips">
                                                                                <label><?php echo $service_name->post_title; ?> </label>
                                                                                <?php if($service_tool_tips_text): ?>
                                                                                    <button type="button" class="btn btn-secondary"
                                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                        data-bs-custom-class="custom-tooltip"
                                                                                        data-bs-title="<?php echo $service_tool_tips_text; ?>">
                                                                                        <i class="fa-solid fa-info"></i>
                                                                                    </button>
                                                                                <?php endif; ?>
                                                                            </div>

                                                                            <?php if($service_quantity) : ?>

                                                                                <input type="number" data-label="<?php echo $service_name->post_title; ?>" class="common_mini_service_input add_number_input" value="1" min="0" data-rate='<?php echo $service_price; ?>' <?php if($service_2nd_price) : ?> data-rate2='<?php echo $service_2nd_price; ?>' <?php endif; ?>>
                                                                            <?php else: ?>

                                                                            <div class="addon_check_toggle">
                                                                                <input type="checkbox" data-label="<?php echo $service_name->post_title; ?>" class="common_mini_service_input checkbox_input" data-rate='<?php echo $service_price; ?>'>
                                                                                <label></label>
                                                                            </div>
                                                                            <?php endif; ?>

                                                                        </div>
                                                                    <?php  endforeach; ?>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="add_on_group_for_all">
                                                            <div class="add_on_title">
                                                                <p class="cleaning_level_text">Add-on Services</p>
                                                            </div>
                                                            <div class="addons_area_main">
                                                                <?php
                                                                    foreach($addons as $each_addons_item):
                                                                        $addon_name = $each_addons_item['addon_name'];
                                                                        $addon_price = $each_addons_item['addon_price'];
                                                                        $enable_quantity = $each_addons_item['enable_quantity'];
                                                                        $enable_ask = $each_addons_item['enable_ask'];
                                                                        $included_with_service = $each_addons_item['included_with_service'];
                                                                        $add_on_tool_tips_text = $each_addons_item['add_on_tool_tips_text'];

                                                                ?>
                                                                    <div class="addons_area <?php echo ($included_with_service) ? 'included_with_service' : "" ?>">
                                                                        <div class="input_with_tooltips">
                                                                            <label><?php echo $addon_name->post_title; ?> <span><?php echo ($enable_ask) ? '(Ask for the price)' : ''; ?></span> </label>
                                                                            <?php if($add_on_tool_tips_text): ?>
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                    data-bs-custom-class="custom-tooltip"
                                                                                    data-bs-title="<?php echo $add_on_tool_tips_text; ?>">
                                                                                    <i class="fa-solid fa-info"></i>
                                                                                </button>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <?php if($enable_quantity) : ?>

                                                                            <input type="number" data-label="<?php echo $addon_name->post_title; ?>" data-ask="<?php echo $enable_ask; ?>" class="common_add_on_class add_number_input" value="0" min="0" data-rate='<?php echo ($enable_ask) ? '' :  $addon_price; ?>'>
                                                                        <?php else: ?>

                                                                        <div class="addon_check_toggle">
                                                                            <input type="checkbox" data-label="<?php echo $addon_name->post_title; ?>" data-ask="<?php echo $enable_ask; ?>" class="common_add_on_class checkbox_input" data-rate='<?php echo ($enable_ask) ? '' :  $addon_price; ?>' <?php echo ($included_with_service) ? 'disabled' : "" ?>>
                                                                            <label></label>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php  endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="estimate_bill_area" id="estimate_bill_id">
                                                <div class="square_ft_area d-none">
                                                    <p>Base Charge</p>
                                                    <p>$<span class="total" id="classic_base_charge"></span></p>
                                                </div>

                                                <div class="square_ft_area d-none">
                                                    <p id="total_square_ft1">Rate of Square Ft.</p>
                                                    <p>$<span id="total_frequency_rate"></span></p>
                                                </div>

                                                <div class="addon_estimate_area select_disble d-none" id="addon_estimate_id">
                                                    <div class="square_ft_area">
                                                        <p>Kitchen</p>
                                                        <p>$<span id="total_kitchen"></span></p>
                                                    </div>

                                                    <div class="square_ft_area">
                                                        <p>Bathroom</p>
                                                        <p>$<span id="total_bathroom"></span></p>
                                                    </div>

                                                    <div class="square_ft_area">
                                                        <p>dust</p>
                                                        <p>$<span id="total_dust"></span></p>
                                                    </div>

                                                    <div class="square_ft_area">
                                                        <p>floor</p>
                                                        <p>$<span id="total_floor"></span></p>
                                                    </div>
                                                </div>
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                         <input type="text" id="final_price" class="final_price" value="$0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Add-on Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                        <input type="text" id="add_on_total_value" class="add_on_total_value" value="$0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Grand Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                        <input type="text" id="grand_total_price" class="grand_total_price" value="$0.00" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="mail_sent_botton_area">
                                    <div class="each_sent_btn_area">
                                        <button type="button" class="common_btn send_email_btn1" id="send_calculator_results" data-link="<?php echo $home_cleaning_first_button_redirect_link['url']; ?>"><?php echo $home_cleaning_first_button_redirect_link['title']; ?></button>
                                    </div>
                                    <div class="each_sent_btn_area">
                                        <button type="button" class="common_btn send_email_btn2" id="send_calculator_results_only_book" data-link="<?php echo $home_cleaning_second_button_redirect_link['url']; ?>"><?php echo $home_cleaning_second_button_redirect_link['title']; ?></button>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab-content">
                                <div class="tab_content_details">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="free_estimate_area">
                                                <div class="common_heading">
                                                    <h2><?php echo $office_cleaning_calculator_heading; ?></h2>
                                                </div>
                                                <div class="level_of_cleaning">
                                                    <div class="square_ft_input_area">
                                                        <p class="cleaning_level_text"><?php echo $office_select_your_service_text; ?></p>
                                                        <div class="select_area">
                                                            <select name="service_type_office" class="first_select" id="service_type_select_office">
                                                                <?php foreach($office_cleaning_services as $key => $each_service) :
                                                                            $service_type_name = $each_service['service_type_name'];
                                                                            $base_price = $each_service['base_price'];
                                                                            $enable_mini_services = $each_service['enable_mini_services'];
                                                                        ?>
                                                                            <option value="<?php echo $service_type_name; ?>" data-relation=".relation_office_<?php echo $key; ?>" data-rate="<?php echo $base_price; ?>" data-mini="<?php echo $enable_mini_services; ?>" <?php echo ($key == 0) ? 'selected' : ''; ?>><?php echo $service_type_name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="square_ft_input_area">
                                                        <p class="cleaning_level_text"><?php echo $office_how_many_square_feet_text; ?></p>
                                                        <input type="number" id='total_square_ft_input_for_office' class="squre_ft_input_class" value="<?php echo $office_how_many_square_feet_by_default; ?>">
                                                    </div>
                                                    <?php foreach($office_cleaning_services as $key => $each_service) :
                                                                    $enable_frequency = $each_service['enable_frequency'];
                                                                    $frequencies = $each_service['frequencies'];
                                                        ?>
                                                                <?php if($enable_frequency) : ?>
                                                                <div class="timewise_plan_area common_timewise_plan_office relation_office_<?php echo $key; ?>">
                                                                    <p class="cleaning_level_text"><?php echo $office_select_your_desired_service_frequency_text; ?></p>

                                                                    <div class="select_area">
                                                                        <select class="second_select">
                                                                            <?php 
                                                                                    foreach($frequencies as $each_frequency_item):
                                                                                        $label = $each_frequency_item['label'];
                                                                                        $price = $each_frequency_item['price'];
                                                                            ?>

                                                                                    <option value="<?php echo $price; ?>"><?php echo $label; ?></option>
                                                                                    
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <?php endif; ?>
                                                        <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <?php foreach($office_cleaning_services as $key=> $each_service) :
                                                    $addons = $each_service['addons'];
                                                ?>
                                                    <div class="add_ons_area_main_place_office relation_office_<?php echo $key; ?>">
                                                        <div class="add_on_group_for_all">
                                                            <div class="add_on_title">
                                                                <p class="cleaning_level_text">Add-on Services</p>
                                                            </div>
                                                            <div class="addons_area_main">
                                                                <?php
                                                                    foreach($addons as $each_addons_item):
                                                                        $addon_name = $each_addons_item['addon_name'];
                                                                        $addon_price = $each_addons_item['addon_price'];
                                                                        $enable_quantity = $each_addons_item['enable_quantity'];
                                                                        $enable_ask = $each_addons_item['enable_ask'];
                                                                        $included_with_service = $each_addons_item['included_with_service'];
                                                                        $add_on_tool_tips_text = $each_addons_item['add_on_tool_tips_text'];

                                                                ?>
                                                                    <div class="addons_area <?php echo ($included_with_service) ? 'included_with_service' : "" ?>">
                                                                        <div class="input_with_tooltips">
                                                                            <label><?php echo $addon_name->post_title; ?> <span><?php echo ($enable_ask) ? '(Ask for the price)' : ''; ?></span> </label>
                                                                            <?php if($add_on_tool_tips_text): ?>
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                    data-bs-custom-class="custom-tooltip"
                                                                                    data-bs-title="<?php echo $add_on_tool_tips_text; ?>">
                                                                                    <i class="fa-solid fa-info"></i>
                                                                                </button>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <?php if($enable_quantity) : ?>

                                                                            <input type="number" data-label="<?php echo $addon_name->post_title; ?>" data-ask="<?php echo $enable_ask; ?>" class="common_add_on_class_office add_number_input" value="0" min="0" data-rate='<?php echo ($enable_ask) ? '' :  $addon_price; ?>'>
                                                                        <?php else: ?>

                                                                        <div class="addon_check_toggle">
                                                                            <input type="checkbox" data-label="<?php echo $addon_name->post_title; ?>" data-ask="<?php echo $enable_ask; ?>" class="common_add_on_class_office checkbox_input" data-rate='<?php echo ($enable_ask) ? '' :  $addon_price; ?>' <?php echo ($included_with_service) ? 'disabled' : "" ?>>
                                                                            <label></label>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php  endforeach; ?>
                                        </div>
                                        <div class="col-12">
                                            <div class="estimate_bill_area" id="estimate_bill_id">
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                         <input type="text" id="final_price_office" class="final_price" value="$0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Add-on Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                        <input type="text" id="add_on_total_value_office" class="add_on_total_value" value="$0.00" readonly>
                                                    </div>
                                                </div>
                                                <div class="square_ft_area total_estimate_area">
                                                    <div class="calculate_title">
                                                        <p>Grand Total</p>
                                                    </div>
                                                    <div class="calculate_price">
                                                        <input type="text" id="grand_total_price_office" class="grand_total_price" value="$0.00" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="mail_sent_botton_area">
                                    <div class="each_sent_btn_area">
                                        <button type="button" class="common_btn send_email_btn1" id="send_calculator_results_office" data-link="<?php echo $office_cleaning_first_button_redirect_link['url']; ?>"><?php echo $office_cleaning_first_button_redirect_link['title']; ?></button>
                                    </div>
                                    <div class="each_sent_btn_area">
                                        <button type="button" class="common_btn send_email_btn2" id="send_calculator_results_office_only_book" data-link="<?php echo $office_cleaning_second_button_redirect_link['url']; ?>"><?php echo $office_cleaning_second_button_redirect_link['title']; ?></button>
                                    </div>
                                </div>
                            </div>
                            <div id="tab3" class="tab-content">
                                <div class="tab_content_details">
                                    <section class="pricing_area_main">
                                        <div class="container">
                                            <div class="pricing_area">
                                                <div class="common_sub_heading">
                                                    <h3><?php echo $moving_and_construction_clean_up_rate_text; ?></h3>
                                                </div>
                                                <div class="common_heading">
                                                    <h2><?php echo $moving_and_construction_clean_up_rate; ?></h2>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <button type="button" class="common_btn send_email_btn3" id="send_calculator_results_moving"><?php echo $moving_and_construction_clean_up_button_text; ?></button>
                            </div>
                        </div> <!-- END tabs-content -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="main_form_area d-none" id="all_data_form_area">
        <?php echo do_shortcode('[contact-form-7 id="2cfdc4b" title="Contact form For Result"]'); ?>
    </div>

   <div class="loader_area_main">
        <div><span class="loader-1"> </span></div>
   </div>
    


<?php get_footer();?>