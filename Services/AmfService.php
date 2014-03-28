<?php
namespace Jse\AmfBundle\Services;

class AmfService{

  public function load($folder = 'AmfServices'){
  
    if(empty($folder)){
      echo 'no service define';
      die();
    }

    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__)));

    require_once dirname(__FILE__).'/../lib/amf/browser/ZendAmfServiceBrowser.php';

    set_include_path(dirname(__FILE__).'/../lib/amf/library' .PATH_SEPARATOR . get_include_path());

    require_once dirname(__FILE__).'/../lib/amf/library/Zend/Amf/Server.php';

    $server = new \Zend_Amf_Server();

    
    set_include_path(implode(PATH_SEPARATOR, array(
        realpath(APPLICATION_PATH . '/'.$folder.'/'),
        get_include_path(),
    )));
    
    
    $service_path = $this->getContainer()->getParameter('service_path');
    
    if(empty($service_path)){
      $folder = APPLICATION_PATH . '/'.$folder.'/';
    } else {
      $folder = getcwd().'/../src/'.$service_path.'/Services/AmfServices/';
      $folderPath = '/src/'.$service_path.'/Services/AmfServices/';
    }
   
   if(!is_dir($folder)){
      echo 'path is undefined <br /> create: '.$folderPath;
      die();
   }
   
   if(count(glob($folder.'*.php')) < 1){
      echo 'no services defined';
      die();   
   }
   
    foreach (glob($folder.'*.php') as $filename) {
        $service = basename($filename, ".php");
        $filerawname = basename($filename);
        if(file_exists($folder.$filerawname)){
          include_once($folder.$filerawname);
          $server->setClass($service);
        }
    }

    $server->setClass( "ZendAmfServiceBrowser" );

    \ZendAmfServiceBrowser::$ZEND_AMF_SERVER = $server;

     return $server->handle();
  }
  
  protected function getContainer(){
    global $kernel;
    return $kernel->getContainer();
  }
}