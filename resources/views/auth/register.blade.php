<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>Sign Up</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('source/html/theme/demo1/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('source/html/theme/demo1/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('source/html/theme/demo11/dist/assets/media/illustrations/sketchy-1/14.png') }})">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="../../demo11/dist/index.html" class="mb-12">
						<img alt="Logo" src="{{ asset('source/html/theme/demo1/dist/assets/media/avatars/logos.png') }}" class="h-100px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form method="POST" action="{{ route('register') }}" class="form w-100" novalidate="novalidate">
                            @csrf
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Create an Account</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Already have an account?
								<a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
								<!--end::Link-->
							</div>
							<!--end::Heading-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								{{-- <div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">First Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first-name" autocomplete="off" />
								</div> --}}
								<!--end::Col-->
								<!--begin::Col-->
								{{-- <div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">Last Name</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off" />
								</div> --}}
                                <div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Nama Panggilan</label>
                                    <input class="form-control @error ('nickname') is-invalid @enderror form-control-lg form-control-solid" type="text" id="email" placeholder="" name="nickname" value="{{ old('nickname') }}" autocomplete="nickname" />
                                        @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
								<div class="fv-row mb-7">
                                    <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
                                    <input class="form-control @error ('full_name') is-invalid @enderror form-control-lg form-control-solid" type="text" id="email" placeholder="" name="full_name" value="{{ old('full_name') }}" autocomplete="full_name" />
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Email</label>
								<input class="form-control @error ('email') is-invalid @enderror form-control-lg form-control-solid" type="email" placeholder="" id="text" name="email" autocomplete="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
							</div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Number Handphone</label>
								<input class="form-control @error ('no_tlp') is-invalid @enderror form-control-lg form-control-solid" type="text" placeholder="" id="no_tlp" name="no_tlp" autocomplete="no_tlp" />
                                    @error('no_tlp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
							</div>
							<!--end::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Jenis Kelamin</label>
								<div class="form-group">
									<input type="radio" name="jk" id="p" value="Perempuan">
									<label for="p">Perempuan</label>
									<input type="radio" name="jk" id="l" value="Laki-laki">
									<label for="l">Laki-laki</label>
								</div>
                                    @error('jk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
							</div>
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control @error ('password') is-invalid @enderror form-control-lg form-control-solid" type="password" placeholder="" id="password" name="password" autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									<!--end::Input wrapper-->
									<!--begin::Meter-->
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									<!--end::Meter-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" id="confirm-password" name="password_confirmation" autocomplete="new-password" />
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('source/html/theme/demo11/dist/assets/js/custom/authentication/sign-up/general.js') }}"></script>
        <script src="{{ asset('source/html/theme/demo1/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('source/html/theme/demo1/dist/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('source/html/theme/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('source/html/theme/demo1/dist/assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('source/html/theme/demo1/dist/assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('source/html/theme/demo1/dist/assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('source/html/theme/demo1/dist/assets/js/custom/modals/upgrade-plan.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>