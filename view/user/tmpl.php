<script>
function confirmdelete(){
var x = confirm("Are you sure  to delete ?");
	if(x)
	{
		return x;
	}else{
		return x;
	}	
}
</script>
<script>
$(document).ready(function(){
 $.fn.myFunction = function(){ 
      var val = document.getElementById("row_no").value;
	  where =document.getElementById('where').value;
	  document.getElementById("row_no").value = Number(val)+15;
	  //alert(val);
	  
      $.ajax({
      type: 'post',
      url: 'index.php',
     data: "aj=y&chk=pagination&onlink=user&getresult="+val+"&where="+where,
     beforeSend: function(){
			$('#loader-icon').show();
			},
	complete: function(){
			$('#loader-icon').hide();
			},
	success: function(data){
		//alert(data);
			if (data === "no") {
				$('#loader-icon').hide();
			}else {
				$("#faq-result").append(data);
			}	
			},

      // We increase the value by 10 because we limit the results by 10
     
    
});
}	
    $(window).scroll(function(){
        //alert(2);  
	if($(document).height() <= $(window).scrollTop() + $(window).height()){
	  	$.fn.myFunction();
		//loadmore();
	  } 
    })
})
</script>
<?php $where = "";
if( isset($_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder']!="" ) {
	$where = " where (uname like '%".$_REQUEST['searchbyorder']."%' OR urole like '%".$_REQUEST['searchbyorder']."%' OR umobile like '%".$_REQUEST['searchbyorder']."%' OR uemail like '%".$_REQUEST['searchbyorder']."%' )";
}
$Count = $ketObj->runquery( "SELECT", "count(*)", "nar_user", array(), $where  );
$hold = $Count['0']['count(*)']; 
$counter = 1; 	
if(isset($_GET['vid']) && $_GET['vid']!="") {
	$vid1 = ($_GET['vid']-1)*10;
	$counter= $vid1+1;
	$vid1 = ($_GET['vid']-1)*10;
	$allUser = $ketObj->runquery( "SELECT", "*", "nar_user", array(), $where." limit ".$vid1.",10"  );
	//$rowe = runquery("SELECT","*","artical","","".$where."limit ".$vid1.",10");
    //$count= $vid1+1;
}
else {
	$allUser = $ketObj->runquery( "SELECT", "*", "nar_user", array(), $where." limit 0,15"  );
}
$qstring="";
if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){	
	$qstring .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
}
if( isset( $_REQUEST['vid'] ) && $_REQUEST['vid'] >0 ){	
	$qstring .= '&vid='.$_REQUEST['vid'].'';
}

    /*echo "<pre>";
	print_r( $alluser );
	die();*/
?>
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                              User List
                			</h3>
                        </div>
						
                        <div class="title_right">
                           <form name="searchorder" id = "searchorder" action="index.php" method="post" role ="search" class="navbar-form">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
									<div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for..." name = "searchbyorder" value="<?php if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){ echo $_REQUEST['searchbyorder'];} ?>" />
									
                              <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button></span>
								
                                </div>
                            </div>
							<input type="hidden" class="form-control" placeholder="Search for..." name = "view" value="user" />
						</form>	
						
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Results </h2>
										<ul class="nav navbar-right panel_toolbox">
                                      
                                    </ul>
                                  <div class="clearfix"></div>
                                   
								</div>	
                               
                                <div class="x_content" id="all_row">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>User Name</th>
													<!--<th>Role</th>-->
													<th>Email</th>
													<th>Mobile</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="faq-result">
												<?php
													$counter = 1;
													if( isset( $allUser ) && is_array( $allUser ) && count( $allUser ) > 0 )
													{
														foreach( $allUser as $allUserK=>$allUserV ) {
												?>                     
															<tr>
																<th scope="row"><?php echo $counter; ?></th>
																<td><?php echo $allUserV['uname']; ?></td>
																<!--<td><?php echo $allUserV['urole']; ?></td>-->
																<td><?php echo $allUserV['uemail']; ?></td>
																<td><?php echo $allUserV['umobile']; ?></td>
																
												
																<td><?php if (isset($_SESSION['user_add'])) {
											echo $_SESSION['user_add']>0 ? '<a href ="index.php?view=user&file=add&edit='. $allUserV['uid'].''.$qstring.'"class ="btn btn-info">Edit</a>':'<a href="#" class ="largeWarningBasic btn btn-info">Edit</a>';
										}else {
										?>
										<a href ="index.php?view=user&file=add&edit=<?php echo $allUserV['uid'];?><?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>" class ="btn btn-info">Edit</a>
                                        
									<?php
										}
									?>
																
									<?php if (isset($_SESSION['user_add'])) {
											echo $_SESSION['user_add']>0 ? '<a href ="index.php?controller=delete&delete='. $allUserV['uid'].'&chk=userdelete&view=user'.$qstring.'"class ="btn btn-danger onclick="return confirmdelete()"">Delete</a>':'<a href="#" class ="largeWarningBasic btn btn-danger">Delete</a>';
										}else {
										?>
										<a href ="index.php?controller=delete&delete=<?php echo $allUserV['uid']; ?>&chk=userdelete&view=user<?php if( isset( $qstring ) && $qstring!=""){ echo $qstring;} ?>"class ="btn btn-danger" onclick="return confirmdelete()">Delete</a></td>
                                        
									<?php
										}
									?>
									
										</tr>
												<?php			
													$counter++;	}	
														
													 }	
													
											
												/*$path = 'index.php?view=user';
													
													
													if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){
														$path .= '&searchbyorder='.$_REQUEST['searchbyorder'].'';
													}
													echo '<tr><td align = "center" colspan = "15">'; 
													echo $ketObj->paginate($path,$hold);
													echo '</td></tr>';*/
											?>		 
											</tbody>
										</table>
										<input type="hidden" id="row_no" value="15">
										<input type="hidden" id="where" name="where" value="<?php if( isset( $_REQUEST['searchbyorder'] ) && $_REQUEST['searchbyorder'] != "" ){ echo $_REQUEST['searchbyorder'];}else{ echo "";} ?>">
									</div>
									<div id="loader-icon" style ="display:none;" align="center"><img src="LoaderIcon.gif" /></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
