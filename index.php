<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Config maker</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/css/normalize.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/css/foundation.css" />

  <!-- If you are using the gem version, you need this only 
  <link rel="stylesheet" href="css/app.css" />
    -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/vendor/custom.modernizr.js"></script>

</head>
<body>

  <!-- body content here -->
<!--<h1>In Development, will not work! check <a href="v1">V1</a> and <a href="v2">V2</a> for previous versions!</h1> -->
<h1 align="center">IMACCFM</h1>
<h4 align="center">Isigiels mega awesome config configurator for Minecraft</h4>
<div class="row">
<div class="large-6 columns">
<form action="process.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Upload</legend>

<label for="file">File</label>
<input type="file" name="file" id="file">

<input type="submit" name="submit" value="Submit" class="button success">

</fieldset>
</form>

</div>
<br/><br/>
<div class="large-6 columns">
    <div class="panel">
    <p>
        Please upload one Config File that belongs to a Minecraftforge-mod.
        <ul class="button-group round">
            <li>
                <a href="http://www.minecraftforge.net/" class="small button secondary">Forge</a>
            </li>
            <li>
                <a href="http://modlist.mcf.li/" class="small button secondary">Modlist</a>
            </li>
            <li>
                <a href="http://www.minecraftforum.net/" class="small button secondary">Minecraft Forums</a>
            </li>
        </ul>
    </p>
    </div>
</div>

</div>


  <!-- body content here -->
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/vendor/zepto' : '//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.alerts.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.clearing.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.cookie.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.dropdown.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.forms.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.joyride.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.magellan.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.orbit.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.placeholder.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.reveal.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.section.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.tooltips.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.topbar.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.3.1/js/foundation/foundation.interchange.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
