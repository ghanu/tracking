<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="" onfocus="">
		</form>
		<hr/>





    {foreach item=menu_array from=$menu}
        
		<h3>{$menu_array.1}</h3>
<ul class="toggle">
                {foreach item=child_menu1_array from=$menu_array.sub}
                    <li class="icn_new_article"><a id="menu_{$child_menu1_array.0}" href="{$AppURL}{$child_menu1_array.2}">{$child_menu1_array.1}</a></li>          
                {/foreach}
            </ul>
        
    {/foreach}

	<footer>
			<hr />
			
			<a href="{$CompanyURL}">{$CompanyName} &copy; &nbsp;</a>
		</footer>
	<footer/>
	
		
	</aside><!-- end of sidebar -->