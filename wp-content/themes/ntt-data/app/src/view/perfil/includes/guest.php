<div class="guest">
    <h4><?=_t['perfil_convidadostitulo']?></h4>
    <table>
        <?php
        if ($guest):
            foreach ($guest as $key => $value) :  ?>
            <tr>
                <td>
                    <li id="lineName"><?= $value->full_name; ?></li>
                <td>
                <td>
                    <li><?=_t['perfil_convidadospontos']?>: <?= $value->score; ?>
                </td>
                </li>
            </tr>
        <?php endforeach; ?>
        <?php else:; ?>
        <tr>
                <td>
                    <li id="lineName"><?=_t['perfil_convidadosnenhum']?></li>
                <td>
                
                </li>
            </tr>
            <?php endif; ?>

    </table>
</div>