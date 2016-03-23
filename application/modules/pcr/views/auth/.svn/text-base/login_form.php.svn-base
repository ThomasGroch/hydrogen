<?php
echo form_open($this->ctrlr_name . "/login");
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>
<div class="clearfix">
    <?php echo form_label(lang('primary_email'), 'primary_email'); ?>
    <div class="input"><?php echo form_input(array('id' => 'primary_email', 'name' => 'primary_email', 'value' => set_value('primary_email'))); ?>
    <?php echo form_error('primary_email'); ?>
    </div>
    
</div>
<div class="clearfix">
    <?php echo form_label(lang('password'), 'password'); ?>
    <div class="input"><?php echo form_password(array('id' => 'password','name' => 'password', 'value' => set_value(''))); ?>
    <?php echo form_error('password'); ?>
    </div>
    
</div>    
<div class="clearfix">
    <?php echo form_label(lang('remember'), 'remember'); ?>
    <div class="input"><?php echo form_checkbox('remember', '1', FALSE,'id="remember"'); ?></div>
    <?php echo form_error('remember'); ?>
</div>
    
<div class="actions">
    <div class="input"><?php echo form_submit('submit', lang('send'), 'class="btn primary"'); ?></div>
</div>

<?php echo form_close(); ?>