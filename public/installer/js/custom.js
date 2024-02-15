(function($) { 
    
    "use strict";

    function handleAlert(argument) {
        var x = document.getElementById('error_alert');
        var y = document.getElementById('close_alert');
        if (typeof(y) !== undefined && y != null) {
            y.onclick = function() {
                x.style.display = "none";
            };
        }
    }

    function handleCheckEnvironment() {

        jQuery('#environment').on('change', function() {
            var val = jQuery(this).val();
            if(val=='other') {
                jQuery('#environment_text_input').removeClass('d-none');
            } else {
                jQuery('#environment_text_input').addClass('d-none');
            }
        })
    }

    function handleInstallationSteps() {
        jQuery(".SetpChangeBtn").on('click', function() {
            event.preventDefault();
            var rel = jQuery(this).attr('rel');
            if(rel == 'db-step')
            {
                jQuery('#tab2').prop('checked', true);
            }
            else
            {
                jQuery('#tab3').prop('checked', true);
            }
        });
    }


    jQuery(document).ready(function() {
        handleAlert();
        handleCheckEnvironment();
        handleInstallationSteps();
    });

})(jQuery);