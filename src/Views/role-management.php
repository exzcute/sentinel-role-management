<div class="permission">
	<div class="row">
		<div class="col-xs-6">
			<div class="checkbox">
				<input type="checkbox" id="checkbox-<?= $name ?>" checked-all <?=@$readonly?'disabled':'';?> >
				<label for="checkbox-<?= $name ?>">เลือกทั้งหมด</label>
			</div>
		</div>
		<div class="col-xs-6 text-right">
			<a href="javascript:void(0)" class="hide-all" id="show-<?= $name ?>"><i class="fa fa-plus-square"></i> แสดงทั้งหมด</a>
		</div>
	</div>
	<ul id="permission-<?= $name ?>">
		<?php foreach($permissions as $modul => $methods): ?>
		<li modul="<?=$modul?>">
			<a href="javascript:void(0)" class="switch hide-method"><i class="fa fa-plus-square"></i></a>
			<div class="checkbox">
				<input type="checkbox" id="checkbox-<?=$modul?>" check-all="<?=$modul?>" <?=@$readonly?'disabled':'';?> >
				<label for="checkbox-<?=$modul?>">

					<?php if(substr($modul, 0, 3) == "app"): ?>

						<?=__(str_replace('app.','',$modul))?>

					<?php else: ?>

						<?=__(str_replace('admin.','',$modul))?>

					<?php endif ?>

				</label>
			</div>
			<ul class="" list-modul="<?=$modul?>">
				<?php foreach($methods as $index => $method): ?>
				<li>
					<div class="checkbox">
						<input type="checkbox" 
						id="checkbox-<?=$modul?>-<?=$method?>" 
						name="permissions[]" 
						value="<?=$modul?>.<?=$method?>"
						<?=@$readonly?'disabled':'';?> 
						<?=(in_array("$modul.$method", $user_permis))?'checked="true"':'';?>
						>
						<label for="checkbox-<?=$modul?>-<?=$method?>"><?=__($method)?></label>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</li>
		<?php endforeach; ?>
	</ul>
</div>


<script>
$(function(){
	$('#permission-<?= $name ?>').permis();
})
</script>