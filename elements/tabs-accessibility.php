<?php

namespace Oxygen\A11yElements;

class Tabs_A11y extends \OxyA11yEl {

    function name() {
        return 'Tabs Accessibility';
    }

    function a11y_button_place() {
        return "helper";
    }

    function controls() {
        // No controls needed
    }

    function render($options, $defaults, $content) {

        add_action( 'wp_footer', array( $this, 'output_tab_js' ) );

    }

    function output_tab_js() { ?>
        <script>
        jQuery(".oxy-tab").attr("tabindex","0"); 

        jQuery(".oxy-tab").keyup(function(event) { 
            var oxyKeycode = (event.keyCode ? event.keyCode : event.which); 
            if(oxyKeycode == '13'){ 
                var oxyCurrentTab = jQuery(":focus").parent('div').attr("data-oxy-tabs-active-tab-class"); 
                var oxyCurrentTabContents = "#" + jQuery(":focus").parent('div').attr("data-oxy-tabs-contents-wrapper"); 
                var oxyFinder = jQuery(oxyCurrentTabContents).index(); 
                var oxyTabLocation = jQuery(":focus").index();

                if(jQuery(':focus').hasClass(oxyCurrentTab)){ 
                    return; 
                } else { 
                    jQuery('.oxy-tab').removeClass(oxyCurrentTab); 
                    jQuery(':focus').addClass(oxyCurrentTab); 
                    jQuery(oxyCurrentTabContents).children('.oxy-tab-content').addClass('oxy-tabs-contents-content-hidden'); 
                    jQuery(oxyCurrentTabContents).children('.oxy-tab-content').eq(oxyTabLocation).removeClass('oxy-tabs-contents-content-hidden'); 
                } 
            } 
        });
        </script> 
    <?php }
    
}

new Tabs_A11y();