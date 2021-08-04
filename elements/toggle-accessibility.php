<?php

namespace Oxygen\A11yElements;

class Toggle_A11y extends \OxyA11yEl {

    function name() {
        return 'Toggle Accessibility';
    }

    function a11y_button_place() {
        return "helper";
    }

    function controls() {
        // No controls needed
    }

    function render($options, $defaults, $content) {

        add_action( 'wp_footer', array( $this, 'output_toggle_js' ) );

    }

    function output_toggle_js() { ?>
        <script>
        jQuery(".oxy-toggle").attr("tabindex","0"); 

        jQuery(".oxy-toggle").keyup(function(event) { 
            var oxyKeycode = (event.keyCode ? event.keyCode : event.which); 
            if(oxyKeycode == '13'){ 
                jQuery(document.activeElement).addClass("toggle-3947-expanded"); 
                if(jQuery(":focus div").hasClass("oxy-eci-collapsed")){ 
                    jQuery(':focus .oxy-expand-collapse-icon').removeClass("oxy-eci-collapsed"); 
                } else { 
                    jQuery(':focus .oxy-expand-collapse-icon').addClass("oxy-eci-collapsed"); 
                } 
                
                jQuery(document.activeElement).next('div').toggle(); 
            } 
        }); 
        </script> 
    <?php }
    
}

new Toggle_A11y();