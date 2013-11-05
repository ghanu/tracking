<?php /* Smarty version 2.6.26, created on 2012-10-22 18:45:05
         compiled from formelements/warning.tpl */ ?>
<?php if ($this->_tpl_vars['page_warning'] != ''): ?>

<!--  start message-yellow -->
<div id="message-yellow">
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
            <td class="yellow-right"><a class="close-yellow"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
icon_close_yellow.gif"   alt="" /></a></td>
        </tr>
    </table>
</div>
<!--  end message-yellow -->
<?php endif; ?>