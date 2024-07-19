<?php
// PHP code here
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/flipbook.style.css">

    <script src="/js/flipbook.min.js"></script>

    <style>
        /* Ẩn phần header */
        header {
            display: none;
        }

        .navbar {
            display: none;
        }

        /* Ẩn phần footer */
        footer {
            display: none;
        }

        /* Ẩn các phần tử không mong muốn */
        .sidebar, .menu, .cart, .some-other-class {
            display: none;
        }

        /* Tùy chỉnh chiều rộng của phần nội dung */
        .main-content {
            width: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            $.getScript("/js/flipbook.min.js", function () {
                var pdfUrl = "<?php echo $product->pdf; ?>";
                $("#container").flipBook({
                    pdfUrl: pdfUrl
                });
            });

        });
    </script>

</head>

<body>
<div id="container" class="main-content"></div>
</body>

</html>
