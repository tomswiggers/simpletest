<?php

class TestSsl extends CustomWebTestCase 
{
  private function _testSwitchToSsl($page) {
    $this->setMaximumRedirects(0);
    $this->get($page);
    $headers = $this->getBrowser()->getHeaders();
    $this->assertResponse(302, 'Check response code is 302 on '. $page);
    $this->assertTrue(preg_match('/Location: https:/', $headers), 'Regex /Location: https:/ on response headers on '. $page);
  }

  public function testSwitchToSslUser()
  {
    if (strlen($this->base)) {
      $this->_testSwitchToSsl($this->base .'/user');
    }
  }
}
