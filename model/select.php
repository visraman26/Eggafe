<?php
include "../helper/connect.php";
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
           <tr>  
                <td id="id" contenteditable> </td>  
                <td id="dish_name" contenteditable></td>  
                <td id="image" contenteditable></td>  
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
                <td id="image" contenteditable></td>  
                <td id="price" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+ ADD DISH +</button></td>  
           </tr>  
                     
                     ';
}
$output .= '</table>  
      </div>';
echo $output;
?>



