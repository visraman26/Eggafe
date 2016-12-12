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
        $(document).on('click', '#btn_add', function(){
            var sno = $('#id').text();
            var dish_name = $('#dish_name').text();
            var image = $('#image').text();
            var price = $('#price').text();

            if(sno == '')
            {
                alert("Enter First Name");
                return false;
            }
            if(dish_name == '')
            {
                alert("Enter Last Name");
                return false;
            }
            if(image == '')
            {
                alert("Enter Last Name");
                return false;
            }
            if(price == '')
            {
                alert("Enter Last Name");
                return false;
            }
            $.ajax({
                url:"../model/insert.php",
                method:"POST",
                data:{id:sno, dish_name:dish_name, image:image, price:price},
                dataType:"text",
                success:function(data)
                {
                    alert(data);
                    fetch_data();
                }
            });
        });







    });

</script>