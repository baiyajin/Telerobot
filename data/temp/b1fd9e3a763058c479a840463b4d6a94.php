<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"/www/wwwroot/web/application/common/view/default/form/image.html";i:1551953778;}*/ ?>
	<div class="picker-box">
		<div id="picker_<?php echo $field; ?>" class="picker_button">上传图片</div>
		<?php if(isset($value) && $value): ?>
		<input type="hidden" name="<?php echo $field; ?>" id="field_<?php echo $field; ?>" value="<?php echo $value; ?>">
		<?php else: ?>
		<input type="hidden" name="<?php echo $field; ?>" id="field_<?php echo $field; ?>" value="">
		<?php endif; ?>
		<div id="fileList_<?php echo $field; ?>" class="upload-file-list-info" style="width:280px;">
			<?php if($value): 
			$images = get_cover($value);
			
			 ?>
			
			<li class="affix-list-item" id="WU_FILE_0">
				<?php if($images): ?>
				<div class="upload-file-info">
					<span class="webuploader-pick-file-close" data-queued-id="WU_FILE_0" data-id="<?php echo $value; ?>" data-fileurl="<?php echo $images['path']; ?>"><i class="close"></i></span>
					<span class="fname"></span>
					<span class="fsize">上传时间:<?php echo date('Y-m-d H:i:s',$images['create_time']); ?></span>
					<div class="clearfix"></div>
				</div>
				<div class="filebox image">
					<img src="<?php echo $images['path']; ?>" class="img-responsive">
				</div>
				<?php endif; ?>
			</li>
			
			<?php endif; ?>
		</div>
	</div>
	<script type="text/javascript">
		uploadsize =  2;
		$(function(){
			$("#picker_<?php echo $field; ?>").SentUploader({
					fileNumLimit:1,
					uploadEvents: {
						uploadComplete:function(file){}
					},
					listName : 'fileList_<?php echo $field; ?>',
					hiddenName: 'field_<?php echo $field; ?>',
					hiddenValType:1,
					fileSingleSizeLimit:uploadsize*1024*1024,
					closeX:true,
					server:"<?php echo url('upload/upload'); ?>",
					delUrl:"<?php echo url('upload/delete'); ?>",
				});
		});
	</script>