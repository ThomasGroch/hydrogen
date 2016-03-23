<?php
$hidden = array('id' => $phone->id);
echo form_open($this->ctrlr_name . "/edit/" . $phone->id, '', $hidden);
?>

<div class="clearfix <?php if(form_error('p_id') != '' ){ echo 'error'; } ?>"">
    <?php echo form_label('p_id', 'p_id'); ?>
    <div class="input"><?php echo form_input(array('name' => 'p_id', 'value' => $phone->p_id)); ?></div>
    <?php echo form_error('p_id'); ?>
</div>    
<div class="clearfix <?php if(form_error('number') != '' ){ echo 'error'; } ?>"">
    <?php echo form_label(lang('number'), 'number'); ?>
    <div class="input"><?php echo form_input(array('name' => 'number', 'value' => $phone->number)); ?></div>
    <?php echo form_error('number'); ?>
</div>    
<div class="clearfix <?php if(form_error('type_phone_id') != '' ){ echo 'error'; } ?>"">    
    <?php echo form_label(lang('type_phone'), 'type_phone_id'); ?>
    <div class="input"><?php echo form_dropdown('type_phone_id', $type_phones, $phone->type_phone_id); ?></div>
    <?php echo form_error('type_phone_id'); ?>
</div>    
<div class="actions">    
    <?php echo form_submit('submit', lang('save')); ?>
</div>    
<?php echo form_close(); ?>