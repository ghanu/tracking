<?php /* Smarty version 2.6.26, created on 2012-10-22 18:45:05
         compiled from formelements/info.tpl */ ?>
<?php if ($this->_tpl_vars['info']['text'] != ''): ?>
<!--  start message-blue -->
<div id="message-blue">
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="blue-left"><a href="<?php echo $this->_tpl_vars['info']['url']; ?>
"><?php echo $this->_tpl_vars['info']['text']; ?>
</a> </td>
            <td class="blue-right"><a class="close-blue"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
icon_close_blue.gif"   alt="" /></a></td>
        </tr>
    </table>
</div>
<!--  end message-blue -->
<?php endif; ?>