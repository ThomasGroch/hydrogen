<?php
$hidden = array('id' => $person->id);
echo form_open($this->ctrlr_name . "/edit/" . $person->id, '', $hidden);
$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>
    <div class="clearfix <?php if(form_error('first_name') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('first_name'), 'first_name'); ?>
        <div class="input"><?php echo form_input(array('name' => 'first_name', 'value' => $person->first_name)); ?>
        <?php echo form_error('first_name'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('last_name') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('last_name'), 'last_name'); ?>
        <div class="input"><?php echo form_input(array('name' => 'last_name', 'value' => $person->last_name)); ?>
        <?php echo form_error('last_name'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('username') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('username'), 'username'); ?>
        <div class="input"><?php echo form_input(array('name' => 'username', 'value' => $person->username)); ?>
        <?php echo form_error('username'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('primary_email') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('primary_email'), 'primary_email'); ?>
        <div class="input"><?php echo form_input(array('name' => 'primary_email', 'value' => $person->primary_email)); ?>
        <?php echo form_error('primary_email'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('primary_email_conf') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('primary_email_conf'), 'primary_email_conf'); ?>
        <div class="input"><?php echo form_input(array('name' => 'primary_email_conf', 'value' => $person->primary_email)); ?>
        <?php echo form_error('primary_email_conf'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('cpf') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('cpf'), 'cpf'); ?>
        <div class="input"><?php echo form_input(array('name' => 'cpf', 'value' => $person->cpf)); ?>
        <?php echo form_error('cpf'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('birthday') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('birthday'), 'birthday'); ?>
        <div class="input"><?php echo form_input(array('name' => 'birthday', 'value' => brazilian_datetime($person->birthday))); ?>
        <?php echo form_error('birthday'); ?>
        </div>
    </div>
    <div class="clearfix <?php if(form_error('gender') != '' ){ echo 'error'; } ?>">        
        <?php
        $gender_options = array('' => lang('select_your_gender'), 'M' => lang('male'), 'F' => lang('female'));
        ?>
        <?php echo form_label(lang('gender'), 'gender'); ?>
        <div class="input"><?php echo form_dropdown('gender', $gender_options, $person->gender); ?>
        <?php echo form_error('gender'); ?>
        </div>
    </div>
    <div class="actions">
        <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
    </div>


<?php echo form_close(); ?>