<form action="" method="post" name="frmCont" id="frmCont" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
	<div class="form-body">
        <div class="padtop10 flclear"></div>
		<div class="form-group">
		    <label class="control-label col-md-3" for="subject">Email Template Name</label>
		    <div class="col-md-4">
		        <input class="form-control logintextbox-bg required" id="html_name" name="html_name" type="text" value="%HTML_NAME%"/>
		    </div>
		</div>
		<div class="padtop10 flclear"></div>
		<div class="form-group">
		    <label class="control-label col-md-3" for="subject">Subject</label>
		    <div class="col-md-4">
		        <input class="form-control logintextbox-bg required" id="subject_name" name="subject_name" type="text" value="%SUBJECT_NAME%"/>
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-md-3" for="subject">Action</label>
		    <div class="col-md-4">
		        <input class="form-control logintextbox-bg required" id="action" name="action" type="text" value="%ACTION%"/>
		    </div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-md-3">Email HTML</label>
			<div class="col-md-9">
				<textarea class="ckeditor form-control textarea-bg required" name="html_code" id="html_code">
					%HTML_CODE%
				</textarea>
			</div>
		</div>
		
		<script type="text/javascript">$(function(){loadCKE("html_code");});</script>
		
		<input type="hidden" name="type" id="type" value="%TYPE%">
		<div class="flclear clearfix"></div>
		<input type="hidden" name="id" id="id" value="%ID%">
		<div class="padtop20"></div>
	</div>
	<div class="form-actions fluid">
		<div class="col-md-offset-3 col-md-9">
			<button type="submit" name="submitAddForm" class="btn green" id="submitAddForm">Submit</button>
			&nbsp;&nbsp;&nbsp;
			<button type="button" name="cn" class="btn btn-toggler" id="cn">Cancel</button>
		</div>
	</div>
</form>