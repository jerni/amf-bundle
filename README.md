block-generator
===============

Register bundle in AppKernel.php

    public function registerBundles()
    {
    
            new Jse\AmfBundle\JseAmfBundle(),
            
    }

command:

php app/console create:block blockname --bundle=Jse/BlockGeneratorBundle
