<?php /* Smarty version 2.6.26, created on 2012-10-22 18:47:53
         compiled from formelements/reset_button.tpl */ ?>
<div class="btn-submit">
     <input 
            type="reset" 
            class="<?php if ($this->_tpl_vars['inputDetails']['class'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['class']; ?>
<?php else: ?>button<?php endif; ?>" 
            style="<?php echo $this->_tpl_vars['inputDetails']['style']; ?>
"
            name="<?php if ($this->_tpl_vars['inputDetails']['name'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php endif; ?>" 
            id="<?php if ($this->_tpl_vars['inputDetails']['id'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['inputDetails']['name']; ?>
<?php endif; ?>" 
            value="<?php if ($this->_tpl_vars['inputDetails']['value'] != ''): ?><?php echo $this->_tpl_vars['inputDetails']['value']; ?>
<?php else: ?>Reset<?php endif; ?>"
            
            />

</div>