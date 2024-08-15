<?php
ob_start();
?>
<div class="container">
        <form name="cadImagem" id="cadImagem" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Imagens</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Imagem:</label>
                    <input type="file" class="form-control col-sm-8" name="imagem" id="imagem"/>
                </div> 
                <?php
                    if(isset($imagem) && !empty($imagem->getCaminhoImagem())){
                ?>
                <div class="form-group form-row">
                    <div class="text-center">
                        <img class="img-thumbnail" style="width: 25%;" src="<?php echo $imagem->getCaminhoImagem();?>">
                    </div>
                </div>
                <?php
                    }
                ?>
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($imagem)?$imagem->getId():''; ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>


<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imagem)){
        call_user_func(array('imagemController','salvar'),$imagem->getImagem(),$imagem->getTipoImagem());
    }else{
        call_user_func(array('imagemController','salvar'));
    }

    header('Location: index.php?action=listar&page=imagem');
}

ob_end_flush();

?>