<?php
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
?>

	<div class="content-area blank-section">
	
	
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['orgchart']}]}"></script>
<div id="chart_div"></div>
<script>
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');

    data.addRows([
[{v:'1',f:'Dyrektor Naczelny'},'','Dyrektor Naczelny'],
[{v:'2',f:'Rada Społeczna'},'','Rada Społeczna'],
[{v:'3',f:'Z-ca Dyr. ds. Lecznictwa'},'1','Z-ca Dyr. ds. Lecznictwa'],
[{v:'4',f:'Lecznictwo Szpitalne'},'3','Lecznictwo Szpitalne'],
[{v:'5',f:'Szpital im L. Perzyny ul. Poznańska 79'},'4','Szpital im L. Perzyny ul. Poznańska 79'],
[{v:'6',f:'Apteka'},'5','Apteka'],
[{v:'7',f:'Blok Operacyjny i Centralna Sterylizatornia'},'5','Blok Operacyjny i Centralna Sterylizatornia'],
[{v:'8',f:'Oddziały'},'5','Oddziały'],
[{v:'9',f:'Oddział Anestezjologii i Intensywnej Terapii'},'8','Oddział Anestezjologii i Intensywnej Terapii'],
[{v:'10',f:'Oddział Chirurgii Dziecięcej'},'8','Oddział Chirurgii Dziecięcej'],
[{v:'11',f:'Oddział Chirurgii Ogólnej i Naczyniowej'},'8','Oddział Chirurgii Ogólnej i Naczyniowej'],
[{v:'12',f:'Oddział Chirurgii Ogólnej i Przewodu Pokarmowego'},'8','Oddział Chirurgii Ogólnej i Przewodu Pokarmowego'],
[{v:'13',f:'Oddział Chirurgii Szczękowo- Twarzowej'},'8','Oddział Chirurgii Szczękowo- Twarzowej'],
[{v:'14',f:'Oddział Chorób Dziecięcych'},'8','Oddział Chorób Dziecięcych'],
[{v:'15',f:'Oddział Chorób Wewnętrznych I i Gastroenterologii'},'8','Oddział Chorób Wewnętrznych I i Gastroenterologii'],
[{v:'16',f:'Oddział Chorób Wewnętrznych II'},'8','Oddział Chorób Wewnętrznych II'],
[{v:'17',f:'Oddział Gastroenterologii Dziecięcej'},'8','Oddział Gastroenterologii Dziecięcej'],
[{v:'18',f:'Oddział Kardiologiczny'},'8','Oddział Kardiologiczny'],
[{v:'19',f:'Pododdział Rehabilitacji Kardiologicznej'},'18','Pododdział Rehabilitacji Kardiologicznej'],
[{v:'20',f:'Pododdział Intensywnego Nadzoru Kardiologicznego'},'18','Pododdział Intensywnego Nadzoru Kardiologicznego'],
[{v:'21',f:'Oddział Nefrologiczny'},'8','Oddział Nefrologiczny'],
[{v:'22',f:'Oddział Neurochirurgiczny'},'8','Oddział Neurochirurgiczny'],
[{v:'23',f:'Oddział Neurologiczny'},'8','Oddział Neurologiczny'],
[{v:'24',f:'Pododdział Udarowy'},'23','Pododdział Udarowy'],
[{v:'25',f:'Oddział Okulistyczny'},'8','Oddział Okulistyczny'],
[{v:'26',f:'Oddział Otolaryngologiczny'},'8','Oddział Otolaryngologiczny'],
[{v:'27',f:'Oddział Rehabilitacyjny'},'8','Oddział Rehabilitacyjny'],
[{v:'28',f:'Pododdział Rehabilitacji Neurologicznej'},'27','Pododdział Rehabilitacji Neurologicznej'],
[{v:'29',f:'Oddział Reumatologiczny'},'8','Oddział Reumatologiczny'],
[{v:'30',f:'Oddział Urazowo-Ortopedyczny'},'8','Oddział Urazowo-Ortopedyczny'],
[{v:'31',f:'Oddział Urologiczny'},'8','Oddział Urologiczny'],
[{v:'32',f:'Szpitalny Oddział Ratunkowy'},'8','Szpitalny Oddział Ratunkowy'],
[{v:'33',f:'Szpital im Przemysława II ul. Toruńska 7'},'4','Szpital im Przemysława II ul. Toruńska 7'],
[{v:'34',f:'Blok Operacyjny'},'33','Blok Operacyjny'],
[{v:'35',f:'Oddział Obserwacyjno-Zakaźny'},'33','Oddział Obserwacyjno-Zakaźny'],
[{v:'36',f:'Oddział Patologii i Intensywnej Terapii Noworodka'},'33','Oddział Patologii i Intensywnej Terapii Noworodka'],
[{v:'37',f:'Oddział Położniczo- Ginekologiczny'},'33','Oddział Położniczo- Ginekologiczny'],
[{v:'38',f:'Oddział Psychiatryczny'},'33','Oddział Psychiatryczny'],
[{v:'39',f:'Pododdział Anestezjologii Z Salą Intensywnego Nadzoru'},'33','Pododdział Anestezjologii Z Salą Intensywnego Nadzoru'],
[{v:'40',f:'Działalność Specjalistyczna'},'3','Działalność Specjalistyczna'],
[{v:'41',f:'Zespół Poradni Specjalistycznych'},'40','Zespół Poradni Specjalistycznych'],
[{v:'42',f:'Poradnia Audiologiczna'},'41','Poradnia Audiologiczna'],
[{v:'43',f:'Poradnia Chirurgiczna Chorób Naczyń'},'41','Poradnia Chirurgiczna Chorób Naczyń'],
[{v:'44',f:'Poradnia Chirurgiczna Ogólna'},'41','Poradnia Chirurgiczna Ogólna'],
[{v:'45',f:'Poradnia Chirurgii Dziecięcej'},'41','Poradnia Chirurgii Dziecięcej'],
[{v:'46',f:'Poradnia Chirurgii Ręki'},'41','Poradnia Chirurgii Ręki'],
[{v:'47',f:'Poradnia Chirurgii Szczękowo-Twarzowej'},'41','Poradnia Chirurgii Szczękowo-Twarzowej'],
[{v:'48',f:'Poradnia Chorób Metabolicznych'},'41','Poradnia Chorób Metabolicznych'],
[{v:'49',f:'Poradnia Chorób Odzwierzęcych i Pasożytniczych'},'41','Poradnia Chorób Odzwierzęcych i Pasożytniczych'],
[{v:'50',f:'Poradnia Chorób Wątroby'},'41','Poradnia Chorób Wątroby'],
[{v:'51',f:'Poradnia Chorób Zakaźnych'},'41','Poradnia Chorób Zakaźnych'],
[{v:'52',f:'Poradnia Chorób Zakaźnych Dla Dzieci'},'41','Poradnia Chorób Zakaźnych Dla Dzieci'],
[{v:'53',f:'Poradnia Dermatologiczna'},'41','Poradnia Dermatologiczna'],
[{v:'54',f:'Poradnia Diabetologiczna'},'41','Poradnia Diabetologiczna'],
[{v:'55',f:'Poradnia Diabetologiczna Dla Dzieci'},'41','Poradnia Diabetologiczna Dla Dzieci'],
[{v:'56',f:'Poradnia Endokrynologiczna Dla Dzieci'},'41','Poradnia Endokrynologiczna Dla Dzieci'],
[{v:'57',f:'Poradnia Foniatryczna'},'41','Poradnia Foniatryczna'],
[{v:'58',f:'Poradnia Gastroenterologiczna'},'41','Poradnia Gastroenterologiczna'],
[{v:'59',f:'Poradnia Gastroenterologii Dziecięcej'},'41','Poradnia Gastroenterologii Dziecięcej'],
[{v:'60',f:'Poradnia Ginekologiczna Konsultacyjna'},'41','Poradnia Ginekologiczna Konsultacyjna'],
[{v:'61',f:'Poradnia Hemat.-Onkologiczna Dla Dzieci'},'41','Poradnia Hemat.-Onkologiczna Dla Dzieci'],
[{v:'62',f:'Poradnia Hematologiczna'},'41','Poradnia Hematologiczna'],
[{v:'63',f:'Poradnia Kardiologiczna'},'41','Poradnia Kardiologiczna'],
[{v:'64',f:'Poradnia Kardiologiczna Dla Dzieci'},'41','Poradnia Kardiologiczna Dla Dzieci'],
[{v:'65',f:'Poradnia Logopedyczna'},'41','Poradnia Logopedyczna'],
[{v:'66',f:'Poradnia Logopedyczna Dla Dzieci'},'41','Poradnia Logopedyczna Dla Dzieci'],
[{v:'67',f:'Poradnia Nefrologiczna'},'41','Poradnia Nefrologiczna'],
[{v:'68',f:'Poradnia Nefrologiczna Dla Dzieci'},'41','Poradnia Nefrologiczna Dla Dzieci'],
[{v:'69',f:'Poradnia Neurochirurgiczna'},'41','Poradnia Neurochirurgiczna'],
[{v:'70',f:'Poradnia Neurologiczna'},'41','Poradnia Neurologiczna'],
[{v:'71',f:'Poradnia Neurologiczna Dla Dzieci'},'41','Poradnia Neurologiczna Dla Dzieci'],
[{v:'72',f:'Poradnia Neurologiczna Z Poradnią Przeciwpadaczkową'},'41','Poradnia Neurologiczna Z Poradnią Przeciwpadaczkową'],
[{v:'73',f:'Poradnia Oceny Rozwoju Małego Dziecka'},'41','Poradnia Oceny Rozwoju Małego Dziecka'],
[{v:'74',f:'Poradnia Okulistyczna Z Laseroterapią'},'41','Poradnia Okulistyczna Z Laseroterapią'],
[{v:'75',f:'Poradnia Otolaryngologiczna'},'41','Poradnia Otolaryngologiczna'],
[{v:'76',f:'Poradnia Preluksacyjna'},'41','Poradnia Preluksacyjna'],
[{v:'77',f:'Poradnia Psychiatryczna'},'41','Poradnia Psychiatryczna'],
[{v:'78',f:'Poradnia Rehabilitacyjna'},'41','Poradnia Rehabilitacyjna'],
[{v:'79',f:'Poradnia Reumatologiczna'},'41','Poradnia Reumatologiczna'],
[{v:'80',f:'Poradnia Reumatologii Dziecięcej'},'41','Poradnia Reumatologii Dziecięcej'],
[{v:'81',f:'Poradnia Sportowo-Lekarska'},'41','Poradnia Sportowo-Lekarska'],
[{v:'82',f:'Poradnia Urazowo-Ortopedyczna'},'41','Poradnia Urazowo-Ortopedyczna'],
[{v:'83',f:'Poradnia Urologiczna'},'41','Poradnia Urologiczna'],
[{v:'84',f:'Poradnia Wad Postawy'},'41','Poradnia Wad Postawy'],
[{v:'85',f:'Poradnia Wad Wrodzonych Stóp'},'41','Poradnia Wad Wrodzonych Stóp'],
[{v:'86',f:'Poradnia Wirusowego Zapalenia Wątroby'},'41','Poradnia Wirusowego Zapalenia Wątroby'],
[{v:'87',f:'Nocna i Świąteczna Opieka Zdrowotna'},'41','Nocna i Świąteczna Opieka Zdrowotna'],
[{v:'88',f:'Szkoła Rodzenia'},'41','Szkoła Rodzenia'],
[{v:'89',f:'Zespół Pracowni i Zakładów'},'40','Zespół Pracowni i Zakładów'],
[{v:'90',f:'Pracownia Endoskopowa'},'89','Pracownia Endoskopowa'],
[{v:'91',f:'Pracownia Endoskopowa Dla Dzieci'},'89','Pracownia Endoskopowa Dla Dzieci'],
[{v:'92',f:'Pracownia Elektrofizjologii'},'89','Pracownia Elektrofizjologii'],
[{v:'93',f:'Pracownia Hemodynamiki'},'89','Pracownia Hemodynamiki'],
[{v:'94',f:'Pracownia Kontroli Stymulatorów i Kardiowerterów - Stymulatorów Serca'},'89','Pracownia Kontroli Stymulatorów i Kardiowerterów - Stymulatorów Serca'],
[{v:'95',f:'Stacja Dializ Otrzewnowych'},'89','Stacja Dializ Otrzewnowych'],
[{v:'96',f:'Stacja Hemodializ'},'89','Stacja Hemodializ'],
[{v:'97',f:'Zakład Diagnostyki Laboratoryjnej'},'89','Zakład Diagnostyki Laboratoryjnej'],
[{v:'98',f:'Zakład Diagnostyki Obrazowej'},'89','Zakład Diagnostyki Obrazowej'],
[{v:'99',f:'Pracownia Badań Mammograficznych'},'98','Pracownia Badań Mammograficznych'],
[{v:'100',f:'Pracownia Badań Usg'},'98','Pracownia Badań Usg'],
[{v:'101',f:'Pracownia Radiologii Zabiegowej'},'98','Pracownia Radiologii Zabiegowej'],
[{v:'102',f:'Pracownia Rentgenodiagnostyki'},'98','Pracownia Rentgenodiagnostyki'],
[{v:'103',f:'Pracownia Tomografii Komputerowej'},'98','Pracownia Tomografii Komputerowej'],
[{v:'104',f:'Zakład Leczniczego Usprawniania'},'89','Zakład Leczniczego Usprawniania'],
[{v:'105',f:'Zakład Mikrobiologii Klinicznej'},'89','Zakład Mikrobiologii Klinicznej'],
[{v:'106',f:'Zakład Patomorfologii'},'89','Zakład Patomorfologii'],
[{v:'107',f:'Działalność Pozostała'},'3','Działalność Pozostała'],
[{v:'108',f:'Długoterminowa Opieka Domowa'},'107','Długoterminowa Opieka Domowa'],
[{v:'109',f:'Zespół Długoterminowej Opieki Domowej'},'108','Zespół Długoterminowej Opieki Domowej'],
[{v:'110',f:'Rehabilitacja Dzienna'},'107','Rehabilitacja Dzienna'],
[{v:'111',f:'Oddział Rehabilitacji Dziecięcej-Dzienny Pobyt'},'110','Oddział Rehabilitacji Dziecięcej-Dzienny Pobyt'],
[{v:'112',f:'Pogotowie Ratunkowe'},'3','Pogotowie Ratunkowe'],
[{v:'113',f:'Pogotowie Ratunkowe'},'112','Pogotowie Ratunkowe'],
[{v:'114',f:'Kierownik Pogotowia Ratunkowego'},'113','Kierownik Pogotowia Ratunkowego'],
[{v:'115',f:'Pielęgniarka Koordynująca ds. Ratownictwa Medycznego'},'114','Pielęgniarka Koordynująca ds. Ratownictwa Medycznego'],
[{v:'116',f:'Dyspozytornia Medyczna'},'115','Dyspozytornia Medyczna'],
[{v:'117',f:'Wyjazdowy Zespół Sanitarny Typu N'},'115','Wyjazdowy Zespół Sanitarny Typu N'],
[{v:'118',f:'Zespoły Transportu Sanitarnego'},'115','Zespoły Transportu Sanitarnego'],
[{v:'119',f:'Zespół Ratownictwa Medycznego - Podstawowy P3'},'115','Zespół Ratownictwa Medycznego - Podstawowy P3'],
[{v:'120',f:'Zespół Ratownictwa Medycznego - Podstawowy P4'},'115','Zespół Ratownictwa Medycznego - Podstawowy P4'],
[{v:'121',f:'Zespół Ratownictwa Medycznego Podstawowy P1'},'115','Zespół Ratownictwa Medycznego Podstawowy P1'],
[{v:'122',f:'Zespół Ratownictwa Medycznego Podstawowy P2'},'115','Zespół Ratownictwa Medycznego Podstawowy P2'],
[{v:'123',f:'Zespół Ratownictwa Medycznego Specjalistyczny S1'},'115','Zespół Ratownictwa Medycznego Specjalistyczny S1'],
[{v:'124',f:'Zespół Ratownictwa Medycznego Specjalistyczny S2'},'115','Zespół Ratownictwa Medycznego Specjalistyczny S2'],
[{v:'125',f:'Zespół Ratownictwa Medycznego Specjalistyczny S3'},'115','Zespół Ratownictwa Medycznego Specjalistyczny S3'],
[{v:'126',f:'Z-ca Dyr. ds. Pielęgniarstwa'},'1','Z-ca Dyr. ds. Pielęgniarstwa'],
[{v:'127',f:'Pielęgniarka Środowiskowa Przyszpitalna'},'126','Pielęgniarka Środowiskowa Przyszpitalna'],
[{v:'128',f:'Pielęgniarki Epidemiologiczne'},'126','Pielęgniarki Epidemiologiczne'],
[{v:'129',f:'Z-ca Dyr. ds. Ekonomiczno-Administracyjnych'},'1','Z-ca Dyr. ds. Ekonomiczno-Administracyjnych'],
[{v:'130',f:'Główny Księgowy'},'129','Główny Księgowy'],
[{v:'131',f:'Dział Ekonomiczny'},'129','Dział Ekonomiczny'],
[{v:'132',f:'Dział Logistyki'},'129','Dział Logistyki'],
[{v:'133',f:'Dział Zamówień Publicznych'},'129','Dział Zamówień Publicznych'],
[{v:'134',f:'Z-ca Dyr. ds. Eksploatacyjno-Technicznych'},'1','Z-ca Dyr. ds. Eksploatacyjno-Technicznych'],
[{v:'135',f:'Dział Utrzymania Ruchu'},'134','Dział Utrzymania Ruchu'],
[{v:'136',f:'Dział Przeciwpożarowy'},'134','Dział Przeciwpożarowy'],
[{v:'137',f:'Stanowiska podlegające pod dyrektora'},'1','Stanowiska podlegające pod dyrektora'],
[{v:'138',f:'Administrator Bezpieczeństwa Informacji'},'137','Administrator Bezpieczeństwa Informacji'],
[{v:'139',f:'Administrator Systemów Informatycznych'},'137','Administrator Systemów Informatycznych'],
[{v:'140',f:'Dział Audytu Wewnętrznego'},'137','Dział Audytu Wewnętrznego'],
[{v:'141',f:'Dział BHP'},'137','Dział BHP'],
[{v:'142',f:'Dział Controlingu'},'137','Dział Controlingu'],
[{v:'143',f:'Dział Informatyki'},'137','Dział Informatyki'],
[{v:'144',f:'Dział Organizacyjny i Nadzoru'},'137','Dział Organizacyjny i Nadzoru'],
[{v:'145',f:'Dział Prawny'},'137','Dział Prawny'],
[{v:'146',f:'Dział Służb Pracowniczych'},'137','Dział Służb Pracowniczych'],
[{v:'147',f:'Dział Spraw Obronnych'},'137','Dział Spraw Obronnych'],
[{v:'148',f:'Kapelan'},'137','Kapelan'],
[{v:'149',f:'Pełnomocnik Dyr. ds. Ochrony Informacji Niejawnych'},'137','Pełnomocnik Dyr. ds. Ochrony Informacji Niejawnych'],
[{v:'150',f:'Pełnomocnik Dyr. ds. Praw Pacjenta'},'137','Pełnomocnik Dyr. ds. Praw Pacjenta'],
[{v:'151',f:'Pełnomocnik Dyr. ds. Systemu Zarządzania Jakością'},'137','Pełnomocnik Dyr. ds. Systemu Zarządzania Jakością'],
[{v:'152',f:'Pełnomocnik Dyr. ds. Kombatantów i Osób Represjonowanych'},'137','Pełnomocnik Dyr. ds. Kombatantów i Osób Represjonowanych'],
[{v:'153',f:'Rzecznik Prasowy'},'137','Rzecznik Prasowy'],
        
    ]);

    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    chart.draw(data, {
        allowHtml:true,
        allowCollapse:true,
    });
    for (var i = 0; i < data.getNumberOfRows(); i++) {
		chart.collapse(i, true);
		}

  }

  </script>
  

	</div><!-- #primary -->


