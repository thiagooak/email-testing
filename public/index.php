<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email Testing</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <a href="https://github.com/thiagooak/email-testing" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>
    <div class="container">
      <div class="header">
        <h3 class="text-muted">Email Testing</h3>
      </div>

      <div class="jumbotron">
        <p class="lead">Add a raw email file and click Submit.</p>

        <form action="upload.php" method="post" onsubmit="mixpanel.track('submit');" enctype="multipart/form-data">
          <input type="file" name="email" style="display: inline-block;">
          <input type="submit" class="btn btn-lg btn-success" value="Submit">
        </form>

      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Getting the raw email</h4>
          <img src="img/raw_email.png" width="300" style="box-shadow: 0px 0px 15px #cccccc;">
          <p>On gmail click 'Show original' to get the raw email.</p>
        </div>
        <div class="col-lg-6">
          <h4>Measuring the load time</h4>
          <img src="img/timing-overview.png" width="300" style="box-shadow: 0px 0px 15px #cccccc;">
          <p>We use the <a href="http://www.w3.org/TR/navigation-timing/#sec-navigation-timing-interface" target="_blank">navigation timing api</a>
            considering the time between <strong>navigationStart</strong> and <strong>loadEventEnd</strong>
          </p>
        </div>
      </div>

      <div class="footer">
        <p>made with &#9829; in são paulo</p>
      </div>

    </div>

    <?php if (php_sapi_name() != 'cli-server') { ?>
    <!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
    for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
    mixpanel.init("9cdb0dc7bd66d4ec7fbe65f3e8c68266");</script><!-- end Mixpanel -->

    <script type="text/javascript">
        mixpanel.track("pageview");
    </script>
    <?php } ?>
  </body>
</html>
