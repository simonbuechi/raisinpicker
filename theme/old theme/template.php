<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
 /**
 * hook_preprocess_views_view
 */
function raisinpicker_preprocess_views_view(&$vars) {
  // Wrap exposed filters in a fieldset.
  if ($vars['exposed']) {
    drupal_add_js('misc/form.js');
    drupal_add_js('misc/collapse.js');
    // Default collapsed
    $collapsed = TRUE;
    $class = array('collapsible', 'collapsed');
    if (count($_GET) > 1){
      // assume other get vars are exposed filters, so expand fieldset
      // to show applied filters
      $collapsed = FALSE;
      $class = array('collapsible');
    }
    $fieldset['element'] = array(
      '#title' => t('Filter'),
      '#collapsible' => TRUE,
      '#collapsed' => $collapsed,
      '#attributes' => array('class' => $class),
      '#children' => $vars['exposed'],
    );
    $vars['exposed'] = theme('fieldset', $fieldset);
  }
}
?>