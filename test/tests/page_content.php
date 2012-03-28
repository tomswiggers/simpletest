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

  public function testPageContentExists() 
  {
    $pages = $this->getPages();

    if (is_array($pages) && !empty($pages)) {
      
      foreach ($pages as $page) {

        if ($page->url && isset($page->content) && is_array($page->content) && !empty($page->content)) {
          $this->get($this->base . $page->url);

          foreach ($page->content as $content) {
            $this->assertText($content);
          }
        }   
      }
    } 
  }
}
