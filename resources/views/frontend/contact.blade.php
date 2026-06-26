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
					<div class="col-md-12">
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
				</div>
			</div>
		</div>
	</div>
</div>


@endsection