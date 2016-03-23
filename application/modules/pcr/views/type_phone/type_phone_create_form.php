<?php
/**
 * Type_phone_create_form
 *
 * Comes in the form fields to create a company that will be displayed on the screen using form_validation
 *
 * Trata os campos do formulário de criação de uma empresa que serão exibidos na tela usando o form_validation
 * 
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
echo form_open($this->ctrlr_name . "/create");
?>
<table class="uiInfoTable">
    <tr class="dataRow">				
        <th class="label"><?php echo form_label(lang('name'), 'name'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'name', 'value' => set_value('name'))); ?></td>
        <td class="rightCol"><?php echo form_error('name'); ?></td>
    </tr>
    <tr class="dataRow">				
        <th class="label"><?php echo form_label(lang('description'), 'description'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'description', 'value' => set_value('description'))); ?></td>
        <td class="rightCol"><?php echo form_error('description'); ?></td>
    </tr>
     <tr class="dataRow">				
        <th class="label"></th>
        <td class="data"><?php echo form_submit('submit', 'Save'); ?></td>
        <td class="rightCol"></td>
    </tr>
</table>

<?php echo form_close(); ?>