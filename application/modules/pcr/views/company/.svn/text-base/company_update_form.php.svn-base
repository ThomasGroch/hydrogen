<?php
/**
 * Company_update_form
 *
 * Comes in the form fields to update a company that will be displayed on the screen using form_validation
 *
 * Trata os campos do formulário de criação de uma empresa que serão exibidos na tela usando o form_validation
 * 
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
$hidden = array('id' => $company->id);
echo form_open($this->ctrlr_name . "/edit/" . $company->id, '', $hidden);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

<div class="clearfix <?php if(form_error('name') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('name'), 'name'); ?>
        <div class="input"><?php echo form_input(array('id' => 'name', 'name' => 'name', 'value' => $company->name)); ?></div>
        <?php echo form_error('name'); ?>
</div>

<div class="clearfix <?php if(form_error('username') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('username'), 'username'); ?>
        <div class="input"><?php echo form_input(array('id' => 'username', 'name' => 'username', 'value' => $company->username)); ?></div>
        <?php echo form_error('username'); ?>
</div>    
			
<div class="clearfix <?php if(form_error('primary_email') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('primary_email'), 'primary_email'); ?>
        <div class="input"><?php echo form_input(array('id' => 'primary_email', 'name' => 'primary_email', 'value' => $company->primary_email)); ?></div>
        <?php echo form_error('primary_email'); ?>
</div>    
	
<div class="clearfix <?php if(form_error('cnpj') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('cnpj'), 'cnpj'); ?>
        <div class="input"><?php echo form_input(array('id' => 'cnpj', 'name' => 'cnpj', 'value' => $company->cnpj)); ?></div>
        <?php echo form_error('cnpj'); ?>
</div>    
				
<div class="clearfix <?php if(form_error('birthday') != '' ){ echo 'error'; } ?>">
         <?php echo form_label(lang('birthday'), 'birthday'); ?>
         <?php $company->birthday = brazilian_datetime($company->birthday) != FALSE ? brazilian_datetime($company->birthday) : ''; ?>
         <div class="input"><?php echo form_input(array('id' => 'birthday', 'name' => 'birthday', 'value' => $company->birthday)); ?></div>
         <?php echo form_error('birthday'); ?>
</div>

    <?php /*
      $i = 0;
      foreach ( $company->phones as $phone )
      {
      $i++;
      ?>

<div class="clearfix <?php if(form_error('phones[]') != '' ){ echo 'error'; } ?>">  
      <?php echo form_label(lang('phone') . $i, 'phones[]'); ?>
      <div class="input"><?php echo form_input(array('name' => 'phones[]', 'value' => $phone->number)); ?></div>
      <?php echo form_error('phones[]'); ?>
</div>

      <?php
      }
     */ ?>
				
<div class="actions">
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>
        
    


<?php echo form_close(); ?>