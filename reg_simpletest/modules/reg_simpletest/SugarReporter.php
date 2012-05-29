<?php

require_once('include/simpletest/simpletest.php');
require_once('SugarTestLogger.php');

class SugarReporter extends HtmlReporter {

  /**
   *
   * @var SugarTestLogger
   */
  private $logger;
  
  function __construct( $logger = null ){
    parent::__construct();
    if($logger) $this->logger = $logger;
    else $this->logger = new SugarTestLogger( -1 );
  }
  
  function paintHeader($test_name) {
    print '<link rel="stylesheet" type="text/css" href="modules/reg_simpletest/test_styles.css">';
    flush();
  }

  function paintFooter($test_name) {
    $colour = ($this->getFailCount() + $this->getExceptionCount() > 0 ? "red" : "green");
    print "<div style=\"";
    print "padding: 8px; margin-top: 1em; background-color: $colour; color: white;";
    print "\">";
    print $this->getTestCaseProgress() . "/" . $this->getTestCaseCount();
    print " test cases complete:\n";
    print "<strong>" . $this->getPassCount() . "</strong> passes, ";
    print "<strong>" . $this->getFailCount() . "</strong> fails and ";
    print "<strong>" . $this->getExceptionCount() . "</strong> exceptions.";
    print "</div>\n";
  }


  /**
   *    Paints the start of a group test.
   *    @param string $test_name     Name of test or other label.
   *    @param integer $size         Number of test cases starting.
   *    @access public
   */
  function paintGroupStart($test_name, $size) {
    parent::paintGroupStart($test_name, $size);
    $test_name = str_replace( 'custom/test/' , '', $test_name );
    print '<div class="test-group"><div class="title">' . $test_name . '</div>';
  }

  /**
   *    Paints the end of a group test.
   *    @param string $test_name     Name of test or other label.
   *    @access public
   */
  function paintGroupEnd($test_name) {
    print '</div>';
    parent::paintGroupEnd($test_name);
  }

  /**
   *    Paints the start of a test case.
   *    @param string $test_name     Name of test or other label.
   *    @access public
   */
  function paintCaseStart($test_name) {
    print '<div class="test-case"><div class="title">' . $test_name . '</div>';
    $this->logger->reset();
  }

  /**
   *    Paints the end of a test case.
   *    @param string $test_name     Name of test or other label.
   *    @access public
   */
  function paintCaseEnd($test_name) {
    print "</div>";
  }

  /**
   *    Increments the pass count.
   *    @param string $message        Message is ignored.
   *    @access public
   */
  function paintPass($message) {
    
        $logMessages = $this->logger->flush();
        if( is_array( $logMessages ) ) foreach ($logMessages as $m){
          print "<div class=\"log severity-{$m['severity']}\"><strong>Log {$m['severity']}:</strong> {$m['text']}</div>";
        }
        
        parent::paintPass($message);
        print "<span class=\"pass\">Pass</span>: ";
        $breadcrumb = $this->getTestList();
        print $breadcrumb[ (count($breadcrumb)-1) ] . "<br/>";
      }

}
