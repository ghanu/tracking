<?php /* Smarty version 2.6.26, created on 2012-10-22 18:58:11
         compiled from formelements/label.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'formelements/label.tpl', 3, false),)), $this); ?>

<?php if ($this->_tpl_vars['inputDetails']['type'] == 'date'): ?> 
    <label name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
" id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
" class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
" > <?php echo ((is_array($_tmp=$this->_tpl_vars['inputDetails']['value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['AppDateFormatTpl']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['AppDateFormatTpl'])); ?>
 </label>
<?php else: ?>    
    <label name="<?php echo $this->_tpl_vars['inputDetails']['name']; ?>
" id="<?php echo $this->_tpl_vars['inputDetails']['id']; ?>
" class="<?php echo $this->_tpl_vars['inputDetails']['class']; ?>
" > <?php echo $this->_tpl_vars['inputDetails']['value']; ?>
 </label>
<?php endif; ?>