<?php
namespace Jse\AmfBundle\Services;

class AmfServiceContainer{

  protected function getContainer(){
    global $kernel;
    return $kernel->getContainer();
  }
  
}