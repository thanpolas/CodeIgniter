<?php

if (DEVEL && !$this->config->item('load_compiled_js')): 
	// if in devel mode, load jquery from our files, and load up
	// the JS engine one by one...
	// if in production load the compiled js and jquery from google's CDN
?>
<script src="/jsc/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="/js/closure-library/closure/goog/base.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/deps.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/init.js" charset="utf-8"></script>
<?php elseif (DEVEL && $this->config->item('load_compiled_js')): ?>
	<script type="text/javascript" src="/js/third-party/jquery-1.7.1.js"></script>
	<script type="text/javascript" src="/jsc/compiled.js" charset="utf-8"></script>
<?php else: ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/jsc/v/main_<?php echo PRODCOUNTER; ?>.js" charset="utf-8"></script>
<?php  endif; 

// now echo our interface with our JS engine

echo $this->main->JsPassGet();


?>