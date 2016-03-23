<?php
echo form_open($this->ctrlr_name . "/save_permissions");
?>

<?php
$url = site_url('role_has_resource/change_permissions/');
$js = 'onChange="location=\'' . $url . '\'+\'/\'+options[selectedIndex].value;"';
?>


<table class="uiInfoTable">
    <tr class="dataRow">
        <th class="label"><?php echo form_label(lang('role'), 'role_id'); ?></th>
        <td class="data"><?php echo form_dropdown('role_id', $roles, $role_id, $js); ?></td>
        <td class="rightCol"><?php echo form_error('role_id'); ?></td>
    </tr>
</table>

<?php

$i = 0;
$controllers_names = array_keys($resources);
foreach ( $resources as $resource )
{
    ?>
    <table class="uiInfoTable">
        <tr class="dataRow">
            <th class="label"><?php echo $controllers_names[$i]; ?></th>

            <?php
            $z = 0;
            $action_names = array_keys($resource);
            foreach ( $resource as $action )
            {
                ?>
                <td class="data"><?php echo $action_names[$z] ?></td>
                <?php
                $z++;
            }
            ?>
        </tr>

        <tr class="dataRow">
            <th class="label"><?php echo lang('set_permission'); ?></th>


            <?php
            $z = 0;
            $action_names = array_keys($resource);
            foreach ( $resource as $action )
            {
                ?>

                <td class="data"><?php echo form_checkbox('resource_checkbox[]', $action, isset($permission_resources[$role_name][$controllers_names[$i]][$action_names[$z]]) ? TRUE : FALSE); ?></td>
                <?php
                $z++;
            }
            ?>
        </tr>
    </table>
    <?php
    $i++;
}
?>





<table class="uiInfoTable">
    <tr class="dataRow">				
        <th class="label"></th>
        <td class="data"><?php echo form_submit('submit', lang('save')); ?></td>
        <td class="rightCol"></td>
    </tr>
</table>

<?php echo form_close(); ?>