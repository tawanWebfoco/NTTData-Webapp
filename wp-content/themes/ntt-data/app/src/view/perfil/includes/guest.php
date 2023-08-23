<div class="guest">
    <h4>Confira sua lista de convidado efetivadas</h4>
    <table>
        <?php
        if (isset($guest))
            foreach ($guest as $key => $value) :  ?>
            <tr>
                <td>
                    <li id="lineName"><?= $value->full_name; ?></li>
                <td>
                <td>
                    <li>Pontos: <?= $value->score; ?>
                </td>
                </li>
            </tr>
        <?php endforeach; ?>


    </table>
</div>