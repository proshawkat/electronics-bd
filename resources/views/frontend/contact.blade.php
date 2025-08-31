@extends('layouts.frontend')

@section('content')

<div id="top" class="top top-row">
	<div class="grid-rows">
		<div class="grid-row grid-row-top-1">
			<div class="grid-cols">
				<div class="grid-col grid-col-top-1-1">
					<div class="grid-items">
						<div class="grid-item grid-item-top-1-1-1">
							<div class="module module-blocks module-blocks-104 blocks-grid">
								<div class="module-body">
									<div class="module-item module-item-1 no-expand">
										<div class="block-body expand-block">
											<div class="block-wrapper">
												<div class="block-content block-map">
													<div class="journal-loading" style="display: none;"><i class="fa fa-spinner fa-spin"></i></div>
													<iframe src="https://snazzymaps.com/embed/96743"></iframe>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="information-contact" class="container">
	<div class="row">
		<div id="content" class="col-sm-12">
			<div id="content-top">
				<div class="grid-rows">
					<div class="grid-row grid-row-content-top-1">
						<div class="grid-cols">
							<div class="grid-col grid-col-content-top-1-1">
								<div class="grid-items">
									<div class="grid-item grid-item-content-top-1-1-1">
										<div class="module module-info_blocks module-info_blocks-194">
											<div class="module-body">
												<div class="module-item module-item-1 info-blocks info-blocks-icon">
													<div class="info-block">
														<div class="info-block-content">
															<div class="info-block-title">Store Address</div>
															<div class="info-block-text">Ibrahim Electrict &amp; Electronics Market (Level-3) 124 BCC Road (Near Chandpur Tower &amp; Al Zafor Market) Nawabpur, Dhaka-1203</div>
														</div>
													</div>
												</div>
												<div class="module-item module-item-2 info-blocks info-blocks-icon">
													<a href="tel:01722437801" class="info-block">
														<div class="info-block-content">
															<div class="info-block-title">Call Us</div>
															<div class="info-block-text">Tel: 01722437801</div>
														</div>
													</a>
												</div>
												<div class="module-item module-item-3 info-blocks info-blocks-icon">
													<a href="mailto:service@citytechbd.com" class="info-block">
														<div class="info-block-content">
															<div class="info-block-title">Email</div>
															<div class="info-block-text">service@citytechbd.com</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="grid-col grid-col-content-top-1-2">
								<div class="grid-items">
									<div class="grid-item grid-item-content-top-1-2-1">
										<div class="module module-form module-form-20">
											<h3 class="title module-title">Looking forward to hearing from you</h3>
											<div class="module-body">
												<form action="https://www.citytechbd.com/index.php?route=journal3/form/send&amp;module_id=20" method="post" enctype="multipart/form-data" class="form-horizontal">
													<fieldset>
														<div class="form-group custom-field required">
															<label class="col-sm-2 control-label" for="field-68b29ff313e30-1">Your Name</label>
															<div class="col-sm-10">
																<input type="text" name="item[1]" value="" placeholder="Your Name" id="field-68b29ff313e30-1" class="form-control" />
															</div>
														</div>

														<div class="form-group custom-field required">
															<label class="col-sm-2 control-label" for="field-68b29ff313e30-2">Your Email</label>
															<div class="col-sm-10">
																<input type="email" name="item[2]" value="" placeholder="Your Email" id="field-68b29ff313e30-2" class="form-control" />
															</div>
														</div>

														<div class="form-group custom-field">
															<label class="col-sm-2 control-label" for="field-68b29ff313e30-3">Topic</label>
															<div class="col-sm-10">
																<select name="item[3]" id="field-68b29ff313e30-3" class="form-control">
																	<option value=""> --- Please Select --- </option>
																	<option value="Capture the information you need">Capture the information you need</option>
																	<option value="Add or remove any fields">Add or remove any fields</option>
																	<option value="Your own custom criteria">Your own custom criteria</option>
																	<option value="Make any field required or not">Make any field required or not</option>
																</select>
															</div>
														</div>

														<div class="form-group custom-field required">
															<label class="col-sm-2 control-label" for="field-68b29ff313e30-4">Message</label>
															<div class="col-sm-10">
																<textarea name="item[4]" rows="5" placeholder="Message" id="field-68b29ff313e30-4" class="form-control"></textarea>
															</div>
														</div>
													</fieldset>
													<div class="buttons">
														<div class="pull-right">
															<button type="submit" class="btn btn-primary" data-loading-text="&lt;span&gt;Submit&lt;/span&gt;"><span>Submit</span></button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2 class="title location-title">Our Location</h2>
			<div class="panel panel-default our-location">
				<div class="panel-body">
					<div class="row store-data">
						<div class="col-sm-3 store-image"><img src="https://www.citytechbd.com/image/cache/catalog/citytech/CityTechBD-100x100.png" alt="CityTech BD" title="CityTech BD" class="img-thumbnail" /></div>
						<div class="col-sm-3 store-address">
							<strong>CityTech BD</strong><br />
							<address>
								Ibrahim Electrict &amp; Electronics Market (2nd Floor) 124 BCC Road (Near Chandpur Tower &amp; Al Zafor Market) Nawabpur, Dhaka-1100
							</address>
						</div>
						<div class="col-sm-3 store-tel">
							<strong>Telephone</strong><br />
							+880 1722-437801<br />
							<br />
						</div>
						<div class="col-sm-3 store-info"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection