<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="iso-8859-1" />
    <link type="text/css" rel="stylesheet"
            href="<?php echo base_url(); ?>css/estilos.css"/>
</head>
<body>
    <!-- abre o formulário de cadastro -->

    <?php echo form_open('pessoas/cadastrar', 'id="form-pessoas"'); ?>
    <label for="nome">Nome: </label><br/>
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    <div class="error"><?php echo form_error('nome'); ?></div>

    <label for="email">Email:</label><br/>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
    <div class="error"><?php echo form_error('email'); ?></div>

    <input type="submit" name="cadastrar" value="Cadastrar" />
    <?php echo form_close(); ?>
    <!-- fecha o formulário de cadastro -->

    <!--- abre lista de registro --->
    <ul>
        <?php foreach($pessoas as $pessoa): ?>
        <li>
            <a title="deletar" href="<?php echo base_url() . 'pessoas/deletar/' . $pessoa->id; ?>" onclick="return confirm('Confirma a exclusao desse registro?')">[X]</a>
            <span> - </span>
            <a title="alterar" href="<?php echo base_url() . 'pessoas/editar/' . $pessoa->id; ?>"><?php echo $pessoa->nome; ?></a>
            <span> - </span>
            <span><?php echo $pessoa->email; ?></span>
        </li>
        <?php endforeach ?>
    </ul>        
    <!--- fecha lista de registros -->            
</body>
</html>