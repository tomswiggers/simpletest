<?php

class AccessDeniedWebTestCase extends CustomWebTestCase 
{
  function testAccessDeniedAdmin() 
  {
    $this->get($this->base .'/admin');
    $this->assertText('Access denied');
  }
}
