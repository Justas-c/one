<div class="kelione">
<div class="row pl-3 pt-2">
<div class="col-sm" style="border: 1px solid black">

    <!-- sidebar from sidebar1.php -->
<div class="row"><div class="col"><div class="sidebar-icons">
  <div class="sidebar-h1 pt-3">
    <i class="material-icons">calendar_today</i>
      <?php  // Keliones rodomos pagal tipa:
      if ($data['kelione']['KelionesTipas'] == 'Pazintine' || $data['kelione']['KelionesTipas'] == 'Egzotine' || $data['kelione']['KelionesTipas'] == 'Poilsine'){
          echo substr($data['kelione']['KelionesTipas'], 0, -1) . 'ės kelionės';
      } elseif($data['kelione']['KelionesTipas'] == 'Savaitgalio') {
          echo $data['kelione']['KelionesTipas'] . ' kelionės';
      } elseif($data['kelione']['KelionesTipas'] == 'Kruizas') {
          echo 'Kruizai';
      } elseif($data['kelione']['KelionesTipas'] == 'PoilsisLietuvoje') {
          echo 'Poilsis Lietuvoje';
      } else {
          echo $data['kelione']['KelionesTipas'];
      }
      ?>
  </div>

  <div class="sidebar-h2"><?php addnbsp(8); ?> pagal sezoną</div>
</div></div></div>

<!-- ___________________________________TEST________________________________ -->
<?php
$icons = ['R', 'ac_unit', 'local_florist', 'wb_sunny'];
$pasiulimai = ['Rudens', 'Žiemos', 'Pavasario', 'Vasaros'];
$menesiai = ['Birželis','Liepa','Rūgpjūtis','Rugsėjis','Spalis','Lapkritis','Gruodis','Sausis','Vasaris','Kovas','Balandis','Gegužė'];
$menesiai_is_eiles = ['Sausis','Vasaris','Kovas','Balandis','Gegužė','Birželis','Liepa','Rūgpjūtis','Rugsėjis','Spalis','Lapkritis','Gruodis'];

// array returns one value to extra, remove;
array_shift($data['menKeliones']);

// Menesiai ir kelioniu skaicius Assoc array
for ($i=0; $i < 12; $i++) {
    $men[$menesiai_is_eiles[$i]] = $data['menKeliones'][$i];
}

$c = 0;
$x = 0;
    for ($i=0; $i < 4; $i++): ?>

        <div class="row"><div class="col"><div class="sidebar-icons">
          <div class="sidebar-h2 pt-3"><i class="material-icons"><?php echo $icons[$c]; ?></i><?php echo $pasiulimai[$c]; ?> Pasiūlimai</div>
        </div></div></div>

        <div class="sidebar-meniu">
          <div class="row ml-2 pr-3 py-2 justify-content-around">

          <?php for ($j=0; $j < 3; $j++) {
              // if ($men[$menesiai[$x]] != 0){
              //     echo '<span><a href="'. URLROOT . 'KelionesC/keliones?KelTipas' .   .'">'
              //       .  $menesiai[$x] . '(' .  $men[$menesiai[$x]] . ') </a></span>';
              // } else {
              //     echo '<span class="inactive1"><a>' .  $menesiai[$x] . '(0) </a></span>';
              // }

              /* before edit */
              if ($men[$menesiai[$x]] != 0){

                  // menesio skaicius pagal pavadinima
                  $cmen = array_search($menesiai[$x], $menesiai_is_eiles);
                  $cmen++;

                  echo '<span><a href="'. URLROOT . 'kelionesC/keliones?KelTipas=' . $data['kelione']['KelionesTipas'] . '&menesis=' . $cmen .  '">'
                   .  $menesiai[$x] . '(' .  $men[$menesiai[$x]] . ') </a></span>';

              } else {
                  echo '<span class="inactive1"><a>' .  $menesiai[$x] . '(0) </a></span>';
              }
            $x++;
          } ?>
          </div> <!-- row -->
        </div> <!-- sidebar-meniu -->
<?php $c++; ?>
<?php endfor; ?>
<!-- ___________________________________TEST________________________________ -->











</div>
</div>
</div>




<!-- test -->
<!-- $j = 0;
for ($i=0; $i < 12; $i++) {
    if ($i % 3 == 0) {
        echo '<div class="row"><div class="col"><div class="sidebar-icons"><div class="sidebar-h2 pt-3">
              <i class="material-icons">' . $icons[$j] . '</i>
              ' . $pasiulimai[$j] .  ' Pasiūlimai</div>
              </div></div></div>';
              $j++;
    }
    echo $i;

} -->

<!-- ___________________________________TEST________________________________ -->
<!-- ___________________________________TEST________________________________ -->
<?php /*
<!-- 1 -->
<div class="row"><div class="col"><div class="sidebar-icons">
  <div class="sidebar-h2 pt-3"><i class="material-icons">wb_sunny</i>Vasaros Pasiūlimai</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2 pr-3 py-2 justify-content-around">
    <a href="#">Birželis()</a>
    <a href="#">Liepa()</a>
    <a href="#">Rūgpjūtis()</a>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 2 -->
<div class="row"><div class="col"><div class="sidebar-icons">
  <div class="sidebar-h2 pt-3"><i class="material-icons">R</i><?php addnbsp(1) ?>Rudens Pasiūlimai</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2 pr-3 py-2 justify-content-around">
    <a href="#">Rugsėjis()</a>
    <a href="#">Spalis()</a>
    <a href="#">Lapkritis()</a>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 3 -->
<div class="row"><div class="col"><div class="sidebar-icons">
  <div class="sidebar-h2 pt-3 py-2"><i class="material-icons">ac_unit</i>Žiemos Pasiūlimai</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2 pr-3 py-2 justify-content-around">
    <a href="#">Gruodis()</a>
    <a href="#">Sausis()</a>
    <a href="#">Vasaris()</a>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

<!-- 4 -->
<div class="row"><div class="col"><div class="sidebar-icons">
  <div class="sidebar-h2 pt-3 py-2"><i class="material-icons">local_florist</i>Pavasario Pasiūlimai</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2 pr-3 pb-3 justify-content-around">
    <a href="#">Kovas()</a>
    <a href="#">Balandis()</a>
    <a href="#">Gegužė()</a>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

*/ ?>
