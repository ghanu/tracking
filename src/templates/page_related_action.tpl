{if $content_details_array.pageRelatedAction neq ''}
    <!--  start related-activities -->
    <div id="related-activities">

        <!--  start related-act-top -->
        <div id="related-act-top">
            <img src="{$AppImgURL}header_related_act.gif" width="271" height="43" alt="" />
        </div>
        <!-- end related-act-top -->

        <!--  start related-act-bottom -->
        <div id="related-act-bottom">

            <!--  start related-act-inner -->
            <div id="related-act-inner">
                {foreach key=item_no item=actionDetails from=$content_details_array.pageRelatedAction name=related_items}
                    <div class="left"><a href="{$actionDetails[1]}"><img src="{$AppImgURL}icon_plus.gif" width="21" height="21" alt="" /></a></div>
                    <div class="right">
                        <a href="{$actionDetails[1]}"><h5>{$actionDetails[0]} </h5></a>
                        {$actionDetails[2]}

                    </div>
                    <div class="clear"></div>
                    {if $smarty.foreach.related_items.last eq FALSE}

                        <div class="lines-dotted-short"></div>
                    {/if}
                {/foreach}

            </div>
            <!-- end related-act-inner -->
            <div class="clear"></div>

        </div>
        <!-- end related-act-bottom -->

    </div>
    <!-- end related-activities -->
{/if}