<?php

class OxyA11yEl extends OxyEl
{

    // Init function.
    function init()
    {
        $this->setAssetsPath( OXY_A11Y_ASSETS_PATH );
        // Here, we can do things like call filters and hooks, etc...

    }

    function render( $options, $defaults, $content ){
    
      /* */

    }

    function class_names() {
        return array('oxy-a11y-element');
    }

    function a11y_button_place() {
        return "other";
    }

    function button_place() {

        $a11y_button_place = $this->a11y_button_place();

        if($a11y_button_place) {
            return "a11y::".$a11y_button_place;
        }

        return "";
    }
}