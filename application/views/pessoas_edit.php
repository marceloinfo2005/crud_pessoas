<!-- abre o formulário de ediçao -->
<?php echo form_open('pessoas/alterar', 'id="form-pessoas"'); ?>
<input type="hidden" name="id" value="<?php echo $dados_pessoa[0]->id; ?>"/>
<label for="nome">Nome: </label><br/>
<input type="text" name="nome" value="<?php echo $dados_pessoa[0]->nome; ?>"/>
<div class="error"><?php echo form_error('nome'); ?></div>

<label for="email">Email:</label><br/>
<input type="text" name="email" value="<?php echo $dados_pessoa[0]->email; ?>"/>
<div class="error"><?php echo form_error('email'); ?></div>

<input type="submit" name="alterar" value="Alterar" />
<?php echo form_close(); ?>
<!--fecha o formulário de ediçao -->

