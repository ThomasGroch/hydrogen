<table>

<?php if ( isset($items) ) : ?>
    <div id="items_view">
        <?php foreach ( $items as $item ) : ?>
            <?php $this->load->view('pcr/phone/phone_mini_view', array('phone' => $item)) ?>
        <?php endforeach; ?>
    </div>	

</table>

    <script type="text/javascript">
        jQuery(document).ready(function() {    				
            function set_deletable() {
                jQuery('.delete').click(function() {
                    id = $(this).attr('data-id');
                    $.post('<?php echo site_url("phone/ajax_delete") ?>', {id: id }, 
                    function(info) {
                        jQuery("#phone_"+id).remove();
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
                
                $(".content").load("<?php echo site_url("phone/ajax_load_edit") ?>", {
                    address_id: $(this).val(),
                    id: $(this).attr('data-id'),
                    p_id: $(this).attr('data-p_id')
                });
            });		
        }
        	
        function prepare() {
            set_deletable();
            set_editable();
        }
        				
            prepare();	

        });

    </script>
<?php endif; ?>
