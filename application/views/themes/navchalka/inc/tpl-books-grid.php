<?if($total_rows):?>

<table class="table products-grid">
<tbody>
	<tr>
		<?$i=0; foreach ($posts_list as $row): $i++?>
		
		    <?if($i!=1 && !(($i-1)%2)):?></tr><tr><?endif?>
		
		        <td width="50%">
		        	<form action="<?=relative_url($BC->_getBaseURL()."/cart/add")?>" class="add-product">
                        <?=form_hidden('id',$row->data_key)?>
                        <?=form_hidden('qty',1)?>
                        <div class="row-fluid">

		                    <div class="product_image_container span6">
		                        <a title="<?=htmlspecialchars($row->name)?>" href="<?=site_url($BC->_getBaseURL().'books/name/'.$row->slug.url_category_addition())?>">
	                    			<?if(@$row->photo1) echo img(array('src'=>'images/data/m/books/'.$row->photo1))?>
	                    		</a>
		                    </div>
		
		                    <div class="span6">
		
	                            <div class="product-title">
	                                <?=anchor_base('books/name/'.$row->slug.url_category_addition(),utf8_wordwrap($row->name,17,' '),"class='product_name'")?>
	                            </div>

                                <div class="product-buy pull-right">

                                    <?if($row->in_stock):?>

                                        <div class="pull-right">
                                            <?=form_submit('',language('buy'),"class='btn btn-primary'")?>
                                        </div>

                                        <div class="product-price pull-right">
                                            <?=exchange($row->price)?>
                                        </div>

                                    <?else:?>
                                        <?=language('not_in_stock')?>
                                    <?endif?>

                                </div>
	                                
		                    </div>

                        </div>

		             </form>
	            </td>
		
		<?endforeach;?>
		
		<?while($i%2):$i++?><td width="50%"></td><?endwhile?>
	</tr>
</tbody>
</table>

<?endif?>