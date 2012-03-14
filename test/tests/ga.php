<?php

class GaWebTestCase extends CustomWebTestCase 
{
  private function _testGaIsOnPage($page) 
  {
    $this->get($page);
    $content = $this->getBrowser()->getContent();

    $this->assertTrue(preg_match('/google-analytics.com\/ga.js/', $content), 'Regex /google-analytics.com\/ga.js/ on '. $page);
    $this->assertTrue(preg_match('/UA-[0-9]{1,10}-[0-9]{1}/', $content), 'Regex /UA-[0-9]{1,10}-[0-9]{1}/ on '. $page);
  }

  public function testGaIsOnHomepage() 
  {
    $this->_testGaIsOnPage($this->base);
  }

  public function testGaIsOnPages() 
  {
    if (is_array($this->pages) && !empty($this->pages)) {
      foreach ($this->pages as $page) {

        if (strlen($this->base)) {
          $page = $this->base . $page;
        }  
        
        $this->_testGaIsOnPage($page);
      }
    }
  }
}
