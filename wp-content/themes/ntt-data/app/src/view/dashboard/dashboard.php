<!DOCTYPE html>
<html lang="pt_br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard NTT Data</title>
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/dashboard.css">
   </script>

</head>

<body>
   <div id="body">
   <div class="total">
      <table id="totalCountry">
         <thead>
         <tr class="name"><th><h3><?=_t['dashboard_general_report']?></h3></th></tr>
         <tr>
            <th><?=_t['dashboard_registrations']?></th>
            <td><?= $generalData['register'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_registrations_engaged']?></th>
            <td><?= $generalData['registerEngaged'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_total_registrations']?></th>
            <td><?= $generalData['totalPeople'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_proportion_registrations']?></th>
            <td><?= $generalData['proportionTotal'] ?>%</td>
         </tr>
         <tr>
            <th><?=_t['dashboard_guest']?></th>
            <td><?= $generalData['guest'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_guest']?></th>
            <td><?= $generalData['points'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_pub']?></th>
            <td><?= $generalData['pub'] ?></td>
         </tr>
         <tr>
            <th><?=_t['dashboard_comment']?></th>
            <td><?= $generalData['comment'] ?></td>
         </tr>
         <tr class="engagament">
                  <td><?=_t['dashboard_obs_engaged']?></td>
               </tr>
         </thead>
      </table>
      <!-- <button href="#" onclick="javascript: tableToExcel('body', 'Minha tabela')" title="Exportar para Excel">Exportar Tudo</button> -->

   </div>
   

 
   <div class="countries">

      <?php foreach ($dataCountries as $key => $country) :; ?>
         <table id="country-<?= $key ?>" class="country">
            <thead>

               <tr class="name">
                 
                  <th><h3><?= $key ?></h3></th>
               </tr>
               <tr class="registeredUser">
                  <th><?=_t['dashboard_registrations']?></th>
                  <td> <?= $country['people'] ?></td>
               </tr>
               <tr class="registeredUser">
                  <th><?=_t['dashboard_registrations_engaged']?></th>
                  <td> <?= $country['peopleEngaged'] ?></td>
               </tr>
               <tr class="registeredUser">
                  <th><?=_t['dashboard_total_registrations']?></th>
                  <td> <?= $country['totalPeople'] ?></td>
               </tr>
               <tr class="registeredUser">
                  <th><?=_t['dashboard_proportion_registrations']?></th>
                  <td> <?= $country['proportion'] ?>%</td>
               </tr>
               <tr class="points">
                  <th><?=_t['dashboard_points_country']?></th>
                  <td> <?= $country['score'] ?></td>
               </tr>
               <tr class="pub">
                  <th><?=_t['dashboard_pub']?></th>
                  <td> <?= $country['pub'] ?></td>
               </tr>
               <tr class="comment">
                  <th><?=_t['dashboard_comment']?></th>
                  <td> <?= $country['comment'] ?></td>
               </tr>
               <tr class="engagament">
                  <th><?=_t['dashboard_engagament']?></th>
                  <td> <?= $country['percent'] ?>%</td>
               </tr>
      
               </thead>

               <tbody class="rank">
                  <tr>
                     <th>
                        <h2><?=_t['dashboard_top_ten']?></h2>
                     </th>
                  </tr>

                  <?php $indice = 1; ?>
                  <?php foreach ($country['top10'] as $keyPerson => $person) :; ?>
                     <tr>
                        
                           <td id="lineName"><span><?= $indice++; ?> - </span><?= $person['full_name']; ?></td>

                           <td><?=_t['dashboard_points']?> <?= $person['score']; ?></td>
                        
                     </tr>
                  <?php endforeach; ?>
               </tbody>
               
            </div>
   <tfoot>
      <?php 
      date_default_timezone_set('America/Sao_Paulo');
      $currentDate = date('Y-m-d');
      $fileNameExport = 'webapp-nttdata-'. $key .'-'.$currentDate;
      ?>
      <!-- <tr><td><button href="#" onclick="tableToExcel('country-<?= $key ?>', '<?= $fileNameExport ?>')" title="country-<?= $key ?>">Exportar <?= $key ?></button></td></tr> -->
   </tfoot>



   </table>
<?php endforeach; ?>
</div>
</div>
<?php 

$user = ($_SESSION && $_SESSION['user']) ? unserialize($_SESSION['user']) : null;

if (isset($user)) {
   $lang = $user->language; 
}else{
   $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}
echo "<script>const lang = '$lang';</script>";

?>
<script>

      let countryNames = document.querySelectorAll('.countries .name h3')
      countryNames.forEach((country)=>{
         console.log(country.innerHTML);
         switch (lang) {
            case 'es':
               if(country.innerHTML == 'equador') country.innerHTML = 'Ecuador'
              break;
            case 'en':
               if(country.innerHTML == 'brasil') country.innerHTML = 'Brazil'
               if(country.innerHTML == 'equador') country.innerHTML = 'Ecuador'
               if(country.innerHTML == 'estados unidos') country.innerHTML = 'United States.'
             
              break;
            default:
              break;
          }
      })
      //export to excel
      var tableToExcel = (function() {
         var uri = 'data:application/vnd.ms-excel;base64,',
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
            base64 = function(s) {
               return window.btoa(unescape(encodeURIComponent(s)))
            },
            format = function(s, c) {
               return s.replace(/{(\w+)}/g, function(m, p) {
                  return c[p];
               })
            }

         return function(table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            const newTable =  table.cloneNode(true)
            const buttons =  newTable.querySelectorAll('button')
            buttons.forEach(btn => {
               btn.parentNode.removeChild(btn);
            });
 
            var ctx = {
               worksheet: name || 'webapp',
               table: newTable.innerHTML
            }
            window.location.href = uri + base64(format(template, ctx))
         }
      })()


   </script>
</body>

</html>