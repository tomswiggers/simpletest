<?php

class TestSsl extends CustomWebTestCase 
{
  private function _testSwitchToSsl($page) {
    $this->setMaximumRedirects(0);
    $this->get($page);
    $headers = $this->getBrowser()->getHeaders();
    $this->assertResponse(302);
    $this->assertTrue(preg_match('/Location: https:/', $headers));
  }

  public function testSwitchToSslUser()
  {
    if (strlen($this->base)) {
      $this->_testSwitchToSsl($this->base .'/user');
    }
  }
}
