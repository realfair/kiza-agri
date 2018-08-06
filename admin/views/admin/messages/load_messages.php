<button class="btn btn-info" data-target="#messageModal" data-toggle="modal" type="button">
	SEND NEW MESSAGE
</button>
<?php include $urls['add_message']; ?>
<?php 
$cooperativeMessages=array();
$cooperativeMessages=$admin->loadCooperativeCommunication($cooperativeId);
if(count($cooperativeMessages)>0){
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
    	<thead>
    		<tr>
    			<th>Title</th>
    			<th>Body</th>
    			<th>Category</th>
    			<th>status</th>
    			<th>Sent</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php 
    		foreach ($cooperativeMessages as $key => $value) {
    			?>
    			<tr>
    				<td>
    					<?php echo $value['title']; ?>
    				</td>
    				<td>
    					<?php echo $value['body']; ?>
    				</td>
    				<td>
    					<?php echo $value['category']; ?>
    				</td>
    				<td>
    					<?php
    					if($value['status']=="UNREAD"){
    						?>
    						<span class="label label-danger">
    							<?php echo $value['status']; ?>
    						</span>
    						<?php
    					}else{
    						?>
    						<span class="label label-info">
    							<?php echo $value['status']; ?>
    						</span>
    						<?php	
    					}
    					?>
    				</td>
    				<td>
    					<?php echo $function->formatDate($value['sentDate']); ?>
    				</td>
    				<td>
    					<a href="coop_conversation?conversation=<?php echo $value['messageId']; ?>" class="btn btn-sm btn-success">
    						VIEW CONVERSATION
    					</a>
    				</td>
    			</tr>
    			<?php
    		}
    		?>
    	</tbody>
    </table>
</div>
<?php
}else{
	?>
	<p style="padding: 10px;color:#fff;background: red;border-radius: 10px;margin:10px;">
		No conversation with this cooperative you can communicate with them by clicked the above button.
	</p>
	<?php
}
?>