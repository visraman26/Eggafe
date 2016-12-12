<?php
include_once "../helper/connect.php";
$output = '';
$sql = "SELECT * FROM menu ORDER BY id ASC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">S NO</th>
                    <th width="25%">Dish Name</th>
                    <th width="40%">Image</th>
                    <th width="15%">Price</th>
                    <th width="10%">Delete</th>
                </tr>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td class="idvalue" data-id1="' . $row["id"] . '" contenteditable>' . $row["id"] . '</td>  
                     <td class="dish_name" data-id2="' . $row["id"] . '" contenteditable>' . $row["dish_name"] . '</td>  
                     <td class="image" data-id3="' . $row["id"] . '" contenteditable>' . $row["image"] . '</td>  
                     <td class="price" data-id4="' . $row["id"] . '" contenteditable>' . $row["price"] . '</td>  
                     <td><button type="button" name="delete_btn" data-id5="' . $row["id"] . '" class="btn btn-xs btn-danger btn_delete">X REMOVE X</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr xmlns="http://www.w3.org/1999/html">  
                <td id="id" contenteditable> </td>  
                <td id="dish_name" contenteditable></td>  
                <td id="image">
                    <div  class="container-fluid">
                    <div class="row">
                        <div  class="col-sm-8">
                            <div id="image_preview">
                           
                            </div>
                        
                        </div>
                        <div class="col-sm-4">
                            <form id="submit_form" action="../controller/uploadImg.php" method="post" enctype="multipart/form-data" >
                                 <div class="form-group">
                                        <input type="file" name="file" id="image_file" />
                                 </div>
                                 <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                            </form>
                        </div>
                    </div>
                    </div>
    
                </td>  
                <td id="price" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+ ADD DISH +</button></td>  
           </tr>  
      ';
} else {
    $output .= '<tr>  
                          <td align="center" colspan="5">Data not Found</td>  
                          
                     </tr>
                     <tr>  
                <td id="id" contenteditable> </td>  
                <td id="dish_name" contenteditable></td>  
                <td id="image" ></td>  
                <td id="price" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+ ADD DISH +</button></td>  
           </tr>  
                     
                     ';
}

$output .= '</table>  
      </div>';
echo $output;
?>
<script>
    $(document).ready(function () {

        $('#submit_form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "../controller/uploadImg.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                //cache:false,
                processData: false,
                success: function (data) {
                    $('#image_preview').html(data);
                    $('#image_file').val('');
                }


            });

        });
        $(document).on('click', '#remove_button', function () {
            if (confirm("Are you sure you want to remove this image?")) {
                var path = $('#remove_button').data("path");
                $.ajax({
                    url: "../controller/deleteImg.php",
                    type: "POST",
                    data: {path: path},
                    success: function (data) {
                        if (data != '') {
                            $('#image_preview').html('');
                        }
                    }
                });
            }
            else {
                return false;
            }
        });

    });
</script>



