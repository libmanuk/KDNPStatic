<?php

//check for number of commandline arguments.  if there are 2, attempt to process the input, otherwise return error.
if (count($argv) == 3 && strlen($argv[1]) == 3 && strlen($argv[2]) == 12) {

//set path to papervault
$catalog="/home/libmanuk/public_html/papervault";

//set pairtree_root for static HTML file storage
$pairtree="/home/libmanuk/public_html/pairtree_root";

//set variables for input arguments; tla is the 3 letter title code and ark is the identifier for the newspaper issue
$tla = "$argv[1]";
$ark = "$argv[2]";

//download Internet Archive data for number of object downloads and public date via external bash script
shell_exec("/home/libmanuk/public_html/cgi-bin/ia_kdnp_curl.sh $tla $ark");

//run replace scripts on Internet Archive data files
shell_exec("/home/libmanuk/public_html/cgi-bin/ia_kdnp_replace_downloads.sh $tla $ark");
shell_exec("/home/libmanuk/public_html/cgi-bin/ia_kdnp_replace_publicdate.sh $tla $ark");

//read in Internet Archive data as variables
$downloads = file_get_contents("$catalog/$tla/$ark.dwn", true);
$publicdate = file_get_contents("$catalog/$tla/$ark.pdt", true);

//read in total usage statistic data as variable
$alluse = file_get_contents("$catalog/stats/views.txt", true);

//read in the json file for a newspaper issue
$content=file_get_contents("$catalog/$tla/$ark.json", true);

//decode the json string and clean up the text field a bit
$json_metadata=json_decode($content, true);
$search = array("\n", "\"");
$replace = array(" ", " ");
$nolinetxt=str_replace($search,$replace,$json_metadata['text']);

//clean up the collection field a bit to use for calendars
$search2 = array("(The)", "'");
$replace2 = array("\(The\)", "\'");
$nothecoll=str_replace($search2,$replace2,$json_metadata['collection_display']);

//write a blank html file given the same filename as the json newspaper issue file
//$write="$catalog/$tla/$ark.html";

//write a blank csv file given the same filename as the json newspaper issue file
$write2="$catalog/$tla/$ark.itm";
$write1="$catalog/$tla/$ark.txt";

//compute value for page download hint
$downloadmax = $json_metadata[pages_i];
$subtractnum = 1;
$sum_total = $downloadmax - $subtractnum;

$FirstArray = range(0,$sum_total);
$SecondArray = range(1,$json_metadata['pages_i']);

ob_start(); 

for ($index = 0 ; $index < count($FirstArray); $index ++) {
  echo "<option value='";
  echo $FirstArray[$index];
  echo "'>";
  echo $SecondArray[$index];
  echo "</option>";
  echo "<br/>";
}

$select = ob_get_contents();
ob_end_flush();

ob_start(); 

for ($index = 0 ; $index < count($FirstArray); $index ++) {
  echo "<span class='kdnpThumbs' style='margin-left:auto;margin-right:auto;'><br/>image ";
  echo $SecondArray[$index];
  echo " of $json_metadata[pages_i]<br/><br/>"; 
  echo "<a href='https://archive.org/stream/$json_metadata[id]?ui=embed#mode/1up/page/n";
  echo $FirstArray[$index];
  echo "' target='viewer'><img src='https://archive.org/download/$json_metadata[id]/$json_metadata[id]/page/n";
  echo $FirstArray[$index];
  echo "_small.jpg' style='width:100%;height:307px'/></a><br/><br/></span>";
}

$thumbs = ob_get_contents();
ob_end_flush();

//figure out copyright status and build copyright tool content

ob_start(); 
$year=$json_metadata[year_display];

if ($year>1922)  
{   
echo "<p><img src='https://kentuckynewspapers.org/kdnp/themes/kdnp/copyright_icon.png'/>&nbsp;<a href='$json_metadata[rights_display]' target='_blank'>$json_metadata[collection_display]</a></p><p>Copyright is retained by the publisher.</p>";  
}  
else  
{  
echo '<p><a href="https://creativecommons.org/licenses/by/4.0/" target="_blank"><img src="https://kentuckynewspapers.org/kdnp/themes/kdnp/creative_commons.png"/></a></p>';  
}

$copyright_chunk = ob_get_contents();
ob_end_flush();

//separate write routine that can be used to output within a pairtree directory structure
preg_match_all('/..?/', $ark, $matches);

$path = "$pairtree/" . implode('/', $matches[0]) . '/' . $ark;

mkdir( $path, 0775, true );

$write="$path/$ark.html";
$write3="$path/$ark-z.html";

//generate html file putting json values in as needed
$html = <<<HTML

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cleartype" content="on">
    <meta name="pubdate" content="$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_display]">
    <title>$json_metadata[doctitle_display]</title>
    <link href="../assets/favicon-879049c7a48d25b42ff7d479707c6e0c.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="../assets/application-472faa6697e2880187514fd6aafbd575.css" media="all" rel="stylesheet" />
    <link href="../assets/over_rides.css" media="all" rel="stylesheet" />
    <link href="/kdnp/themes/kdnp/css/lity.css" rel="stylesheet">
    <link href="https://kentuckynewspapers.org/kdnp/themes/kdnp/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/rangeSlider.css">
    <link rel="stylesheet" media="screen and (min-width: 380px) and (max-width: 1000px)" href="../assets/small.css" />
    <link rel="stylesheet" media="screen and (min-width: 1001px) and (max-width: 1700px)" href="../assets/medium.css" />
    <link rel="stylesheet" media="screen and (min-width: 1701px)" href="../assets/big.css" />
    <script src="/kdnp/themes/kdnp/javascripts/vendor/jquery.js"></script>
    <script src="/kdnp/themes/kdnp/javascripts/lity.js"></script>
    <!--<PageMap>
      <DataObject type="document">
      	<Attribute name="title">$json_metadata[doctitle_display]</Attribute>
      	<Attribute name="author">$json_metadata[publisher_display]</Attribute>
      	<Attribute name="description">$json_metadata[county_display] County, Kentucky ($json_metadata[region_display] Region)</Attribute>
      	<Attribute name="page_count">$json_metadata[pages_i]</Attribute>
      	<Attribute name="issue_date" value="$json_metadata[year_display]-$json_metadata[month_display]-$json_metadata[day_display]"/>
      </DataObject>
      <DataObject type="thumbnail">
      	<Attribute name="src" value="$json_metadata[thumbnailurl_t]" />
      	<Attribute name="width" value="100" />
      	<Attribute name="height" value="152" />
      </DataObject>
      </PageMap>-->
    <link href="https://kentuckynewspapers.org/catalog/$json_metadata[id].dc_xml" rel="alternate" title="dc_xml" type="text/xml" />
    <link href="https://kentuckynewspapers.org/catalog/$json_metadata[id].oai_dc_xml" rel="alternate" title="oai_dc_xml" type="text/xml" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Open Graph tags for social media -->
    <meta property="og:image" content="$json_metadata[thumbnailurl_t]" />
    <meta property="og:image:width" content="100" />
    <meta property="og:image:height" content="152" />
    <meta property="og:image:type" content="image/gif" />
    <meta property="og:image:secure_url" content="$json_metadata[thumbnailurl_t]" />
    <meta property="og:description" content="$json_metadata[pages_i] pages, $json_metadata[county_display] County, Kentucky ($json_metadata[region_display] Region)" />
    <meta property="og:title" content="$json_metadata[doctitle_display] - Kentucky Digital Newspaper Program" />

  </head>
  <body class="blacklight-catalog blacklight-catalog-show">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <section id="raw">
      <article>
      <details>
        <summary>view raw text</summary>
        <p><pre>$json_metadata[text]</pre></p>
      </details>
    </section>
    <div id="header-navbar" class="navbar navbar-inverse navbar-static-top" role="navigation" style="position:fixed;left:0;right:0;top:0;">
      <div class="container">
        <div>
          <div class="collapse navbar-collapse" id="user-util-collapse">
            <div>
              <div>
                <div>
                  <div>
                    <table style="width:100%;">
                      <tr><td style="width:50px;"><a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="site-title"><img src="/kdnp/themes/kdnp/newsboy_header.png" /></a></td>
                        <td>
                          <table style="width:100%;">
                            <tr>
                              <td>
                                <div id="name-and-slogan">
                                  <div id="site-name">
                                    <strong>
                                    <a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="site-title"><span>KENTUCKY DIGITAL NEWSPAPER PROGRAM</span></a>
                                    </strong>
                                  </div>
                              </td>
                            </tr>
                            <tr>
                            <td>
                            <div id="site-slogan">UNIVERSITY OF KENTUCKY LIBRARIES SPECIAL COLLECTIONS RESEARCH CENTER</div>
                            </div>
                            <!-- /#name-and-slogan -->
                            </td>
                            </tr>
                          </table>
                        </td>
                        <td style="float:right;">
                          <div style="width:30px;float:right;">
                            <div style="display:none"></div>
                            <div class="input-group"> 
                              <table><tr><td><a style="color:#B0B0B0" href="https://kentuckynewspapers.org/kdnp/">start over</a>&nbsp;</td><td><a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="home_search" style="float:right"><img src="/papervault/assets/searchy_icon.png"/></a></td></tr></table>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- links -->
    <div id="search-navbar" class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container" style="padding-top:10px">
        <div>
          <div>
            <div>
              <div>
                <table style="width:100%;">
                  <tr>
                    <td></td>
                    <td></td>
                    <td style="float:right;"></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<!--<a href="#" class="back-to-top" style="display: inline;">
 
<i class="fa fa-arrow-circle-up"></i>
 
</a>-->

    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal menu" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content"></div>
      </div>
    </div>
    <div id="main-container" class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-flashes">
            <div class="flash_messages"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="content" class="col-md-9 col-sm-8 show-document">
          <div id="document" class="document">
            <div>
              <h1>$json_metadata[doctitle_display]</h1>
              <dl class="dl-horizontal  dl-invert"></dl>
              <div>
                <h5>$json_metadata[pages_i] pages, edition $json_metadata[edition_display]</h5>
                <div class="panel panel-default show-tools">
                  <div class="panel-heading">
                    <!--<img src="https://kdnp.uky.edu/Internet_Archive_logo_item.png" alt="internet archive logo"/>--><!--<span style="font-size:14px;cursor:pointer" onclick="openNav()">&#9776; full screen mode</span>--><span id="full" style="float:left"></span><span id="results" style="float:right"></span><!--<a href="https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up/search" target="_blank">Zoom (Full Screen)</a>-->
                  </div>
<div id="iframe"></div>
<div id="myNav" class="overlay">
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
  <div class="overlay-content" style="height:550px;">


<div id="iframefull" style="height:500px;"></div>
  </div>
</div>



<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
</script>

<script>
  var divElement = document.getElementById("iframe");
    
  function toggleFullScreen() {
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (divElement.mozRequestFullScreen) {
        videoElement.mozRequestFullScreen();
      } else {
        divElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }
    }
  }
  
  document.addEventListener("keydown", function(e) {
    if (e.keyCode == 13) {
      toggleFullScreen();
    }
  }, false);
</script>


<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("iframe").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]?ui=embed#mode/1up/page/n0" + "/search/" + search + "' width='100%' height='1000px' frameborder='0' name='viewer'></iframe>";
</script>
<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("results").innerHTML = "<a href='https://kentuckynewspapers.org/kdnp/solr-search?q=" + search + "'>&lArr; return to results</a>";
</script>
<!--<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("iframefull").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]#page/n0/mode/2up" + "/search/" + search + "' style='width: 100%; border: none' frameborder='0' name='viewer' scrolling='no' id='full'></iframe><ul id='nav'><li><a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]?" + search + "' target='_parent' style='font-size:200%'>&CircleTimes;</a></li></ul>";
</script>-->
<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("full").innerHTML = "<a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?" + search + "'>&#9776; full screen mode</a>";
</script>
<br/>
                    &nbsp;Persistent Link: <a href="https://kentuckynewspapers.org/catalog/$json_metadata[id]" target="_blank">https://kentuckynewspapers.org/catalog/$json_metadata[id]</a><br>&nbsp;Local Identifier: $json_metadata[control_display] : $json_metadata[record_num]<br>&nbsp;JSON Metadata: <a href="https://kentuckynewspapers.org/papervault/$json_metadata[abbreviation_display]/$json_metadata[id].json" target="_blank">https://kentuckynewspapers.org/papervault/$json_metadata[abbreviation_display]/$json_metadata[id].json</a>
                 
                </div>
              </div>
              <div>
                <div class="panel panel-default show-tools">
                  <div class="panel-heading">Location</div>
                  <h5>&nbsp;&nbsp;Published in $json_metadata[pubplace_display], Kentucky by $json_metadata[publisher_display]</h5>
                  <h5>&nbsp;&nbsp;&nbsp;$json_metadata[county_display] County (The $json_metadata[region_display] Region)</h5>
                  <br/><img style="display: block; margin-left: auto; margin-right: auto" src="https://kentuckynewspapers.org/images/kdnp/maps/$json_metadata[county_display].png" height="100%" width="100%"/>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div id="sidebar" class="col-md-3 col-sm-4">
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Browse</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/calendar_icon.gif"/><a href="/papervault/calendar/$json_metadata[abbreviation_display]/years/$json_metadata[year_display].html" data-lity>calendar view</a>
              </p>
              <p></p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">Thumbnails</div>
            <div class="panel-body">
              <p>
  <a onclick="plusDivs(-1)" style="float:left;">&#10094; prev</a>&nbsp;
  <a onclick="plusDivs(1)" style="float:right;">next &#10095;</a>

                $thumbs

  <a onclick="plusDivs(-1)" style="float:left;">&#10094; prev</a>&nbsp;
  <a onclick="plusDivs(1)" style="float:right;">next &#10095;</a>
              </p>
              <p></p>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("kdnpThumbs");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>
            </div>
          </div>


          <div class="panel panel-default show-tools">
            <div class="panel-heading">Download Page</div>
            <div class="panel-body">
              <p>
<div>
<script>
function process()
{
var url="https://www.archive.org/download/$json_metadata[id]/page/n" + document.getElementById("page").value + '_w' + document.getElementById("url").value;
window.open(url, '_blank');
return false;
}
</script>
<form onsubmit="return process();" target="_blank">
Desired Width (pixels):<br/>
    <input type="range" value="100"  min="100" max="1500"  name="url" id="url" data-rangeSlider>
    <output style="color:grey"></output>
<br/>Desired Image: <!--<span style="color:grey">0 - $json_metadata[pages_i]</span>--><br/>
    <select type="number" min="0" max="$json_metadata[pages_i]" name="page" id="page">
$select</select>&nbsp;&nbsp;
 <span style="float:right"><input type="submit" value="get image"></span>&nbsp;<!--<input type="reset" value="clear">-->
</form>
</div>

<script src="../assets/rangeSlider.js"></script>
<script>
    (function () {

        var selector = '[data-rangeSlider]',
                elements = document.querySelectorAll(selector);

        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value,
                    output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }

        for (var i = elements.length - 1; i >= 0; i--) {
            valueOutput(elements[i]);
        }

        Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
            el.addEventListener('input', function (e) {
                valueOutput(e.target);
            }, false);
        });


        // Example functionality to demonstrate disabled functionality
        var toggleBtnDisable = document.querySelector('#js-example-disabled button[data-behaviour="toggle"]');
        toggleBtnDisable.addEventListener('click', function (e) {
            var inputRange = toggleBtnDisable.parentNode.querySelector('input[type="range"]');
            console.log(inputRange);
            if (inputRange.disabled) {
                inputRange.disabled = false;
            }
            else {
                inputRange.disabled = true;
            }
            inputRange.rangeSlider.update();
        }, false);

        // Example functionality to demonstrate programmatic value changes
        var changeValBtn = document.querySelector('#js-example-change-value button');
        changeValBtn.addEventListener('click', function (e) {
            var inputRange = changeValBtn.parentNode.querySelector('input[type="range"]'),
                    value = changeValBtn.parentNode.querySelector('input[type="number"]').value;

            inputRange.value = value;
            inputRange.dispatchEvent(new Event('change'));
        }, false);

        // Example functionality to demonstrate programmatic buffer set
        var stBufferBtn = document.querySelector('#js-example-buffer-set button');
        stBufferBtn.addEventListener('click', function (e) {
            var inputRange = stBufferBtn.parentNode.querySelector('input[type="range"]'),
                    value = stBufferBtn.parentNode.querySelector('input[type="number"]').value;

            inputRange.rangeSlider.update({buffer: value});
        }, false);

        // Example functionality to demonstrate destroy functionality
        var destroyBtn = document.querySelector('#js-example-destroy button[data-behaviour="destroy"]');
        destroyBtn.addEventListener('click', function (e) {
            var inputRange = destroyBtn.parentNode.querySelector('input[type="range"]');
            console.log(inputRange);
            inputRange.rangeSlider.destroy();
        }, false);

        var initBtn = document.querySelector('#js-example-destroy button[data-behaviour="initialize"]');

        initBtn.addEventListener('click', function (e) {
            var inputRange = initBtn.parentNode.querySelector('input[type="range"]');
            rangeSlider.create(inputRange, {});
        }, false);

        //update range
        var updateBtn1 = document.querySelector('#js-example-update-range button');
        updateBtn1.addEventListener('click', function (e) {
            var inputRange = updateBtn1.parentNode.querySelector('input[type="range"]');
            inputRange.rangeSlider.update({min: 0, max: 20, step: 0.5, value: 1.5, buffer: 70});
        }, false);


        var toggleBtn = document.querySelector('#js-example-hidden button[data-behaviour="toggle"]');
        toggleBtn.addEventListener('click', function (e) {
            var container = e.target.previousElementSibling;
            if (container.style.cssText.match(/display[\s:]{1,3}none/)) {
                container.style.cssText = '';
            } else {
                container.style.cssText = 'display: none;';
            }
        }, false);

        // Basic rangeSlider initialization
        rangeSlider.create(elements, {

            // Callback function
            onInit: function () {
            },

            // Callback function
            onSlideStart: function (value, percent, position) {
                console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlide: function (value, percent, position) {
                console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlideEnd: function (value, percent, position) {
                console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            }
        });

    })();
</script>
              </p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">Download Issue PDF</div>
            <div class="panel-body">
              <p>
                <img src="../assets/download.png"/>Issue: <a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id]_text.pdf" target="_blank">lo-res</a> | <a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id].pdf" target="_blank">hi-res</a>

              </p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">More Options</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/Internet_Archive_logo_item.png"/><a href="https://archive.org/download/$json_metadata[id]/" target="_blank">access source files</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/kindle_logo.png"/><a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id].mobi" target="_blank">kindle version</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/library-of-congress-logo_item.png"/><a href="http://chroniclingamerica.loc.gov/lccn/$json_metadata[lccn_display]/" target="_blank">more about this title</a>
              </p>
              <p>
<div class="fb-share-button" data-href="https://kentuckynewspapers.org/catalog/$json_metadata[id]" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Use Information</div>
            <div class="panel-body">
              <p>
              
                $copyright_chunk
              
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Research Tools</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history.jpg"/><a href="https://www.history.com/this-day-in-history/$json_metadata[month_display]/$json_metadata[day_i]" target="_blank">day in history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_orb.png"/><a href="https://www.historyorb.com/events/date/$json_metadata[year_display]" target="_blank">this year in history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_wiki.png"/><a href="https://en.wikipedia.org/wiki/$json_metadata[county_display]_County,_Kentucky" target="_blank">county history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_wiki.png"/><a href="https://en.wikipedia.org/wiki/$json_metadata[pubplace_display],_Kentucky" target="_blank">city history</a>
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Views</div>
            <div class="panel-body">$downloads</div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Archives</div>
            <div class="panel-body">
              <p><a href="https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up/v2" target="_blank">Internet Archive</a><br/>$publicdate</p>
              <p><a href="http://chroniclingamerica.loc.gov/lccn/$json_metadata[lccn_display]/$json_metadata[year_display]-$json_metadata[month_display]-$json_metadata[day_i]/ed-$json_metadata[edition_display]/seq-1/" target="_blank">Library of Congress</a><br/>National Digital Newspaper Program</p>
              <p><a href="https://newspapers.com" target="_blank">Newspapers.com</a><br/>No subscription required.</p>
              <p>University of Kentucky</p>
            </div>
          </div>
          <p><a href="https://papervaultnews.wordpress.com/" target="_blank"><img src="https://kentuckynewspapers.org/images/kdnp/pv_logo_powered.png"/></a></p>
        </div>
      </div>
    </div>
    <p>
    </p>
    <p></p>
    <br>
    <!-- Google Analytics -->
    <!-- End Google Analytics Code -->

<!-- Omeka defined -->

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();
    });
</script>

<!-- End Omeka defined -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<footer class="footer-distributed">

			<div class="footer-left">

				<p><span><img src="https://kentuckynewspapers.org/kdnp/themes/kdnp/UKlogo-white_sm.png" alt="UK Logo"/></span></p>

				<!--<p class="footer-links">
					<a href="#">Home</a>
					???
					<a href="#">Project Site</a>
					???
					<a href="#">About</a>
				</p>-->

				<p class="footer-company-name">Kentucky Digital Newspaper Program &copy; 2016<br/>Utilizing <a href="http://omeka.org/" target="_blank">Omeka</a>, <a href="https://lucene.apache.org/solr/" target="_blank">Solr</a>, and the <a href="https://archive.org" target=_blank">Internet Archive</a>.</p>


				<div class="footer-icons">



					<a href="https://www.facebook.com/KyDNP/" target="_blank"><i class="fa fa-facebook"></i></a><br/>
                                        <div id="fboverlay" class="fb-like" data-href="https://www.facebook.com/KyDNP/" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false" style="float:left;margin-right:10px;margin-top:10px;"></div><br/>
					<!--<a href="#"><i class="fa fa-twitter"></i></a>-->
					<!--<a href="#"><i class="fa fa-github"></i></a>-->

				</div>
			</div>



			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span><a href="https://libraries.uky.edu/lib.php?lib_id=13" target="_blank">Special Collections Research Center</a><br/><a href="https://libraries.uky.edu" target="_blank">University of Kentucky Libraries</a><br/>Margaret I. King Library Building<br/>Lexington, KY 40506-0039</span></p>
				</div>

				<!--<div>
					<i class="fa fa-phone"></i>
					<p>+1 859 257-1742</p>
				</div>-->

				<!--<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:SCLREF@LSV.UKY.EDU">SCLREF@LSV.UKY.EDU</a></p>
				</div>-->

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span><a href="https://kentuckynewspapers.org/program" target="_blank"><img src="https://kentuckynewspapers.org/kdnp/themes/kdnp/newsboy_footer.png" alt="KDNP Logo"/></a></span>
					<a href="https://kentuckynewspapers.org/program" target="_blank">visit our website to learn more about our program</a>
				</p>


			</div>

		</footer>

	</body>

</html>


HTML;

//generate html file for full screen view page putting json values in as needed
$zoom = <<<HTML

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8"/>
<title>KDNP Full Screen Mode $json_metadata[id]</title>
<link rel="stylesheet" href="https://kentuckynewspapers.org/assets/zoom.css" type="text/css" />
</head>
<body style="background-color: rgb(247,247,247);">

<div id="iframefull"></div>
<div id="over">&nbsp;<a href="https://kentuckynewspapers.org/catalog/$json_metadata[id]"><img src="trans.png" alt="header"/></a></div>

<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?", "");
document.getElementById("iframefull").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up" + "/search/" + search + "' frameborder='0' name='viewer' scrolling='no' id='full'></iframe>";
</script>

<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?", "");
document.getElementById("over").innerHTML = "<a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]?" + search + "'><img src='https://kentuckynewspapers.org/assets/trans.png'/></a>";
</script>

</body>
</html>

HTML;

//populate calendar for issue
//$path_to_file = 'public_html/papervault/calendar/$json_metadata[abbreviation_display]/years/$json_metadata[year_display].html';
//$file_contents = file_get_contents($path_to_file);
//$file_contents = str_replace('<td id="aaa$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_i]"><a //href="catalog/aaa$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_i]?" class="noissue">','<td //id="$json_metadata[control_display]"><a href="catalog/$json_metadata[id]?" class="issue">',$file_contents);
//file_put_contents($path_to_file,$file_contents);

//generate csv file putting json values in as needed for omek_element_texts table
$txt = <<<EOF
"","$json_metadata[record_num]","Item","50","0","$json_metadata[doctitle_display]"
"","$json_metadata[record_num]","Item","43","0","$json_metadata[id]"
"","$json_metadata[record_num]","Item","67","0","/papervault/$json_metadata[abbreviation_display]/$json_metadata[id]"
"","$json_metadata[record_num]","Item","62","0","$json_metadata[region_display]"
"","$json_metadata[record_num]","Item","63","0","$json_metadata[county_display]"
"","$json_metadata[record_num]","Item","75","0","$json_metadata[decade_display]"
"","$json_metadata[record_num]","Item","76","0","$json_metadata[year_display]"
"","$json_metadata[record_num]","Item","77","0","$json_metadata[month_display]"
"","$json_metadata[record_num]","Item","78","0","$json_metadata[day_display]"
"","$json_metadata[record_num]","Item","48","0","$json_metadata[abbreviation_display]"
"","$json_metadata[record_num]","Item","40","0","$json_metadata[issuedate_display]"
"","$json_metadata[record_num]","Item","80","0","$json_metadata[collection_display]"
"","$json_metadata[record_num]","Item","61","0","$json_metadata[control_display]"
"","$json_metadata[record_num]","Item","65","0","$nolinetxt"

EOF;

//generate csv file putting json values in as needed for omeka_items table
$itm = <<<EOF
"$json_metadata[record_num]","18",NULL,"0","1","","","1"

EOF;


//write html output back to the html file
file_put_contents($write, $html, LOCK_EX);

//write csv1 output back to a csv file
file_put_contents($write1, $txt, LOCK_EX);

//write csv2 output back to a csv file
file_put_contents($write2, $itm, LOCK_EX);

//write zoom output back to a html file
file_put_contents($write3, $zoom, LOCK_EX);

echo "newspaper issue $tla $ark processed successfully!\n";

//update calendar via calendar builder
exec("php /home/libmanuk/public_html/cgi-bin/calbuilder.php $json_metadata[abbreviation_display] $json_metadata[id] $json_metadata[year_display] $json_metadata[month_display] $json_metadata[day_display] $json_metadata[control_display] \"$json_metadata[collection_display]\"");

} else {

//echo "invalid input! $tla $ark could not be processed.\n";

// Specify error log file
//$logfile = "$catalog/generator/error_log/$tla$json_metadata[control_display]$ark.txt";

// Create error message
$error = "invalid input! issue could not be processed.";

// Write error message file
//file_put_contents($error, $logfile, LOCK_EX);

die;

}

?>



//compute value for page download hint
$downloadmax = $json_metadata[pages_i];
$subtractnum = 1;
$sum_total = $downloadmax - $subtractnum;

$FirstArray = range(0,$sum_total);
$SecondArray = range(1,$json_metadata['pages_i']);

ob_start(); 

for ($index = 0 ; $index < count($FirstArray); $index ++) {
  echo "<option value='";
  echo $FirstArray[$index];
  echo "'>";
  echo $SecondArray[$index];
  echo "</option>";
  echo "<br/>";
}

$select = ob_get_contents();
ob_end_flush();

ob_start(); 

for ($index = 0 ; $index < count($FirstArray); $index ++) {
  echo "<span class='kdnpThumbs' style='margin-left:auto;margin-right:auto;'><br/>image ";
  echo $SecondArray[$index];
  echo " of $json_metadata[pages_i]<br/><br/>"; 
  echo "<a href='https://archive.org/stream/$json_metadata[id]?ui=embed#mode/1up/page/n";
  echo $FirstArray[$index];
  echo "' target='viewer'><img src='https://archive.org/download/$json_metadata[id]/$json_metadata[id]/page/n";
  echo $FirstArray[$index];
  echo "_small.jpg' style='width:100%;height:307px'/></a><br/><br/></span>";
}

$thumbs = ob_get_contents();
ob_end_flush();

//figure out copyright status and build copyright tool content

ob_start(); 
$year=$json_metadata[year_display];

if ($year>1922)  
{   
echo "<p><img src='https://kentuckynewspapers.org/kdnp/themes/berlin/copyright_icon.png'/>&nbsp;<a href='$json_metadata[rights_display]' target='_blank'>$json_metadata[collection_display]</a></p><p>Copyright is retained by the publisher.</p>";  
}  
else  
{  
echo '<p><a href="https://creativecommons.org/licenses/by/4.0/" target="_blank"><img src="https://kentuckynewspapers.org/kdnp/themes/berlin/creative_commons.png"/></a></p>';  
}

$copyright_chunk = ob_get_contents();
ob_end_flush();

//separate write routine that can be used to output within a pairtree directory structure
preg_match_all('/..?/', $ark, $matches);

$path = "$pairtree/" . implode('/', $matches[0]) . '/' . $ark;

mkdir( $path, 0775, true );

$write="$path/$ark.html";
$write3="$path/$ark-z.html";

//generate html file putting json values in as needed
$html = <<<HTML

<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="cleartype" content="on">
    <meta name="pubdate" content="$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_display]">
    <title>$json_metadata[doctitle_display]</title>
    <link href="../assets/favicon-879049c7a48d25b42ff7d479707c6e0c.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="../assets/application-472faa6697e2880187514fd6aafbd575.css" media="all" rel="stylesheet" />
    <link href="../assets/over_rides.css" media="all" rel="stylesheet" />
    <link href="/kdnp/themes/berlin/css/lity.css" rel="stylesheet">
    <link href="https://kentuckynewspapers.org/kdnp/themes/berlin/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/rangeSlider.css">
    <link rel="stylesheet" media="screen and (min-width: 380px) and (max-width: 1000px)" href="../assets/small.css" />
    <link rel="stylesheet" media="screen and (min-width: 1001px) and (max-width: 1700px)" href="../assets/medium.css" />
    <link rel="stylesheet" media="screen and (min-width: 1701px)" href="../assets/big.css" />
    <script src="/kdnp/themes/berlin/javascripts/vendor/jquery.js"></script>
    <script src="/kdnp/themes/berlin/javascripts/lity.js"></script>
    <!--<PageMap>
      <DataObject type="document">
      	<Attribute name="title">$json_metadata[doctitle_display]</Attribute>
      	<Attribute name="author">$json_metadata[publisher_display]</Attribute>
      	<Attribute name="description">$json_metadata[county_display] County, Kentucky ($json_metadata[region_display] Region)</Attribute>
      	<Attribute name="page_count">$json_metadata[pages_i]</Attribute>
      	<Attribute name="issue_date" value="$json_metadata[year_display]-$json_metadata[month_display]-$json_metadata[day_display]"/>
      </DataObject>
      <DataObject type="thumbnail">
      	<Attribute name="src" value="$json_metadata[thumbnailurl_t]" />
      	<Attribute name="width" value="100" />
      	<Attribute name="height" value="152" />
      </DataObject>
      </PageMap>-->
    <link href="https://kentuckynewspapers.org/catalog/$json_metadata[id].dc_xml" rel="alternate" title="dc_xml" type="text/xml" />
    <link href="https://kentuckynewspapers.org/catalog/$json_metadata[id].oai_dc_xml" rel="alternate" title="oai_dc_xml" type="text/xml" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Open Graph tags for social media -->
    <meta property="og:image" content="$json_metadata[thumbnailurl_t]" />
    <meta property="og:image:width" content="100" />
    <meta property="og:image:height" content="152" />
    <meta property="og:image:type" content="image/gif" />
    <meta property="og:image:secure_url" content="$json_metadata[thumbnailurl_t]" />
    <meta property="og:description" content="$json_metadata[pages_i] pages, $json_metadata[county_display] County, Kentucky ($json_metadata[region_display] Region)" />
    <meta property="og:title" content="$json_metadata[doctitle_display] - Kentucky Digital Newspaper Program" />

  </head>
  <body class="blacklight-catalog blacklight-catalog-show">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <section id="raw">
      <article>
      <details>
        <summary>view raw text</summary>
        <p><pre>$json_metadata[text]</pre></p>
      </details>
    </section>
    <div id="header-navbar" class="navbar navbar-inverse navbar-static-top" role="navigation" style="position:fixed;left:0;right:0;top:0;">
      <div class="container">
        <div>
          <div class="collapse navbar-collapse" id="user-util-collapse">
            <div>
              <div>
                <div>
                  <div>
                    <table style="width:100%;">
                      <tr><td style="width:50px;"><a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="site-title"><img src="/kdnp/themes/berlin/newsboy_header.png" /></a></td>
                        <td>
                          <table style="width:100%;">
                            <tr>
                              <td>
                                <div id="name-and-slogan">
                                  <div id="site-name">
                                    <strong>
                                    <a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="site-title"><span>KENTUCKY DIGITAL NEWSPAPER PROGRAM</span></a>
                                    </strong>
                                  </div>
                              </td>
                            </tr>
                            <tr>
                            <td>
                            <div id="site-slogan">UNIVERSITY OF KENTUCKY LIBRARIES SPECIAL COLLECTIONS RESEARCH CENTER</div>
                            </div>
                            <!-- /#name-and-slogan -->
                            </td>
                            </tr>
                          </table>
                        </td>
                        <td style="float:right;">
                          <div style="width:30px;float:right;">
                            <div style="display:none"></div>
                            <div class="input-group"> 
                              <table><tr><td><a style="color:#B0B0B0" href="https://kentuckynewspapers.org/kdnp/">start over</a>&nbsp;</td><td><a href="https://kentuckynewspapers.org/kdnp/" title="Home" rel="home" id="home_search" style="float:right"><img src="/papervault/assets/searchy_icon.png"/></a></td></tr></table>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- links -->
    <div id="search-navbar" class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container" style="padding-top:10px">
        <div>
          <div>
            <div>
              <div>
                <table style="width:100%;">
                  <tr>
                    <td></td>
                    <td></td>
                    <td style="float:right;"></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<!--<a href="#" class="back-to-top" style="display: inline;">
 
<i class="fa fa-arrow-circle-up"></i>
 
</a>-->

    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal menu" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content"></div>
      </div>
    </div>
    <div id="main-container" class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-flashes">
            <div class="flash_messages"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div id="content" class="col-md-9 col-sm-8 show-document">
          <div id="document" class="document">
            <div>
              <h1>$json_metadata[doctitle_display]</h1>
              <dl class="dl-horizontal  dl-invert"></dl>
              <div>
                <h5>$json_metadata[pages_i] pages, edition $json_metadata[edition_display]</h5>
                <div class="panel panel-default show-tools">
                  <div class="panel-heading">
                    <!--<img src="https://kdnp.uky.edu/Internet_Archive_logo_item.png" alt="internet archive logo"/>--><!--<span style="font-size:14px;cursor:pointer" onclick="openNav()">&#9776; full screen mode</span>--><span id="full" style="float:left"></span><span id="results" style="float:right"></span><!--<a href="https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up/search" target="_blank">Zoom (Full Screen)</a>-->
                  </div>
<div id="iframe"></div>
<div id="myNav" class="overlay">
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
  <div class="overlay-content" style="height:550px;">


<div id="iframefull" style="height:500px;"></div>
  </div>
</div>



<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
</script>

<script>
  var divElement = document.getElementById("iframe");
    
  function toggleFullScreen() {
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (divElement.mozRequestFullScreen) {
        videoElement.mozRequestFullScreen();
      } else {
        divElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }
    }
  }
  
  document.addEventListener("keydown", function(e) {
    if (e.keyCode == 13) {
      toggleFullScreen();
    }
  }, false);
</script>


<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("iframe").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]?ui=embed#mode/1up/page/n0" + "/search/" + search + "' width='100%' height='1000px' frameborder='0' name='viewer'></iframe>";
</script>
<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("results").innerHTML = "<a href='https://kentuckynewspapers.org/kdnp/solr-search?q=" + search + "'>&lArr; return to results</a>";
</script>
<!--<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("iframefull").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]#page/n0/mode/2up" + "/search/" + search + "' style='width: 100%; border: none' frameborder='0' name='viewer' scrolling='no' id='full'></iframe><ul id='nav'><li><a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]?" + search + "' target='_parent' style='font-size:200%'>&CircleTimes;</a></li></ul>";
</script>-->
<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]?", "");
document.getElementById("full").innerHTML = "<a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?" + search + "'>&#9776; full screen mode</a>";
</script>
<br/>
                    &nbsp;Persistent Link: <a href="https://kentuckynewspapers.org/catalog/$json_metadata[id]" target="_blank">https://kentuckynewspapers.org/catalog/$json_metadata[id]</a><br>&nbsp;Local Identifier: $json_metadata[control_display] : $json_metadata[record_num]<br>&nbsp;JSON Metadata: <a href="https://kentuckynewspapers.org/papervault/$json_metadata[abbreviation_display]/$json_metadata[id].json" target="_blank">https://kentuckynewspapers.org/papervault/$json_metadata[abbreviation_display]/$json_metadata[id].json</a>
                 
                </div>
              </div>
              <div>
                <div class="panel panel-default show-tools">
                  <div class="panel-heading">Location</div>
                  <h5>&nbsp;&nbsp;Published in $json_metadata[pubplace_display], Kentucky by $json_metadata[publisher_display]</h5>
                  <h5>&nbsp;&nbsp;&nbsp;$json_metadata[county_display] County (The $json_metadata[region_display] Region)</h5>
                  <br/><img style="display: block; margin-left: auto; margin-right: auto" src="https://kentuckynewspapers.org/images/kdnp/maps/$json_metadata[county_display].png" height="100%" width="100%"/>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div id="sidebar" class="col-md-3 col-sm-4">
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Browse</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/calendar_icon.gif"/><a href="/papervault/calendar/$json_metadata[abbreviation_display]/years/$json_metadata[year_display].html" data-lity>calendar view</a>
              </p>
              <p></p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">Thumbnails</div>
            <div class="panel-body">
              <p>
  <a onclick="plusDivs(-1)" style="float:left;">&#10094; prev</a>&nbsp;
  <a onclick="plusDivs(1)" style="float:right;">next &#10095;</a>

                $thumbs

  <a onclick="plusDivs(-1)" style="float:left;">&#10094; prev</a>&nbsp;
  <a onclick="plusDivs(1)" style="float:right;">next &#10095;</a>
              </p>
              <p></p>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("kdnpThumbs");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>
            </div>
          </div>


          <div class="panel panel-default show-tools">
            <div class="panel-heading">Download Page</div>
            <div class="panel-body">
              <p>
<div>
<script>
function process()
{
var url="https://www.archive.org/download/$json_metadata[id]/page/n" + document.getElementById("page").value + '_w' + document.getElementById("url").value;
window.open(url, '_blank');
return false;
}
</script>
<form onsubmit="return process();" target="_blank">
Desired Width (pixels):<br/>
    <input type="range" value="100"  min="100" max="1500"  name="url" id="url" data-rangeSlider>
    <output style="color:grey"></output>
<br/>Desired Image: <!--<span style="color:grey">0 - $json_metadata[pages_i]</span>--><br/>
    <select type="number" min="0" max="$json_metadata[pages_i]" name="page" id="page">
$select</select>&nbsp;&nbsp;
 <span style="float:right"><input type="submit" value="get image"></span>&nbsp;<!--<input type="reset" value="clear">-->
</form>
</div>

<script src="../assets/rangeSlider.js"></script>
<script>
    (function () {

        var selector = '[data-rangeSlider]',
                elements = document.querySelectorAll(selector);

        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value,
                    output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }

        for (var i = elements.length - 1; i >= 0; i--) {
            valueOutput(elements[i]);
        }

        Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
            el.addEventListener('input', function (e) {
                valueOutput(e.target);
            }, false);
        });


        // Example functionality to demonstrate disabled functionality
        var toggleBtnDisable = document.querySelector('#js-example-disabled button[data-behaviour="toggle"]');
        toggleBtnDisable.addEventListener('click', function (e) {
            var inputRange = toggleBtnDisable.parentNode.querySelector('input[type="range"]');
            console.log(inputRange);
            if (inputRange.disabled) {
                inputRange.disabled = false;
            }
            else {
                inputRange.disabled = true;
            }
            inputRange.rangeSlider.update();
        }, false);

        // Example functionality to demonstrate programmatic value changes
        var changeValBtn = document.querySelector('#js-example-change-value button');
        changeValBtn.addEventListener('click', function (e) {
            var inputRange = changeValBtn.parentNode.querySelector('input[type="range"]'),
                    value = changeValBtn.parentNode.querySelector('input[type="number"]').value;

            inputRange.value = value;
            inputRange.dispatchEvent(new Event('change'));
        }, false);

        // Example functionality to demonstrate programmatic buffer set
        var stBufferBtn = document.querySelector('#js-example-buffer-set button');
        stBufferBtn.addEventListener('click', function (e) {
            var inputRange = stBufferBtn.parentNode.querySelector('input[type="range"]'),
                    value = stBufferBtn.parentNode.querySelector('input[type="number"]').value;

            inputRange.rangeSlider.update({buffer: value});
        }, false);

        // Example functionality to demonstrate destroy functionality
        var destroyBtn = document.querySelector('#js-example-destroy button[data-behaviour="destroy"]');
        destroyBtn.addEventListener('click', function (e) {
            var inputRange = destroyBtn.parentNode.querySelector('input[type="range"]');
            console.log(inputRange);
            inputRange.rangeSlider.destroy();
        }, false);

        var initBtn = document.querySelector('#js-example-destroy button[data-behaviour="initialize"]');

        initBtn.addEventListener('click', function (e) {
            var inputRange = initBtn.parentNode.querySelector('input[type="range"]');
            rangeSlider.create(inputRange, {});
        }, false);

        //update range
        var updateBtn1 = document.querySelector('#js-example-update-range button');
        updateBtn1.addEventListener('click', function (e) {
            var inputRange = updateBtn1.parentNode.querySelector('input[type="range"]');
            inputRange.rangeSlider.update({min: 0, max: 20, step: 0.5, value: 1.5, buffer: 70});
        }, false);


        var toggleBtn = document.querySelector('#js-example-hidden button[data-behaviour="toggle"]');
        toggleBtn.addEventListener('click', function (e) {
            var container = e.target.previousElementSibling;
            if (container.style.cssText.match(/display[\s:]{1,3}none/)) {
                container.style.cssText = '';
            } else {
                container.style.cssText = 'display: none;';
            }
        }, false);

        // Basic rangeSlider initialization
        rangeSlider.create(elements, {

            // Callback function
            onInit: function () {
            },

            // Callback function
            onSlideStart: function (value, percent, position) {
                console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlide: function (value, percent, position) {
                console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlideEnd: function (value, percent, position) {
                console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            }
        });

    })();
</script>
              </p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">Download Issue PDF</div>
            <div class="panel-body">
              <p>
                <img src="../assets/download.png"/>Issue: <a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id]_text.pdf" target="_blank">lo-res</a> | <a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id].pdf" target="_blank">hi-res</a>

              </p>
            </div>
          </div>

          <div class="panel panel-default show-tools">
            <div class="panel-heading">More Options</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/Internet_Archive_logo_item.png"/><a href="https://archive.org/download/$json_metadata[id]/" target="_blank">access source files</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/kindle_logo.png"/><a href="https://archive.org/download/$json_metadata[id]/$json_metadata[id].mobi" target="_blank">kindle version</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/library-of-congress-logo_item.png"/><a href="http://chroniclingamerica.loc.gov/lccn/$json_metadata[lccn_display]/" target="_blank">more about this title</a>
              </p>
              <p>
<div class="fb-share-button" data-href="https://kentuckynewspapers.org/catalog/$json_metadata[id]" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Use Information</div>
            <div class="panel-body">
              <p>
              
                $copyright_chunk
              
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Research Tools</div>
            <div class="panel-body">
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history.jpg"/><a href="https://www.history.com/this-day-in-history/$json_metadata[month_display]/$json_metadata[day_i]" target="_blank">day in history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_orb.png"/><a href="https://www.historyorb.com/events/date/$json_metadata[year_display]" target="_blank">this year in history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_wiki.png"/><a href="https://en.wikipedia.org/wiki/$json_metadata[county_display]_County,_Kentucky" target="_blank">county history</a>
              </p>
              <p>
                <img src="https://kentuckynewspapers.org/images/kdnp/logo-history_wiki.png"/><a href="https://en.wikipedia.org/wiki/$json_metadata[pubplace_display],_Kentucky" target="_blank">city history</a>
              </p>
            </div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Views</div>
            <div class="panel-body">$downloads</div>
          </div>
          <div class="panel panel-default show-tools">
            <div class="panel-heading">Archives</div>
            <div class="panel-body">
              <p><a href="https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up/v2" target="_blank">Internet Archive</a><br/>$publicdate</p>
              <p><a href="http://chroniclingamerica.loc.gov/lccn/$json_metadata[lccn_display]/$json_metadata[year_display]-$json_metadata[month_display]-$json_metadata[day_i]/ed-$json_metadata[edition_display]/seq-1/" target="_blank">Library of Congress</a><br/>National Digital Newspaper Program</p>
              <p><a href="https://newspapers.com" target="_blank">Newspapers.com</a><br/>No subscription required.</p>
              <p>University of Kentucky</p>
            </div>
          </div>
          <p><a href="https://papervaultnews.wordpress.com/" target="_blank"><img src="https://kentuckynewspapers.org/images/kdnp/pv_logo_powered.png"/></a></p>
        </div>
      </div>
    </div>
    <p>
    </p>
    <p></p>
    <br>
    <!-- Google Analytics -->
    <!-- End Google Analytics Code -->

<!-- Omeka defined -->

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();
    });
</script>

<!-- End Omeka defined -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<footer class="footer-distributed">

			<div class="footer-left">

				<p><span><img src="https://kentuckynewspapers.org/kdnp/themes/berlin/UKlogo-white_sm.png" alt="UK Logo"/></span></p>

				<!--<p class="footer-links">
					<a href="#">Home</a>
					???
					<a href="#">Project Site</a>
					???
					<a href="#">About</a>
				</p>-->

				<p class="footer-company-name">Kentucky Digital Newspaper Program &copy; 2016<br/>Utilizing <a href="http://omeka.org/" target="_blank">Omeka</a>, <a href="https://lucene.apache.org/solr/" target="_blank">Solr</a>, and the <a href="https://archive.org" target=_blank">Internet Archive</a>.</p>


				<div class="footer-icons">



					<a href="https://www.facebook.com/KyDNP/" target="_blank"><i class="fa fa-facebook"></i></a><br/>
                                        <div id="fboverlay" class="fb-like" data-href="https://www.facebook.com/KyDNP/" data-layout="box_count" data-action="like" data-size="small" data-show-faces="true" data-share="false" style="float:left;margin-right:10px;margin-top:10px;"></div><br/>
					<!--<a href="#"><i class="fa fa-twitter"></i></a>-->
					<!--<a href="#"><i class="fa fa-github"></i></a>-->

				</div>
			</div>



			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span><a href="https://libraries.uky.edu/lib.php?lib_id=13" target="_blank">Special Collections Research Center</a><br/><a href="https://libraries.uky.edu" target="_blank">University of Kentucky Libraries</a><br/>Margaret I. King Library Building<br/>Lexington, KY 40506-0039</span></p>
				</div>

				<!--<div>
					<i class="fa fa-phone"></i>
					<p>+1 859 257-1742</p>
				</div>-->

				<!--<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:SCLREF@LSV.UKY.EDU">SCLREF@LSV.UKY.EDU</a></p>
				</div>-->

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span><a href="https://kentuckynewspapers.org/program" target="_blank"><img src="https://kentuckynewspapers.org/kdnp/themes/berlin/newsboy_footer.png" alt="KDNP Logo"/></a></span>
					<a href="https://kentuckynewspapers.org/program" target="_blank">visit our website to learn more about our program</a>
				</p>


			</div>

		</footer>

	</body>

</html>


HTML;

//generate html file for full screen view page putting json values in as needed
$zoom = <<<HTML

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8"/>
<title>KDNP Full Screen Mode $json_metadata[id]</title>
<link rel="stylesheet" href="https://kentuckynewspapers.org/assets/zoom.css" type="text/css" />
</head>
<body style="background-color: rgb(247,247,247);">

<div id="iframefull"></div>
<div id="over">&nbsp;<a href="https://kentuckynewspapers.org/catalog/$json_metadata[id]"><img src="trans.png" alt="header"/></a></div>

<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?", "");
document.getElementById("iframefull").innerHTML = "<iframe src='https://archive.org/stream/$json_metadata[id]#page/n0/mode/1up" + "/search/" + search + "' frameborder='0' name='viewer' scrolling='no' id='full'></iframe>";
</script>

<script type="text/javascript">
var current = location.href;
var search = current.replace("https://kentuckynewspapers.org/catalog/$json_metadata[id]-z?", "");
document.getElementById("over").innerHTML = "<a href='https://kentuckynewspapers.org/catalog/$json_metadata[id]?" + search + "'><img src='https://kentuckynewspapers.org/assets/trans.png'/></a>";
</script>

</body>
</html>

HTML;

//populate calendar for issue
//$path_to_file = 'public_html/papervault/calendar/$json_metadata[abbreviation_display]/years/$json_metadata[year_display].html';
//$file_contents = file_get_contents($path_to_file);
//$file_contents = str_replace('<td id="aaa$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_i]"><a //href="catalog/aaa$json_metadata[year_display]$json_metadata[month_display]$json_metadata[day_i]?" class="noissue">','<td //id="$json_metadata[control_display]"><a href="catalog/$json_metadata[id]?" class="issue">',$file_contents);
//file_put_contents($path_to_file,$file_contents);

//generate csv file putting json values in as needed for omek_element_texts table
$txt = <<<EOF
"","$json_metadata[record_num]","Item","50","0","$json_metadata[doctitle_display]"
"","$json_metadata[record_num]","Item","43","0","$json_metadata[id]"
"","$json_metadata[record_num]","Item","67","0","/papervault/$json_metadata[abbreviation_display]/$json_metadata[id]"
"","$json_metadata[record_num]","Item","62","0","$json_metadata[region_display]"
"","$json_metadata[record_num]","Item","63","0","$json_metadata[county_display]"
"","$json_metadata[record_num]","Item","75","0","$json_metadata[decade_display]"
"","$json_metadata[record_num]","Item","76","0","$json_metadata[year_display]"
"","$json_metadata[record_num]","Item","77","0","$json_metadata[month_display]"
"","$json_metadata[record_num]","Item","78","0","$json_metadata[day_display]"
"","$json_metadata[record_num]","Item","48","0","$json_metadata[abbreviation_display]"
"","$json_metadata[record_num]","Item","40","0","$json_metadata[issuedate_display]"
"","$json_metadata[record_num]","Item","80","0","$json_metadata[collection_display]"
"","$json_metadata[record_num]","Item","61","0","$json_metadata[control_display]"
"","$json_metadata[record_num]","Item","65","0","$nolinetxt"

EOF;

//generate csv file putting json values in as needed for omeka_items table
$itm = <<<EOF
"$json_metadata[record_num]","18",NULL,"0","1","","","1"

EOF;


//write html output back to the html file
file_put_contents($write, $html, LOCK_EX);

//write csv1 output back to a csv file
file_put_contents($write1, $txt, LOCK_EX);

//write csv2 output back to a csv file
file_put_contents($write2, $itm, LOCK_EX);

//write zoom output back to a html file
file_put_contents($write3, $zoom, LOCK_EX);

echo "newspaper issue $tla $ark processed successfully!\n";

//update calendar via calendar builder
exec("php /home/libmanuk/public_html/cgi-bin/calbuilder.php $json_metadata[abbreviation_display] $json_metadata[id] $json_metadata[year_display] $json_metadata[month_display] $json_metadata[day_display] $json_metadata[control_display] \"$json_metadata[collection_display]\"");

} else {

//echo "invalid input! $tla $ark could not be processed.\n";

// Specify error log file
//$logfile = "$catalog/generator/error_log/$tla$json_metadata[control_display]$ark.txt";

// Create error message
$error = "invalid input! issue could not be processed.";

// Write error message file
//file_put_contents($error, $logfile, LOCK_EX);

die;

}

?>

