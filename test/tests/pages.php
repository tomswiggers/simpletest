<?php

class TestPages extends WebTestCase 
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

  function testPagesExists() 
  {
    foreach ($this->pages as $page) {
      $page = $this->base . $page;
      $this->assertTrue($this->get($page), $page);
    }
  }
}
