<?php $this->load->view('header'); ?>

<div itemscope itemtype="http://schema.org/Organization">
    <span itemprop="name"><?php echo $type_email->get_name() ?></span>
    
    <a href="mailto:<?php echo $type_email->name ?>" itemprop="email">
        <?php echo $type_email->name ?>
    </a>    
</div>

<?php $this->load->view('footer'); ?>
