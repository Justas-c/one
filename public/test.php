<?php foreach($data['items'] as $item): ?>
    <!-- tr with id here -->
    <td> <button type="button"  id="editholiday_<?php echo $item['id']; ?>">Edit</button> </td>
    <td> <button type="button"  id="deleteholiday_<?php echo $item['id']; ?>">Delete</button> </td>




































index.html

<form name="TestForm" action="test.php" method="post">
    First :
    <input type="text" name="fname" id="fname" value="mike" />
    <br> Last :
    <input type="text" name="lname" id="lname" value="smith" />
    <br> Age : :
    <input type="number" name="age" id="age" value="50" />
    <br>
    <input type="button" value="SEND via AJAX" onclick="postData()">
    <input type="submit">
</form>

<div id="output1"></div>
<div id="status">Status</div>

<script>
    var output1 = document.getElementById('output1');
    var astatus = document.getElementById('status');

    function postData() {
        var firstName = document.getElementById('fname').value;
        var lastName = document.getElementById('lname').value;
        var age = document.getElementById('age').value;
        var vars = "fname=" + firstName + "&lname=" + lastName + "&age=" + age;
        console.log(vars);
        var hr = new XMLHttpRequest();
        var url = "test.php";

          hr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
               var myObj = JSON.parse(hr.responseText);
                 astatus.innerHTML =  myObj.xstatus + '  ' + myObj.id;
                if(myObj.connected){
                                     astatus.innerHTML +=  '<br>Connected to Database :)';
                }
                console.log(myObj);
            }
        }
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         hr.send(vars);
        astatus.innerHTML = "processing ... ";
    }
</script>



test.php

<?php
$arr = [];
$arr['first'] = $_POST['fname'];
$arr['last'] = $_POST['lname'];
$arr['age'] = $_POST['age'];

$con=new mysqli("localhost","root","","ajaxtest");
$sql = "INSERT INTO `names` (`first`, `last`, `age`) VALUES ('".$arr['first']."', '".$arr['last'] ."', '".$arr['age']."' );";

if($con->ping()){
     $arr['connected']  = true ;
}else{
        $arr['connected']  = false;
}

if ($con->query($sql) === TRUE) {
    $arr['xstatus']  = "Created" ;
    $arr['id']  = $con->insert_id;
}else{
    $arr['xstatus']  = "Error" ;
    $arr['message']  = $con->error;
}

echo json_encode($arr);

?>













<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Bootstrap required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="<?php echo URLROOT . '/css/myStyle.css' ?>">
  <!--  Google material style icons(https://material.io/resources/icons/?style=baseline) (https://google.github.io/material-design-icons/) -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<title>test</title>
</head>
<body>
<!--__________________________________Nav top________________________________-->
<!--__________________________________Main___________________________________-->
<div class="container-fluid"> <!-- main div -->
<div class="row"> <!-- main row header -->
<div class="col"> <!-- main col -->
<!--__________________________________HEADer________________________________ -->

<nav class="navbar navbar-expand-md navbar-light p-xl-2 justify-content-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#kelioneNavbar" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><span>Pasiūlimų Filtras</span>
  </button>

    <div class="collapse navbar-collapse" id="kelioneNavbar">



<!--__________________________________TEST__________________________________ -->











<div class="kelione mx-lg-2" id="kelioneNavbar" style="border: 1px solid #443857">
                           <!-- Main Page Sidebar -->
<!-- 1 -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">map</i>Tipas</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row"><a href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Pazintine' ?>">Pažintinės(<?php  echo $data['sidebarNums']['KelTipas_Pazintine']; ?>)</a></div>
      <div class="row"><a href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Kruizas' ?>">Kruizai(<?php  echo $data['sidebarNums']['KelTipas_Kruizas']; ?>)</a></div>
      <div class="row"><a href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Egzotine' ?>">Egzotinė(<?php  echo $data['sidebarNums']['KelTipas_Egzotine']; ?>)</a></div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row"><a href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Poilsine' ?>">Poilsinės(<?php  echo $data['sidebarNums']['KelTipas_Poilsine']; ?>)</a></div>
      <div class="row"><a href="#">Žygiai()</a></div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 2 -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">card_travel</i>Transportas</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row"><a href="#">Lėktuvu(<?php  echo $data['sidebarNums']['Transportas_Lektuvu']; ?>)</a></div>
      <div class="row"><a href="#">Laivu(<?php  echo $data['sidebarNums']['Transportas_Kruizine']; ?>)</a></div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row"><a href="#">Autobusu(<?php  echo $data['sidebarNums']['Transportas_Autobusu']; ?>)</a></div>
  </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 3 -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">access_time</i>Trukmė</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row"><a href="#">iki 5 dienų(<?php  echo $data['sidebarNums']['Trukme_iki5dienu']; ?>)</a></div>
      <div class="row"><a href="#">nuo 10 dienų(<?php  echo $data['sidebarNums']['Trukme_nuo5iki10dienu']; ?>)</a></div>
    </div> <!-- col -->
    <div class="col-6 my-2">
     <div class="row"> <a href="#">5-10 dienos(<?php  echo $data['sidebarNums']['Trukme_nuo10dienu']; ?>)</a></div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 4 -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">attach_money</i>Kaina Asmeniui</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row"><a href="#">iki € 100 (<?php  echo $data['sidebarNums']['KainaAsmeniui_iki100e']; ?>)</a></div>
      <div class="row"><a href="#">€ 301-500 (<?php  echo $data['sidebarNums']['KainaAsmeniui_nuo101iki300e']; ?>)</a></div>
      <div class="row"> <a href="#">nuo € 701 (<?php  echo $data['sidebarNums']['KainaAsmeniui_nuo301iki500e']; ?>)</a></div>
    </div> <!-- col -->
    <div class="col-6 my-2">
     <div class="row"> <a href="#">€ 101-300 (<?php  echo $data['sidebarNums']['KainaAsmeniui_nuo501iki700e']; ?>)</a></div>
     <div class="row"> <a href="#">€ 501-700 (<?php  echo $data['sidebarNums']['KainaAsmeniui_nuo701e']; ?>)</a></div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 5 -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">directions</i>Kryptys</div>
</div></div></div>

<!-- Get available countries php -->
<?php
// Get available countries;
    foreach ($data['sidebarNums'] as $key => $value) {
        if(strpos($key, 'Kryptis_') === 0 && $value != 0) {
            $destinations[str_replace('Kryptis_', '', $key)] = $value;
        }
    }
$destinations_count = count($destinations);
$destinations = array_chunk($destinations, floor($destinations_count / 2), $preserve_keys = TRUE);

?>
<!-- Get available countries html -->
<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
    <?php
        foreach ($destinations[0] as $key => $value) {
            echo '<div class="row"><a href="#">' . $key . '(' . $value . ')' .  '</a></div>';
        }
        // turbut paprastesnis yra bet kazkaip ... gal kita kart
        if (isset($destinations[2])){
            foreach ($destinations[2] as $key => $value) {
                echo '<div class="row"><a href="#">' . $key . '(' . $value . ')' .  '</a></div>';
            }
        }
    ?>
    </div>
    <div class="col-6 my-2">
    <?php
        foreach ($destinations[1] as $key => $value) {
            echo '<div class="row"><a href="#">' . $key . '(' . $value . ')' .  '</div>';
        }
        ?>
    </div>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">

    </div> <!-- col -->
    <div class="col-6 my-2">

    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

</div> <!-- /kelione -->

</div> <!-- collapse navbar supported content -->
</nav>












































<!--__________________________________FOOTer________________________________ -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div> <!-- /main col -->
</div> <!-- /main row -->
</div> <!-- /main div(container-fluid) -->
</body>
</html>
