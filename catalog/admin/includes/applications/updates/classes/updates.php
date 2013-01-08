<?php
/*
  $Id: updates.php v1.0 2011-11-04 datazen $

  LoadedCommerce, Innovative eCommerce Solutions
  http://www.loadedcommerce.com

  Copyright (c) 2011 LoadedCommerce.com

  @author     LoadedCommerce Team
  @copyright  (c) 2011 LoadedCommerce Team
  @license    http://loadedcommerce.com/license.html

  @function The lC_Updater_Admin class manages zM services
*/
require_once('../includes/classes/transport.php');  

class lC_Updates_Admin { 

  public function __contruct() {
  }
  
  // class methods go here
  public function getAvailablePackages() {
    global $lC_Api;
      
    $result = array('entries' => array());

    $versions = transport::getResponse(array('url' => 'https://api.loadedcommerce.com/1_0/updates/available/', 'method' => 'get'));

    $versions_array = utility::xml2arr($versions);    

    $counter = 0;

    foreach ( $versions_array['data'] as $l => $v ) {
      if ( version_compare(utility::getVersion(), $v['version'], '<') ) {
        $result['entries'][] = array('key' => $counter,
                                     'version' => $v['version'],
                                     'date' => lC_DateTime::getShort(lC_DateTime::fromUnixTimestamp(lC_DateTime::getTimestamp($v['dateCreated'], 'Ymd'))),
                                     'announcement' => $v['newsLink'],
                                     'update_package' => (isset($v['pharLink']) ? $v['pharLink'] : null));

        $counter++;
      }
    }

    usort($result['entries'], function ($a, $b) {
      return version_compare($a['version'], $b['version'], '>');
    });


    $result['total'] = count($result['entries']);

echo "<pre>";
print_r($result);
echo "</pre>";
die('12');
    
    return $result;
  }   
}
?>