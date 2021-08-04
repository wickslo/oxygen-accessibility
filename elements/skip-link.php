<?php

namespace Oxygen\A11yElements;

class SkipLink extends \OxyA11yEl {
    
    function name() {
        return 'Skip Link';
    }

    /*function slug() {
        return 'simple-class-element';
    }*/

    function a11y_button_place() {
        return "basic";
    }

    function controls() {

        /* Define the main Selector for CSS */
        $skip_selector = "a.skip-content";

        /**
         * General Options for the element
         */

        /* Target Selector - Still needs work */
        $skip_link = $this->addOptionControl(
            array(
                "type"  => 'textfield',
                "name"  => __('Skip Link Target'),
                "slug"  => 'skip_link_target',
                "css"   => false,
                "value" => '',
            )
        );

        /* Change the text of the Skip Link (Need to add Default?) */
        $this->addOptionControl(
            array(
                "type"  => 'textfield',
                "name"  => __('Skip to Link Text'),
                "slug"  => 'skip_link_text',
                "css"   => false,
                "value" => '',
            )
        );

        $this->addStyleControl(
            array(
                "name"=>'Background Color',
                "selector"=>$skip_selector,
                "property"=>'background-color'
            )
        );

        /** 
         * Styling Tabs
         */

        $this->typographySection (
            __("Typography"),
            $skip_selector,
            $this
        );

        /* Add the pre-defined Borders section in Oxygen*/
        $this->borderSection (
            __("Borders"),
            $skip_selector,
            $this
        );

        /* Add the pre-defined Box Shadow section in Oxygen */
        $this->boxShadowSection (
            __("Box Shadow"),
            $skip_selector,
            $this
        );
    }

    function render($options, $defaults, $content) {

        echo '<a href="'.$options['skip_link_target'].'" class="skip-content">'.$options['skip_link_text'].'</a>';
    
    }

    function defaultCSS() {
        return file_get_contents(__DIR__.'/'.basename(__FILE__, '.php').'.css');
    }

}

new SkipLink();