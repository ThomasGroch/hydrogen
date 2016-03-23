<?php
echo form_open($this->ctrlr_name . "/edit/" . $address->id);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

<div class="clearfix <?php if(form_error('country_id') != '' ){ echo 'error'; } ?>">				
        <?php echo form_label(lang('country'), 'country_id'); ?>
        <div class="input"><?php echo form_dropdown('country_id', $country, $address->country_id, 'id="country_id"'); ?></div>
        <?php echo form_error('country_id'); ?>

<div class="clearfix <?php if(form_error('state_id') != '' ){ echo 'error'; } ?>">				
        <?php echo form_label(lang('state'), 'state_id'); ?>
        <div class="input"><?php echo form_dropdown('state_id', $state, $address->state_id, 'id = "selectstate state_id"'); ?>
        <?php echo form_error('state_id'); ?>

<div class="clearfix <?php if(form_error('city_id') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('city'), 'city_id'); ?>
            <div id="citieswrapper" class="input">
                <?php echo form_dropdown('city_id', $city, $address->city_id, 'id="city_id"'); ?>
            </div>
        <?php echo form_error('city_id'); ?>
</div>
    
<div class="clearfix <?php if(form_error('country_id') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('zipcode'), 'zipcode'); ?>
        <div class="input"><?php echo form_input(array('id' => 'zipcode','name' => 'zipcode', 'value' => $address->zipcode)); ?></div>
        <?php echo form_error('zipcode'); ?>
</div>
        
<div class="clearfix <?php if(form_error('country_id') != '' ){ echo 'error'; } ?>">				
        <?php echo form_label(lang('address1'), 'address1'); ?>
        <div class="input"><?php echo form_input(array('id' => 'address1','name' => 'address1', 'value' => $address->address1)); ?></div>
        <?php echo form_error('address1'); ?>
</div>
        
<div class="clearfix <?php if(form_error('country_id') != '' ){ echo 'error'; } ?>">				
        <?php echo form_label(lang('address2'), 'address2'); ?>
        <div class="input"><?php echo form_input(array('id' => 'address2','name' => 'address2', 'value' => $address->address2)); ?></div>
        <?php echo form_error('address2'); ?>
</div>
        
<div class="clearfix <?php if(form_error('country_id') != '' ){ echo 'error'; } ?>">				
        <?php echo form_label(lang('address3'), 'address3'); ?>
        <div class="input"><?php echo form_input(array('id' => 'address3','name' => 'address3', 'value' => $address->address3)); ?></div>
        <?php echo form_error('address3'); ?>
</div>
				
<div class="actions">        
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>
<?php echo form_close(); ?>