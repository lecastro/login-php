<?php $v->layout('theme/_theme'); ?>

<div class="container">
    <br>
    <h2 class="text-white">Clientes</h2>
    <br>
    <div class="login_form_callback">
        <?= flash(); ?>
    </div>
    <form action="<?= $router->route('client.store'); ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label class="text-white">Nome*</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label class="text-white">Data De Aniversário*</label>
            <input type="date" class="form-control" name="birth_date">
        </div>
        <div class="form-group">
            <label class="text-white">Rg*</label>
            <input type="text" class="form-control" name="rg">
        </div>
        <div class="form-group">
            <label class="text-white">Cpf*</label>
            <input type="text" class="form-control" name="cpf">
        </div>
        <div class="form-group">
            <label class="text-white">Telefone*</label>
            <input type="text" class="form-control" name="phone">
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label class="text-white">Rua*</label>
                <input type="text" class="form-control" name="street">
            </div>
            <div class="col-md-3 mb-3">
                <label class="text-white">Número*</label>
                <input type="text" class="form-control" name="number">
            </div>
            <div class="col-md-3 mb-3">
                <labe class="text-white" l>Bairro*</label>
                    <input type="text" class="form-control" name="neighborhood">
            </div>
            <div class="col-md-6 mb-3">
                <label class="text-white">Cidade*</label>
                <input type="text" class="form-control" name="city">
            </div>
            <div class="col-md-3 mb-3">
                <label class="text-white">Estado*</label>
                <input type="text" class="form-control" name="state">
            </div>
            <div class="col-md-3 mb-3">
                <label class="text-white">Cep*</label>
                <input type="text" class="form-control" name="zip_code">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="<?= $router->route('app.home'); ?>" class="btn btn-blue">Voltar</a>
    </form>
</div>

<?php $v->start('scripts'); ?>
<script src="<?= asset('/js/form.js'); ?>"></script>
<?php $v->end(); ?>