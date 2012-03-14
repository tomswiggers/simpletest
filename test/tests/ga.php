<?php

class TestGa extends WebTestCase 
{
  public $pages = array();
  public $base;

  public function setBase($base)
  {
    $this->base = $base;
  }  

  public function addPage($page)
  {
    $this->pages[] = $page;
  }

  public function testGaHomepage() 
  {
    foreach ($this->pages as $page) {

      if (strlen($this->base)) {
        $page = $this->base . $page;
      }  

      $this->get($page);
      $content = $this->getBrowser()->getContent();

      $this->assertTrue(preg_match('/google-analytics.com\/ga.js/', $content), 'Regex /google-analytics.com\/ga.js/ on '. $page);
      $this->assertTrue(preg_match('/UA-[0-9]{1,10}-[0-9]{1}/', $content), 'Regex /UA-[0-9]{1,10}-[0-9]{1}/ on '. $page);
    }
  }
}
