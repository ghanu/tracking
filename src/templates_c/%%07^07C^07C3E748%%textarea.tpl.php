<?php /* Smarty version 2.6.26, created on 2012-11-03 04:13:54
         compiled from formelements/textarea.tpl */ ?>
<?php echo $this->_tpl_vars['inputDetails']['preappend']; ?>


<textarea 
	class="textarea"
    name="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>" 
    id='<?php if ($this->_tpl_vars['inputDetails']['id'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php endif; ?>'
    <?php if ($this->_tpl_vars['inputDetails']['readonly'] != ''): ?> readonly="readonly"<?php endif; ?>
    <?php echo $this->_tpl_vars['inputDetails']['required']; ?>

    placeholder="<?php echo $this->_tpl_vars['inputDetails']['placeholder']; ?>
"
    rows="<?php echo $this->_tpl_vars['inputDetails']['rows']; ?>
" 
    cols="<?php echo $this->_tpl_vars['inputDetails']['cols']; ?>
"
    wrap="soft"><?php echo $this->_tpl_vars['inputDetails']['value']; ?>
</textarea>
    
<?php echo $this->_tpl_vars['inputDetails']['append']; ?>
