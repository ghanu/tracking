<?php /* Smarty version 2.6.26, created on 2013-08-26 22:22:02
         compiled from formelements/widget.tpl */ ?>
<div class="portlet">
    <div class="portlet-header"><span class="portlet-header-text"><?php echo $this->_tpl_vars['inputDetails']['title']; ?>
<span><span id="portlet-header-actions"></span></div>
    <div class="portlet-content"><?php echo $this->_tpl_vars['inputDetails']['content']; ?>
</div>
    <input type="hidden" id="dashboard_condition_<?php echo $this->_tpl_vars['inputDetails']['row']; ?>
_<?php echo $this->_tpl_vars['inputDetails']['col']; ?>
" class="content_hash" value='<?php echo $this->_tpl_vars['inputDetails']['content_hash']; ?>
' />
</div>