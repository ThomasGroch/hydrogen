<?php $this->load->view('header'); ?>
<table>
<tr itemscope itemtype="http://schema.org/Organization">
    <td itemprop="name"><?php echo $person->get_name() ?></td>
    <td> <a href="mailto:<?php echo $person->primary_email ?>" itemprop="email">
        <?php echo $person->primary_email ?>
    </a>
    </td>
</tr>
</table>
<?php $this->load->view('footer'); ?>
