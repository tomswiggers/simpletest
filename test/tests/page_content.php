<?php

class PageContentWebTestCase extends CustomWebTestCase 
{

  public function testPageTitleExists() 
  {
    $pages = $this->getPages();

    if (is_array($pages) && !empty($pages)) {
      
      foreach ($pages as $page) {

        if ($page->url && $page->title) {
          $this->get($this->base . $page->url);
          $this->assertTitle($page->title);
        }   
      }
    }
  }
}
