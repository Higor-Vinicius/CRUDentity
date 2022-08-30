<?php
$mensagem ='';

    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'sucess':
               $mensagem = '<div class="alert alert-success" role="alert"> Ação executada com sucesso!</div>';
                break;
            
            default:
            $mensagem = '<div class="alert alert-warning" role="alert"> Ação não executada!</div>';
                break;
        }
    }
    $resultados = '';

    foreach($vagas as $vaga){
        $resultados.= '<tr>
                        <td>'.$vaga->id.'</td>
                        <td>'.$vaga->titulo.'</td>
                        <td>'.$vaga->descricao.'</td>
                        <td>'.($vaga->status == 'true' ? 'ATIVO' : 'INATIVO').'</td>
                        <td>'.date('d/m/Y à\s H:i:s',strtotime($vaga->data)).'</td>
                        <td>
                        <a href="editar.php?id='.$vaga->id.'">
                        <button type="button" class="btn btn-primary">Editar </button>
                        </a>
                        <a href="excluir.php?id='.$vaga->id.'">
                        <button type="button" class="btn btn-danger">Excluir </button>
                        </a>
                        </td></tr>';
    }

?>

<main>
    <?=$mensagem?>
    <section>
    <a href="cadastrar.php">
    <button type="button" class="btn btn-success">Novo Cadastro</button>
    </a>
    </section>
    <section>
    <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th  scope="col">ID</th>
                    <th  scope="col">Titulo</th>
                    <th  scope="col">Descricao</th>
                    <th  scope="col">Status</th>
                    <th  scope="col">Data</th>
                    <th  scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?=$resultados?>
  </tbody>
        </table>
    </section>
</main>