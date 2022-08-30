<main>
    <section>
    <a href="index.php">
    <button type="button" class="btn btn-success">Voltar</button>
    </a>
    </section>
    <h2 class="mt-3">Excluir Vaga</h2>

    <form action="" method="post" class="row g-3">
        <div class="form-group">
            <p>Você deseja realmente excluir a vaga <strong><?=$obVaga->titulo?> ?</strong></p>
        </div>
        
       
        <div class="col-12">
        <a href="index.php">
            <button type="button" class="btn btn-success">
                cancelar
            </button>
         </a>


           <button class="btn btn-danger" type="submit" name="excluir">
            excluir
           </button>

        </div>
    </form>


</main>