<!DOCTYPE html>
<html lang="pt_br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard NTT Data</title>
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/dashboard.css">
</head>

<body>
   <div class="total country">
      <h1>Relatório Geral</h1>
      <div class="registers">Cadastros: <?= $generalData['register'] ?></div>
      <div class="registers">Convidados: <?= $generalData['guest'] ?></div>
      <div class="points">Pontos: <?= $generalData['points'] ?></div>
      <div class="pubs">Publicações: <?= $generalData['pub'] ?></div>
      <div class="comments">Comentários: <?= $generalData['comment'] ?></div>
   </div>
   <div class="countries">
      <?php foreach ($dataCountries as $key => $country) :; ?>
         <div class="country">
            <div class="name"><span><?= $key ?></span></div>
            <div class="registeredUser">Cadastros: <?= $country['people'] ?></div>
            <div class="points">Pontos do País: <?= $country['score'] ?></div>
            <div class="engagament">Engajamento: <?= $country['percent'] ?>%</div>
            <div class="pub">Publicações: <?= $country['pub'] ?></div>
            <div class="comment">Comentários: <?= $country['comment'] ?></div>
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