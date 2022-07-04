<?php include 'header.php' ?>

<span style="margin:10px;">
    <form action="/contato?proc=fetch<?= $acao ? '&aca=' . $acao : '' ?>" method="post">
        <?php if (!$incluir) {
            echo '<div class="input-field col s6" style=" margin: 10px;">
                     <input id="id" type="text" name="id" class="form-control" value="' . (isset($contato) ? $contato->getId() : '') . '" ' . ($visualizar || $alterar ? 'readonly' : '') . '>
                     <label for="id">ID</label>
                  </div>';
        } ?>
        <div class="input-field col s6" style=" margin: 10px;">
            <input id="descricao" type="text" name="descricao" class="form-control" required value="<?= isset($contato) ? $contato->getDescricao() : '' ?>" <?= $visualizar ? 'readonly' : '' ?>>
            <label for="descricao">Descrição</label>
        </div>
        <div class="input-field col s6" style=" margin: 10px;">
            <select name="tipo" class="form-control" id="tipo" required <?= $incluir ? '' : 'disabled' ?>>
                <option value="0" <?= isset($contato) && $contato->getTipo() == 0 ? 'selected' : '' ?>>e-mail</option>
                <option value="1" <?= isset($contato) && $contato->getTipo() == 1 ? 'selected' : '' ?>>telefone</option>
            </select>
            <label for="tipo">Tipo</label>
        </div>
        <div class="input-field col s6" style=" margin: 10px;">
            <select name="pessoa" class="form-control" id="pessoa" required <?= $incluir ? '' : 'disabled' ?>>
                <?php
                foreach ($pessoas as $pessoa) {
                    if ($contato && $contato->getPessoa() && $contato->getPessoa()->getId() === $pessoa->getId()) {
                        echo '<option selected value="' . $pessoa->getId() . '">' . $pessoa->getNome() . '</option>';
                    } else {
                        echo '<option value="' . $pessoa->getId() . '">' . $pessoa->getNome() . '</option>';
                    }
                }
                ?>
            </select>
            <label for="pessoa">Pessoa</label>
        </div>
        </br>
        <div>
            <?php if (!$visualizar) {
                echo '<button class="btn waves-effect waves-light" type="submit" style="display: flex;align-content: center;justify-content: center;align-items: center;flex-direction: row; margin: 10px;">
                    <p>' . ($incluir ? 'Inserir' : 'Alterar') . '</p>
                    <i class="material-icons">add</i>
                  </button>';
            } ?>
        </div>
    </form>
</span>
<?php include 'footer.php' ?>