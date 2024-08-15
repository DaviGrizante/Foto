<?php
require_once 'model/Imagem.php';

class imagemController{

    public static function salvar($imagemAtual = '', $tipoImagem=''){
    $imagem = new Imagem();

    $imagemData = array();
    if(is_uploaded_file($_FILES['imagem']['tmp_name'])){
        $imagemData['data'] = file_get_contents($_FILES['imagem']['tmp_name']);
        $imagemData['tipo'] = $_FILES['imagem']['type'];
        $caminho = 'imagens/'.$_FILES['imagem']['name'];
        $imagemData['caminho'] = $caminho;

        move_uploaded_file($_FILES['imagem']['tmp_name'],$caminho);
    }

    if(!empty($imagemData)){
        $imagem->setImagem($imagemData['data']);
        $imagem->setTipoImagem($imagemData['tipo']);
        $imagem->setCaminhoImagem($imagemData['caminho']);

        if(!empty($_POST['caminho']) && file_exists($_POST['caminho'])) {
            unlink($_POST['caminho']);
        }
    } else {
        $imagem->setImagem($imagemAtual);
        $imagem->setTipoImagem($tipoImagem);
    }

    $imagem->setId($_POST['id']);

    $imagem->save();
}
    
    public static function listar(){
        $imagens = new Imagem();
        return $imagens->listAll();
    }

    public static function editar($id){
        $imagem = new Imagem();

        $imagem = $imagem->find($id);

        return $imagem;
    }

    public static function excluir($id){
        $imagem = new Imagem();
        $imagem = $imagem->remove($id);
    }

    public static function logar(){
        $imagem = new Imagem();
        $imagem->setLogin($_POST['login']);
        $imagem->setSenha($_POST['senha']);
        return $imagem->logar();
    }
}

?>