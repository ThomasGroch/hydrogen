<?php 
    echo form_open($this->ctrlr_name . "/create"); 
    $this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
?>

<fieldset>
        
    <div class="clearfix <?php if(form_error('first_name') != '' ){ echo 'error'; } ?>">
        <?php echo form_label(lang('first_name'), 'first_name'); ?>
        <div class="input"><?php echo form_input(array('id' => 'first_name','name' => 'first_name', 'value' => set_value('first_name'))); ?></div>
        <?php echo form_error('first_name'); ?>
    </div>
    
    <div class="clearfix <?php if(form_error('last_name') != '' ){ echo 'error'; } ?>">        
         <?php echo form_label(lang('last_name'), 'last_name'); ?>
         <div class="input"><?php echo form_input(array('id' => 'last_name','name' => 'last_name', 'value' => set_value('last_name'))); ?></div>
         <?php echo form_error('last_name'); ?>
    </div>
    
    <div class="clearfix <?php if(form_error('username') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('username'), 'username'); ?></th>
         <div class="input"><?php echo form_input(array('id' => 'username','name' => 'username', 'value' => set_value('username'))); ?></div>
         <?php echo form_error('username'); ?>
    </div>
    
    <div class="clearfix <?php if(form_error('primary_email') != '' ){ echo 'error'; } ?>">        
        <?php echo form_label(lang('primary_email'), 'primary_email'); ?>
         <div class="input"><?php echo form_input(array('id' => 'primary_email','name' => 'primary_email', 'value' => set_value('primary_email'))); ?></div>
         <?php echo form_error('primary_email'); ?>
    </div>

    <div class="clearfix <?php if(form_error('primary_email_conf') != '' ){ echo 'error'; } ?>">        
         <?php echo form_label(lang('primary_email_conf'), 'primary_email_conf'); ?>
         <div class="input"><?php echo form_input(array('id' => 'primary_email_conf','name' => 'primary_email_conf', 'value' => set_value('primary_email_conf'))); ?></div>
         <?php echo form_error('primary_email_conf'); ?>
    </div>

    <div class="clearfix <?php if(form_error('cpf') != '' ){ echo 'error'; } ?>">
            <?php echo form_label(lang('cpf'), 'cpf'); ?>
         <div class="input"><?php echo form_input(array('id' => 'cpf','name' => 'cpf', 'value' => set_value('cpf'))); ?></div>
         <?php echo form_error('cpf'); ?>
    </div>
        
    <div class="clearfix <?php if(form_error('birthday') != '' ){ echo 'error'; } ?>">        
            <?php echo form_label(lang('birthday'), 'birthday'); ?>
            <div class="input"><?php echo form_input(array('id' => 'birthday','name' => 'birthday', 'value' => set_value('birthday'))); ?></div>
            <?php echo form_error('birthday'); ?>
    </div>

    <div class="clearfix <?php if(form_error('gender') != '' ){ echo 'error'; } ?>">
            <?php $gender_options = array('' => lang('select_your_gender'), 'M' => lang('male'), 'F' => lang('female')); ?>
            <?php echo form_label(lang('gender'), 'gender'); ?>
            <div class="input"><?php echo form_dropdown('gender', $gender_options, set_value('gender')); ?></div>
            <?php echo form_error('gender'); ?>
    </div>
        
    <div class="clearfix <?php if(form_error('password') != '' ){ echo 'error'; } ?>">
            <?php echo form_label(lang('password'), 'password'); ?>
            <div class="input"><?php echo form_password(array('id' => 'password','name' => 'password', 'value' => set_value(''))); ?></div>
            <?php echo form_error('password'); ?>
    </div>
        
    <div class="clearfix <?php if(form_error('passconf') != '' ){ echo 'error'; } ?>">
            <?php echo form_label(lang('passconf'), 'passconf'); ?>
            <div class="input"><?php echo form_password(array('name' => 'passconf', 'value' => set_value(''))); ?></div>
            <?php echo form_error('passconf'); ?>
    </div>

    <div class="actions"><?php $button = array('type' => 'submit', 'class' => 'btn primary'); echo form_submit($button, lang('save')); ?></div>
    
</fieldset>

<?php echo form_close(); ?>