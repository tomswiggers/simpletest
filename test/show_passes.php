<?php

class ShowPassesHtml extends HtmlReporter {
      
  function paintPass($message) 
  {
    parent::paintPass($message);
    print "<span class=\"pass\">Pass</span>: ";
    $breadcrumb = $this->getTestList();
    array_shift($breadcrumb);
    
    print implode("->", $breadcrumb);
    print "->$message<br />\n";
  }

  protected function getCss() {
    return parent::getCss() . ' .pass { color: green; }';
  }
}

class ShowPassesText extends TextReporter {
      
  function paintPass($message) 
  {
    parent::paintPass($message);
    echo 'Pass: ';
    $breadcrumb = $this->getTestList();
    array_shift($breadcrumb);
    
    print implode('->', $breadcrumb);
    print '->'. $message .PHP_EOL;
  }
  
  function paintFooter($test_name) 
  {
    print "Test cases run: " . $this->getTestCaseProgress() .
      "/" . $this->getTestCaseCount() .
      ", Passes: " . $this->getPassCount() .
      ", Failures: " . $this->getFailCount() .
      ", Exceptions: " . $this->getExceptionCount() . "\n";
  }  
}
