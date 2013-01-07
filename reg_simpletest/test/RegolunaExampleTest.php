<?php

/**
 * Regoluna Simpletest Integration tests.
 */

// Init SugarCRM. Only if you need to invoque this test outside Sugar admin section.

if(!defined('sugarEntry') || !sugarEntry) {
  chdir('../../../');
  // initialize sugarcrm environment _before_ doing anything else
  define('sugarEntry', TRUE);
  require_once('include/utils.php');
  require_once('include/modules.php');
  require_once('include/entryPoint.php');
  require_once('include/simpletest/autorun.php');
}

/**
 *
 * @author Rodrigo Saiz (rodrigo@regoluna.com)
 *
 */
class RegolunaExampleTest extends SugarUnitTestCase {
  
  function __construct() {
    parent::__construct( 'Basic Use Case Test' );
  }
  
  function TestCorrect(){
    $this->assertTrue( true , 'Una prueba con un test correcto.' );
  }
  
  function TestDemo(){
//    $this->assertTrue( false , 'Parece que el test se carga y ejecuta.' );
  }
  
} // End Tests




