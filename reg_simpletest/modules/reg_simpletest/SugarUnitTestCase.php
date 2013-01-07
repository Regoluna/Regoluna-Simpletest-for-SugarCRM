<?php

require_once('include/simpletest/unit_tester.php');

/**
 *
 * @author Rodrigo Saiz (rodrigo@regoluna.com)
 *
 */

class SugarUnitTestCase extends UnitTestCase{

  /**
   * SugarCRM database abstraction.
   *
   * @var unknown_type
   */
  protected $db;
  
  /**
   *
   * @var Array $to_remove
   */
  protected $to_remove = array();
  
  function __construct( $name = '' ) {
    parent::__construct( $name );
    $this->db = DBManagerFactory::getInstance();
  }
  
  
  function tearDown() {

    // Remove created beans.
    foreach( $this->to_remove as $object){
      if( is_a($object, 'SugarBean')   ){
        $table = $object->getTableName();
        $object->mark_deleted($object->id );
        $this->db->query("DELETE FROM $table WHERE id = '$object->id' ");
        $this->db->query("DELETE FROM {$table}_audit WHERE parent_id = '$object->id' ");
        unset($object);
      }
    }
    $this->to_remove = array();
    
  }
  
  
  /**
   * Creates one invoice for testing.
   * This bean will be removed from DB when the test has finished.
   * @param string $beanName
   * @return SugarBean Instanced bean.
   */
  function getBean( $beanName ){
    
    global $beanFiles;
    
    if( isset( $beanFiles[$beanName] ) ){
      require_once( $beanFiles[$beanName] );
    }
    
    $bean = new $beanName();
    $this->to_remove[] = $bean; // Mark to delete on test Tear Down
    
    return $bean;
  }
  
}