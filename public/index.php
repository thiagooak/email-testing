<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h3>Email file to check. It must be a raw email file</h3>
    <form action="upload.php" method="post" onsubmit="mixpanel.track('submit');" enctype="multipart/form-data">
        <input type="file" name="email">
        <input type="submit">
    </form>
    <hr>
    Load time will be calculated from <strong>navigationStart</strong> to <strong>loadEventEnd.</strong>
    <img src="timing-overview.png" width="1000">

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