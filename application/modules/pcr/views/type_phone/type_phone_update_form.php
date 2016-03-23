<?php
$hidden = array('id' => $type_phone->id);
echo form_open($this->ctrlr_name . "/edit/" . $type_phone->id, '', $hidden);
?>
<table class="uiInfoTable">
    <tr class="dataRow">				
        <th class="label"><?php echo form_label(lang('name'), 'name'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'name', 'value' => $type_phone->name)); ?></td>
        <td class="rightCol"><?php echo form_error('name'); ?></td>
    </tr>
    <tr class="dataRow">				
        <th class="label"><?php echo form_label(lang('description'), 'description'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'description', 'value' => $type_phone->description)); ?></td>
        <td class="rightCol"><?php echo form_error('description'); ?></td>
    </tr>
        <tr class="dataRow">				
        <th class="label"></th>
        <td class="data"><?php echo form_submit('submit', lang('save')); ?></td>
        <td class="rightCol"></td>
    </tr>
</table>

<?php echo form_close(); ?>
