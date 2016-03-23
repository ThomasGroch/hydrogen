<?php
/**
 * Companies_mini_view
 *
 * Quick view to send e-mail to a company
 *
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
?>
<table>
    <thead>
        <tr>
            <th>Endereço</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>País</th>
        <tr/>
    </thead>
<?php if ( isset($items) ) : ?>
    <div id="items_view">
        <?php foreach ( $items as $item ) : ?>
            <?php $this->load->view('pcr/address/address_mini_view', array('address' => $item)) ?>
        <?php endforeach; ?>
    </div>	
    <?php
endif;
?>
</table>
<script type="text/javascript">
    jQuery(document).ready(function() {    				
        function set_deletable() {
            jQuery('.delete').click(function() {
                id = $(this).attr('data-id');
                $.post('<?php echo site_url("address/ajax_delete") ?>', {id: id }, 
                function(info) {
                    jQuery(".address_"+id).remove();
                    $("#info").html(info.msg); 
                    message()}, 
                "json");
                return false;
            });		
                    
            $('.delete').confirm({
                dialogShow: 'fadeIn',
                dialogSpeed: 'slow',
                wrapper:'<span class="confirm"></span>'
            });
        }
        
        function set_editable() {
            jQuery('.edit').click(function() {
                
                $(".content").load("<?php echo site_url("address/ajax_load_edit") ?>", {
                    address_id: $(this).val(),
                    id: $(this).attr('data-id'),
                    p_id: $(this).attr('data-p_id')
                }, function() {
                    select_state();
                });
                
            });		
        }
        
        function select_state() {
            $("#selectstate").bind("change",function(){
                $("#citieswrapper").load("<?php echo site_url("address/get_city") ?>", {
                    state_id: $(this).val()
                } );
            })
        }
	
        function prepare() {
            set_deletable();
            set_editable();
        }
        				
        prepare();
        		
    });

</script>