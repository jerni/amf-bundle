block-generator
===============

Register bundle in AppKernel.php

    public function registerBundles()
    {
    
            new Jse\AmfBundle\JseAmfBundle(),
            
    }

add in config/routing.yml

jse_amf_bundle:
    resource: "@JseAmfBundle/Resources/config/routing.xml"
    prefix:   /

default route:
  /gateway-service
  
  

