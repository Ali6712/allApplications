<?php
include('include/security.php');
include('include/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
<head>
		<meta charset="utf-8" />
		<title><?php echo $title;?> - Dashboard</title>
		<meta name="description" content="Dashboard and Statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://solutionly.com.pk/" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="assets/css/fonts.css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/fav.png" />
		
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
		
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<?php include('include/mobile-header.php');?>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
                <?php include('include/sidebar.php');?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<?php include('include/header.php');?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Mobile Toggle-->
									<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
										<span></span>
									</button>
									<!--end::Mobile Toggle-->
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<!--begin::Page Title-->
										<h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Dashboard</h2>
										<!--end::Page Title-->
										
									</div>
									<!--end::Page Heading-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Todo Docs-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_todo_aside">
										<!--begin::Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Body-->
											<div class="card-body px-5">
												<?php include("sidebar.php");?>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Aside-->
									<!--begin::List-->
									<div class="flex-row-fluid d-flex flex-column ml-lg-8">
										<div class="d-flex flex-column flex-grow-1">
											
											<!--begin::Card-->
											<div class="card card-custom d-flex flex-grow-1">
												<!--begin::Body-->
												<div class="card-body flex-grow-1">
													<!--begin::Row-->
													<div class="row">
														
														<!--begin::Col-->
														<div class="col-lg-12">
														

	<!--begin::Hero-->
								<div class="card card-custom overflow-hidden position-relative mb-8">
									<!--begin::SVG-->
									<div class="position-absolute bottom-0 left-0 right-0 d-none d-lg-flex flex-row-fluid">
										<span class="svg-icon svg-icon-full flex-row-fluid svg-icon-dark opacity-3">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/bg/home-2-bg.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 1200 172" style="enable-background:new 0 0 1200 172;" xml:space="preserve">
<path class="st0" d="M2058,94c0,0,16-14,73-14s153,92,248,92s286-145,456-145s183,34,292,34s131-54,131-54v172H2058V94z" />
<path class="st0" d="M0,87c0,0,16-14,73-14s153,92,248,92S607,20,777,20s183,34,292,34s131-54,131-54v172H0V87z" />
</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="position-absolute d-flex top-0 right-0 offset-lg-5 col-lg-7 opacity-30 opacity-lg-100">
										<span class="svg-icon svg-icon-full flex-row-fluid p-15">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/illustrations/working.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="e66d77ca-31e8-442d-a5de-b801817c4280" data-name="Layer 1" width="1024.7" height="671.65" viewBox="0 0 1024.7 671.65">
												<circle cx="720.55" cy="430.76" r="105" fill="url(#a374d817-ded2-4154-8f0a-fb69bb0241af)" />
												<circle cx="720.55" cy="430.76" r="100" fill="#f5f5f5" />
												<g opacity="0.5">
													<path d="M811,482.47a62.52,62.52,0,0,0-64.27,55.82h-18a3.64,3.64,0,0,0-3.64,3.64v6a3.65,3.65,0,0,0,3.64,3.65h18A62.5,62.5,0,1,0,811,482.47Z" transform="translate(-87.65 -114.18)" fill="url(#fd39efba-8078-41b8-857e-e17431406f47)" />
												</g>
												<path d="M810.19,486.22a58.75,58.75,0,0,0-60.41,52.47H732.36a2.91,2.91,0,0,0-2.91,2.91v6.67a2.91,2.91,0,0,0,2.91,2.92h17.42a58.75,58.75,0,1,0,60.41-65Z" transform="translate(-87.65 -114.18)" fill="#fff" />
												<circle cx="720.55" cy="430.76" r="41.25" fill="#795548" />
												<path d="M829.45,524.94s11.77,18.28,8.4,32.5C837.85,557.44,851.3,535.09,829.45,524.94Z" transform="translate(-87.65 -114.18)" fill="#fff" opacity="0.2" />
												<circle cx="746.8" cy="453.26" r="3.75" fill="#fff" opacity="0.2" />
												<rect x="119.09" y="182.63" width="213.27" height="308.72" transform="translate(-156.47 -56.04) rotate(-12.75)" fill="url(#b2bf7fa1-65c2-4695-aeca-af8d6fc55ae3)" />
												<rect x="334.38" y="133.91" width="213.27" height="308.72" transform="translate(-140.4 -9.72) rotate(-12.75)" fill="url(#a8abeec4-29f5-4a5c-9a38-56f560b9b0a3)" />
												<rect x="122.15" y="186.27" width="207.97" height="302.01" transform="translate(-156.52 -55.94) rotate(-12.75)" fill="#6c63ff" />
												<rect x="336.06" y="137.86" width="207.97" height="302.01" transform="translate(-140.56 -9.92) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="135.55" y="222.61" width="124.88" height="20.81" transform="translate(-134.2 -64.73) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="124.12" y="271.86" width="166.5" height="5.2" transform="translate(-143.12 -61.63) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="126.8" y="283.7" width="166.5" height="5.2" transform="translate(-145.67 -60.75) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="129.48" y="295.54" width="166.5" height="5.2" transform="translate(-148.21 -59.87) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="133.23" y="316.95" width="79.78" height="5.2" transform="translate(-153.92 -68.08) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="135.76" y="327.46" width="91.92" height="5.2" transform="translate(-156.02 -65.92) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="137.52" y="331.07" width="166.5" height="5.2" transform="translate(-155.86 -57.21) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="140.2" y="342.91" width="166.5" height="5.2" transform="translate(-158.4 -56.33) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="143.03" y="356.09" width="154.36" height="5.2" transform="translate(-161.39 -56.72) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="145.56" y="366.59" width="166.5" height="5.2" transform="translate(-163.5 -54.56) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="149.22" y="387.24" width="86.72" height="5.2" transform="translate(-168.95 -62.05) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="372.13" y="350.43" width="91.92" height="5.2" transform="translate(-155.26 -13.18) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="373.89" y="354.04" width="166.5" height="5.2" transform="translate(-155.1 -4.47) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="376.57" y="365.88" width="166.5" height="5.2" transform="translate(-157.64 -3.59) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="379.4" y="379.06" width="154.36" height="5.2" transform="translate(-160.63 -3.98) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="381.93" y="389.56" width="166.5" height="5.2" transform="translate(-162.74 -1.82) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="385.59" y="410.21" width="86.72" height="5.2" transform="translate(-168.19 -9.31) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="221.62" y="391.43" width="100.59" height="69.38" transform="translate(-175 -43.64) rotate(-12.75)" fill="#f5f5f5" />
												<rect x="337.76" y="165.98" width="100.59" height="69.38" transform="translate(-122.37 -23.57) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="433.79" y="236.72" width="100.59" height="69.38" transform="translate(-135.62 -0.63) rotate(-12.75)" fill="#6c63ff" opacity="0.3" />
												<rect x="410.68" y="203.79" width="213.27" height="308.72" rx="13.44" transform="translate(-153.95 8.85) rotate(-12.75)" fill="url(#af3e6cbd-120e-45f3-bb1d-3967e91ae903)" />
												<rect x="412.36" y="207.74" width="207.97" height="302.01" rx="13.44" transform="translate(-154.1 8.65) rotate(-12.75)" fill="#6c63ff" />
												<g opacity="0.5">
													<rect x="220.35" y="542.11" width="3" height="17" fill="#47e6b1" />
													<rect x="308" y="656.29" width="3" height="17" transform="translate(886.64 241.11) rotate(90)" fill="#47e6b1" />
												</g>
												<g opacity="0.5">
													<rect x="726.55" y="32.76" width="3" height="17" fill="#47e6b1" />
													<rect x="814.2" y="146.94" width="3" height="17" transform="translate(883.49 -774.44) rotate(90)" fill="#47e6b1" />
												</g>
												<g opacity="0.5">
													<rect x="636.55" y="249.76" width="3" height="17" fill="#47e6b1" />
													<rect x="724.2" y="363.94" width="3" height="17" transform="translate(1010.49 -467.44) rotate(90)" fill="#47e6b1" />
												</g>
												<g opacity="0.5">
													<rect x="894.15" y="288.76" width="3" height="17" fill="#47e6b1" />
													<rect x="981.8" y="402.94" width="3" height="17" transform="translate(1307.08 -686.03) rotate(90)" fill="#47e6b1" />
												</g>
												<path d="M482.69,654.59a3.68,3.68,0,0,1-2.05-4.44,1.15,1.15,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a2.53,2.53,0,0,0-.2.36,3.67,3.67,0,0,1-4.44,2,1.86,1.86,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.88,1.88,0,0,0,.36.21,3.67,3.67,0,0,1,2.05,4.44,1.89,1.89,0,0,0-.08.4h0a1.84,1.84,0,0,0,3.31,1.23h0a1.9,1.9,0,0,0,.2-.37,3.68,3.68,0,0,1,4.45-2,1.77,1.77,0,0,0,.4.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,482.69,654.59Z" transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
												<path d="M628.89,779.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,628.89,779.24Z" transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
												<path d="M847.89,348.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,847.89,348.24Z" transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
												<path d="M999.89,509.24a3.68,3.68,0,0,1-2-4.44,1.86,1.86,0,0,0,.08-.41h0a1.84,1.84,0,0,0-3.31-1.22h0a1.82,1.82,0,0,0-.2.36,3.66,3.66,0,0,1-4.44,2.05,2,2,0,0,0-.41-.08h0a1.84,1.84,0,0,0-1.22,3.31h0a1.62,1.62,0,0,0,.36.21,3.68,3.68,0,0,1,2,4.44,1.86,1.86,0,0,0-.08.41h0a1.84,1.84,0,0,0,3.31,1.22h0a1.65,1.65,0,0,0,.2-.37,3.67,3.67,0,0,1,4.44-2,2,2,0,0,0,.41.08h0a1.84,1.84,0,0,0,1.22-3.31h0A1.62,1.62,0,0,0,999.89,509.24Z" transform="translate(-87.65 -114.18)" fill="#4d8af0" opacity="0.5" />
												<circle cx="142.35" cy="487.11" r="6" fill="#f55f44" opacity="0.5" />
												<circle cx="523.55" cy="50.76" r="6" fill="#4d8af0" opacity="0.5" />
												<circle cx="498.55" cy="489.76" r="6" fill="#47e6b1" opacity="0.5" />
												<circle cx="844.55" cy="639.76" r="6" fill="#f55f44" opacity="0.5" />
												<g opacity="0.5">
													<path d="M848.9,203.3h286a6.29,6.29,0,0,1,6.29,6.29V362.51a6.29,6.29,0,0,1-6.29,6.29h-286a6.28,6.28,0,0,1-6.28-6.28V209.58A6.29,6.29,0,0,1,848.9,203.3Z" transform="translate(346.54 1040.57) rotate(-73.39)" fill="url(#ad46d94a-2a5e-454e-b2ea-f38dffec9c1a)" />
												</g>
												<rect x="911.41" y="140.66" width="161.02" height="290.64" rx="13.64" transform="translate(35.53 -385.86) rotate(16.61)" fill="#fff" />
												<path d="M1070.15,165.27a13,13,0,0,1-15.5,7l-53.29-15.91A13.05,13.05,0,0,1,992.2,142L964,133.59a6.13,6.13,0,0,0-7.61,4.11L880.92,390.53a6.11,6.11,0,0,0,4.12,7.6l134.84,40.24a6.11,6.11,0,0,0,7.6-4.11l75.44-252.83a6.1,6.1,0,0,0-4.11-7.6Z" transform="translate(-87.65 -114.18)" fill="#e0e0e0" />
												<rect x="1010.74" y="156.59" width="35.88" height="2.24" rx="1.12" transform="translate(-5.15 -389.83) rotate(15.89)" fill="#dbdbdb" />
												<circle cx="965.68" cy="50.32" r="1.35" fill="#dbdbdb" />
												<rect x="953.4" y="188.74" width="44" height="38" transform="translate(2.54 -365.73) rotate(15.4)" fill="#fff" />
												<rect x="938.79" y="241.77" width="44" height="38" transform="translate(16.09 -359.95) rotate(15.4)" fill="#6c63ff" opacity="0.3" />
												<rect x="924.19" y="294.79" width="44" height="38" transform="translate(29.65 -354.17) rotate(15.4)" fill="#fff" />
												<rect x="909.58" y="347.82" width="44" height="38" transform="translate(43.2 -348.39) rotate(15.4)" fill="#3ad29f" opacity="0.3" />
												<rect x="1008.3" y="214.49" width="58" height="4" transform="translate(7.08 -381.86) rotate(15.4)" fill="#fff" />
												<rect x="1005.11" y="226.06" width="58" height="4" transform="translate(10.04 -380.6) rotate(15.4)" fill="#fff" />
												<rect x="993.96" y="266.56" width="58" height="4" transform="translate(20.39 -376.18) rotate(15.4)" fill="#fff" />
												<rect x="990.77" y="278.12" width="58" height="4" transform="translate(23.35 -374.92) rotate(15.4)" fill="#fff" />
												<rect x="979.62" y="318.62" width="58" height="4" transform="translate(33.7 -370.5) rotate(15.4)" fill="#fff" />
												<rect x="976.43" y="330.19" width="58" height="4" transform="translate(36.66 -369.24) rotate(15.4)" fill="#fff" />
												<rect x="965.28" y="370.68" width="58" height="4" transform="translate(47.01 -364.83) rotate(15.4)" fill="#fff" />
												<rect x="962.09" y="382.25" width="58" height="4" transform="translate(49.97 -363.56) rotate(15.4)" fill="#fff" />
											</svg>
											<!--end::Svg Icon-->
										</span>
									
									
									</div>
									<!--end::SVG-->
									<!--begin::Hero Body-->
									<div class="card-body d-flex justify-content-center flex-column col-lg-6 px-8 py-20 px-lg-20 py-lg-40">
										<!--begin::Heading-->
										<h2 class="text-dark font-weight-bolder mb-8">Document Control System</h2>
										<!--end::Heading-->
										
									</div>
									<!--end::Hero Body-->
									
								</div>
								<!--end::Hero-->
					<?php if($_SESSION['FLD_BTYPE']=='Admin'){
						$logs = mysqli_query($db,"select * from tbl_logs order by FLD_ID desc limit 0,50");
						while($log = mysqli_fetch_array($logs)){
							
							$count = $count + 1;
							
							if(($count % 2) == 0){
								$color = 'success';
							}else{
								$color = 'warning';
								
							}
						?>			
								
<div class="d-flex align-items-center bg-light-<?php echo $color;?>  rounded p-5 gutter-b">
						<span class="svg-icon svg-icon-<?php echo $color;?>  mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Home/Library.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1"><?php echo $log['FLD_LOG'];?>.</a>
							<span class="text-muted font-size-sm">
							<?php 
							$diff = abs(strtotime(date('Y-m-d')) - strtotime($log['FLD_ERDAT']));
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

							echo $days.' days ago';
							?></span>
						</div>
						<span class="font-weight-bolder text-<?php echo $color;?>  py-1 font-size-lg"><?php echo date("d-M-y", strtotime($log['FLD_ERDAT']));?> <br> <?php echo $log['FLD_ERTIM'];?></span>
					</div>
					<?php } ?>
					<?php }else{

                        $logs = mysqli_query($db,"select * from tbl_logs where (FLD_DNAME='1' or FLD_DNAME='".$_SESSION['FLD_DNAME']."') order by FLD_ID desc limit 0,50");
						while($log = mysqli_fetch_array($logs)){
							
							$count = $count + 1;
							
							if(($count % 2) == 0){
								$color = 'success';
							}else{
								$color = 'warning';
								
							}

					?>
					<div class="d-flex align-items-center bg-light-<?php echo $color;?>  rounded p-5 gutter-b">
						<span class="svg-icon svg-icon-<?php echo $color;?>  mr-5">
							<span class="svg-icon svg-icon-lg">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Home/Library.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
										<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
						<div class="d-flex flex-column flex-grow-1 mr-2">
							<a href="#" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1"><?php echo $log['FLD_LOG'];?>.</a>
							<span class="text-muted font-size-sm">
							<?php 
							$diff = abs(strtotime(date('Y-m-d')) - strtotime($log['FLD_ERDAT']));
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

							echo $days.' days ago';
							?></span>
						</div>
						<span class="font-weight-bolder text-<?php echo $color;?>  py-1 font-size-lg"><?php echo date("d-M-y", strtotime($log['FLD_ERDAT']));?> <br> <?php echo $log['FLD_ERTIM'];?></span>
					</div>
					<?php } ?>
					<?php } ?>
					
					
					
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Body-->
											</div>
											<!--end::Card-->
										</div>
									</div>
									<!--end::List-->
								</div>
								<!--end::Todo Docs-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include('include/footer.php');?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::Notifications Panel-->
		<?php include('include/notifications.php');?>
		<!-- end::Notifications Panel-->
		<!--begin::Quick Actions Panel-->
        <?php include('include/quick-actions.php');?>
		<!--end::Quick Actions Panel-->
		<!-- begin::User Panel-->
        <?php include('include/user-panel.php');?>
		<!-- end::User Panel-->
		<!--begin::Quick Panel-->
        <?php include('include/quick-panel.php');?>
		<!--end::Quick Panel-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundled450.js?v=7.0.9"></script>
		<script src="assets/js/scripts.bundled450.js?v=7.0.9"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/widgetsd450.js?v=7.0.9"></script>
		<script src="assets/js/pages/custom/todo/todod450.js?v=7.0.9"></script>
		<script src="assets/js/pages/crud/forms/validation/form-widgetsd450.js?v=7.0.9"></script>
        <script>
		function show_documents(id,department){
			
			 $.post("documents/controller.php",{ID:id,DEPARTMENT:department,SHOW:'DOCUMENTS'},function(data){
					window.location='folders.php';			
			 });
			
		}
		</script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>