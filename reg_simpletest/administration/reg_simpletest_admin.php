<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$admin_option_defs = array();

// Create new administration Options and add them to "Regoluna" section y administration

// Simpletest config options
$admin_option_defs[] = array(
  'reg_simpletest_16',
  'LBL_SIMPLETEST',
  'LBL_SIMPLETEST_DESC',
  './index.php?module=reg_simpletest&action=index',
);


// Search for Regoluna config section and add new options
$index = null;
foreach ($admin_group_header as $i => $config) {
  if ($config[0] == 'LBL_REGOLUNA_TITLE') {
    $index = $i;
    break;
  }
}

if ($index === null) {
  // Creates "Regoluna" group if not exists
  $index = $i + 1;
  $admin_group_header[$index] = array('LBL_REGOLUNA_TITLE', '', false, array('regoluna' => $admin_option_defs), 'LBL_REGOLUNA_DESC');
} else {
  $admin_group_header[$index][3]['regoluna'] = array_merge($admin_group_header[$index][3]['regoluna'], $admin_option_defs );
}

