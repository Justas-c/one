<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<!--_________________________________Main___________________________________ -->

<!-- if there were add holiday validations errors: -->
<div style="color:red">
<?php if(isset($data['kelione']['uks_errors'])){
    echo 'Please fix the following errors: <br>';
    foreach ($data['kelione']['uks_errors'] as $error) {
        echo $error;
    }
 } ?>
 </div>


                        <!-- Edit holiday form  -->
<div class="row">
<div class="col-10">

<form action="" method="post">
  <div class="form-group">
    <label for="addHolidayFormPavadinimas">Pavadinimas:</label>
    <input class="form-control" type="text" id="addHolidayFormPavadinimas" name="Pavadinimas" placeholder="" value="<?php echo $data['kelione']['Pavadinimas']; ?>" required>
  </div>
  <div class="form-group">
    <label for="addHolidayFormTitle">Title:</label>
    <input class="form-control" type="text" id="addHolidayFormTitle" name="Title" value="<?php echo $data['kelione']['Title']; ?>" required>
  </div>
  <div class="form-group">
    <label for="addHolidayFormIntro">Intro:</label>
    <textarea required class="form-control" rows="3" type="textarea" id="addHolidayFormIntro" name="Intro"><?php echo $data['kelione']['Intro']; ?></textarea>
  </div>

  <!-- A bit of datetime formating for values to be added in in datetime fields -->
  <?php
  $today = new DateTime('now');
  $IsvykimoStr  = $data['kelione']['IsvykimoData'];
  $IsvykimoDate = new DateTime($IsvykimoStr);
  $GryzimoStr   = $data['kelione']['GryzimoData'];
  $GryzimoDate  = new DateTime($GryzimoStr);
  ?>

  <div class="row">
  <div class="form-group col-3 pr-1">
    <label for="addHolidayFormDataIsvykimoData">Išvykimo Data:</label>
    <input class="form-control" min="<?php echo $today->format('Y-m-d'); ?>" value="<?php echo $IsvykimoDate->format('Y-m-d'); ?>" type="date" id="addHolidayFormIsvykimoData" name="IsvykimoData" required>
  </div>
  <div class="form-group col-2 pl-0">
    <label for="addHolidayFormDataIsvykimoLaikas">Išvykimo Laikas:</label>
    <input class="form-control" value="<?php echo $IsvykimoDate->format('H:i'); ?>" type="time" id="addHolidayFormIsvykimoLaikas" name="IsvykimoLaikas" value="12:55" required>
  </div>
  <div class="form-group col-3 pr-1">
    <label for="addHolidayFormDataGryzimoData">Gryžimo Data:</label>
    <input class="form-control" min="<?php echo $today->format('Y-m-d'); ?>" value="<?php echo $GryzimoDate->format('Y-m-d'); ?>" type="date" id="addHolidayFormGryzimoData" name="GryzimoData" required>
  </div>
  <div class="form-group col-2 pl-0">
    <label for="addHolidayFormDataGryzimoLaikas">Gryžimo Laikas:</label>
    <input class="form-control" value="<?php echo $GryzimoDate->format('H:i'); ?>"  type="time" id="addHolidayFormGryzimoLaikas" name="GryzimoLaikas" value="00:00" required>
  </div>
  </div>

  <div class="form-group">
    <label for="addHolidayFormPrograma">Kelionės Programa:</label>
    <textarea class="form-control" rows="3" type="textarea" id="addHolidayFormPrograma" name="Programa" placeholder="Programa"><?php echo $data['kelione']['Programa']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="addHolidayFormVideo">Video:</label>
    <input class="form-control" value="<?php echo $data['kelione']['video']; ?>" type="text" id="addHolidayFormVideo" name="Video" placeholder="Video">
  </div>
  <div class="form-group">
    <label for="addHolidayFormIskaiciuota">Į kelionės kainą Iskaičiuota:</label>
    <textarea class="form-control" rows="5" wrap="hard" type="textarea" id="addHolidayFormIskaiciuota" name="Iskaiciuota" placeholder="Iskaiciuota"><?php echo $data['kelione']['Iskaiciuota']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="addHolidayFormPapildomasIslaidos">Papildomos išlaidos:</label>
    <textarea class="form-control" rows="5" type="textarea" id="addHolidayFormPapildomasIslaidos" name="PapildomasIslaidos" placeholder="Papildomos išlaidos"><?php echo $data['kelione']['PapildomasIslaidos']; ?></textarea>
  </div>

  <div class="row">
    <div class="form-group col-3">
      <label for="addHolidayFormValstybe">Valstybė:</label>
      <select class="custom-select" name="Valstybe">
          <?php foreach (AVAILABLE_COUNTRIES as $country) {
              if ($data['kelione']['Valstybe'] != $country) {
                  echo '<option value="' . $country . '">' . $country . '<options>';
              } else {
                  echo '<option value="' . $country . '" selected="selected">' . $country . '<options>';
              }
          } ?>
      </select>


    </div>
    <div class="form-group col-3">
      <label for="addHolidayFormMiestas">Miestas:</label>
      <input class="form-control" value="<?php echo $data['kelione']['Miestas']; ?>" type="text" id="addHolidayFormMiestas" name="Miestas">
    </div>
    <div class="form-group">
      <label for="addHolidayFormViesbutis">Viešbutis:</label>
      <input class="form-control" value="<?php echo $data['kelione']['Viesbutis']; ?>" type="text" id="addHolidayFormViesbutis" name="Viesbutis" placeholder="Viesbutis" required>
    </div>
    <div class="form-group col-2">
      <label for="addHolidayFormKaina">Kaina:</label>
      <input class="form-control" value="<?php echo $data['kelione']['Kaina']; ?>" type="text" id="addHolidayFormKaina" name="Kaina" value="" placeholder="" required>
    </div>
  </div>

  <div class="row" style="border-">
  <div class="form-group col-6">
    <label for="addHolidayFormMainImage">Main Image(need to reupload manually):</label>
    <input class="form-control alert alert-primary" value="<?php echo $data['kelione']['MainImage']; ?>" type="file" id="addHolidayFormMainImage" name="MainImage">
  </div>
  </div>

  <div class="row">
  <div class="form-group col-2">
    <label for="addHolidayFormKelionesTipas">Keliones Tipas:</label>
    <select class="custom-select" name="KelionesTipas">
        <?php $tipaiOpts = ['Poilsine', 'Pazintine', 'Egzotine', 'Savaitgalio', 'Kruizas', 'PoilsisLietuvoje']; ?>
        <?php foreach ($tipaiOpts as $value) {
            if ($data['kelione']['KelionesTipas'] != $value) {
                echo '<option value="' . $value . '">' . $value . '<options>';
            } else {
                echo '<option value="' . $value . '" selected="selected">' . $value . '<options>';
            }
        } ?>
    </select>
  </div>

  <?php $tipaiOpts = ['Lektuvu', 'Autubusu', 'Kruizine']; ?>

  <div class="form-group col-3">
    <label for="addHolidayFormTransportoTipas">Transporto Tipas:</label>
    <select class="custom-select" name="TransportoTipas">
        <?php $transportotipaiOpts = ['Lektuvu', 'Autobusu', 'Kruizine']; ?>
        <?php foreach ($transportotipaiOpts as $value) {
            if ($data['kelione']['TransportoTipas'] == 'Laivu' && $value = 'Kruizine') {
                echo '<option selected="selected" value="' . $value . '">' . $value . '<options>';
            } else {
                echo '<option value="' . $value . '" >' . $value . '<options>';
            }
        } ?>
    </select>
  </div>
  </div>

  <div class="card p-3">
  <h4>Papildomai 1:</h4>

  <div class="row">
  <div class="form-group col-9">
    <label for="addHolidayFormRandom1Heading">Title1:</label>
    <input class="form-control" id="addHolidayRandom1Heading" value="<?php echo $data['kelione']['random1Heading'] ?>" name="Random1Heading">
  </div>
  </div>
  <div class="row">
    <div class="col form-group">
      <label for="addHolidayFormRandom1Text">Text1:</label>
      <textarea class="form-control" rows="4" type="textarea" id="addHolidayFormRandom1Text" name="Random1Text" placeholder="random"><?php echo $data['kelione']['random1text'] ?></textarea>
    </div>
  </div>
  <div class="">
     <li> Cia idesim mygtuka, kad js generuotu papildomus paragrafus.</li>
  </div>

</div> <!-- /card -->

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div> <!-- /col -->
</div> <!-- /row -->

</div> <!-- /col 10 -->
</div> <!-- /row -->






























<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
