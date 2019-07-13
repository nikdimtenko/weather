<?php
function printList() {
    require_once 'db/dbConnection.php';
    $result = mysqli_query($connection, "SELECT * FROM citys_history ORDER BY id DESC LIMIT 6");
?>
<div class="container ">
    <div class="d-flex flex-wrap">
        <?php
         while($r = mysqli_fetch_assoc($result)) {
            echo '<div class="card mb-4 shadow-sm list">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal city">'.$r['city_name'].'
                            <img src="http://openweathermap.org/images/flags/'.mb_strtolower($r['country']).'.png" width="25" height="18"/>
                        </h4>
                    </div>
                      <div class="card-body">
                         <img src="http://openweathermap.org/img/w/'.$r['icon'].'.png" class="img">
                         <h1 class="temperature">'.$r['temp'].' <small class="text-muted" style="display:inline">T°</small></h1>
                         <h1 class="desc">'.$r['description'].'</h1>
                         <table>
                             <tr><td>Wind (m/s)</td><td><b>'.$r['wind'].'</b></td></tr>
                             <tr><td>Clouds (%)</td><td><b>'.$r['clouds'].'</b></td></tr>
                             <tr><td>Pressure(hpa)</td><td><b>'.$r['pressure'].'</b></td></tr>
                             <tr><td>Country </td><td><b>'.$r['country'].'</b></td></tr>
                         </table>
                         <p align="center" style="margin-top: auto; margin-bottom: auto">'.$r['request_date'].'</p>
                         <form  method="get">
                             <button type="submit" class="btn btn-lg btn-block btn-outline-primary" name="current" 
                                     value="'.$r['city_name'].'">Current weather</button>
                         </form>
                      </div>
                    </div>';
         }?>
    </div>
</div>
<?php
}

