<?php $v->layout('theme/_theme'); ?>

<div class="container">
    <h2>Editar Clientes</h2>
    <br>
    <div class="login_form_callback">
    <?= flash(); ?>
    </div>

    <form action="<?= $router->route('client.update'); ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label for="">Nome*</label>
            <input type="text" class="form-control" name="name" value="<?= $data->name ?? null; ?>">
        </div>
        <div class="form-group">
            <label for="">Data De Aniversário*</label>
            <input type="date" class="form-control" name="birth_date" value="<?= $data->birth_date ?? null; ?>">
        </div>
        <div class="form-group">
            <label for="">Rg*</label>
            <input type="text" class="form-control" name="rg" value="<?= $data->rg ?? null; ?>">
        </div>
        <div class="form-group">
            <label for="">Cpf*</label>
            <input type="text" class="form-control" name="cpf" value="<?= $data->cpf ?? null; ?>">
        </div>
        <div class="form-group">
            <label for="">Telefone*</label>
            <input type="text" class="form-control" name="phone" value="<?= $data->phone ?? null; ?>">
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Rua*</label>
                <input type="text" class="form-control" name="street" value="<?= $data->street ?? null; ?>" >
            </div>
            <div class="col-md-3 mb-3">
                <label>Número*</label>
                <input type="text" class="form-control" name="number" value="<?= $data->number ?? null; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>Bairro*</label>
                <input type="text" class="form-control" name="neighborhood" value="<?= $data->neighborhood ?? null; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label>Cidade*</label>
                <input type="text" class="form-control" name="city" value="<?= $data->city ?? null; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>Estado*</label>
                <input type="text" class="form-control" name="state" value="<?= $data->state ?? null; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label>Cep*</label>
                <input type="text" class="form-control" name="zip_code" value="<?= $data->zip_code ?? null; ?>">
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $data->id ?? null; ?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="<?= $router->route('app.home'); ?>" class="btn btn-blue">Voltar</a>
    </form>
</div>

<?php $v->start('scripts'); ?>
<script src="<?= asset('/js/form.js'); ?>"></script>
<?php $v->end(); ?>