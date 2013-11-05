<?php /* Smarty version 2.6.26, created on 2012-10-22 18:45:05
         compiled from formelements/error.tpl */ ?>
<?php if ($this->_tpl_vars['error'] != ''): ?>
<!--  start message-red -->
<div id="message-red" >
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="red-left"><?php echo $this->_tpl_vars['error']; ?>
</td>
            <td class="red-right"><a class="close-red"><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
icon_close_red.gif"   alt="" /></a></td>
        </tr>
    </table>    
</div>
<!--  end message-red -->
<?php endif; ?>