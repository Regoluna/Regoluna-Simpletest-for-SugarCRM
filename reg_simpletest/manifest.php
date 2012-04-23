<?php
/*********************************************************************************
 * Regoluna Simpletest Integration for SugarCRM
 *
 * author: Rodrigo Saiz (rodrigo@regoluna.com)
 *
 ********************************************************************************/

$manifest = array(
	'acceptable_sugar_versions' => array( ),
	'acceptable_sugar_flavors'  => array( 'CE', 'PRO', 'ENT' ),
	'readme'                    => '',
	'key'                       => 'reg',
	'author'                    => 'Rodrigo Saiz Camarero (rodrigo@regoluna.com)',
	'description'               => 'Regoluna Simpletest Integration for SugarCRM',
	'icon'                      => '',
	'is_uninstallable'          => true,
	'name'                      => 'Regoluna Simpletest Integration',
	'published_date'            => '2012-04-23',
	'type'                      => 'module',
	'version'                   => '0.1',
);

$installdefs = array(
	'id'             => 'reg_simpletest',
  'image_dir'     => '<basepath>/icons',

	'copy'           => array(
    array( 'from' => '<basepath>/modules/reg_simpletest', 'to' => 'modules/reg_simpletest'),
    array( 'from' => '<basepath>/test', 'to' => 'custom/test/reg_simpletest'),
	),

	'language'      => array(
    array('from' => '<basepath>/language/administration_en_us.lang.php', 'to_module' => 'Administration', 'language' => 'en_us'),
    array('from' => '<basepath>/language/administration_es_es.lang.php', 'to_module' => 'Administration', 'language' => 'es_es'),
  ),
  
  // Administration section
  'administration' => array(
    array('from' => '<basepath>/administration/reg_simpletest_admin.php'),
  ),
  
);
