<?php
$hidden = array(
    'p_id' => $items->p_id
);
echo form_open($this->ctrlr_name . "/add_site/" . $items->id, '', $hidden);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

<div class="clearfix <?php if(form_error('name') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('name'), 'name'); ?>
        <div class="input"><?php echo form_input(array('name' => 'name', 'value' => set_value('name'))); ?></div>
        <?php echo form_error('name'); ?>
</div>
<div class="clearfix <?php if(form_error('url') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('url'), 'url'); ?>
        <div class="input"><?php echo form_input(array('name' => 'url', 'value' => set_value('url'))); ?></div>
        <?php echo form_error('url'); ?>
</div>
    
    <div class="actions">
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?></td>
    </div>


<?php echo form_close(); ?>