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

class ShowPassesText extends TextReporter 
{
  public $red = "\033[31;40m\033[1m%s\033[0m";
  public $green = "\033[1;32;40m\033[1m%s\033[0m";

  function paintPass($message) 
  {
    parent::paintPass($message);
    printf($this->green, 'Pass');
    $breadcrumb = $this->getTestList();
    array_shift($breadcrumb);
    
    echo ' '. implode('->', $breadcrumb);
    echo '->'. $message .PHP_EOL;
  }
  
  function paintFooter($test_name) 
  {
    $str = "Test cases run: " . $this->getTestCaseProgress() .
      "/" . $this->getTestCaseCount() .
      ", Passes: " . $this->getPassCount() .
      ", Failures: " . $this->getFailCount() .
      ", Exceptions: " . $this->getExceptionCount();

    if ($this->getFailCount() + $this->getExceptionCount() > 0) {
      $color = $this->red;
    } else {
      $color = $this->green;
    }

    printf($color, $str);
    echo PHP_EOL;
  }  
}
