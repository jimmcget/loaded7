<?php
/*
  $Id: updates.php v1.0 2013-01-01 datazen $

  LoadedCommerce, Innovative eCommerce Solutions
  http://www.loadedcommerce.com

  Copyright (c) 2013 Loaded Commerce, LLC

  @author     LoadedCommerce Team
  @copyright  (c) 2013 LoadedCommerce Team
  @license    http://loadedcommerce.com/license.html
*/
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);
require_once('includes/applications/updates/classes/updates.php');  

$updatesDataArr = lC_Updates_Admin::getAvailablePackages(); 
?>
<!-- Main content -->
<section role="main" id="main">
  <noscript class="message black-gradient simpler"><?php echo $lC_Language->get('ms_error_javascript_not_enabled_warning'); ?></noscript>
  <hgroup id="main-title" class="thin">
    <h1><?php echo $lC_Template->getPageTitle(); ?></h1>
  </hgroup>
  <style>
  .dataColCheck { text-align: center; }
  </style>
  <div class="columns">
    <div class="twelve-columns">
      <div id="pageContainer" class="large-margin-left">
        <div id="lastCheckedContainer">
          <span id="updateCheckText"><?php echo $lC_Language->get('text_last_checked') . ' ' . lC_DateTime::getLong($lastChecked, TRUE); ?></span>
          <a href="#" class="button silver-gradient glossy icon-cloud-upload small-margin-left"><?php echo $lC_Language->get('text_check_again'); ?></a>
        </div>

        <form name="batch" id="batch" action="#" method="post">





        </form>
      </div>
    </div>
  </div>
</section>
<?php $lC_Template->loadModal($lC_Template->getModule()); ?>
<!-- Main content end -->