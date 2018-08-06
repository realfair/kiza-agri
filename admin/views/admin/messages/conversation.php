<?php 
$cooperativeConversation=array();
$cooperativeConversation=$admin->loadCooperativeMessage($conversation);
?>
<div class="row">
	<div class="col-lg-12">
		<div style="box-shadow: 3px 3px 3px #efe;padding: 10px;margin: 10px;">
			<?php 
			foreach ($cooperativeConversation as $key => $value) {
				?>
				<h3><?php echo $value['title']; ?></h3>
				<p>
					<?php echo $value['body']; ?>
					<sub><span class="label label-danger"><?php echo $function->formatDate($value['sentDate']); ?></span></sub>
				</p>
				<?php
			}
			?>
		</div>
		<div class="basic-form">
			<ul>
			<?php 
			//get message comments
			$comments=array();
			$comments=$admin->getMessageComments($conversation);
			if(count($comments)>0){
				foreach ($comments as $key => $value) {
					if($value['senderId']==$adminId){
						?>
							<li>
								<p style="background-color: #0066cc;color: #fff;margin:2px;padding: 5px;border-radius: 5px;">
									<?php echo $value['comment']; ?>
								</p>
							</li>
						<?php
					}else{
						?>
							<li>
								<p style="background-color: #ccc;color: #333;margin:2px;padding: 15px;border-radius: 5px;">
									<?php echo $value['comment']; ?>
								</p>
							</li>
						<?php	
					}
					?>
					<?php
				}
			}else{
				?>
				<p style="padding: 10px;color: #fff;border-radius: 10px;background-color: #dd4422;margin:5px;">No comment attached to this message.</p>
				<?php
			}
			?>
		</ul>
		</div>
		<div class="basic-form" style="float: left;width:100%;">
			<form  id="send_comment">
			    <div class="form-group">
			        <p class="text-muted m-b-15 f-s-12">Send your comment.</p>
			        <div class="input-group input-group-rounded">
			            <input id="comment" type="text" placeholder="add comment" name="Search" class="form-control">
			            <span class="input-group-btn">
			            	<button class="btn btn-primary btn-group-right" type="submit">
			            		<i class="fa fa-send"></i>
			            	</button>
			            </span>
			        </div>
			    </div>
			</form>
		</div>
	</div>
</div>