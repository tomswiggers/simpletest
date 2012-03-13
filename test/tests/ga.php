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

  public function testHomepage() 
  {
    foreach ($this->pages as $page) {

      if (strlen($this->base)) {
        $page = $this->base . $page;
      }  

      $this->get($page);
      $content = $this->getBrowser()->getContent();

      $result = ($this->assertTrue(preg_match('/google-analytics.com\/ga.js/', $content))) ? 'OK' : 'NOK';
      echo 'check for ga.js in source code on: ' .$page. ' ' . $result . PHP_EOL;

      $result = ($this->assertTrue(preg_match('/UA-[0-9]{1,10}-[0-9]{1}/', $content))) ? 'OK' : 'NOT OK';
      echo 'Check for GA tracking code on: ' .$page. ' ' .$result. PHP_EOL;
    }
  }
}
