<?php include 'header.php' ?>

<span>
    <button class="btn waves-effect waves-light" onclick="window.location.href = '/contato'" style="display: flex;align-content: center;justify-content: center;align-items: center;flex-direction: row; margin: 10px;">
        <p>Inclusão de Contatos</p>
        <i class="material-icons">add</i>
    </button>
</span>
<span>
    <table>
        <thead>
            <tr>
                <th scope="col">Identificador</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php

            foreach ($contatos as $contato) {
                $sUrlManutencao = '/contato?id=' . $contato->getId();
                $nomePessoa = $contato->getPessoa() ? htmlentities($contato->getPessoa()->getNome()) : '';
                echo '<tr>';
                echo '<th scope="row">' . htmlentities($contato->getId()) . '</th>';
                echo '<td>' . htmlentities($contato->getTipo() ? 'Telefone' : 'Email') . '</td>';
                echo '<td>' . htmlentities($contato->getDescricao()) . '</td>';
                echo '<td>' . $nomePessoa . '</td>';
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