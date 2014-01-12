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



<?php
    $hash=$_POST["hash"];
    $cfg = json_decode(file_get_contents("/tmp/".$hash.".json"), true);
    unlink($hash.".json");
    
    
    $lines=$cfg["lines"];
    $name=$cfg["name"];
    //echo "<br/>$name<br/>";
    $i=0;
    
    foreach ($lines as $line)
    {
        if ($line["name"]==$_POST["sec"]&&$line["type"]=="sec_start")
        {
            break;
        }
        $i++;
    }
    
    $e=$i;
    
    while ($t=true)
    {
        if ($lines[$e]["type"]=="sec_end")
        {
            break;
        }
        $e++;
    }
    
    
    $c=$i+1;
    $o=$e;
    $id=$_POST["id"];
    
    while($c<$o)
    {
        $lines[$c]["value"]=$id;
        $go=array($lines[$c]["key"],$lines[$c]["value"]);
        foreach ($go as $line)
    {

    }
        $lines[$c]["original"]=implode("=",$go);
        $id++;
        $c++;
    }
    //imploder

    $file;
    $c=0;
    
    foreach ($lines as $line)
    {
        $file[$c]=$line["original"];
        $c++;
    }
    
    $text=array("file"=>implode("\n",$file),"name"=>$name);
    
    $hash=md5(serialize($text));
    file_put_contents("/tmp/".$hash.".json",json_encode($text));
    
?>



<div class="row"><div class="large-12 collumns">
<h1 align="center"> Everything ready! We did it :D</h1>
</div>
</div>
<div class="row"><div class="large-12 columns"><div class="panel">
<div class"panel">
<h3>New raw file</h3>
<p><?php echo nl2br($text["file"]); ?></p>
</div></div></div>
<div class="row"><div class="large-12 collumns">
<form method="post" action="download.php">
Nothing to chnage here!<input type="text" name="hash" value="<?php echo $hash; ?>"readonly="true">
<input type="submit" name="submit" value="Download" class="button success">
