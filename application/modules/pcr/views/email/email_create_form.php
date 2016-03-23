<?php
$hidden = array(
    'p_id' => $p_id
);
echo form_open($this->ctrlr_name . "/create", '', $hidden);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>
<div class="clearfix <?php if(form_error('email') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('email'), 'email'); ?>
        <div class="input"><?php echo form_input(array('name' => 'email', 'value' => set_value('email'))); ?></div>
        <?php echo form_error('email'); ?>
</div>

<div class="clearfix <?php if(form_error('type_email_id') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('type_email'), 'type_email_id'); ?>
        <div class="input"><?php echo form_dropdown('type_email_id', $type_emails, set_value('type_email_id')); ?></div>
        <?php echo form_error('type_email_id'); ?>
</div>

<div class="actions">
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
        
<?php echo form_close(); ?>