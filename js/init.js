/*
	Strongly Typed by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.init({
		reset: 'full',
		breakpoints: {
			'global':	{ range: '*', href: 'css/style.css' },
			'desktop':	{ range: '737-', href: 'css/style-desktop.css', containers: 1200, grid: { gutters: 50 } },
			'1000px':	{ range: '737-1200', href: 'css/style-1000px.css', containers: 960, grid: { gutters: 30 }, viewport: { width: 1080 } },
			'mobile':	{ range: '-736', href: 'css/style-mobile.css', containers: '100%!', grid: { collapse: true, gutters: 20 }, viewport: { scalable: false } }
		},
		plugins: {
			layers: {
				config: {
					mode: 'transform'
				},
				navPanel: {
					hidden: true,
					breakpoints: 'mobile',
					position: 'top-left',
					side: 'left',
					animation: 'pushX',
					width: '80%',
					height: '100%',
					clickToHide: true,
					html: '<div data-action="navList" data-args="nav"></div>',
					orientation: 'vertical'
				},
				titleBar: {
					breakpoints: 'mobile',
					position: 'top-left',
					side: 'top',
					height: 44,
					width: '100%',
					html: '<span class="toggle" data-action="toggleLayer" data-args="navPanel"></span>'
				}
			}
		}
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// Forms (IE<10).
			var $form = $('form');
			if ($form.length > 0) {

				$form.find('.form-button-submit')
					.on('click', function() {
						$(this).parents('form').submit();
						return false;
					});

				if (skel.vars.IEVersion < 10) {
					$.fn.n33_formerize=function(){var _fakes=new Array(),_form = $(this);_form.find('input[type=text],textarea').each(function() { var e = $(this); if (e.val() == '' || e.val() == e.attr('placeholder')) { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).blur(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } }).focus(function() { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) return; if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); _form.find('input[type=password]').each(function() { var e = $(this); var x = $($('<div>').append(e.clone()).remove().html().replace(/type="password"/i, 'type="text"').replace(/type=password/i, 'type=text')); if (e.attr('id') != '') x.attr('id', e.attr('id') + '_fakeformerizefield'); if (e.attr('name') != '') x.attr('name', e.attr('name') + '_fakeformerizefield'); x.addClass('formerize-placeholder').val(x.attr('placeholder')).insertAfter(e); if (e.val() == '') e.hide(); else x.hide(); e.blur(function(event) { event.preventDefault(); var e = $(this); var x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } }); x.focus(function(event) { event.preventDefault(); var x = $(this); var e = x.parent().find('input[name=' + x.attr('name').replace('_fakeformerizefield', '') + ']'); x.hide(); e.show().focus(); }); x.keypress(function(event) { event.preventDefault(); x.val(''); }); });  _form.submit(function() { $(this).find('input[type=text],input[type=password],textarea').each(function(event) { var e = $(this); if (e.attr('name').match(/_fakeformerizefield$/)) e.attr('name', ''); if (e.val() == e.attr('placeholder')) { e.removeClass('formerize-placeholder'); e.val(''); } }); }).bind("reset", function(event) { event.preventDefault(); $(this).find('select').val($('option:first').val()); $(this).find('input,textarea').each(function() { var e = $(this); var x; e.removeClass('formerize-placeholder'); switch (this.type) { case 'submit': case 'reset': break; case 'password': e.val(e.attr('defaultValue')); x = e.parent().find('input[name=' + e.attr('name') + '_fakeformerizefield]'); if (e.val() == '') { e.hide(); x.show(); } else { e.show(); x.hide(); } break; case 'checkbox': case 'radio': e.attr('checked', e.attr('defaultValue')); break; case 'text': case 'textarea': e.val(e.attr('defaultValue')); if (e.val() == '') { e.addClass('formerize-placeholder'); e.val(e.attr('placeholder')); } break; default: e.val(e.attr('defaultValue')); break; } }); window.setTimeout(function() { for (x in _fakes) _fakes[x].trigger('formerize_sync'); }, 10); }); return _form; };
					$form.n33_formerize();
				}

			}

		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');

		// Dropdowns.
			$('#nav > ul').dropotron({
				mode: 'fade',
				noOpenerFade: true,
				hoverDelay: 150,
				hideDelay: 350
			});

	});

})(jQuery);

$( document ).ready(function() {
    // ADD TO CART FORM
    $('body').on("submit", ".ajaxCart", function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: $(this).serialize(),
            success: function (msg) {
                $('#basketTotal').html(msg);
                console.log(msg)
                $('#cartLink').addClass('cartAdd', 200);
                setTimeout(function(){
                    $('#cartLink').removeClass('cartAdd', 200); 
                }, 1000);
                
                $(document.activeElement).addClass('cartAddButton', 200);
                setTimeout(function(){
                    $(document.activeElement).removeClass('cartAddButton', 200); 
                }, 1000);
            }
        });
    });
    
    // FILTER PRODUCTS FORM
    $('.filterProducts').change(function() {
        var sThisVal = "";
        $('input:checkbox.filterProducts').each(function () {
            sThisVal = sThisVal + (this.checked ? $(this).val() + ":" : "");
        });    
        filterProducts(sThisVal);   
    });
    
     // SEND CONTACT FORM
    $('#sendSubmitMessage').click(function() {
        $('#contactForm').serialize();
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: $('#contactForm').serialize(),
            success: function (msg) {
                $('#messageSent').show();
            }
        });
    });
    
    if($("#checkoutDetails").length > 0) {
        // Setup form validation on the #register-form element
        $("#checkoutDetails").validate({
        
            // Specify the validation rules
            rules: {
                email_address: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirm : {
                        minlength : 5,
                        equalTo : "#password"
                },
                address_1: {
                    required: true,
                },
                town: {
                    required: true,
                },
                state: {
                    required: true,
                },
                postcode: {
                    required: true,
                },
                country: {
                    required: true,
                }
            },
            
            // Specify the validation error messages
            messages: {
                email_address: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password_confirm: {
                    equalTo: "Please make sure your passwords match",
                    minlength: "Your password must be at least 5 characters long"
                },
                address_1: "Please provide your address",
                town: "Please provide your town/city",
                state: "Please provide your state",
                postcode: "Please provide your zip code",
                country: "Please provide your country",
            },
            
            submitHandler: function(form) {
                form.submit();
            }
        });
    }
    
    // ADD TO CART FORM
    $('#contactForm').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "includes/contact.php",
            data: $(this).serialize(),
            success: function (msg) {
                console.log(msg)
                $('#messageResponse').html(msg);
            }
        });
    });
    
    // AJAX LOAD PRODUCTS
    var track_load = $('#loadedProducts').val(); //total loaded record group(s)
    var loading  = false; //to prevents multipal ajax loads
    var total_groups = $('#productCount').val(); //total record group(s)
        
    $(window).scroll(function() { //detect page scroll
        
        if($(window).scrollTop() >= (($(document).height() - $(window).height()) - $('#productList').innerHeight()))  //user scrolled to bottom of the page?
        {
            
            if(track_load <= total_groups && loading==false) //there's more data to load
            {
                loading = true; //prevent further ajax loading
                $('#ajaxProductLoader').show(); //show loading image
                
                track_load = parseInt(parseInt(track_load) + parseInt($('#productLimit').val())); //loaded group increment
                
                //load data from the server using a HTTP POST request
                $.post('ajax.php',{ 'ajaxLoadProducts':"yes", 'currentNumber':track_load, 'limit':$('#productLimit').val(), 'productCount':total_groups, 'order_by':$('#order_by').val() }, function(data){
                    
                    $("#productList").append(data); //append received data into the element

                    //hide loading image
                    $('#ajaxProductLoader').hide(); //hide loading image once data is received
                    
                    loading = false; 
                    
                    if(track_load >= total_groups) {
                        $("#productList").append("<h3>No more products</h3>");
                    }
                    
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                    
                    alert(thrownError); //alert with HTTP error
                    $('#ajaxProductLoader').hide(); //hide loading image
                    loading = false;
                
                });
                
            }
        }
    });
});

function showProcessingOrder() {
    $('#checkoutForm').hide();
    $('#processingOrder').show();
}

function updateDelivery(courierID) {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {updateDelivery:"yes",courierID:courierID},
        beforeSend: function() {
            showLoader();
        },
        success: function (msg) {
            $('#totals').html(msg);
            
            hideLoader();
        }
    });
}

function filterProducts(categoryIds) {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {categoryIds:categoryIds, 'order_by':$('#order_by').val()},
        beforeSend: function() {
            showLoader();
        },
        success: function (msg) {
            $('#productList').hide().html(msg).fadeIn(1000);
            
            hideLoader();
        }
    });
}

function showModal(prodCode) {
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {"showModal":"yes", 'prod_code':prodCode},
        beforeSend: function() {
            $('.screen').show();
            showLoader();
        },
        success: function (msg) {
            console.log(msg)
            $('#modalContent').html(msg);
            $('#modal').show();
            
            
            hideLoader();
        }
    });
}

function closeModal() {
    $('.screen').hide();
    $('#modal').hide();
}

function showLoader() {
    $('.loader').show();
}
function hideLoader() {
    $('.loader').hide();
}
