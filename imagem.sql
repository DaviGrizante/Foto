create database imagens;
use imagens;

create table imagem(
    id int(4) auto_increment primary key,
    imagem longblob,
    tipoImagem varchar(30)
    caminhoImagem varchar(50)
);