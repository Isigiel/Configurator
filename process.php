


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
<div class="row"><div class="large-12 columns">
<h1 align="center"> File uploaded. Processing...</h1>
<h4 class="subheader" align="center">Please scroll down!</h4>
</div> </div>
<div class="row">
<div class="large-3 columns">



<?php
$allowedExts = array("txt", "cfg");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "text/plain") || ($_FILES["file"]["type"] == "application/octet-stream"))
&& ($_FILES["file"]["size"] < 100000) && in_array($extension, $allowedExts))
{
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
        echo "<div class=\"panel\"><h4>File Information</h4>Upload: " . $_FILES["file"]["name"] . "<br>"."Type: " . $_FILES["file"]["type"] . "<br>"."Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>"."Stored in: " . $_FILES["file"]["tmp_name"]."</div></div>";
    }
  }
else
  {
  echo "Invalid file";
  }
  
  $dump=file_get_contents( $_FILES["file"]["tmp_name"] );
  echo "<div class=\"large-9 columns\"><div class=\"panel\"><h4>Raw File content</h4>".$dump."</div></div></div>";
  
  echo "<div class=\"row\"><div class=\"large-12 columns\"><h3>Analyzing the file. Formatted Output ahead...</h3></div></div>";
  
  //Formatting th file (lines, whitespaces)
  $formatted=explode("\n",$dump);
  foreach ($formatted as $line)
  {
      trim($line);
  }
  
  echo "<div class=\"row\">"; /**<div class=\"large-6 columns\"><div class=\"panel\"><h4>Lines made | Withespaces cleared</h4>";
  foreach ($formatted as $line)
  {
      echo $line."<br/>";
  }**/
  echo "</div></div>";
  //Fromatting finished
  //Analysis
  //Master Array, represents the whole file
  $cfg=array("lines"=>array(),"name"=>$_FILES["file"]["name"]);
  //$cfg["lines"][$i]=array("type"=>"","name"=>"","key"=>"","value"=>"","comment"=>"","original"=>$line)
  
  //Analyzing Lines
  $i=0;
  foreach ($formatted as $line)
  {
      //echo "hallo</br>";
      if (strpbrk($line,"#")!=false)
      {
          /**$cfg["lines"][$i]["type"]="comment";
          $cfg["lines"][$i]["comment"]=$line;
          $cfg["lines"][$i]["original"]=$line;**/
          $cfg["lines"][$i] = array("type"=>"comment","name"=>"","key"=>"","value"=>"","comment"=>$line,"original"=>$line);
          
          //echo $cfg["lines"][$i]["type"]."<br/>";
      }
      elseif (strpbrk($line,"{")!=false)
      {
          /**$cfg["lines"][$i]["type"]="sec_start";
          $cfg["lines"][$i]["name"]=strstr($line," ",true);
          $cfg["lines"][$i]["original"]=$line;**/
          $cfg["lines"][$i]=array("type"=>"sec_start","name"=>strstr(trim($line)," ",true),"key"=>"","value"=>"","comment"=>"","original"=>$line);
          
          //echo "sec_start</br>";
      }
      elseif (strpbrk($line,"}")!=false)
      {
          /**$cfg["lines"][$i]["type"]="sec_end";
          $cfg["lines"][$i]["original"]=$line;**/
          $cfg["lines"][$i]=array("type"=>"sec_end","name"=>"","key"=>"","value"=>"","comment"=>"","original"=>$line);
          
          //echo "sec_end</br>";
      }
      elseif (strpbrk($line,"=")!=false)
      {
          /**$cfg["lines"][$i]["type"]="id";
          $cfg["lines"][$i]["key"]=strstr($line,"=",true);
          $cfg["lines"][$i]["value"]=str_replace("=","",strstr($line,"="));
          $cfg["lines"][$i]["original"]=$line;**/
          $cfg["lines"][$i]=array("type"=>"id","name"=>"","key"=>strstr($line,"=",true),"value"=>str_replace("=","",strstr($line,"=")),"comment"=>"","original"=>$line);
          
          //echo "id</br>";
      }
      else
      {
          $cfg["lines"][$i]=array("type"=>"empty","name"=>"","key"=>"","value"=>"","comment"=>"","original"=>$line);
      }
      $i++;
  }
  
  
  
  //printing analyzed Data
  echo "<div class=\"large-12 columns\"><div class=\"panel\">";
  
  $i=0;
  foreach ($cfg["lines"] as $line)
  {
      echo "Line #".$i."\tType:".$line["type"]."\tOriginal Text:".$line["original"]."<br/>";
      $i++;
  }
  
  $hash=md5(serialize($cfg));
  $arr1 = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
  file_put_contents($hash.".json",json_encode($cfg));
  
  
  $sectios=array();
  $i=0;
  
  foreach ($cfg["lines"] as $line)
  {
      if ($line["type"]=="sec_start")
      {
          $sections[$i]=$line["name"];
          $i++;
      }
  }
  
  
  
  
  
 ?>
 
 </div></div></div>
 <div id="myModal" class="reveal-modal">
 <div class="row">
 <div class="large-12 collumns">
 <form method="post" action="section.php">
 
 <h4> Please choose the section you want to modify. (Must only contend IDs!)</h4>
 
 <?php
 
 foreach ($sections as $sec)
 {
     echo ("<label for=".$sec."><input name=\"sec\" type=\"radio\" value=".$sec."><span class=\"custom radio\"></span> ".$sec."</label>");
 }
 
 
 ?>
 Nothing to chnage here!<input type="text" name="hash" value="<?php echo $hash; ?>"readonly="true">
 <h5>Please define the ID you want to start with (will be counted one up per ID):</h5><input type="text" name="id">
 
 <input type="submit" name="submit" value="Submit" class="button success">
</form> 
 </div></div></div>
 <div class="row">
 <div class="large-1 large-offset-6 collumns ">
 <a href="#" data-reveal-id="myModal" class="button" >Continue</a>
 </div>
 </div>
 
 </div>
 </body>
 </html>