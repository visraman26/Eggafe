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
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="10%">S NO</th>
                    <th width="25%">Dish Name</th>
                    <th width="40%">Image</th>
                    <th width="15%">Price</th>
                    <th width="10%">Delete</th>
                </tr>
                <div id="live_data"></div>

            </table>

        </div>


    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function () {
        function fetch_data() {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }
            });
        }

        fetch_data();
    });

</script>