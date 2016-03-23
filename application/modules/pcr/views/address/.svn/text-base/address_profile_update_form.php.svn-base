<?php
$attributes = array('id' => 'form_create_address');
echo form_open($this->ctrlr_name . "/edit_profile/" . $address->id, $attributes);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

    <div class="clearfix">
        <?php echo form_label(lang('country'), 'country_id'); ?>
        <div class="input"><?php echo form_dropdown('country_id', $country, $address->country_id, 'id="country_id"'); ?></div>
        <?php echo form_error('country_id'); ?>
    </div>

    <div class="clearfix">
        <?php echo form_label(lang('state'), 'state_id'); ?>
        <div class="input"><?php echo form_dropdown('state_id', $state, $address->state_id, 'id="selectstate"'); ?></div>
        <?php echo form_error('state_id'); ?>
    </div>

    <div class="clearfix">
        <?php echo form_label(lang('city'), 'city_id'); ?>
            <div id="citieswrapper" class="input">
                <?php echo form_dropdown('city_id', $city, $address->city_id, 'id="city_id"'); ?>
            </div>
    <?php echo form_error('city_id'); ?>
    </div>
    
    <div class="clearfix">
        <?php echo form_label(lang('zipcode'), 'zipcode'); ?>
        <div class="input"><?php echo form_input(array('id' => 'zipcode','name' => 'zipcode', 'value' => $address->zipcode)); ?></div>
        <?php echo form_error('zipcode'); ?>
    </div>

    <div class="clearfix">
        <?php echo form_label(lang('address1'), 'address1'); ?>
        <div class="input"><?php echo form_input(array('id' => 'adress1','name' => 'address1', 'value' => $address->address1)); ?></div>
        <?php echo form_error('address1'); ?>
    </div>

    <div class="clearfix">
        <?php echo form_label(lang('address2'), 'address2'); ?>
        <div class="input"><?php echo form_input(array('id' => 'adress2','name' => 'address2', 'value' => $address->address2)); ?></div>
        <?php echo form_error('address2'); ?>
    </div>    

    <div class="clearfix">				
        <?php echo form_label(lang('address3'), 'address3'); ?>
        <div class="input"><?php echo form_input(array('id' => 'adress3', 'name' => 'address3', 'value' => $address->address3)); ?></div>
        <?php echo form_error('address3'); ?>
    </div>

<div class="actions">    
    <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>
    
<?php echo form_close(); ?>

<script>
    $(document).ready(function(){
        $("#form_create_address").validate({
            rules: {
                country_id: {
                    required: true
                },
                state_id: {
                    required: true
                },
                city_id: {
                    required: true
                },
                zipcode: {
                    required: true
                },
                address1: {
                    required: true
                },
                address3: {
                    required: true
                }
            },
            messages: {
                country_id: {
                    required: 'Campo Obrigatório'
                },
                state_id: {
                    required: 'Campo Obrigatório'
                },
                city_id: {
                    required: 'Campo Obrigatório'
                },
                zipcode: {
                    required: 'Campo Obrigatório'
                },
                address1: {
                    required: 'Campo Obrigatório'
                },
                address3: {
                    required: 'Campo Obrigatório'
                }
            }
        });
    });
</script>