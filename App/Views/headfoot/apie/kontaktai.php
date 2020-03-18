<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<div class="row"> <!-- main row -->
<div class="col-lg-9 py-3 px-5"> <!-- main col -->
<!-- col 9 left -->
<div class="row">
  <div class="col">
    <h3>Kontaktai</h3><hr>
    <p>
      <b>Office:</b><br>
      Adresas: lorem ipsum<br>
      Tel: lorem ipsum<br>
      El. Paštas: lorem ipsum<br>
      Darbo laikas: lorem ipsum<br>
    </p>
    <div id="map"></div>
    <script>
        function initMap(){
        var location = {lat: 54.686758, lng: 25.290684};
        map = new google.maps.Map(document.getElementById('map'),{
            zoom: 15,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <!-- Not fully working since need to add card to biling info -->
    <!-- Key: AIzaSyBAeDLGLJUidUHcaaFZUBqV_a2GV7V6_jE -->

</div>
</div>
<!-- __________________________________TEST_________________________________ -->
<!-- __________________________________TEST_________________________________ -->
</div> <!-- /main row -->
</div> <!-- /main col -->













<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
