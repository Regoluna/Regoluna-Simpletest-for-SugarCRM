<?php

require_once('include/simpletest/simpletest.php');
require_once('SugarReporter.php');
require_once('SugarTestSuite.php');
require_once('SugarTestLogger.php');
require_once('SugarUnitTestCase.php');
require_once('include/simpletest/unit_tester.php');
require_once('include/simpletest/mock_objects.php');
require_once('include/simpletest/collector.php');
require_once('include/simpletest/default_reporter.php');


$test = new SugarTestSuite();
$log = new SugarTestLogger( 1 );
$test->run(new SugarReporter($log));