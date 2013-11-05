<?php /* Smarty version 2.6.26, created on 2012-01-24 13:47:49
         compiled from header.tpl */ ?>
<html>
    <head>
        <title>
            <?php if ($this->_tpl_vars['content_details_array']['page']['heading']): ?><?php echo $this->_tpl_vars['content_details_array']['page']['heading']; ?>
<?php else: ?><?php echo $this->_tpl_vars['content_details_array']['page']['title']; ?>
<?php endif; ?>
        </title>
        <script>
            var AppImgURL='<?php echo $this->_tpl_vars['AppImgURL']; ?>
';
            var AppURL='<?php echo $this->_tpl_vars['AppURL']; ?>
';
            var AppJsURL='<?php echo $this->_tpl_vars['AppJsURL']; ?>
';
            var AppCssURL='<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
            var AppScriptURL='<?php echo $this->_tpl_vars['AppCssURL']; ?>
';
            
        </script>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
geotheme1.css" media="screen"  />        
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['AppCssURL']; ?>
smoothness/jquery-ui.css"  />
        <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.js"></script>
        <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-ui.js" ></script>
        <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
geo.base.js" ></script>
        <script src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
custom_jquery.js" ></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery-1.4.1.min"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
jquery.cookie.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['AppJsURL']; ?>
mnu.js"></script>
        
    </head>
    <body>
        <!-- Start: page-top-outer -->
        <div id="page-top-outer">    
            <!-- Start: page-top -->
            <div id="page-top">
                <!-- start logo -->
                <div id="logo"><a href=""><img src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
logo.png" width="166" height="60" alt="" /></a></div>
                <!-- end logo -->
                <!--  start top-search -->
                <div id="top-search">
                    <?php if ($_SESSION['user_id']): ?>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><input type="text" value="Search" onBlur="" class="top-search-inp" /></td>
                            <td>
                                <select  class="styledselect">
                                    <option value=""> All</option>
                                    <option value=""> Products</option>
                                    <option value=""> Categories</option>
                                    <option value="">Clients</option>
                                    <option value="">News</option>
                                </select>                            </td>
                            <td>
                                <input type="image" src="<?php echo $this->_tpl_vars['AppImgURL']; ?>
top_search_btn.gif"  />                            </td>
                        </tr>
                    </table>
                    <?php endif; ?>                </div>
                <!--  end top-search -->
                <div class="clear"></div>
            </div>
          <!-- End: page-top -->
        </div>
        <!-- End: page-top-outer -->
    <div style="width:100%;height:95%">