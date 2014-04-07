<?php

use MimeMailParser\Parser;
use MimeMailParser\Attachment;

ini_set("display_errors", 1);

require __DIR__."/../vendor/autoload.php";

if (isset($_GET['f']) && strlen($_GET['f']) == 7) {
    $filename = __DIR__."/../uploads/".$_GET['f'];
    $fileContent = file_get_contents($filename);
    $saveFileName = $_GET['f'];
} else {
    $filename = $_FILES['email']['tmp_name'];

    if (!is_uploaded_file($filename)) {
        echo "invalid file (1)";
        die();
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $filename);
    finfo_close($finfo);

    if (false === strpos($mime, "text/")) {
        echo "invalid file (2)";
        die();
    }

    $fileContent = file_get_contents($filename);
    $saveFileName = substr(sha1($fileContent), 0 ,7);
    move_uploaded_file($filename, __DIR__."/../uploads/" . $saveFileName);
}



$parser = new Parser();
$parser->setText($fileContent);

// $to           = $parser->getHeader('to');
// $delivered_to = $parser->getHeader('delivered-to');
// $from         = $parser->getHeader('from');
// $subject      = $parser->getHeader('subject');
// $text         = $parser->getMessageBody('text');
$html         = $parser->getMessageBody('html');
// $attachments  = $parser->getAttachments();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<title>Email</title>
<script type="text/javascript">
    function supportsNavigationTiming() {
      return !!(window.performance && window.performance.timing);
    }

    if (!supportsNavigationTiming()) {
        alert("timing API not supported!");
    }
</script>
<style>
    #load-time {
        background-color: #333333;
        color: #ffffff;
        font-family: sans-serif;
        padding: 20px;
    }
</style>
</head>

<body>
    <div id="load-time">
        <div style="float:right;"><a href="/upload.php?f=<?php echo $saveFileName; ?>" style="color:#ffffff;"><?php echo $saveFileName; ?></a></div>
        <div id="load-time-user"></div>
        <div id="load-time-dns"></div>
        <div id="load-time-connection"></div>
        <div id="load-time-request"></div>
        <div id="load-time-fetch"></div>
    </div>

    <!-- email HTML start -->
        <?php echo $html; ?>
    <!-- email HTML end -->

    <script type="text/javascript">
        window.addEventListener("load", function() {
          setTimeout(function() {
            var timing      = window.performance.timing;
            var userTime    = timing.loadEventEnd - timing.navigationStart;
            var dns         = timing.domainLookupEnd - timing.domainLookupStart;
            var connection  = timing.connectEnd - timing.connectStart;
            var requestTime = timing.responseEnd - timing.requestStart;
            var fetchTime   = timing.responseEnd - timing.fetchStart;

            // document.getElementById('load-time').innerHTML = userTime + " miliseconds" + " // " +  (userTime / 1000) + " seconds";
            document.getElementById('load-time-user').innerHTML = "<strong>load time:</strong> " + userTime + " ms";
            // document.getElementById('load-time-dns').innerHTML = "dns " + dns + "ms";
            // document.getElementById('load-time-connection').innerHTML = "connection " + connection + "ms";
            // document.getElementById('load-time-request').innerHTML = "request " + requestTime + "ms";
            // document.getElementById('load-time-fetch').innerHTML = "fetch " + fetchTime + "ms";

          }, 0);
        }, false);
    </script>

</body>

</html>