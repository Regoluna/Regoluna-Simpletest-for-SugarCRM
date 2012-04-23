<?php

require_once('include/simpletest/simpletest.php');

class SugarTestSuite extends TestSuite {

  private $testsBaseDir = 'custom/test';

  /**
   * Constructs a new suite using all tests found in custom/test/*.../*Test.php
   */
  function __construct() {
    parent::__construct('SugarCRM Test Suite');

    // Read test from all subfolders of custom/test
    $dirhandler = opendir($this->testsBaseDir );
    while ($entry = readdir($dirhandler)) {
      if ($entry != '.' && $entry != '..' && is_dir("$this->testsBaseDir/$entry" )) {
        require_once('include/simpletest/collector.php');
        $this->collect("$this->testsBaseDir/$entry" , new SimplePatternCollector('/Test.php/'));
      }
    }

  }

}
