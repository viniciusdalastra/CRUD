<?php include 'header.php' ?>

<span>
    <form action="/pessoas?filter=true" method="post">
        <div class="input-field col s6" style=" margin: 10px;">
            <input id="nome" type="text" name="nome" class="form-control" value="<?= $_REQUEST['nome'] ?>">
            <label for="nome">Filtrar Nome da pessoa</label>
        </div>
        <button type="submit" class="btn waves-effect waves-light" style="display: flex;align-content: center;justify-content: center;align-items: center;flex-direction: row;  margin: 10px;">
            <p>Atualizar</p>
            <i class="material-icons">refresh</i>
        </button>
    </form>
    <button class="btn waves-effect waves-light" onclick="window.location.href = '/pessoa'" style="display: flex;align-content: center;justify-content: center;align-items: center;flex-direction: row; margin: 10px;">
        <p>Inclusão de Pessoas</p>
        <i class="material-icons">add</i>
    </button>
</span>
<span>
    <table>
        <thead>
            <tr>
                <th scope="col">Identificador</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php

            foreach ($pessoas as $pessoa) {
                $sUrlManutencao = '/pessoa?id=' . $pessoa->getId();

                echo '<tr>';
                echo '<th scope="row">' . htmlentities($pessoa->getId()) . '</th>';
                echo '<td>' . htmlentities($pessoa->getNome()) . '</td>';
                echo '<td>' . htmlentities($pessoa->getCpf()) . '</td>';
                echo '<td>';
                echo '<a href="' . $sUrlManutencao . '&aca=view"><i class="material-icons">pageview</i</a>';
                echo '<a href="' . $sUrlManutencao . '&aca=edit"><i class="material-icons">edit</i></a>';
                echo '<a href="' . $sUrlManutencao . '&aca=delete&proc=fetch"><i class="material-icons">remove_circle_outline</i></a>';
                echo '</td>';
                echo '</tr>';
            }

            ?>

        </tbody>
    </table>
</span>
<?php include 'footer.php' ?>