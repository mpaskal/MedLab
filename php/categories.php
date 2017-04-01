<?php
<?php if ($catid && is_numeric($catid)){?>

	<!-- category tree -->
	<br/>
	<div class="main_cat1">
	<a href="mysearch.php"><?php print $sph_messages['Categories']?></a> >
	<?php foreach ($cat_info['cat_tree'] as $_val){?>
		<a href="?catid=<?php print $_val['category_id']?>"><?php print $_val['category']?></a> >
	<?php  }?>
	</div>

	<!-- list of sub-categories -->
	<?php if ($cat_info['subcats']){?>
		<div class="catBanner"><?php print $sph_messages['Categories']?></div><br/>
		<?php foreach ($cat_info['subcats'] as $_key => $_val){?>
			<a href="?catid=<?php print $_val['category_id']?>"><b><?php print $_val['category']?></b></a> (<?php print $_val['count'][0][0]?>)<br>
		<?php  }?>
	<?php  }?>

	<!-- list of category web pages -->
	<?php if ($cat_info['cat_sites']){?>
		<div class="webPageBanner"><?php print $sph_messages['Web pages']?></div><br/>
		<?php foreach ($cat_info['cat_sites'] as $_key => $_val){?>
			<b><?php print $_key + 1?>.</b> <a href="<?php print $_val['url']?>"><b><?php print $_val['title']?></b></a><br><?php print $_val['short_desc']?><br><font class="url"><?php print $_val['url']?></font><br><br>
		<?php  }?>
	<?php  }?>
<div class="divline">
</div>

<?php } else {?>


	<!-- category selection -->
	<?php if ($cat_info['main_list']){?>
	<center><br>
		<div id="cat_main">
		<?php print $sph_messages['CATEGORIES']?>
		</div>

		<table id="cat_table" border="0" cellpadding="4">
		<tr>
		<?php foreach ($cat_info['main_list'] as $_key => $_val){
			$col_width=100/$cat_columns?>
			<td width="<?php print $col_width?>%">
				<a href="?catid=<?php print $_val['category_id']?>" class="main_cat1"><?php print $_val['category']?></a><br>&nbsp;&nbsp;
				<?php if (is_array($_val['sub'])) {
				foreach ($_val['sub'] as $__key => $__val){?>
					<!-- only 3 subcategories -->
					<?php if ($__key > 2) break?>
					<a href="?catid=<?php print $__val['category_id']?>" class="main_cat2"><?php print $__val['category']?></a>
				<?php  }?>
				<?php }?>
			</td>
			<!-- column nr defined in config -->
			<?php if (!(($_key +1)% $cat_columns)) {?></tr><tr><?php  }?>
		<?php  }?>
		</tr>
		</table>
	<?php  }?>
<?php  }?>

<div id="powered_by">
<!--If you want to remove this, please donate to the project-->
<?php poweredby()?>
</div>
?>
