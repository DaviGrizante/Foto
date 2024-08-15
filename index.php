<?php
session_start();

//importa o Controllers
require_once 'controller/imagemController.php';
//adiciona o cabeçalho
require_once 'header.php';


    require_once 'view/menu.php';
    if(isset($_GET['page'])){
        if($_GET['page']=='imagem'){
            if(isset($_GET['action'])){
                if($_GET['action'] == 'editar'){
                    //Chama uma função PHP que permite informar a classe e o Método que será acionado
                    $usuario = call_user_func(array('imagemController','editar'), $_GET['id']);  
                    require_once 'view/cadImagem.php';
                }
                if($_GET['action'] == 'listar'){
                    require_once 'view/listImagem.php';
                }
        
                if($_GET['action'] == 'excluir'){
                    //Chama uma função PHP que permite informar a classe e o Método que será acionado
                    $usuario = call_user_func(array('imagemController','excluir'), $_GET['id']);  
                    require_once 'view/listImagem.php';
                }
            }else{
                require_once 'view/cadImagem.php';
            }
        }

    }


require_once 'footer.php';