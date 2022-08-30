<?php   
define('TITLE','Editar Vaga');

require __DIR__.'/vendor/autoload.php';
use \App\Entity\Vaga;
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}
//CONSULTA VAGA
$obVaga = Vaga::getVaga($_GET['id']);

if(!$obVaga instanceof Vaga){
    header('location: index.php?status=error');
    die;
}

if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
    
   $obVaga->titulo = $_POST['titulo'];
   $obVaga->descricao = $_POST['descricao'];
   $obVaga->status = $_POST['ativo'];

   $obVaga->atualizar();
   header('location: index.php?status=sucess');
    exit;

}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';
 