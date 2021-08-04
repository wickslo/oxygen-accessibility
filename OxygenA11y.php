<?php

Class OxyA11y {

    function __construct() {
        $this->load_files();
        add_action('oxygen_add_plus_sections',array($this,'register_add_plus_section'));
        add_action('oxygen_add_plus_a11y_section_content', array($this, 'register_add_plus_subsections'));

    }


    function register_add_plus_section() {

        CT_Toolbar::oxygen_add_plus_accordion_section("a11y",__("Accessibility"));
    }

    function register_add_plus_subsections() { ?>
        
        <h2><?php _e("Basic Accessibility", "oxygen");?></h2>
        <?php do_action("oxygen_add_plus_a11y_basic"); ?>

        <h2><?php _e("Helper Elements", "oxygen");?></h2>
        <?php do_action("oxygen_add_plus_a11y_helper"); ?>
    
    <?php }

    function load_files() {
        //Simple Test
        include_once "elements/skip-link.php";
        include_once "elements/tabs-accessibility.php";
        include_once "elements/toggle-accessibility.php";
    }

}