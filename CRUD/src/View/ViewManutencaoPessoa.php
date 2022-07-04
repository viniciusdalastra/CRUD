<?php include 'header.php' ?>

<span style="margin:10px;">
    <form action="/pessoa?proc=fetch<?= $acao ? '&aca=' . $acao : ''?>" method="post">
        <?php if (!$incluir) {
            echo '<div class="input-field col s6" style=" margin: 10px;">
                     <input id="id" type="text" name="id" class="form-control" value="' . (isset($pessoa) ? $pessoa->getId() : '') . '" ' . ($visualizar || $alterar ? 'readonly' : '') . '>
                     <label for="id">ID</label>
                  </div>';
        } ?>
        <div class="input-field col s6" style=" margin: 10px;">
            <input id="nome" type="text" name="nome" class="form-control" required value="<?= isset($pessoa) ? $pessoa->getNome() : '' ?>" <?= $visualizar || $alterar ? 'readonly' : '' ?>>
            <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6" style=" margin: 10px;">
            <input id="cpf" type="text" name="cpf" class="form-control" value="<?= isset($pessoa) ? $pessoa->getCpf() : '' ?>" placeholder="000.000.000-00" <?= $visualizar ? 'readonly' : '' ?>>
            <label for="cpf">CPF</label>
        </div>
        <div>
            <?php if (!$visualizar) {
                echo '<button class="btn waves-effect waves-light" type="submit" style="display: flex;align-content: center;justify-content: center;align-items: center;flex-direction: row; margin: 10px;">
                    <p>' . ($incluir ? 'Inserir' : 'Alterar') . '</p>
                    <i class="material-icons">add</i>
                  </button>';
            } ?>
    </form>
</span>
<?php include 'footer.php' ?>