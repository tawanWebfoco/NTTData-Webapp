<!DOCTYPE html>
<html lang="pt_br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard NTT Data</title>
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/dashboard.css">
</head>

<body>

   <div class="countries">
      <?php foreach ($dataCountries as $key => $country) :; ?>
         <div class="country">
            <div class="name">País: <span><?= $key ?></span></div>
            <div class="registeredUser">Quantidade de Cadastros: <?= $country['people'] ?></div>
            <div class="points">Pontos do País: <?= $country['score'] ?></div>
            <div class="engagament">Engajamento: <?= $country['percent'] ?>%</div>
            <div class="rank">
               <h2>Top 10</h2>
               <table>
               <?php $indice =1; ?>
                  <?php foreach ($country['top10'] as $key => $person) :; ?>
                  <tr>
                     <td>
                        <li id="lineName"><span><?= $indice++; ?> - </span><?= $person['full_name']; ?></li>
</td>
                           <td>
                              <li>Pontos: <?= $person['score']; ?>
                           </td>
                        </li>
                  </tr>
                  <?php endforeach; ?>
               </table>
               </div>
         </div>
      <?php endforeach; ?>
   </div>
</body>

</html>