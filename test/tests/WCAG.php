<?php
require_once 'simpletest/browser.php';

class WCAGWebTestCase extends CustomWebTestCase 
{
  public function testAltOnImagesExists() 
  {
    $pages = $this->getPages();

    if (is_array($pages) && !empty($pages)) {
      
      foreach ($pages as $page) {

        if ($page->url && $page->title) {
          $this->get($this->base . $page->url);
          $content = $this->getBrowser()->getContent();

          preg_match_all('/<img[^>]+>/i', $content, $tags);

          if (is_array($tags) && !empty($tags)) {

            foreach ($tags[0] as $tag) {
              preg_match_all('/src="[^"]*"/i',$tag, $src);
              $result_alt = preg_match_all('/alt="[^"]*"/i',$tag, $alt);
              preg_match_all('/(title)=("[^"]*")/i',$tag, $title);

              $this->assertTrue(($result_alt > 0), 'alt attribute present: '. $this->base . $page->url .' -> '. $tag);

              if ($result_alt > 0) {
                $this->assertTrue(($alt[0][0] != 'alt=""'), 'alt attribute not empty: '. $this->base . $page->url .' -> '. $tag);
              }
            }
          }
        }   
      }
    }
  }
}
