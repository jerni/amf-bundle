amf-service
===============

php composer.phar require jerni / amf-bundle

branch: dev-master


Register bundle in AppKernel.php

    public function registerBundles()
    {
    
            new Jse\AmfBundle\JseAmfBundle(),
            
    }

add in config/routing.yml

    jse_amf_bundle:
        resource: "@JseAmfBundle/Resources/config/routing.xml"
        prefix:   /gateway-service
        
    
add in config/config.yml

    jse_amf:
        service_path: Acme/DemoBundle
        
  
sample service:

    //Acme/DemoBundle/Services/AmfService/TestService.php
  
    use Jse\AmfBundle\Services\AmfServiceContainer;

    class TestSevice extends AmfServiceContainer{
        
        public function testsAction($obj){
            $cat = $this->getContainer()->get('sonata.classification.manager.category')->findOneBy(array('id' => 1));
            return json_encode($cat->getName());
        }
        
    }

  

