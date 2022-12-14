<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"> Exlcuir vaga</h2>

    <form method="post">

        <div class="form-group">
            <p>Vocé realmernte deseja excluir a vaga <strong>
                    <?= $obVaga->titulo ?>
                </strong>?</p>
        </div>
        <div class="form-group">
            <a href="index.php">
                <button class="btn btn-success" type="button">Cancelar</button>
            </a>
        </div>


        <div class="form-group">
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>