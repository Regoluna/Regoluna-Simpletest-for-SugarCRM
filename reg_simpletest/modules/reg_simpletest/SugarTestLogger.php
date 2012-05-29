<?php

/**
 * Replaces Sugar default Logger when executing tests.
 * @author rodri
 *
 */
class SugarTestLogger{
  
  private $old_log;
  
  private $level;
  
  private $messageQueue;
  
  private $severityList=array(
    1 => 'debug',
    2 => 'deprecated',
    3 => 'info',
    4 => 'warn',
    5 => 'error',
    6 => 'fatal'
  );
  
  public function __construct( $level=-1 ){
    
    $this->level = $level;
    $this->old_log = $GLOBALS['log'];
    if( is_numeric( $level ) &&  $level > 0 && $level < 7) {
      // Replaces Sugar default logger
      $GLOBALS['log'] = $this;
    }
    
  }

  function debug( $text ) {
    if( $this->level <= 1 ) $this->message('debug', $text);
    else $this->old_log->debug( $text );
  }
  
  function deprecated( $text ) {
    if( $this->level <= 2 ) $this->message('deprecated', $text);
    else $this->old_log->deprecated( $text );
  }
  
  function info( $text ) {
    if( $this->level <= 3 ) $this->message('info', $text);
    else $this->old_log->info( $text );
  }
  
  function warn( $text ) {
    if( $this->level <= 4 ) $this->message('warn', $text);
    else $this->old_log->warn( $text );
  }
  
  function error( $text ) {
    if( $this->level <= 5 ) $this->message('error', $text);
    else $this->old_log->error( $text );
  }

  function fatal( $text ) {
    if( $this->level <= 6 ) $this->message('fatal', $text);
    else $this->old_log->fatal( $text );
  }
  
  function message( $severity, $text ){
    $this->messageQueue[] = array(
      'severity' => $severity,
      'text' => $text
    );
  }
  
  /** Clear message queue */
  function reset(){
    $this->messageQueue = array();
  }
  
  function flush(){
    $response = $this->messageQueue;
    $this->reset();
    return $response;
  }
  
}