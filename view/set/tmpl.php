<?php $allSet = $ketObj->runquery( "SELECT", "*", "nar_set", array(), ""  );
if (isset($allSet) && is_array($allSet) && count($allSet) > 0) {
	$uname			=	$allSet[0]['username'];
	$upassword      =   $allSet[0]['password'];
	$address =         $allSet[0]['address'];
	$telephone =         $allSet[0]['telephone'];
	$email =         $allSet[0]['email'];
	$eday=$allSet[0]['eday'];
	$irate=$allSet[0]['irate'];
}else {	
	$uname			=	"";
	$upassword      =   "";
	$address =         "";
	$telephone =        "";
	$email =         "";
	$eday="";
	$irate="";
}
?>
<form class="form-horizontal form-label-left" data-parsley-validate="" name="allsetting" method="post" action="index.php" enctype="multipart/form-data">
<div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>All Settings</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">


                                    <!--<div data-example-id="togglable-tabs" role="tabpanel" class="">
                                        <ul role="tablist" class="nav nav-tabs bar_tabs" id="myTab">
                                            <li class="active" role="presentation"><a aria-expanded="false" data-toggle="tab" role="tab" id="home-tab" href="#tab_content1">Basic</a>
                                            </li>
                                            <li class="" role="presentation"><a aria-expanded="false" data-toggle="tab" id="profile-tab" role="tab" href="#tab_content2">Category & Product</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">-->
                                            <!--<div aria-labelledby="home-tab" id="tab_content1" class="tab-pane fade active in" role="tabpanel">-->
                                                <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Admin Name" type="text" class="form-control col-md-7 col-xs-12" required="required" id="uname" name="uname" data-parsley-id="3686" value="<?php echo $uname; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">

<label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</span>

</label>

<div class="col-md-6 col-sm-6 col-xs-12">

<input placeholder="photo" type="file" class="form-control col-md-7 col-xs-12" id="cphoto" name="cphoto" data-parsley-id="3686" value="<?php ##echo $cphoto; ?>"/>

</div>

</div>
                                        <!--<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Admin Phone" type="text" class="form-control col-md-7 col-xs-12" required="required" id="uphone" name="uphone" data-parsley-id="3686" value="<?php echo $uphone; ?>"/>
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Admin Password" type="text" class="form-control col-md-7 col-xs-12" required="required" id="upassword" name="upassword" data-parsley-id="3686" value="<?php echo $upassword; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Address" type="text" class="form-control col-md-7 col-xs-12"  id="address" name="address" data-parsley-id="3686" value="<?php echo $address; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tel:<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Telephone Number" type="text" class="form-control col-md-7 col-xs-12"  id="telephone" name="telephone" data-parsley-id="3686" value="<?php echo $telephone; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email:<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Email Address" type="email" class="form-control col-md-7 col-xs-12" id="email" name="email" data-parsley-id="3686" value="<?php echo $email; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">EMI Day:<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="EMI Day:" type="number" class="form-control col-md-7 col-xs-12" id="eday" name="eday" data-parsley-id="3686" value="<?php echo $eday; ?>"min="0"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Interest Rate <span class="required"></span>
                                            </label>
											
                                            <div class="col-md-6 col-sm-6 col-xs-12">
											
                                               <div class="input-group"><input placeholder="Interest Rate:" type="number" class="form-control col-md-7 col-xs-12" id="irate" name="irate" data-parsley-id="3686" value="<?php echo $irate; ?>"/>
												<span  class="input-group-addon">%</span>
                                            </div>
											</div>
											
											
											
                                        </div>
										<!--<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Admin Email" type="text" class="form-control col-md-7 col-xs-12" required="required" id="uemail" name="uemail" data-parsley-id="3686" value="<?php echo $uemail; ?>"/>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">CC<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <textarea rows="4" cols="50" name = "emailcc"><?php echo $emailcc;	?></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Base URL<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Base URL" type="text" class="form-control col-md-7 col-xs-12"  id="burl" name="burl" data-parsley-id="3686" value="<?php echo $burl; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Referral Amount<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Referral Amount" type="text" class="form-control col-md-7 col-xs-12"  id="ref_amount" name="ref_amount" data-parsley-id="3686" value="<?php echo $ref_amount; ?>"/>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Skip From Search(id's)<span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Skip From Search(id's)" type="text" class="form-control col-md-7 col-xs-12"  id="pskip" name="pskip" data-parsley-id="3686" value="<?php echo $pskip; ?>"/><span style="float:right">(separated by comma)<span>
                                            </div>
                                        </div>-->
										<div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>
                                        </div>
								<!--</div>		
                                            <div aria-labelledby="profile-tab" id="tab_content2" class="tab-pane fade" role="tabpanel">
                                                <div class="x_content">
                                    <br>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Thumb (px) <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Width" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_thmub_w" name="cat_thmub_w" data-parsley-id="3686" style="width:50%" value="<?php echo $cat_thmub_w; ?>"/><input placeholder="Height" style="width:50%" value="<?php echo $cat_thmub_h; ?>" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_thmub_h" name="cat_thmub_h" data-parsley-id="3686"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Full (px) <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Width" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_full_w" name="cat_full_w" data-parsley-id="3686" style="width:50%" value="<?php echo $cat_full_w; ?>"/><input placeholder="Height" style="width:50%" value="<?php echo $cat_full_h; ?>" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_full_h" name="cat_full_h" data-parsley-id="3686"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Thumb (px) <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Width" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_prod_w" name="cat_prod_w" data-parsley-id="3686" style="width:50%" value="<?php echo $cat_prod_w; ?>"/><input placeholder="Height" style="width:50%" value="<?php echo $cat_prod_h; ?>" type="text" class="form-control col-md-7 col-xs-12" required="required" id="cat_prod_h" name="cat_prod_h" data-parsley-id="3686"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Full (px) <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input placeholder="Width" type="text" class="form-control col-md-7 col-xs-12" required="required" id="prod_full_w" name="prod_full_w" data-parsley-id="3686" style="width:50%" value="<?php echo $prod_full_w; ?>"/><input placeholder="Height" style="width:50%" value="<?php echo $prod_full_h; ?>" type="text" class="form-control col-md-7 col-xs-12" required="required" id="prod_full_h" name="prod_full_h" data-parsley-id="3686"/>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>
                                        </div>
                                </div>
                                            </div>-->
                                        <!--</div>
                                    </div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	<input type="hidden" name="task" value="saveSetting" />
	<input type="hidden" name="controller" value="set" />
	<input type="hidden" name="file" value="tmpl" />
</form>			