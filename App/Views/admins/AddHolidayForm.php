<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<!--_________________________________Main___________________________________ -->

<!-- if there were add holiday validations errors: -->
<div style="color:red">
<?php if(isset($data['uks_errors'])){
    echo 'Please fix the following errors: <br>';
    foreach ($data['uks_errors'] as $error) {
        echo $error;
    }
 } ?>
 </div>


                        <!-- Add holiday form  -->
<div class="row">
<div class="col-10">

<form action="" method="post">
  <div class="form-group">
    <label for="addHolidayFormPavadinimas">Pavadinimas:</label>
    <input class="form-control" type="text" id="addHolidayFormPavadinimas" name="Pavadinimas" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="addHolidayFormTitle">Title:</label>
    <input class="form-control" type="text" id="addHolidayFormTitle" name="Title" placeholder="Title" required>
  </div>
  <div class="form-group">
    <label for="addHolidayFormIntro">Intro:</label>
    <textarea required class="form-control" rows="3" type="textarea" id="addHolidayFormIntro" name="Intro" placeholder="Intro"></textarea>
  </div>

  <!-- today -->
  <?php  $today = new DateTime('now'); ?>

  <div class="row">
  <div class="form-group col-3 pr-1">
    <label for="addHolidayFormDataIsvykimoData">Išvykimo Data:</label>
    <input class="form-control" min="<?php echo $today->format('Y-m-d'); ?>" type="date" id="addHolidayFormIsvykimoData" name="IsvykimoData" required>
  </div>
  <div class="form-group col-2 pl-0">
    <label for="addHolidayFormDataIsvykimoLaikas">Išvykimo Laikas:</label>
    <input class="form-control" type="time" id="addHolidayFormIsvykimoLaikas" name="IsvykimoLaikas" value="00:00" required>
  </div>
  <div class="form-group col-3 pr-1">
    <label for="addHolidayFormDataGryzimoData">Gryžimo Data:</label>
    <input class="form-control" min="<?php echo $today->format('Y-m-d'); ?>" type="date" id="addHolidayFormGryzimoData" name="GryzimoData" required>
  </div>
  <div class="form-group col-2 pl-0">
    <label for="addHolidayFormDataGryzimoLaikas">Gryžimo Laikas:</label>
    <input class="form-control" type="time" id="addHolidayFormGryzimoLaikas" name="GryzimoLaikas" value="00:00" required>
  </div>
  </div>

  <div class="form-group">
    <label for="addHolidayFormPrograma">Kelionės Programa:</label>
    <textarea class="form-control" rows="3" type="textarea" id="addHolidayFormPrograma" name="Programa" placeholder="Programa"></textarea>
  </div>
  <div class="form-group">
    <label for="addHolidayFormVideo">Video:</label>
    <input class="form-control" type="text" id="addHolidayFormVideo" name="Video" placeholder="Video">
  </div>
  <div class="form-group">
    <label for="addHolidayFormIskaiciuota">Į kelionės kainą Iskaičiuota:</label>
    <textarea class="form-control" rows="5" wrap="hard" type="textarea" id="addHolidayFormIskaiciuota" name="Iskaiciuota" placeholder="Iskaiciuota"></textarea>
  </div>
  <div class="form-group">
    <label for="addHolidayFormPapildomasIslaidos">Papildomos išlaidos:</label>
    <textarea class="form-control" rows="5" type="textarea" id="addHolidayFormPapildomasIslaidos" name="PapildomasIslaidos" placeholder="Papildomos išlaidos"></textarea>
  </div>

  <div class="row">
    <div class="form-group col-3">
      <label for="addHolidayFormValstybe">Valstybė:</label>
      <select class="custom-select" name="Valstybe">
          <?php for ($i=0; $i < count(AVAILABLE_COUNTRIES); $i++): ?>  <!-- available_countries defined in Core/init.php -->
              <option value="<?php echo AVAILABLE_COUNTRIES[$i]; ?>"><?php echo AVAILABLE_COUNTRIES[$i]; ?></option>
          <?php endfor; ?>
      </select>


    </div>
    <div class="form-group col-3">
      <label for="addHolidayFormMiestas">Miestas:</label>
      <input class="form-control" type="text" id="addHolidayFormMiestas" name="Miestas">
    </div>
    <div class="form-group">
      <label for="addHolidayFormViesbutis">Viešbutis:</label>
      <input class="form-control" type="text" id="addHolidayFormViesbutis" name="Viesbutis" placeholder="Viesbutis" required>
    </div>
    <div class="form-group col-2">
      <label for="addHolidayFormKaina">Kaina:</label>
      <input class="form-control" type="text" id="addHolidayFormKaina" name="Kaina" value="" placeholder="" required>
    </div>
  </div>

  <div class="row">
  <div class="form-group col-6">
    <label for="addHolidayFormMainImage">Main Image:</label>
    <input class="form-control" type="file" id="addHolidayFormMainImage" name="MainImage">
  </div>
  </div>

  <div class="row">
  <div class="form-group col-2">
    <label for="addHolidayFormKelionesTipas">Keliones Tipas:</label>
    <select class="custom-select" name="KelionesTipas">
      <option value="Poilsine">Poilsinė</option>
      <option value="Pazintine">Pažintinė</option>
      <option value="Kruizas">Kruizas</option>
      <!-- <option value="Egzotine">Egzotinė</option>
      <option value="Savaitgalio">Savaitgalio</option>
      <option value="PoilsisLietuvoje">Poilsis Lietuvoje</option> -->
    </select>
  </div>

  <div class="form-group col-3">
    <label for="addHolidayFormTransportoTipas">Transporto Tipas:</label>
    <select class="custom-select" name="TransportoTipas">
      <option value="Lektuvu">Lėktuvu</option>
      <option value="Autobusu">Autobusu</option>
      <option value="Kruizine">Kruizine</option>
    </select>
  </div>
  </div>

  <div class="card p-3">
  <h4>Papildomai 1:</h4>

  <div class="row">
  <div class="form-group col-9">
    <label for="addHolidayFormRandom1Heading">Title1:</label>
    <input class="form-control" id="addHolidayRandom1Heading" name="Random1Heading">
  </div>
  </div>
  <div class="row">
    <div class="col form-group">
      <label for="addHolidayFormRandom1Text">Text1:</label>
      <textarea class="form-control" rows="4" type="textarea" id="addHolidayFormRandom1Text" name="Random1Text" placeholder="random"></textarea>
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
