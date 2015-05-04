<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
  <div class='row all-bottom'><div class='col-md-12'><?php $this->loadModel('block')->printRegion($layouts, 'all', 'bottom', true);?></div></div>
  </div></div><?php /* end div.page-content then div.page-wrapper in header.html.php */?>
  <footer id='footer' class='clearfix'>
    <div class='wrapper'>
      <div id='footNav'>
        <?php
        echo html::a($this->createLink('sitemap', 'index'), "<i class='icon-sitemap'></i> " . $lang->sitemap->common, "class='text-link'");

        if(empty($this->config->links->index) && !empty($this->config->links->all)) echo '&nbsp;' . html::a($this->createLink('links', 'index'), "<i class='icon-link'></i> " . $this->lang->link);
        ?>
      </div>
      <span id='copyright'>
        <?php
        $copyright = empty($config->site->copyright) ? '' : $config->site->copyright . '-';
        $contact   = json_decode($config->company->contact); 
        $company   = (empty($contact->site) or $contact->site == $this->server->http_host) ? $config->company->name : html::a('http://' . $contact->site, $config->company->name, "target='_blank'");
        echo "&copy; {$copyright}" . date('Y') . ' ' . $company . '&nbsp;&nbsp;';
        ?>
      </span>
      <span id='icpInfo'>
        <?php if(!empty($config->site->icpLink) and !empty($config->site->icpSN)) echo html::a(strpos($config->site->icpLink, 'http://') !== false ? $config->site->icpLink : 'http://' . $config->site->icpLink, $config->site->icpSN, "target='_blank'");?>
        <?php if(empty($config->site->icpLink))  echo $config->site->icpSN;?>
      </span>
      <div id='powerby'>
        <?php printf($lang->poweredBy, $config->version, k(), "<span class='icon icon-chanzhi'><i class='ic1'></i><i class='ic2'></i><i class='ic3'></i><i class='ic4'></i><i class='ic5'></i><i class='ic6'></i><i class='ic7'></i></span> " . $config->version); ?>
      </div>
    </div>
  </footer>
   
<?php
if($config->debug) js::import($jsRoot . 'jquery/form/min.js');
if(isset($pageJS)) js::execute($pageJS);

/* Load hook files for current page. */
$extPath      = dirname(__FILE__) . '/ext/';
$extHookRule  = $extPath . 'footer.front.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;

/* Load hook file for site.*/
$siteExtPath  = dirname(__FILE__) . DS . "ext/_{$config->site->code}/";
$extHookRule  = $siteExtPath . 'footer.front.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
?>
<a href='#' id='go2top' class='icon-arrow-up' data-toggle='tooltip' title='<?php echo $lang->back2Top; ?>'></a>
</div><?php /* end "div.page-container" in "header.html.php" */ ?>
<?php include dirname(__FILE__) . DS . 'qrcode.html.php';?>
<div class='hide'><?php if(RUN_MODE == 'front') $this->loadModel('block')->printRegion($layouts, 'all', 'footer');?></div>
</body>
</html>
