@extends('layouts.frontend')

@section('content')

<div id="top" class="top top-row">
	<div class="row">
		<div class="col-md-12">
			<div class="grid-items">
				<div class="grid-item grid-item-top-1-1-1">
					<div class="module module-blocks module-blocks-104 blocks-grid">
						<div class="module-item module-item-1 no-expand">
							<div class="block-body expand-block">
								<div class="block-wrapper">
									<div class="block-content block-map">
										{!! $generalSettings->google_map !!}
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
				<div class="row">
					<div class="col-md-3">
						<div class="pd-2">
							<div class="grid-item grid-item-content-top-1-1-1">
								<div class="module module-info_blocks module-info_blocks-194">
									<div class="module-body">
										<div class="module-item module-item-1 info-blocks info-blocks-icon">
											<div class="info-block">
												<div class="radio-footer-info-content">
													<div class="info-block-title">Store Address</div>
													<div class="info-block-text">{{ $generalSettings->address }}</div>
												</div>
											</div>
										</div>
										<div class="module-item module-item-2 info-blocks info-blocks-icon">
											<a href="tel:{{ $generalSettings->phone }}" class="info-block">
												<div class="radio-footer-info-content">
													<div class="info-block-title">Call Us</div>
													<div class="info-block-text">Tel: {{ $generalSettings->phone }}</div>
												</div>
											</a>
										</div>
										<div class="module-item module-item-3 info-blocks info-blocks-icon">
											<a href="mailto:{{ $generalSettings->email }}" class="info-block">
												<div class="radio-footer-info-content">
													<div class="info-block-title">Email</div>
													<div class="info-block-text">{{ $generalSettings->email }}</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="pd-2">
							<div class="grid-item grid-item-content-top-1-2-1">
								<div class="module module-form-20">
									<h3 class="title module-title">We’re here to help — get in touch</h3>
									<div class="module-body">
										<form action="{{ route('contact.store') }}" method="post" class="form-horizontal">
											@csrf
											<fieldset>
												<div class="form-group custom-field required">
													<label class="col-sm-2 control-label" for="name">Your Name</label>
													<div class="col-sm-10">
														<input type="text" name="name" value="" placeholder="Your Name" id="name" class="form-control" />
													</div>
												</div>

												<div class="form-group custom-field required">
													<label class="col-sm-2 control-label" for="email">Your Email</label>
													<div class="col-sm-10">
														<input type="email" name="email" value="" placeholder="Your Email" id="email" class="form-control" />
													</div>
												</div>

												<div class="form-group custom-field">
													<label class="col-sm-2 control-label" for="topic">Topic</label>
													<div class="col-sm-10">
														<select name="topic" id="topic" class="form-control">
															<option value=""> Choose a Topic </option>
															<option value="Order Inquiry">Order Inquiry</option>
															<option value="Product Information">Product Information</option>
															<option value="Shipping & Delivery">Shipping & Delivery</option>
															<option value="Report a Problem">Report a Problem</option>
															<option value="Wholesale Inquiry">Wholesale Inquiry</option>
														</select>
													</div>
												</div>

												<div class="form-group custom-field required">
													<label class="col-sm-2 control-label" for="message">Message</label>
													<div class="col-sm-10">
														<textarea name="message" rows="5" placeholder="Message" id="message" class="form-control"></textarea>
													</div>
												</div>
											</fieldset>
											<div class="buttons">
												<div class="pull-right">
													<button type="submit" class="btn btn-primary"><span>Submit</span></button>
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
</div>


@endsection