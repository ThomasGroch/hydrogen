<?php if ( isset($items) ) : ?>
<table>
    <thead>
        <th>Tipo</th>
        <th>Endereço</th> 
    </thead>
    <div id="items_view">
        <?php foreach ( $items as $item ) : ?>
            <?php $this->load->view('pcr/email/email_mini_view', array('email' => $item)) ?>
        <?php endforeach; ?>
    </div>	
</table>
    <script type="text/javascript">
        jQuery(document).ready(function() {    				
            function set_deletable() {
                jQuery('.delete').click(function() {
                    id = $(this).attr('data-id');
                    $.post('<?php echo site_url("email/ajax_delete") ?>', {id: id }, 
                    function(info) {
                        jQuery("#email_"+id).remove();
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
                    
                    $(".content").load("<?php echo site_url("email/ajax_load_edit") ?>", {
                        id: $(this).attr('data-id')
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
