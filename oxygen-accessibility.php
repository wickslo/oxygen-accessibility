<?php
/**
 * Plugin Name: Oxygen Accesbility
 */


add_action('plugins_loaded', 'oxygen_accessibility_init');
function oxygen_accessibility_init()
{

  // check if Oxygen installed and active
  if (!class_exists('OxygenElement')) {
    return;
  }

  define("OXY_A11Y_ASSETS_PATH", plugins_url("elements/assets", __FILE__));

  require_once('OxyA11yEl.php');
    require_once('OxygenA11y.php');

  $OxyA11y = new OxyA11y();

}
