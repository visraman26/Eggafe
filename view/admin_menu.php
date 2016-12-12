<html>
<head>
    <title>Live Table Data Edit</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="table-responsive">
        <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3><br/>

                <div id="live_data"></div>




    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function () {
        function fetch_data() {
            $.ajax({
                url: "../model/select.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }
            });
        }

        fetch_data();


    });

</script>