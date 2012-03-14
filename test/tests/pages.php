<?php

class PagesExistsWebTestCase extends CustomWebTestCase 
{
  private function _testPageExists($page) 
  {
    $this->assertTrue($this->get($page), $page);
  }

  public function testHomePageExists()
  {
    $this->_testPageExists($this->base);
  }

  public function testPagesExists() 
  {
    if (is_array($this->pages) && !empty($this->pages)) {
      
      foreach ($this->pages as $page) {
        $this->_testPageExists($this->base . $page);
      }
    }
  }
}
