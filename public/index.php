<?php

if ( ! empty($_POST))
{
	include_once('../app/Generator.php');

	$g = new Generator();

	$g->go();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0">
	<title>craftplug.in</title>
	<style>
	html,body,div,ul,ol,li,dl,dt,dd,h1,h2,h3,h4,h5,h6,pre,form,p,blockquote,fieldset,input,textarea{margin:0;padding:0;}
	h1,h2,h3,h4,h5,h6,pre,code,address,caption,cite,code,em,strong,th{font-size:1em;font-weight:normal;font-style:normal;}
	body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;color:#000;font-size:1em;background:#eee;text-align:left;}
	h1{font-size:3em;margin:.6em 0;line-height:1.3em;}
	h2{font-size:1.4em;margin:0 0 1em 0;line-height:1.3em;}
	a:link,a:active,a:visited{border:0;text-decoration:none;color:#DB5B48;}
	a:hover{text-decoration:underline;color:#DB5B48;}
	html,body {height:100%;}
	p {margin: 1em 0;}
	h1 {font-weight:normal;font-size:2em;line-height:1em;}
	h3 {font-weight:bold;color:#444;font-size:1em;line-height:1em; margin: 1em 0;}
	#container{max-width:400px;margin:0 auto 75px auto;padding:10px 25px;background:#fff;border-radius:5px;border:1px solid #ddd;position:relative;top:10%;}
	button {clear: both;color:#fff;background:#da5a47;border-radius:3px;padding:6px 12px; border:0;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;cursor:pointer;font-size: 0.9em;}
	button:hover {background:#BF503F;}
	input[type=text] {border:1px solid #ccc;padding:0.4em;width:97%;clear:both;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:0.8em;margin:0.2em 0;}
	label {font-size:0.9em;color:#666;}
	p.tip {color:#999;font-size:0.7em;margin:0.2em 0 0.2em 1.4em;}
	.control-group {margin:0.6em 0;clear:both;overflow:hidden;}
	</style>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-52268191-1', 'craftplug.in');
	  ga('send', 'pageview');

	</script>
</head>
<body>
	<div id="container">

		<h1>Craft Plugin Generator</h1>

		<p style="color: #888;">Get a jump start on your plugin development with this little package generator.</p>

		<form action="" method="post">
			
			<input type="text" name="pluginName" value="" placeholder="Plugin Name (FakeBlock)">
			<input type="text" name="pluginAuthor" value="" placeholder="Author Name (George Maharis)">
			<input type="text" name="pluginVersion" value="" placeholder="Version (1.0)">
			<input type="text" name="pluginUrl" value="" placeholder="URL (http://www.fakeblock.com/)">

			<div>
				<h3>Include</h3>

				<div class="control-group">				
					<label><input type="checkbox" name="hasVariables" checked> Template Variables [<a href="http://buildwithcraft.com/docs/plugins/variables" target="_blank">?</a>]</label>
					<p class="tip">Even the simplest of plugins will probably use template variables.</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasServices"> Services [<a href="http://buildwithcraft.com/docs/plugins/services" target="_blank">?</a>]</label>
					<p class="tip">Most plugins will use services.</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasModels"> Models [<a href="http://buildwithcraft.com/docs/plugins/models" target="_blank">?</a>]</label>
					<p class="tip">If you'll be storing data, you'll want containers for it.</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasControllers"> Controllers [<a href="http://buildwithcraft.com/docs/plugins/controllers" target="_blank">?</a>]</label>
					<p class="tip">Plugins with webhooks or other types of system tie-ins will probably utilize controllers.</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasRecords"> Records [<a href="http://buildwithcraft.com/docs/plugins/records" target="_blank">?</a>]</label>
					<p class="tip">Records are like models with a database layer.</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasWidgets"> Dashboard Widgets [<a href="http://buildwithcraft.com/docs/plugins/widgets" target="_blank">?</a>]</label>
					<p class="tip">Will you be making a widget available for use on the dashboard?</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasFieldTypes"> Field Types [<a href="http://buildwithcraft.com/docs/plugins/field-types" target="_blank">?</a>]</label>
					<p class="tip">Want to add your own field type(s) that can be used for entry fields?</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="hasCpSection"> Control Panel</label>
					<p class="tip">Will your plugin have its own section and UI in the control panel?</p>
				</div>
				<div class="control-group">
					<label><input type="checkbox" name="includeComments" checked> Code Comments</label>
					<p class="tip">We've added lots of comments within each plugin file if you'd like an orientation or a refresher.</p>
				</div>
			</div>

			<br>

			<div class="control-group">
				<button>Pluginate!</button>
			</div>

			<p style="font-size: 0.7em; margin-top: 1em; text-align: right; color: #999;">Issues or ideas? <a href="https://github.com/mattstein/craftplug.in">Contribute on GitHub</a>.</p>

		</form>

	</div>
</body>
</html>