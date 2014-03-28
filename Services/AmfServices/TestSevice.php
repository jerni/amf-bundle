<?php

/* use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container; */
use Jse\AmfBundle\Services\AmfServiceContainer;

class TestSevice extends AmfServiceContainer{
    
    public function testAction($obj){
        $cat = $this->getContainer()->get('sonata.classification.manager.category')->findOneBy(array('id' => 1));
        return json_encode($cat->getName());
    }
    
}

if(isset($_GET['debug'])){
  $test = new TestSevice();
  $testobj = (object) array('test' => 'tset');
  var_dump($test->testAction($testobj));
  die();
}
