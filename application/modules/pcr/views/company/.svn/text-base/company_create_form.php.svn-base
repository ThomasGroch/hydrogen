<?php
/**
 * Company_create_form
 *
 * Comes in the form fields to create a company that will be displayed on the screen using form_validation
 *
 * Trata os campos do formulário de criação de uma empresa que serão exibidos na tela usando o form_validation
 * 
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
echo form_open($this->ctrlr_name . "/create");
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

<div class="clearfix <?php if(form_error('name') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('name'), 'name'); ?>
        <div class="input"><?php echo form_input(array('id' => 'name', 'name' => 'name', 'value' => set_value('name'))); ?></div>
        <?php echo form_error('name'); ?>
</div>

<div class="clearfix <?php if(form_error('username') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('username'), 'username'); ?>
        <div class="input"><?php echo form_input(array('id' => 'username' , 'name' => 'username', 'value' => set_value('username'))); ?></div>
        <?php echo form_error('username'); ?>
</div>

<div class="clearfix <?php if(form_error('primary_email') != '' ){ echo 'error'; } ?>">	
        <?php echo form_label(lang('primary_email'), 'primary_email'); ?>l
        <div class="input"><?php echo form_input(array('id' => 'primary_email','name' => 'primary_email', 'value' => set_value('primary_email'))); ?></div>
        <?php echo form_error('primary_email'); ?>
</div>

<div class="clearfix <?php if(form_error('primary_email_conf') != '' ){ echo 'error'; } ?>">	
        <?php echo form_label(lang('primary_email_conf'), 'primary_email_conf'); ?>
        <div class="input"><?php echo form_input(array('id' => 'primary_email_conf','name' => 'primary_email_conf', 'value' => set_value('primary_email_conf'))); ?></div>
        <?php echo form_error('primary_email_conf'); ?>
</div>

<div class="clearfix <?php if(form_error('cnpj') != '' ){ echo 'error'; } ?>">	
        <?php echo form_label(lang('cnpj'), 'cnpj'); ?>
        <div class="input"><?php echo form_input(array('id' => 'cnpj','name' => 'cnpj', 'value' => set_value('cnpj'))); ?></div>
        <?php echo form_error('cnpj'); ?>
</div>

<div class="clearfix <?php if(form_error('birthday') != '' ){ echo 'error'; } ?>">	
        <?php echo form_label(lang('foundation'), 'birthday'); ?>
        <div class="input"><?php echo form_input(array('id' => 'birthday','name' => 'birthday', 'value' => set_value('birthday'))); ?></div>
        <?php echo form_error('birthday'); ?>
</div>    
    				
<div class="actions">
    <?php echo form_submit('submit', 'Save', 'class="btn primary"'); ?>
</div>

<?php echo form_close(); ?>