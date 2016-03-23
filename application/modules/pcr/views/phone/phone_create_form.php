<?php
echo form_open($this->ctrlr_name . "/create");
?>
<div class="cleafix<?php if(form_error('number') != '' ){ echo '/error'; } ?>">
        <?php echo form_label(lang('number'), 'number'); ?>
        <div class="input"><?php echo form_input(array('name' => 'number', 'value' => set_value('number'))); ?></div>
        <span class="help-inline"><?php echo form_error('number'); ?></span>
</div>    

<div class="cleafix <?php if(form_error('type_phone_id') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('type_phone'), 'type_phone_id'); ?>
        <div class="input"><?php echo form_dropdown('type_phone_id', $type_phones, set_value('type_phone_id')); ?></div>
        <span class="help-inline"><?php echo form_error('type_phone_id'); ?></span>
</div>    
<div class="actions" >
    <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>   

<?php echo form_close(); ?>