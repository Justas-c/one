<nav class="navbar navbar-expand-md navbar-light px-0 p-xl-2 justify-content-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#kelioneNavbar" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><span>Pasiūlimų Filtras</span>
  </button>
<div class="collapse navbar-collapse" id="kelioneNavbar">
<!--_______________________________Sidebar html_____________________________ -->
<div class="col kelione px-1 mx-lg-2" id="kelioneNavbar" style="border: 1px solid #443857">
                           <!-- Main Page Sidebar -->

                                <!-- 1(Tipas) -->
<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">map</i>Tipas</div>
</div></div></div>
<!-- javascriot:; was added to cancel default link behaviour -->
<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Pazintine"><span>Pažintinės<span id="hnumsPazintine">(<?php
          if (!isset($_GET['searchfilter'])) {echo $data['sidebarNums']['KelionesTipas_Pazintine'];}
          ?>)</span></span>

      </div>
      <div class="row sidebar-inactive" id="Kruizas"><span>Kruizai<span id="hnumsKruizas">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KelionesTipas_Kruizas'];}
          ?>)</span></span>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Poilsine" ><span>Poilsinės<span id="hnumsPoilsine">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KelionesTipas_Poilsine'];}
          ?>)</span></span>
      </div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->


                                <!-- 2(Transportas) -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">card_travel</i>Transportas</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Lektuvu"><span>Lėktuvu<span id="hnumsLektuvu">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Lektuvu'];}
          ?>)</span></span>
      </div>
      <div class="row sidebar-inactive" id="Laivu"><span>Laivu<span id="hnumsLaivu">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Kruizine'];}
          ?>)</span></span>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Autobusu"><span>Autobusu<span id="hnumsAutobusu">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Autobusu'];}
           ?>)</span></span>
      </div>
  </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

                                <!-- 3(DateDiff) -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">access_time</i>Trukmė</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="0-4"><span>iki 5 dienų<span id="hnums0-4">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['DateDiff_iki5dienu'];}
          ?>)</span></span>
        </div>
      <div class="row sidebar-inactive" id="10-100" ><span>nuo 10 dienų<span id="hnums10-100">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['DateDiff_nuo10dienu'];}
          ?>)<span></span>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="5-9"><span>5-9 dienos<span id="hnums5-9">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['DateDiff_nuo5iki10dienu'];}
          ?>)</span></span>
      </div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

                                <!-- 4(Kaina) -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">attach_money</i>Kaina Asmeniui</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="0-300"><span>iki €300<span id="hnums0-300">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo0iki300e'];}
          ?>)</span></span>
      </div>
      <div class="row sidebar-inactive" id="701-10000"><span>nuo € 701<span id="hnums701-10000">(<?php
          if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo701iki10000e'];}
          ?>)</span></span>
        </a>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="301-700"><span>€ 301-700<span id="hnums301-700">(<?php
        if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo301iki700e'];}
        ?>)</span></span>
      </div>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

                                <!-- 5(Kryptys) -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">directions</i>Kryptys</div>
</div></div></div>

<!-- Get available countries php -->
<?php
foreach ($data['sidebarNums'] as $key => $value) {
    if(strpos($key, 'Valstybe_') === 0 && $value != 0) {
        $destinations[str_replace('Valstybe_', '', $key)] = $value;
    }
}
// all available destinaions, not split
$destinations2 = $destinations;
// split
$destinations_count = count($destinations);
$destinations = array_chunk($destinations, floor($destinations_count / 2), $preserve_keys = TRUE);
?>

<!-- Get available countries html -->
<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
    <?php
        foreach ($destinations[0] as $key => $value) {
            // span pridejau
            echo '<div class="row sidebar-inactive" id="' . $key . '"><span>' . $key . '</span></div>';
        }
        if (isset($destinations[2])){
            foreach ($destinations[2] as $key => $value) {
                echo '<div class="row sidebar-inactive" id="' . $key . '"><span>' . $key . '</span></div>';
            }
        }
    ?>
    </div>
    <div class="col-6 my-2">
    <?php
    foreach ($destinations[1] as $key => $value) {
        echo '<div class="row sidebar-inactive" id="' . $key . '"><span>' . $key . '</span></div>';
    }
     ?>
    </div>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

</div> <!-- /kelione -->

</div> <!-- collapse navbar supported content -->
</nav>

<!-- test div -->
<!-- <div class="test" id='t1'>
    <span>I'm test div</span>
</div> -->

<!--_______________________________JAvascript________________________________-->
<script>
"user strict";

// add event listeners
function addListeners() {
    // cia paskui galesim i for loop perasyt kad maziau pisnios butu
    // Tipas
    document.getElementById('Pazintine').addEventListener('click', jsSearch);
    document.getElementById('Kruizas').addEventListener('click', jsSearch);
    document.getElementById('Poilsine').addEventListener('click', jsSearch);
    // Transportas
    document.getElementById('Lektuvu').addEventListener('click', jsSearch);
    document.getElementById('Laivu').addEventListener('click', jsSearch);
    document.getElementById('Autobusu').addEventListener('click', jsSearch);
    // DateDiff
    document.getElementById('0-4').addEventListener('click', jsSearch);
    document.getElementById('5-9').addEventListener('click', jsSearch);
    document.getElementById('10-100').addEventListener('click', jsSearch);
    // Kaina
    document.getElementById('0-300').addEventListener('click', jsSearch);
    document.getElementById('301-700').addEventListener('click', jsSearch);
    document.getElementById('701-10000').addEventListener('click', jsSearch);
    // Salis
    // availCountries are set above(search $destinations2), const available_countries declared in init.php
    let availCountries = <?php echo json_encode($destinations2); ?>;
    let keys = Object.keys(availCountries);
    for (var i = 0; i < keys.length; i++) {
        document.getElementById(keys[i]).addEventListener('click', jsSearch);
    }
}


window.onload = addListeners;

function addAllHolidays(holidays, keliones_div) {
    for (var i = 0; i < holidays.length; i++) {
        let img    = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '"><img src="<?php echo URLROOT ?>public/images/keliones/Visos/' + holidays[i].MainImage + '" alt="cia turetu but grazus img, bet programuotojas susivele :(" width="100%" ></a>';
        let pavadinimas  = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '">' + holidays[i].Pavadinimas + '</a>';
        let title  = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '">' +  holidays[i].Title  + '</a>';
        let button = '<a class="btn btn-primary py-1 px-5" href="http://jcenys.lt/one/kelioneC/kelione?id=' + holidays[i].id + '" role="button">Plačiau</a>';

        let interim_div_first = '<div class="col-sm-12"><div class="card my-2 mx-2">';
        let interim_div_img = '<div class="kelioniu-img">'+ img +'</div>';
        let id_cardbody1 = '<div class="card-body"><div class="row"><div class="col-md-8 col-lg-9">';
        let title_pavadinimas = '<h4>' + pavadinimas + '</h4><p>' + title + '</p>';
        let interim_div_3 = '<div class="col-md-3">' + button + '</div>';
        let id_cardbody2 = '</div></div></div>';
        let interim_div_last = '</div></div>';
        let full_div = interim_div_first + interim_div_img + id_cardbody1 + title_pavadinimas + interim_div_3 + id_cardbody2 + interim_div_last;
        keliones_div.innerHTML += full_div;
    }
}

function sidebarNums(json) {
    let keys = ['Pazintine', 'Poilsine','Kruizas', 'Lektuvu', 'Autobusu','Laivu', '0-4','5-9','10-100','0-300','301-700','701-10000'];
    let holidayNums = {Pazintine: 0, Poilsine: 0, Kruizas: 0, Lektuvu: 0, Autobusu: 0, Laivu: 0,
        '0-4': 0, '5-9': 0, '10-100': 0, '0-300': 0, '301-700': 0, '701-10000': 0};

    // get holiday nums from json search returned array, update HolidayNums array;
    console.log('TESTING:');
    //alert(json.length);
    console.log(json);
    for (var i = 0; i < json.length; i++) {
        holidayNums[json[i].KelionesTipas]++;
        holidayNums[json[i].TransportoTipas]++;

        // DateDiff
        // cast to integer, holidayNums[relevant]+1
        let ddInt = Number(json[i].DateDiff);
        if (ddInt > 0 && ddInt <= 4) {
            holidayNums['0-4']++;
        } else if (ddInt >= 5 && ddInt <= 9) {
            holidayNums['5-9']++;
        } else if (ddInt >= 10 && ddInt <= 100) {
            holidayNums['10-100']++;
        }

        // PriceDiff
        // cast to integer holidayNums[relevant]+1
        let kInt = Number(json[i].Kaina);
        if (kInt > 0 && kInt <= 300) {
            holidayNums['0-300']++;
        } else if (kInt > 301 && kInt <= 700) {
            holidayNums['301-700']++;
        } else if (kInt > 701 && kInt <= 10000) {
            holidayNums['701-10000']++;
        }
    }

    // update holiday nums by selection
    for (var i = 0; i < 12; i++) {
        let element = document.getElementById('hnums' + keys[i]);
        let k = keys[i];
        element.innerHTML = '(' + holidayNums[k] + ')';
    }
    // info
    console.log('HolidayNums:');
    console.log(holidayNums);
}

function sidebarAjax(searchUrl){
    let xhr = new XMLHttpRequest();
    let method = 'GET';
    xhr.open(method, searchUrl);
    xhr.send();

    console.log(xhr);



    //receiving response from sidebarSearch.php
    xhr.onreadystatechange = function() {
        this.status;
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            // let response = this.responseText;
            // //console.log(this.responseText);
            // let parsed = JSON.parse(this.responseText);
            // console.log(parsed);
            // addAllHolidays(parsed, document.getElementById('keldiv'));

            // redirect to main page if no selections are made
            if (searchUrl === 'https://jcenys.lt/one/SidebarSearchC/sidebarSearch?searchfilter=1&'){
                window.location.href = '<?php echo URLROOT ?>';
            // display holidays
            } else {
                let parsed = JSON.parse(this.responseText);
                console.log(parsed);
                // holiday nums:
                sidebarNums(parsed);

                // if no holidays found
                if (parsed.length === 0 ){
                    document.getElementById('keldiv').innerHTML = 'Deja kelionių pagal esamus parametrus šiuo metu neturime';
                // display holidays
                } else {
                    console.log('parsed:');
                    console.log(parsed);
                    addAllHolidays(parsed, document.getElementById('keldiv'));
                }
            }
        }
    }
    // clear last holidaylist entry
    if (window.location.href.indexOf('searchfilter=1') > -1) {
        document.getElementById('keldiv').innerHTML = '';
    }
}



// PP - Paieskos Parametrai object, prie jsSearch;
let pp = {
    KelionesTipas: [],
    TransportoTipas: [],
    DateDiff: [],
    Kaina: [],
    Valstybe: [],
}

/*  Sudedam visus sidebar paspaudimus i viena vieta. Pagaminam url pagal kuri bus surastos keliones. */
function jsSearch() {
    // if 1st redirect
    if (window.location.href.indexOf('https://jcenys.lt/one/KelionesC/sidebarSearch') === -1){
        // ikeliam i session storage
        sessionStorage.setItem('1st_redirect_val', this.id);
        // redirect
        window.location.href = '<?php echo URLROOT ?>KelionesC/sidebarSearch?searchfilter=1&';
    }

    if (sessionStorage.getItem('1st_redirect_val')){
        this.id = sessionStorage.getItem('1st_redirect_val');
    }

    const tipai       = ['Pazintine', 'Kruizas', 'Poilsine'];
    const transportas = ['Lektuvu', 'Laivu', 'Autobusu'];
    const DateDiff    = ['0-4', '5-9', '10-100'];
    const kaina       = ['0-300', '301-700', '701-10000'];
    let valstybesObj   = <?php echo json_encode($destinations2); ?>;
    const valstybes = Object.keys(valstybesObj);
    // add all together
    let visi = tipai.concat(tipai, transportas, DateDiff, kaina, valstybes);

    // Konstruojam pp
    // Tipas
    if (tipai.includes(this.id)){
        // jeigu jau yra - isemam
        if (pp.KelionesTipas.includes(this.id) ){
            pp.KelionesTipas.pop();
        // jeigu ne tas pats idedam(tik vienas pasirinkimas gali but, todel isemam paskutiny jeigu kitas yra)
        } else if (pp.KelionesTipas.length != 0){
            pp.KelionesTipas.pop();
            pp.KelionesTipas.push(this.id)
        } else {
            pp.KelionesTipas.push(this.id);
        }
    // Transportas
    } else if (transportas.includes(this.id)) {
        if (pp.TransportoTipas.includes(this.id) ){
            pp.TransportoTipas.pop();
        // jeigu ne tas pats idedam(tik vienas pasirinkimas gali but, todel isemam paskutiny jeigu kitas yra)
    } else if (pp.TransportoTipas.length != 0){
            pp.TransportoTipas.pop();
            pp.TransportoTipas.push(this.id)
        } else {
            pp.TransportoTipas.push(this.id);
        }
    // DateDiff
    } else if (DateDiff.includes(this.id)) {
        if (pp.DateDiff.includes(this.id)){
            pp.DateDiff.splice(pp.DateDiff.indexOf(this.id), 1);
        } else {
            pp.DateDiff.push(this.id);
        }
    // Kaina
    } else if (kaina.includes(this.id)) {
        if (pp.Kaina.includes(this.id)){
            pp.Kaina.splice(pp.Kaina.indexOf(this.id), 1);
        } else {
            pp.Kaina.push(this.id);
        }
    // Valstybe
    } else if (valstybes.includes(this.id)) {
        if (pp.Valstybe.includes(this.id)){
            pp.Valstybe.splice(pp.Valstybe.indexOf(this.id), 1);
        } else {
            pp.Valstybe.push(this.id);
        }
    }

    // Nuspalvinam pasirinkimus
    // 1. nuspalvinam visus baltai
    for (var i = 0; i < visi.length; i++) {
        document.getElementById(visi[i]).className = 'row sidebar-inactive';
        //-------------------------------------------------------------------------------
        var list = document.getElementById(visi[i]);   // Get the <ul> element with id="myList"    // Remove <ul>'s first child node (index 0)
        try {
            adddlert("Welcome guest!");
            list.removeChild(list.childNodes[1]);
        }
        catch(err) {
            console.log('child doesnt exist');
            //document.getElementById("demo").innerHTML = err.message;
        }

        //-------------------------------------------------------------------------------

    }
    // 2. tada nuspalvinam pazymetus
    for (key in pp) {
        for (var i = 0; i < pp[key].length; i++) {
            document.getElementById(pp[key][i]).className = 'row sidebar-active';
        }
    }

    //base url
    let baseUrl = '<?php echo URLROOT ?>SidebarSearchC/sidebarSearch?searchfilter=1&';
    let interimUrl = '';
    // Konstruojam linka kur suras keliones pagal parametrus
    for (key in pp){
        if (pp[key].length != 0) {
                interimUrl += key + '=';
            for (var i = 0; i < pp[key].length; i++) {
                if (i !== pp[key].length-1) {
                    interimUrl += pp[key][i] + ',';
                } else {
                    interimUrl += pp[key][i];
                }
            }
            interimUrl += '&';
        }
    }
    interimUrl = interimUrl.slice(0,-1);
    let finalUrl = baseUrl + interimUrl;

    // info
    console.log('final_url: ' + finalUrl);
    // call ajax func
    sidebarAjax(finalUrl);

    // info
    console.log('Last pp: ');
    console.log(pp);
    console.log('end____________________________________________');
} // end of jsSearch
</script>
