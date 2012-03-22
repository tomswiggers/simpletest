<?php

class CustomWebTestCase extends WebTestCase 
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

  public function getPages()
  {
    if ($this->properties->defaultPages) {
      return $this->config->pages;
    }
  }
}
