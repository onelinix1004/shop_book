<?php
    
?>

<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="/css/flipbook.style.css">

<script src="/js/flipbook.min.js"></script>

<script type="text/javascript">
        $(document).ready(function () {
            $.getScript("/js/flipbook.min.js", function() {
                var pdfUrl = "<?php echo $product->pdf; ?>";
        $("#container").flipBook({
            pdfUrl: pdfUrl
        });
            });
        });
</script>

</head>

<body>
<div id="container"/>
</body>

</html>