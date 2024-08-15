<?php
//Chama uma função PHP que permite informar a classe e o Método que será acionado
  $imagens = call_user_func(array('imagemController','listar'));


?>
<div class="container">

<h1>Imagens</h1>
<hr>
<table class="table" style="top:40px;">
        <tbody>
        <?php 
        $cont=0;
        //Verifica se houve algum retorno
        if (isset($imagens) && !empty($imagens)) {
          foreach ($imagens as $imagem) {
            
            if($cont==0){
              echo '<tr>';
            }
            
            echo '<td>';
            echo '<p align="center"><img class="img-thumbnail" style="width: 25%;" src="data:'.$imagem->getTipoImagem().';base64,'.base64_encode($imagem->getImagem()).'"></p><br>';;
            echo '<a href="index.php?action=editar&id='.$imagem->getId().'&page=imagem" class="btn btn-primary btn-sm">Editar</a>&nbsp;&nbsp;&nbsp;';
            echo '<a href="index.php?action=excluir&id='.$imagem->getId().'&page=imagem" class="btn btn-danger btn-sm">Excluir</a>';
            $cont++;
            if($cont==4)
              $cont=0;

          }
        }else{
            ?>
                <tr>
                    <td colspan="3">Nenhum registro encontrado</td>
                </tr>
                <?php
        }
?>
        </tbody>
</table>
</div>