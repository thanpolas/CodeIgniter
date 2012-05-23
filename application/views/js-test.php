<?php
$ci = get_instance();
$headerVars = array (
  // pass any custom logic here or data required for header and footer
);
$this->load->view('header', $headerVars);
?>
 <h1 id="qunit-header">Superstartup Unit Tests</h1>
<h2 id="qunit-banner"></h2>
<div id="qunit-testrunner-toolbar"></div>
<h2 id="qunit-userAgent"></h2>
<ol id="qunit-tests"></ol>
<div id="qunit-fixture">test markup, will be hidden</div>


<link rel="stylesheet" href="http://code.jquery.com/qunit/git/qunit.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://code.jquery.com/qunit/git/qunit.js"></script>

<?php foreach($allTests as $test): ?>
	<script type="text/javascript" src="<?php echo $testsPath . $test; ?>"></script>
<?php endforeach; ?>

<?php
  $this->load->view('footer', $headerVars);
