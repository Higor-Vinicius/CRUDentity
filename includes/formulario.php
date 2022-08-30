<main>
    <section>
    <a href="index.php">
    <button type="button" class="btn btn-success">Voltar</button>
    </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form action="" method="post" class="row g-3">
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?=$obVaga->titulo?>" >
        </div>

        <div class="form-group">
            <label >Descrição</label>
            <textarea name="descricao" id="" cols="30" rows="3" class="form-control"><?=$obVaga->descricao?></textarea>
        </div>

        <div class="form-group">
            <label >Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="ativo" value="true" checked> Ativo
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="ativo" value="false" 
                             <?=$obVaga->status == 'false' ? 'checked' : ''?>> Inativo
                        </label>
                    </div>
                </div>
        </div>

        <div class="col-12">
           <input class="btn btn-primary" type="submit"></button>
        </div>
    </form>


</main>