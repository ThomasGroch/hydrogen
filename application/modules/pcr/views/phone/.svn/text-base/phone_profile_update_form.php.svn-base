<?php
$attributes = array('id' => 'form_create_phone');
echo form_open($this->ctrlr_name . "/edit_profile/" . $phone->id, $attributes);
?>
<div class="clearfix <?php if(form_error('number') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('number'), 'number'); ?>
        <div class="input"><?php echo form_input(array('name' => 'number', 'value' => $phone->number)); ?></div>
        <span class="help-inline"<?php echo form_error('number'); ?></span>
</div>    
<div class="clearfix <?php if(form_error('type_phone_id') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('type_phone'), 'type_phone_id'); ?>
        <div class="input"><?php echo form_dropdown('type_phone_id', $type_phones, $phone->type_phone_id); ?></div>
        <span class="help-inline"<?php echo form_error('type_phone_id'); ?></span>
</div>
<div class="actions">
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>

<?php echo form_close(); ?>

<script>
    $(document).ready(function(){
        $("#form_create_phone").validate({
            rules: {
                number: {
                    required: true
                },
                type_phone_id: {
                    required: true
                }
            },
            messages: {
                number: {
                    required: 'Campo Obrigatório'
                },
                type_phone_id: {
                    required: 'Campo Obrigatório'
                }
            }
        });
    });
</script>