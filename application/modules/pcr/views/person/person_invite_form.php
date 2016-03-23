<?php
if ( isset($role_id) )
{
    $hidden = array(
        'role_id' => $role_id,
        'role_name' => $role_name
    );

    echo form_open($this->ctrlr_name . "/invite_" . $role_name . "_to_company/", '', $hidden);
    $this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
    ?>

<formfield>

<div class="clearfix <?php if(form_error('p_id1') != '' ){ echo 'error'; } ?>">
    <?php echo form_label('Selecione uma Empresa', 'p_id1'); ?>
    <div class="input">
        <?php echo form_dropdown('p_id1', $emp_admin, set_value('p_id1'), 'id="p_id1" class="xlarge"'); ?>
        <?php echo form_error('p_id1'); ?>
    </div>
    
</div>
    
<div class="clearfix <?php if(form_error('person_to_invite') != '' ){ echo 'error'; } ?>">
    <?php echo form_label('Digite o nome da Pessoa', 'person_to_invite'); ?>
    <div class="input">
        <?php echo form_input(array('class' => 'xlarge','id' => 'person_to_invite', 'name' => 'person_to_invite', 'value' => set_value('person_to_invite'))); ?>
        <input id="add" type="button" value="<?php echo lang('add') ?>" class="btn"></input>
        <?php echo form_error('person_to_invite'); ?>
    </div>
</div>

<div class="clearfix <?php if(form_error('people_invited') != '' ){ echo 'error'; } ?>">
    <?php echo form_label('Pessoas adicionadas', 'multi_select'); ?>
    <div class="input">
        <?php echo form_multiselect('people_invited[]', $select_persons, '', 'id="multi_select" class="xlarge"'); ?>
        <?php echo form_error('people_invited'); ?>
    </div>
</div>
    
<div class="input">

    <input id="remove" type="button" class="btn" value="<?php echo lang('remove') ?>"></input>

</div>

<div class="actions">
    <?php echo form_submit('submit', lang('save'), 'class="btn primary"'); ?>
</div>

</formfield>


    <?php

echo form_close();

}
else
{
    echo sprintf(lang('the_role_not_exists'), $role_name);
}
?>

<script>
    (function( $ ) {
        $.ui.autocomplete.prototype.options.autoSelect = true;
        $("#person_to_invite").live( "blur", function( event ) {
            var autocomplete = $( this ).data( "autocomplete" );
            if ( !autocomplete.options.autoSelect || autocomplete.selectedItem ) { return; }

            var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" );
            autocomplete.widget().children( ".ui-menu-item" ).each(function() {
                var item = $( this ).data( "item.autocomplete" );
                if ( matcher.test( item.label || item.value || item ) ) {
                    autocomplete.selectedItem = item;
                    return false;
                }
            });
            if ( autocomplete.selectedItem ) {
                autocomplete._trigger( "select", event, { item: autocomplete.selectedItem } );
            }
        });

    }( jQuery ));

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#person_to_invite").autocomplete("<?php echo site_url('person/auto_complete'); ?>", {
            width:310
            
        });
        
        $("#add").click(function(){
            var valueAdd = $(":input#person_to_invite").val();
            $("#multi_select").removeOption("first"); 
            $("#multi_select").addOption(valueAdd,valueAdd); // use true if you want to select the added options 
        });
        
        $("#remove").click(function(){
            $("#multi_select").removeOption($("#multi_select").selectedValues()); 
        });
    });
    
</script>