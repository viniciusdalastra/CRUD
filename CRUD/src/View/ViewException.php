<?php include 'header.php' ?>
<script>
    function showTrace(){
        var trace = document.getElementById('error_msg');
        if(trace.style.display == 'none'){
            trace.style.display = 'block';
        }
        else{
            trace.style.display = 'none';
        }
    }
</script>
<span style="display: flex; flex-direction: column;align-items: center;">
    <h3>Ocorreu um erro!</h3>
    <h5>Para acessar o cadastro de pessoas, clique no botão abaixo:</h5>
    <button class="btn waves-effect waves-light" onclick="showTrace();">Trace</button>
    <p id="error_msg" style="display:none; margin: 10px;"><?= $mensagem ?></p>
    <button class="btn waves-effect waves-light" style="margin: 10px;" onclick="window.location.href = '/pessoas'">Consultar Pessoas</button>
</span>

<?php include 'footer.php' ?>