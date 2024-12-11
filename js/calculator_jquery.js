jQuery(document).ready(function ($) {
     $('#estimate_page_modal_id').addClass('modal_open').modal('show');

     $('.level_of_cleaning input, .level_of_cleaning select').prop('disabled', true);
 
     $('#estimate_page_modal_id').on('shown.bs.modal', function () {
         $('.level_of_cleaning input, .level_of_cleaning select').prop('disabled', true);
     });
 
     $('#estimate_page_modal_id').on('hidden.bs.modal', function () {
         $('.level_of_cleaning input, .level_of_cleaning select').prop('disabled', false);
     });
 
 
     // Function to set a cookie
     function setCookie(name, value, days) {
         var expires = "";
         if (days) {
             var date = new Date();
             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
             expires = "; expires=" + date.toUTCString();
         }
         document.cookie = name + "=" + (value || "") + expires + "; path=/";
     }
 
     // Function to get a cookie
     function getCookie(name) {
         var nameEQ = name + "=";
         var ca = document.cookie.split(';');
         for (var i = 0; i < ca.length; i++) {
             var c = ca[i];
             while (c.charAt(0) === ' ') c = c.substring(1, c.length);
             if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
         }
         return null;
     }
 
     function frontFormData() {
         const dataObject = {
             'fname': getCookie('fname'),
             'lname': getCookie('lname'),
             'email': getCookie('email'),
             'phoneno': getCookie('phoneno'),
         }
 
 
         if (dataObject.fname) {
             $('input[name=resultfirstName]').val(dataObject.fname);
         }
         if (dataObject.lname) {
             $('input[name=resultlastName]').val(dataObject.lname);
         }
         if (dataObject.email) {
             $('input[name=resultemail]').val(dataObject.email);
         }
         if (dataObject.phoneno) {
             $('input[name=resultphoneNumber]').val(dataObject.phoneno);
         }
         if (dataObject.fname) {
             $('input[name=movingfirstName]').val(dataObject.fname);
         }
         if (dataObject.lname) {
             $('input[name=movinglastName]').val(dataObject.lname);
         }
         if (dataObject.email) {
             $('input[name=movingemail]').val(dataObject.email);
         }
         if (dataObject.phoneno) {
             $('input[name=movingphoneNumber]').val(dataObject.phoneno);
         }
     }
 
     $(document).on('wpcf7submit', function (event) {
         if (event.detail.status === 'mail_sent' && event.detail.contactFormId === 623) {
 
             let formInputDetails = event.detail.inputs;
 
 
             $('#estimate_page_modal_id').modal('hide'); // Hide the modal
 
             // Store form submitted flag in cookie for 2 days
             setCookie('formSubmitted', 'true', 2);
             setCookie('fname', formInputDetails[0].value, 2);
             setCookie('lname', formInputDetails[1].value, 2);
             setCookie('email', formInputDetails[2].value, 2);
             setCookie('phoneno', formInputDetails[3].value, 2);
 
             console.log("Form submitted (cookie set)");
 
             frontFormData();
 
 
         }
     });
 
 
     const formSubmitted = getCookie('formSubmitted');
     if (formSubmitted === 'true') {
         $('#estimate_page_modal_id').modal('hide');
     }
 
 
     frontFormData();
 
 
 
     // MOVING AND CONSTRUCTION FORM 
     const button = $('#send_calculator_results_moving');
     const modalElement = $('#moving_modal_id');
     const modal_cut = $('.modal-cut');
     const modal = new bootstrap.Modal(modalElement[0]);
 

     button.on('click', function () {
         modal.show();
     });
    
     modalElement.on('click', function () {
         modal.hide();
     });
     modal_cut.on('click', function () {
         modal.hide();
     });
    
     modalElement.find('.modal-content').on('click', function (event) {
         event.stopPropagation();
     });
 
 
     document.addEventListener('wpcf7mailsent', function (event) {

         if (event.detail.contactFormId == '700') {  
             button.css('opacity', '0.5');
 
             modal.hide();
 
             button.prop('disabled', true);
         }
     }, false);

    function updateMiniServiceEnable() {
        mini_service_enable = $('#service_type_select option:selected').data('mini');
        console.log(mini_service_enable);
    }

    let mini_service_enable = false;
    updateMiniServiceEnable();
    console.log(mini_service_enable);

    function calculateFinalPrice() {
        let selectedRate = $('#service_type_select option:selected').data('rate');
        let selectedRelation = $('#service_type_select option:selected').data('relation');
        selectedRate = parseFloat(selectedRate) || 0;

        let totalSquareFeet = parseInt($('#total_square_ft_input').val()) || 0;

        let timewisePlanValue = parseFloat($(selectedRelation + ' option:selected').val()) || 0;

        let finalPrice = totalSquareFeet * timewisePlanValue + selectedRate;

        $('#final_price').val('$' + finalPrice.toFixed(2)); 
    }

    function miniServiceAddon() {
        let selectedRate = $('#service_type_select option:selected').data('rate');
        let selectedRelation = $('#service_type_select option:selected').data('relation');
        let totalSquareFeet = parseInt($('#total_square_ft_input').val()) || 0;

        let miniServiceTotal = 0;

        $(selectedRelation).find('.addons_area .common_mini_service_input').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    let checkedMiniServiceValue = parseFloat($(this).data('rate')) || 0;
                    miniServiceTotal += checkedMiniServiceValue * totalSquareFeet;
                }
            } else if ($(this).prop('type') === 'number') {
                let rate = parseFloat($(this).data('rate')) || 0;
                let selectedQTY = parseFloat($(this).val()) || 0;
                // Ensure selectedQTY is not negative
                selectedQTY = Math.max(selectedQTY, 0);



                if ($(this).data('rate2')) {
                    let rate2 = parseFloat($(this).data('rate2'));
                    if (selectedQTY === 1) {
                        miniServiceTotal += rate; // First selectedQTY
                    } else if (selectedQTY > 1) {
                        miniServiceTotal += rate; // First selectedQTY + 25
                        miniServiceTotal += rate2 * (selectedQTY - 1); // Subsequent values 4 * rate2 (10) = 40
                    }
                } else {
                    if (selectedQTY != 0) {
                        miniServiceTotal += rate * selectedQTY; // All values using rate
                    }
                }

                $(this).val(selectedQTY);

            }
        });

        let finalMiniServicePrice = miniServiceTotal + (parseFloat(selectedRate) || 0);

        $('#final_price').val('$' + finalMiniServicePrice.toFixed(2));
    }

    function showSelectedRelation() {
        let selectedRelation = $('#service_type_select').find(':selected').data('relation');
        $(selectedRelation).show();
    }

    function hideAllRelatedAreas() {
        $('.common_timewise_plan, .add_ons_area_main_place').hide();
    }

    function calculateAddOnTotal() {
        let addOnTotal = 0;

        $('.common_add_on_class').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    addOnTotal += parseFloat($(this).data('rate')) || 0;
                }
            } else if ($(this).prop('type') === 'number') {
                addOnTotal += (parseFloat($(this).val()) || 0) * (parseFloat($(this).data('rate')) || 0);
            }
        });

        $('#add_on_total_value').val(addOnTotal > 0 ? '$' + addOnTotal.toFixed(2) : '$0.00');
    }

    function resetAddOns() {
        $('.common_add_on_class[type="checkbox"]').prop('checked', false);
        $('.common_mini_service_input[type="checkbox"]').prop('checked', false);
        $('.common_add_on_class[type="number"]').val(0);
        $('.common_mini_service_input[type="number"]').val(1);
    }

    function calculateGrandTotal() {
        var finalPriceStr = $('#final_price').val().replace('$', '').replace(',', '');
        var addOnTotalStr = $('#add_on_total_value').val().replace('$', '').replace(',', '');

        var finalPrice = parseFloat(finalPriceStr) || 0;
        var addOnTotal = parseFloat(addOnTotalStr) || 0;

        var grandTotal = finalPrice + addOnTotal;

        $('#grand_total_price').val('$' + grandTotal.toFixed(2));
    }

    // Initial calculation on page load
    showSelectedRelation();
    calculateFinalPrice();
    calculateGrandTotal();
    if (mini_service_enable) {
        miniServiceAddon();
    }


    $('#service_type_select').on('change', function () {
        updateMiniServiceEnable();
        resetAddOns();
        calculateFinalPrice();
        if (mini_service_enable) {
            miniServiceAddon();
        }
        calculateAddOnTotal();
        hideAllRelatedAreas();
        showSelectedRelation();
        calculateGrandTotal();
    });

    $('#total_square_ft_input').on('change', function () {

        calculateFinalPrice();
        if (mini_service_enable) {
            miniServiceAddon();
        }
        calculateGrandTotal();
    });

    $('.timewise_plan_area select').on('change', function () {
        calculateFinalPrice();
        calculateGrandTotal();
    });

    $('.common_mini_service_input').on('change', function () {
        miniServiceAddon();
        calculateGrandTotal();
    });

    // Handle change in common add-ons
    $('.common_add_on_class').on('change', function () {
        calculateAddOnTotal();
        calculateGrandTotal();
    });
    $('#final_price, #add_on_total_value').on('input', calculateGrandTotal);

    // OFFICE CLEANING SERVICE CALCULATION START 
    function calculateFinalPriceOffice() {
        let selectedRate = $('#service_type_select_office option:selected').data('rate');
        let selectedRelation = $('#service_type_select_office option:selected').data('relation');
        selectedRate = parseFloat(selectedRate) || 0;

        let totalSquareFeet = parseInt($('#total_square_ft_input_for_office').val()) || 0;

        let timewisePlanValue = parseFloat($(selectedRelation + ' option:selected').val()) || 0;

        let finalPrice = totalSquareFeet * timewisePlanValue + selectedRate;

        $('#final_price_office').val('$' + finalPrice.toFixed(2));
    }


    function showSelectedRelationOffice() {
        let selectedRelation = $('#service_type_select_office').find(':selected').data('relation');
        $(selectedRelation).show();
    }

    function hideAllRelatedAreasOffice() {
        $('.common_timewise_plan_office, .add_ons_area_main_place_office').hide();
    }

    function calculateAddOnTotalOffice() {
        let addOnTotal = 0;

        $('.common_add_on_class_office').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    addOnTotal += parseFloat($(this).data('rate')) || 0;
                }
            } else if ($(this).prop('type') === 'number') {
                addOnTotal += (parseFloat($(this).val()) || 0) * (parseFloat($(this).data('rate')) || 0);
            }
        });

        $('#add_on_total_value_office').val(addOnTotal > 0 ? '$' + addOnTotal.toFixed(2) : '$0.00');
    }

    function resetAddOnsOffice() {
        $('.common_add_on_class_office[type="checkbox"]').prop('checked', false);
        $('.common_add_on_class_office[type="number"]').val(0);
    }

    function calculateGrandTotalOffice() {
        var finalPriceStr = $('#final_price_office').val().replace('$', '').replace(',', '');
        var addOnTotalStr = $('#add_on_total_value_office').val().replace('$', '').replace(',', '');

        // Parse floats from string values
        var finalPrice = parseFloat(finalPriceStr) || 0;
        var addOnTotal = parseFloat(addOnTotalStr) || 0;

        var grandTotal = finalPrice + addOnTotal;

        $('#grand_total_price_office').val('$' + grandTotal.toFixed(2));
    }


    // Initial calculation on page load
    showSelectedRelationOffice();
    calculateFinalPriceOffice();
    calculateGrandTotalOffice();


    $('#service_type_select_office').on('change', function () {
        resetAddOnsOffice();
        calculateFinalPriceOffice();
        calculateAddOnTotalOffice();
        hideAllRelatedAreasOffice();
        showSelectedRelationOffice();
        calculateGrandTotalOffice();
    });



    $('#total_square_ft_input_for_office').on('change', function () {

        calculateFinalPriceOffice();
        calculateGrandTotalOffice();
    });

    $('.timewise_plan_area select').on('change', function () {
        calculateFinalPriceOffice();
        calculateGrandTotalOffice();
    });

    // Handle change in common add-ons
    $('.common_add_on_class_office').on('change', function () {
        calculateAddOnTotalOffice();
        calculateGrandTotalOffice();
    });
    $('#final_price_office, #add_on_total_value_office').on('input', calculateGrandTotalOffice);


    // HOME CLEANING BUTTONS 
    function handleCalculatorResultsHome(clickedButtonId) {
        let service_name = $('#tabs-nav li.active').find('a').text();
        let selected_type = $('#service_type_select option:selected').val();
        let selected_type_relation = $('#service_type_select option:selected').data('relation');
        let area_sqrft = $('#total_square_ft_input').val();
        let selected_frequency = $(selected_type_relation).find('option:selected').text();
        let redirectLink = $(clickedButtonId).data('link');
        let button_name = $(clickedButtonId).text();

        // Quote Values
        let base_total = $('#final_price').val();
        let addon_total = $('#add_on_total_value').val();
        let grand_total = $('#grand_total_price').val();

        let mini_service_addons = [];
        let selected_addons = [];

        $(selected_type_relation).find('.common_mini_service_input').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    mini_service_addons.push($(this).data('label'));
                }
            } else if ($(this).prop('type') === 'number') {
                if ($(this).val() != 0) {
                    mini_service_addons.push($(this).data('label') + " - Quantity : " + $(this).val());
                }
            }
        });

        $(selected_type_relation).find('.common_add_on_class').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    let labelString = $(this).data('label');
                    labelString += ($(this).data('ask')) ? " <span style='color:#b3261e;'>(Price is not included with the estimate)</span>" : "";
                    selected_addons.push(labelString);
                }
            } else if ($(this).prop('type') === 'number') {
                if ($(this).val() != 0) {
                    let addonlabelString = $(this).data('label') + " - Quantity : " + $(this).val();
                    addonlabelString += ($(this).data('ask')) ? " <span style='color:#b3261e;'>(Price is not included with the estimate)</span>" : "";
                    selected_addons.push(addonlabelString);
                }
            }
        });

        // Create the data object to store all collected data
        let calculatorData = {
            service_name: service_name,
            selected_type: selected_type,
            area_sqrft: area_sqrft,
            selected_frequency: selected_frequency,
            base_total: base_total,
            addon_total: addon_total,
            grand_total: grand_total,
            mini_service_addons: mini_service_addons.join('\n'),
            selected_addons: selected_addons.join('\n'),
            button_name: button_name,
        };

        // Format the JSON string with <br> for better readability
        let formattedData = `
        <b>Service Details:-</b>
        <b>Type:</b> ${calculatorData.selected_type}
        <b>Area:</b> ${calculatorData.area_sqrft}
        ${mini_service_addons.length ? `<br><b>Mini Services:-</b><br>${calculatorData.mini_service_addons}<br>` : `<b>Frequency:</b> ${calculatorData.selected_frequency}<br>`}
        ${selected_addons.length ? `<b>Add-on Services:-</b><br>${calculatorData.selected_addons}<br>` : ''}
        <b>Estimate Given:-</b>
        <b>Total:</b> ${calculatorData.base_total}
        <b>Add-on Total:</b> ${calculatorData.addon_total}
        <b>Grand Total:</b> ${calculatorData.grand_total}
        <br>We will get back to you at the earliest. You can schedule a meeting with us.
        <br><b><a href="${redirectLink}" style="line-height:59px; background-color:#000;color:#fff; padding:15px 30px; text-decoration:none;">${calculatorData.button_name}</a></b><br>
    `;
        let formattedData2 = `
        <b>${calculatorData.service_name}</b>
        `;
        let button = $(clickedButtonId);

        // Set the formatted data to the hidden input field
        $('input[name="calculator-data"]').val(formattedData);
        $('input[name="serviceName"]').val(formattedData2);

        // Submit the CF7 form
        $.ajax({
            url: $('#all_data_form_area form').attr('action'), // Get the form action URL
            method: $('#all_data_form_area form').attr('method'), // Get the form method
            data: $('#all_data_form_area form').serialize(), // Serialize the form data
            success: function (response) {
                // Handle the successful response here
                // console.log('Form submitted successfully');
                $('input[name="calculator-data"]').val('');
                $('input[name="serviceName"]').val('');
                hideLoaderMain(button);
                displaySuccessMessage(button);
                // Redirect after 2 seconds
                setTimeout(function () {
                    window.open(redirectLink, '_blank'); // Redirect to the desired link in a new tab
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Handle any errors here
                console.error('Form submission error:', error);
                hideLoaderMain(button);
            }
        });

        showLoaderMain(button);
    }

    $('#send_calculator_results').on('click', function (e) {
        e.preventDefault();
        handleCalculatorResultsHome(this);
    });
    $('#send_calculator_results_only_book').on('click', function (e) {
        e.preventDefault();
        handleCalculatorResultsHome(this);
    });

    // OFFICE BUTTONS 
    function handleCalculatorResults(clickedButtonId) {
        let service_name = $('#tabs-nav li.active').find('a').text();
        let selected_type = $('#service_type_select_office option:selected').val();
        let selected_type_relation = $('#service_type_select_office option:selected').data('relation');
        let area_sqrft = $('#total_square_ft_input_for_office').val();
        let selected_frequency = $(selected_type_relation).find('option:selected').text();
        let redirectLink = $(clickedButtonId).data('link');
        let button_name = $(clickedButtonId).text();

        // Quote Values
        let base_total = $('#final_price_office').val();
        let addon_total = $('#add_on_total_value_office').val();
        let grand_total = $('#grand_total_price_office').val();

        let selected_addons = [];

        $(selected_type_relation).find('.common_add_on_class_office').each(function () {
            if ($(this).prop('type') === 'checkbox') {
                if ($(this).prop('checked')) {
                    let labelString = $(this).data('label');
                    labelString += ($(this).data('ask')) ? " <span style='color:#b3261e;'>(Price is not included with the estimate)</span>" : "";
                    selected_addons.push(labelString);
                }
            } else if ($(this).prop('type') === 'number') {
                if ($(this).val() != 0) {
                    let addonlabelString = $(this).data('label') + " - Quantity : " + $(this).val();
                    addonlabelString += ($(this).data('ask')) ? " <span style='color:#b3261e;'>(Price is not included with the estimate)</span>" : "";
                    selected_addons.push(addonlabelString);
                }
            }
        });

        // Create the data object to store all collected data
        let calculatorData = {
            service_name: service_name,
            selected_type: selected_type,
            area_sqrft: area_sqrft,
            selected_frequency: selected_frequency,
            base_total: base_total,
            addon_total: addon_total,
            grand_total: grand_total,
            selected_addons: selected_addons.join('\n'),
            button_name: button_name,
        };

        // Format the JSON string with <br> for better readability
        let formattedData = `
            <b>Service Details:-</b>
            <b>Type:</b> ${calculatorData.selected_type}
            <b>Area:</b> ${calculatorData.area_sqrft}
            <b>Frequency:</b> ${calculatorData.selected_frequency}<br>
            ${selected_addons.length ? `<b>Add-on Services:-</b><br>${calculatorData.selected_addons}<br>` : ''}
            <b>Estimate Given:-</b>
            <b>Total:</b> ${calculatorData.base_total}
            <b>Add-on Total:</b> ${calculatorData.addon_total}
            <b>Grand Total:</b> ${calculatorData.grand_total}
<br>            We will get back to you at the earliest. You can schedule a meeting with us.
            <br><b><a href="${redirectLink}" style="line-height:59px; background-color:#000;color:#fff; padding:15px 30px; text-decoration:none;">${calculatorData.button_name}</a></b><br>
        `;
        let formattedData2 = `
            <b>${calculatorData.service_name}</b>
        `;

        let button = $(clickedButtonId);

        // Set the formatted data to the hidden input field
        $('input[name="calculator-data"]').val(formattedData);
        $('input[name="serviceName"]').val(formattedData2);

        // Submit the CF7 form
        $.ajax({
            url: $('#all_data_form_area form').attr('action'), // Get the form action URL
            method: $('#all_data_form_area form').attr('method'), // Get the form method
            data: $('#all_data_form_area form').serialize(), // Serialize the form data
            success: function (response) {
                // Handle the successful response here
                console.log('Form submitted successfully');
                $('input[name="calculator-data"]').val('');
                $('input[name="serviceName"]').val('');
                hideLoaderMain(button);
                displaySuccessMessage(button);
                // Redirect after 2 seconds
                setTimeout(function () {
                    window.open(redirectLink, '_blank'); // Redirect to the desired link in a new tab
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Handle any errors here
                console.error('Form submission error:', error);
                hideLoaderMain(button);
            }
        });

        showLoaderMain(button);
    }

    $('#send_calculator_results_office').on('click', function (e) {
        e.preventDefault();
        handleCalculatorResults(this);
    });

    $('#send_calculator_results_office_only_book').on('click', function (e) {
        e.preventDefault();
        handleCalculatorResults(this);
    });

    // LOADERS
    function showLoaderMain(button) {
        let buttonElem = $(button);
        buttonElem.find('.calc_loader').remove();
        let loader = $('<div class="calc_loader"></div>');
        buttonElem.append(loader);
        buttonElem.prop('disabled', true);
    }

    function hideLoaderMain(button) {
        let buttonElem = $(button);
        buttonElem.find('.calc_loader').remove();
        buttonElem.prop('disabled', false); 
    }
    function displaySuccessMessage(button) {
        let buttonElem = $(button);
        let successMessage = $('<p class="success_btn">Please wait! We are redirecting<span> you to booking page</span></p>');
        buttonElem.after(successMessage);
        setTimeout(function () {
            successMessage.remove();
        }, 2000);
    }


});


