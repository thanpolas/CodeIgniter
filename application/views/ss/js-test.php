<?php
$ci = get_instance();
$headerVars = array (
  // pass any custom logic here or data required for header and footer
);
$this->load->view('ss/header', $headerVars);
$this->load->view('ss/js-test-header');
?>
<h1 id="qunit-header">Superstartup Unit Tests</h1>


<p id="header">
  
</p>
<div id="runner"></div>
<!--  Use a form so browser persists input values -->
<form id="footer" onsubmit="return false">
  Settings:<br>
  <input type="checkbox" name="hidepasses" id="hidepasses" checked>
  <label for="hidepasses">Hide passes</label><br>
  <input type="checkbox" name="parallel" id="parallel" checked>
  <label for="parallel">Run in parallel</label>
  <small>(timing stats not available if enabled)</small><br>
  <input type="text" name="filter" id="filter" value="">
  <label for="filter">Run only tests for path</label>
</form>



<?php
/*
qunit testing
?>

<h2 id="qunit-banner"></h2>
<div id="qunit-testrunner-toolbar"></div>
<h2 id="qunit-userAgent"></h2>
<ol id="qunit-tests"></ol>
<div id="qunit-fixture">test markup, will be hidden</div>


<link rel="stylesheet" href="http://code.jquery.com/qunit/git/qunit.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://code.jquery.com/qunit/git/qunit.js"></script>
<?php
*/

$this->load->view('ss/loadScripts');

?>
<script>
goog.require('goog.userAgent.product');
goog.require('goog.testing.MultiTestRunner');
</script>



<script>
	var __allTests=[<?php 
	$allStrTests = '';
	foreach($allTests as $test) {
	//<script type="text/javascript" src="<?php echo $testsPath . $test; ?//>"></script>
	$allStrTests = "'$test', ";
 }
	echo substr($allStrTests, 0, strlen($allStrTests) - 2);
?>];	

  var hidePassesInput = document.getElementById('hidepasses');
  var parallelInput = document.getElementById('parallel');
  var filterInput = document.getElementById('filter');

  function setFilterFunction() {
    var matchValue = filterInput.value || '';
    testRunner.setFilterFunction(function(testPath) {
      return testPath.indexOf(matchValue) > -1;
    });
  }

  // Create a test runner and render it.
  var testRunner = new goog.testing.MultiTestRunner()
      .setName(document.title)
      .setBasePath('/js-test/tests/')
      .setPoolSize(parallelInput.checked ? 8 : 1)
      .setStatsBucketSizes(5, 500)
      .setHidePasses(hidePassesInput.checked)
      .setVerbosePasses(true)
      .addTests(__allTests);
  testRunner.render(document.getElementById('runner'));

  goog.events.listen(hidePassesInput, 'click', function(e) {
    testRunner.setHidePasses(e.target.checked);
  });

  goog.events.listen(parallelInput, 'click', function(e) {
    testRunner.setPoolSize(e.target.checked ? 8 : 1);
  });

  goog.events.listen(filterInput, 'keyup', setFilterFunction);
  setFilterFunction();
</script>


<?php
  $this->load->view('ss/footer', array('doNotLoadScripts' => true));
