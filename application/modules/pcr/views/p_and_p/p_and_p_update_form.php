<?php
$hidden = array('id' => $p_and_p->id);
echo form_open($this->ctrlr_name . "/edit/" . $p_and_p->id, '', $hidden);
?>

<table class="uiInfoTable">

    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('person'), 'p_id'); ?></th>
        <td class="data"><?php echo form_dropdown('p_id', $people, $p_and_p->p_id); ?></td>
        <td class="rightCol"><?php echo form_error('p_id'); ?></td>
    </tr>
    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('company'), 'p_id1'); ?></th>
        <td class="data"><?php echo form_dropdown('p_id1', $companies, $p_and_p->p_id1); ?></td>
        <td class="rightCol"><?php echo form_error('p_id1'); ?></td>
    </tr>
    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('role'), 'role_id'); ?></th>
        <td class="data"><?php echo form_dropdown('role_id', $roles, $p_and_p->role_id); ?></td>
        <td class="rightCol"><?php echo form_error('role_id'); ?></td>
    </tr>
    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('start_date'), 'start_date'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'start_date', 'value' => brazilian_datetime($p_and_p->start_date))); ?></td>
        <td class="rightCol"><?php echo form_error('start_date'); ?></td>
    </tr>
    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('end_date'), 'end_date'); ?></th>
        <td class="data"><?php echo form_input(array('name' => 'end_date', 'value' => !empty($p_and_p->end_date) ? brazilian_datetime($p_and_p->end_date) : '')); ?></td>
        <td class="rightCol"><?php echo form_error('end_date'); ?></td>
    </tr>
    <tr class="dataRow">
        <th class="label"></th>
        <td class="data"><?php echo form_submit('submit', lang('save')); ?></td>
        <td class="rightCol"></td>
    </tr>
</table>

<?php echo form_close(); ?>