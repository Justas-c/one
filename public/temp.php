<div class="row mt-3"> <!-- main row -->

                            <!-- Left sidebar -->
<div class="col-2">
  <?php require_once APPROOT . '/Views/bars/admin/admin_leftsidebar.php'; ?>
</div> <!-- col2 -->

                            <!-- Main Col -->
<div class="col-10">
                    <!-- Title and options button -->
  <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2><?php echo $data['pageTitle']; ?></h2>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" id="optionsDropdown" type="button" data-toggle="dropdown" name="optionsDropdown" aria-expanded="false">Options</button>
        <div class="dropdown-menu dropdown-menu-right" aria-labeledby="optionsDropdown">
          <a class="dropdown-item" href="<?php echo URLROOT . 'admin/adminC/addHolidayForm'; ?>">add Holiday</a>
          <a class="dropdown-item" href="<?php echo URLROOT . 'admin/adminC/addHolidayForm'; ?>">add Holiday</a>
        </div>
      </div>
  </div>










































<div class="form-group col-3">
  <label for="addHolidayFormValstybe">Valstybė:</label>
  <select class="custom-select" name="Valstybe">
      <?php for ($i=0; $i < count(AVAILABLE_COUNTRIES); $i++): ?>  <!-- available_countries defined in Core/init.php -->
         <?php
          if ($data['valstybe'] != AVAILABLE_COUNTRIES[$i]) {
              echo '<option value="' . AVAILABLE_COUNTRIES[$i]. '">' . AVAILABLE_COUNTRIES[$i] . '<options>';
          } else {
              echo '<option value="' . AVAILABLE_COUNTRIES[$i] . '" selected="selected">' . AVAILABLE_COUNTRIES[$i] . '<options>';
          }
          ?>
      <?php endfor; ?>
    <!-- <option value="Lietuva">Lietuva</option>
    <option value="Ispanija">Ispanija</option>
    <option value="Italija">Italija</option>
    <option value="Prancuzija">Prancuzija</option>
    <option value="Anglija">Anglija</option>
    <option value="Vokietija">Meksika</option>
    <option value="Olandija">Olandija</option>
    <option value="Turkija">Turkija</option>
    <option value="Kinija">Kinija</option>
    <option value="Tailandas">Tailandas</option> -->
  </select>


</div>



















































<nav class="navbar navbar-expand-md navbar-light px-0 p-xl-2 justify-content-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#kelioneNavbar" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><span>Pasiūlimų Filtras</span>
  </button>
<div class="collapse navbar-collapse" id="kelioneNavbar">
<!--__________________________________Javascript____________________________ -->
<script>
"user strict";

//------------------------------------test------------------------------------//
/*  returns the sidebar holidays based on the url constructed in jssearch func */
function sidebarHolidays(base_url) {

    let keys = ['Pazintine', 'Poilsine','Kruizas','Egzotine','Lektuvu','Autobusu','Laivu', '0-4','5-9','10-100','0-300','301-700','701-10000'];
    let holiday_nums = {
        Pazintine: 0,
        Poilsine: 0,
        Kruizas: 0,
        Egzotine: 0,
        Lektuvu: 0,
        Autobusu: 0,
        Laivu: 0,
        '0-4': 0,
        '5-9': 0,
        '10-100': 0,
        '0-300': 0,
        '301-700': 0,
        '701-10000': 0
    };

    let xhr = new XMLHttpRequest();
    let method = 'GET';
    xhr.open(method, base_url);
    xhr.send();

    //receiving response from sidebarSearch.php
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.readyState);
            console.log(this.status);
            let response = this.responseText;

            // if error occured
            if (response.includes('error</b>')) {
                // arba padarysim, kad displayintu rekomendauojamas, arba visas is eiles.
                document.getElementById('testsmth1').innerHTML = 'Deja šiuo metu kelionių pagal esamus parametrus neturime';
            // if response comes with <pre> tags
            } else if(response.includes('<pre>')) {
                //console.log(response);

                // remove <pre> tags
                let response_without_pre = response.replace('<pre>', '');
                response_without_pre = response_without_pre.replace('</pre>', '');
                let response_obj_arr = JSON.parse(response_without_pre);

                if (response_obj_arr.length === 0) {
                    document.getElementById('testsmth1').innerHTML = 'Deja šiuo metu kelionių pagal esamus parametrus neturime';
                } else if (response_obj_arr.length > 0) {
                    let t1 = document.getElementById('testsmth1');

                    //Cia sudesim viska i holiday nums array
                    for (var i = 0; i < response_obj_arr.length; i++) {
                        // info
                        console.log('Single:');
                        console.log(response_obj_arr[i]);

                        let kt = response_obj_arr[i].KelionesTipas;
                        let tt = response_obj_arr[i].TransportoTipas;
                        let dd = response_obj_arr[i].DateDiff;
                        let kr = response_obj_arr[i].Valstybe;
                        let kn = response_obj_arr[i].Kaina;

                        //let t  = response_obj_arr[i].DateDiff;
                        //alert(kt);

                        // KelionesTipas & TransportoTipas
                        holiday_nums[kt] += 1;
                        holiday_nums[tt] += 1;
                        // Kaina
                        if (kn < 300) {
                            holiday_nums['0-300']++;
                        } else if (301 < kn  && kn < 700) {
                            holiday_nums['301-700']++;
                        } else {
                            holiday_nums['701-10000']++;
                        }
                        //alert(dd);
                        // Trukme
                        if (dd < 4) {
                            holiday_nums['0-4']++;
                        } else if (dd >= 5 && dd <= 9) {
                            holiday_nums['5-9']++;
                        } else {
                            holiday_nums['10-100']++;
                        }

                        // Kryptis
                    }
                    console.log('nums:');
                    console.log(holiday_nums);
                    console.log('AHA!:');
                    console.log(response_obj_arr);
                    // dbr pridet kazkaip reikia
                    //----------------------------------------------------------
                    console.log('LOOP elements: ');
                    console.log(holiday_nums);
                    //Object.keys(obj).length
                    for (var i = 0; i < keys.length; i++) {
                        //alert('hello');
                         //let element = document.getElementById('hnumsPazintine');
                         let element = document.getElementById('hnums' + keys[i]);
                         console.log(element);
                         let k = keys[i];
                         // alert(k);
                         // alert(holiday_nums[k]);
                         //alert(k);
                         element.innerHTML = holiday_nums[k];
                         //element.innerHTML = holiday_nums.keys[k];
                         //element.innerHTML = 'Test123';
                         //alert(k);
                    }
                    //----------------------------------------------------------

                    // reset holiday nums counter:

                    // adds all found holidays to div
                    addAllHolidays(response_obj_arr, document.getElementById('testsmth1'));
                }
            }
        }
    }// /onreadystatechange
    document.getElementById('testsmth1').innerHTML = '';
} // /sidebarHolidays
//------------------------------------test------------------------------------//

function jsSearch(selection = '') {
    // if 1st redirect
    if (window.location.href.indexOf('http://localhost/one/test/test') === -1){
        console.log('first redirect');
        select = selection.split('=');

        let obj3 = {[select[0]] : [select[1]]}
        let arr = [obj3];

        // ikeliam i session storage
        sessionStorage.setItem('PaieskosParams', JSON.stringify(arr));
        // need to get the element that was clicked and changed class
        sessionStorage.setItem('1st_redirect_id', select[1]);
        sessionStorage.setItem('1st_redirect_key', select[0]);
        // redirect
        window.location.href = "http://localhost/one/test/test?searchfilter=1&" + select[0] + '=' + select[1];
    // if no redirect made
    } else {
        // ppa - Paieskos Parametru array of objects
        ppa = JSON.parse(sessionStorage.getItem('PaieskosParams'));
        select = selection.split('=');

    let flag2 = false;
    let flag2i = 0;

      // Tracks current selection index in ppa (i.e. select[0](Kaina) index = 2)
     ppa.forEach(function (currentValue, index){
         if (currentValue.hasOwnProperty('KelionesTipas') && select[0] == 'KelionesTipas'){
             flag2  = true;
             flag2i = index;
         } else if (currentValue.hasOwnProperty('TransportoTipas') && select[0] == 'TransportoTipas'){
             flag2  = true;
             flag2i = index;
         } else if(currentValue.hasOwnProperty('Kaina') && select[0] == 'Kaina') {
             flag2  = true;
             flag2i = index;
         } else if(currentValue.hasOwnProperty('Valstybe') && select[0] == 'Valstybe') {
             flag2  = true;
             flag2i = index;
         } else if(currentValue.hasOwnProperty('DateDiff') && select[0] == 'DateDiff') {
             flag2  = true;
             flag2i = index;
         }
    });

    // idedam/isemam Kaina
    if (flag2 == true && select[0] == 'Kaina') {
        if (ppa[flag2i].Kaina.indexOf(select[1]) == -1) {
            ppa[flag2i].Kaina.push(select[1])
        } else if (ppa[flag2i].Kaina.indexOf(select[1]) != -1) {
            ppa[flag2i].Kaina.splice(ppa[flag2i].Kaina.indexOf(select[1]), 1);
        }
        ppa[flag2i].Kaina.sort();
    // idedam/isemam Kryptis
} else if (flag2 == true && select[0] == 'Valstybe') {
        if (ppa[flag2i].Valstybe.indexOf(select[1]) == -1) {
            ppa[flag2i].Valstybe.push(select[1])
        } else if (ppa[flag2i].Valstybe.indexOf(select[1]) != -1) {
            ppa[flag2i].Valstybe.splice(ppa[flag2i].Valstybe.indexOf(select[1]), 1);
        }

    // date
    } else if (flag2 == true && select[0] == 'DateDiff') {
        if (ppa[flag2i].DateDiff.indexOf(select[1]) == -1) {
            ppa[flag2i].DateDiff.push(select[1])
        } else if (ppa[flag2i].DateDiff.indexOf(select[1]) != -1) {
            ppa[flag2i].DateDiff.splice(ppa[flag2i].DateDiff.indexOf(select[1]), 1);
        }
        ppa[flag2i].DateDiff.sort();
    // idedam/isemam TransportoTipas
    } else if (flag2 == true && select[0] == 'TransportoTipas') {
        if (ppa[flag2i].TransportoTipas == select[1]) {
            // the same, remove
            ppa[flag2i].TransportoTipas.splice(ppa[flag2i].TransportoTipas.indexOf(select[1]), 1);
        } else {
            // not the same, replace
            ppa[flag2i].TransportoTipas.splice(ppa[flag2i].TransportoTipas.indexOf(select[1]), 1);
            ppa[flag2i].TransportoTipas.push(select[1])
        }
    // idedam/isemam KelTipas
} else if (flag2 == true && select[0] == 'KelionesTipas') {
        if (ppa[flag2i].KelionesTipas == select[1]) {
            // the same, remove
            ppa[flag2i].KelionesTipas.splice(ppa[flag2i].KelionesTipas.indexOf(select[1]), 1);
        } else {
            // not the same, replaceKelTipas
            ppa[flag2i].KelionesTipas.splice(ppa[flag2i].KelionesTipas.indexOf(select[1]), 1);
            ppa[flag2i].KelionesTipas.push(select[1])
        }
    } else {
        ppa.push({[select[0]]: [select[1]]});
    }

//updeitinam session storage:
sessionStorage.setItem('PaieskosParams', JSON.stringify(ppa));

/* url sukonstruojam pagal PaieskosParams  */
let base_url = 'http://localhost/one/SidebarSearchC/sidebarSearch?serachfilter=1&';

console.log('TESTING:');
for (i=0; i < ppa.length; i++ ) {
    //console.log(ppa[i]);
    for (key in ppa[i]) {
        //console.log(ppa[i][key]);
        base_url += key + '=';
        for (value in ppa[i][key]) {
            console.log('value: ' + ppa[i][key][value]);
            if (value == 0 ) {
                base_url += ppa[i][key][value];
            } else {
                base_url += ',' + ppa[i][key][value];
            }
        }
        base_url += '&';
    }
}
        // info
        console.log('last base_url:');
        console.log(base_url);
        console.log('paskutinis ppa:');
        console.log(ppa);
        console.log('end____________________________________________');

        //sidebar holidays call
        sidebarHolidays(base_url);

                                // Ajax call (dar galima padaryt, kad jssearch url pagamintu ir pagal url ajax call daryt)
        // let xhr = new XMLHttpRequest();
        // let method = 'GET';
        // xhr.open(method, base_url);
        // xhr.send();
        //
        // //receiving response from sidebarSearch.php
        // xhr.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         console.log(this.readyState);
        //         console.log(this.status);
        //         let response = this.responseText;
        //
        //         // if error occured
        //         if (response.includes('error</b>')) {
        //             // arba padarysim, kad displayintu rekomendauojamas, arba visas is eiles.
        //             document.getElementById('testsmth1').innerHTML = 'Deja šiuo metu kelionių pagal esamus parametrus neturime';
        //         // if response comes with <pre> tags
        //         } else if(response.includes('<pre>')) {
        //             //console.log(response);
        //
        //             // remove <pre> tags
        //             let response_without_pre = response.replace('<pre>', '');
        //             response_without_pre = response_without_pre.replace('</pre>', '');
        //             let response_obj_arr = JSON.parse(response_without_pre);
        //
        //             if (response_obj_arr.length === 0) {
        //                 document.getElementById('testsmth1').innerHTML = 'Deja šiuo metu kelionių pagal esamus parametrus neturime';
        //             } else if (response_obj_arr.length > 0) {
        //                 let t1 = document.getElementById('testsmth1');
        //
        //                 //info
        //                 for (var i = 0; i < response_obj_arr.length; i++) {
        //                     console.log(response_obj_arr[i]);
        //                 }
        //                 console.log('AHA!:');
        //                 console.log(response_obj_arr);
        //
        //                 // adds all found holidays to div
        //                 addAllHolidays(response_obj_arr, document.getElementById('testsmth1'));
        //             }
        //         }
        //     }
        // }// /onreadystatechange
        // document.getElementById('testsmth1').innerHTML = '';

        } // end of else
} //end of jsSearch function

function addAllHolidays(holidays, keliones_div) {
    for (var i = 0; i < holidays.length; i++) {
        let img    = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '"><img src="<?php echo URLROOT ?>public/images/keliones/Visos/' + holidays[i].MainImage + '" alt="cia turetu but grazus img, bet programuotojas susivele :(" width="100%" ></a>';
        let pavadinimas  = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '">' + holidays[i].Pavadinimas + '</a>';
        let title  = '<a href="<?php echo URLROOT ?>/kelioneC/kelione?id=' + holidays[i].id + '">' +  holidays[i].Title  + '</a>';
        let button = 'button';

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

        console.log('sessionStorage:');
        console.log(sessionStorage);

        // clear
        // function cs1 () { localStorage.clear(); }
        // function cs2 () { sessionStorage.clear(); }

</script>


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
      <div class="row sidebar-inactive" id="Pazintine" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('KelionesTipas=Pazintine')" id="KelionesTipas1">Pažintinės
            (<span id="hnumsPazintine"><?php
                    if (!isset($_GET['searchfilter'])) {echo $data['sidebarNums']['KelionesTipas_Pazintine'];
                    }
                ?></span>)
        </a>
      </div>
      <div class="row sidebar-inactive" id="Kruizas" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('KelionesTipas=Kruizas')" id="KelionesTipas2">Kruizai
          (<span id="hnumsKruizas"><?php
            if (!isset($_GET['searchfilter'])) {
                echo $data['sidebarNums']['KelionesTipas_Kruizas'];
            }?></span>)
        </a>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Poilsine" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('KelionesTipas=Poilsine')">Poilsinės
          (<span id="hnumsPoilsine"><?php
                if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KelionesTipas_Poilsine'];
                } elseif (isset($_GET['searchfilter'])){

                }
            ?></span>)
        </a>
      </div>
      <div class="row sidebar-inactive" id="Egzotine" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('KelionesTipas=Egzotine')">Egzotinė
          (<span id="hnumsEgzotine"><?php
              if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KelionesTipas_Egzotine']; }
            ?></span>)
        </a>
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
      <div class="row sidebar-inactive" id="Lektuvu" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('TransportoTipas=Lektuvu')">Lėktuvu
          (<span id="hnumsLektuvu"><?php
                if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Lektuvu']; }
            ?></span>)
        </a>
      </div>
      <div class="row sidebar-inactive" id="Laivu" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('TransportoTipas=Laivu')">Laivu
          (<span id="hnumsLaivu"><?php
                if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Kruizine']; }
            ?></span>)
        </a>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="Autobusu" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('TransportoTipas=Autobusu')">Autobusu
          (<span id="hnumsAutobusu"><?php
                if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Transportas_Autobusu']; }
             ?></span>)
        </a>
      </div>
  </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

                                <!-- 3(Trukme) -->

<div class="row"><div class="col"><div class="sidebar-icons">
      <div class="sidebar-h1 py-xs-1 py-md-3"><i class="material-icons">access_time</i>Trukmė</div>
</div></div></div>

<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="0-4" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('DateDiff=0-4')">iki 5 dienų
          (<span id="hnums0-4">
            <?php  if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Trukme_iki5dienu'];}?>
          </span>)
        </a>
        </div>
      <div class="row sidebar-inactive" id="10-100" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('DateDiff=10-100')">nuo 10 dienų
            (<span id="hnums10-100"><?php
            if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Trukme_nuo5iki10dienu'];}
            ?><span>)
        </a>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
     <div class="row sidebar-inactive" id="5-9" onclick="toggle_sidebar(this)">
       <a href="javascript:;" onclick="jsSearch('DateDiff=5-9')">5-9 dienos
        (<span id="hnums5-9"><?php
               if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['Trukme_nuo10dienu']; }
        ?></span>)
       </a>
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
      <!-- <div class="row sidebar-inactive" id="0-100" onclick="toggle_sidebar(this)"><a href="javascript:;" onclick="jsSearch('Kaina=0-100')">iki € 100 (<?php  echo $data['sidebarNums']['KainaAsmeniui_iki100e']; ?>)</a></div> -->
      <div class="row sidebar-inactive" id="0-300" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('Kaina=0-300');">iki €300
            (<span id="hnums0-300"><?php
                if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo0iki300e']; }
            ?></span>)
        </a>
      </div>
      <div class="row sidebar-inactive" id="701-10000" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('Kaina=701-10000');">nuo € 701
            (<span id="hnums701-10000"><?php
            if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo701iki10000'];}
            ?></span>)
        </a>
      </div>
    </div> <!-- col -->
    <div class="col-6 my-2">
      <div class="row sidebar-inactive" id="301-700" onclick="toggle_sidebar(this)">
        <a href="javascript:;" onclick="jsSearch('Kaina=301-700');">€ 301-700
          (<span id="hnums301-700"><?php
              if (!isset($_GET['searchfilter'])) { echo $data['sidebarNums']['KainaAsmeniui_nuo301iki700e'];}
          ?></span>)
        </a>
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
$destinations_count = count($destinations);
$destinations = array_chunk($destinations, floor($destinations_count / 2), $preserve_keys = TRUE);
?>

<!-- Get available countries html -->
<div class="sidebar-meniu">
  <div class="row ml-2">
    <div class="col-6 my-2">
    <?php
        foreach ($destinations[0] as $key => $value) {
            //echo $value;
            //echo $key;
            //die('value above');
            //echo '<div class="row"><a href="#">' . $key . '(' . $value . ')' .  '</a></div>';
                  //<div class="row sidebar-inactive" id="701-10000" onclick="toggle_sidebar(this)">
            echo '<div class="row sidebar-inactive" id="' . $key . '" onclick="toggle_sidebar(this)"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key .  '</a></div>';
            //echo '<div class="row"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key . '(' . $value . ')' .  '</a></div>';
        }
        // supaprastint reiketu
        if (isset($destinations[2])){
            foreach ($destinations[2] as $key => $value) {
                echo '<div class="row sidebar-inactive" id="' . $key . '" onclick="toggle_sidebar(this)"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key .  '</a></div>';
                //echo '<div class="row"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key . '(' . $value . ')' .  '</a></div>';
            }
        }
    ?>
    </div>
    <div class="col-6 my-2">
    <?php  foreach ($destinations[1] as $key => $value) {
               //echo '<div class="row"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key . '(' . $value . ')' .  '</a></div>';
               echo '<div class="row sidebar-inactive" id="' . $key . '" onclick="toggle_sidebar(this)"><a href="javascript:;" onclick="jsSearch(\'Valstybe=' . $key . '\')"   >' . $key .  '</a></div>';
        }  ?>
    </div>
  </div> <!-- row -->
</div> <!-- sidebar-meniu -->

</div> <!-- /kelione -->

</div> <!-- collapse navbar supported content -->
</nav>

<script>
"use strict"
// icon
// let cancel_icon = document.createElement('i');
// cancel_icon.textContent = 'cancel';
// cancel_icon.className = 'material-icons';
// cancel_icon.style.fontSize = '18px';
// cancel_icon.style.color = '#41c0f0';

// vars for toggle sidebar & if 1st_redirect
let atzymeti_tipas_ids = [];
let atzymeti_transportas_ids = [];
let tipas_to_check = ['Poilsine', 'Pazintine', 'Egzotine', 'Kruizas', 'Zygiai'];
let transportas_to_check = ['Lektuvu', 'Laivu', 'Autobusu'];

/* hightlights/unhightlights selected options */
function toggle_sidebar(elem) {

    // info
    console.log('atzymeti_tipas_ids:');
    console.log(atzymeti_tipas_ids);
    console.log('atzymeti_transportas_ids:');
    console.log(atzymeti_transportas_ids);
    console.log('ELEMENTAS SU KURIUO ZAISIM:');
    console.log(elem);

    // if active current element class
    if (elem.className == 'row sidebar-inactive') {
        console.log('ELEM(add):');
        console.log(elem);
        elem.className = 'row sidebar-active';

        if (tipas_to_check.includes(elem.id) && !atzymeti_tipas_ids.includes(elem.id)) {
            atzymeti_tipas_ids.push(elem.id);
        } else if (transportas_to_check.includes(elem.id) && !atzymeti_transportas_ids.includes(elem.id)) {
            atzymeti_transportas_ids.push(elem.id);
        }

        if (atzymeti_tipas_ids.length === 2) {
            let elem_remove_class = document.getElementById(atzymeti_tipas_ids[0]);
            elem_remove_class.className = 'row sidebar-inactive';
            atzymeti_tipas_ids.shift();
        } else if (atzymeti_transportas_ids.length === 2) {
            let elem_remove_class = document.getElementById(atzymeti_transportas_ids[0]);
            elem_remove_class.className = 'row sidebar-inactive';
            atzymeti_transportas_ids.shift();
        }
    // if inactive current element class
    } else if (elem.className == 'row sidebar-active') {
        console.log('ELEM(remove):');
        console.log(elem);
        //let child = elem.getElementsByTagName('i')[0];
        //elem.removeChild(child);
        elem.className = 'row sidebar-inactive';
    }
}

// if 1st redirect was made
if (sessionStorage.getItem('1st_redirect_id')){
    let id = sessionStorage.getItem('1st_redirect_id');
    let add_class = document.getElementById(id);
    add_class.className = 'row sidebar-active';

    if (tipas_to_check.includes(id)){
        atzymeti_tipas_ids.push(id);
    } else if (transportas_to_check.includes(id)) {
        atzymeti_transportas_ids.push(id);
    } else {
        add_class.className = 'row sidebar-active';
    }

    //holiday nums
    let url1 = '<?php echo URLROOT . 'SidebarSearchC/sidebarSearch?searchfiler=1&'; ?>';
    let url = url1 + sessionStorage.getItem('1st_redirect_key') + '=' + sessionStorage.getItem('1st_redirect_id');
    sidebarHolidays(url);


    // info
    console.log('atzymeti_tipas_ids111:');
    console.log(atzymeti_tipas_ids);
    console.log('atzymeti_transportas_ids111:');
    console.log(atzymeti_transportas_ids);
    console.log('sessionStorage:');
    console.log('sessionStorage');
    sessionStorage.removeItem("1st_redirect_id");
}
</script>
