@extends('layouts.profilepagelayout')
<!-- 
    this page extends from 'resources/layout/profilepagelayout.blade.php'
-->
<!-- 
   this place is also a template which contains the basic build-up of a profile page 
-->



@section('profile_pic')


	<style type="text/css">
		.prof_img{
			border-radius: 5px;
			width: 100%;
			height: 100%;
		}
	</style>

	<!-- 
	loading database    
	-->
	<?php 
		$user_info = App\UserInfo::find($profile_id);
	?>


	<!-- 
    setting the profile picture.
    the profile pictures are saved at 'public/images/propics' and their filenames are set as similar to users id.
	-->
	@if($user_info->haspropic == false)
	<!-- default propic -->
	<img class="prof_img" src="{{URL::asset('images/propics/default_propic.png')}}" >
	@else
	<!-- user has propic -->
	<?php $propicsrc= 'images/propics/'.$user_info->id.'.jpg'; ?>
	<img class="prof_img" src="{{URL::asset($propicsrc)}}">
	@endif



@endsection


@section('short_info')


	<style type="text/css">
	.shortinfo{
		margin-left: 10px;
		margin-top: 2px;
		font-size: 14px;
	}
	</style>
	
	

	<!-- 
    profile cover space is divided into half -> left and right divs
	-->	
	<!-- 
    LEFT part
	-->
	<div style="float: left;">
		
		
		<!-- 
		adding the user's name beside the profile picture
		-->
		<h3 
			style="margin-left: 10px;
					margin-top: 5px;
					font-size: 40px;
					color: #077e94;
					font-weight: bold;"
		>{{ $user_info->name }} 
		</h3>

		


		<!-- 
		adding some short informations beside the profile picture 
		-->

		<h3 class="shortinfo" style="margin-top: 15px;">member since {{ $user_info->member_since }} </h3>
		
		<h3 class="shortinfo">lives in {{ $user_info->city }}, {{ $user_info->country }}</h3>
		
		<!-- adding cellphones -->
		@if($user_info->cellphone_1 != NULL)
		<div >
			<h3 class="shortinfo">cellphone: {{ $user_info->cellphone_1 }}</h3>
		</div>
		@else
		@endif




		<!-- 
		showing likes and dislikes, given by other users 
		-->

		<div style="margin-top: 20px;">
			
			<style type="text/css">
			h4{
				font-size: 20px;
				float: left;
				margin: 0 auto;
				margin-left: 5px;
			}
			.votes{
				float: left;
				width: 20px; 
				height: 20px; 
				margin-left: 10px;
			}
			</style>
			
			<?php
			$user_info = App\UserInfo::find($profile_id);
			?>
		
			<img class="votes" src="{{URL::asset('images/upvote_icon.png')}}">
			<h4>{{ $user_info->upvotes }}</h4>
		
			<img class="votes" src="{{URL::asset('images/downvote_icon.png')}}">
			<h4>{{ $user_info->downvotes }}</h4>

		</div>

	</div>





	<!-- RIGHT part -->

	<div style="float: right; height: 100%; margin: 10px;">
		

		<div style="height: 70%;">

		
			<!-- follow button, should be invisible if already following -->
			<button style="border: 2px #19d2d5 solid;
							border-radius: 3px; 
							color: white;
							margin-right: 10px;
							background-color: #19d2d5;
							height: 30px;
							outline: none;
							">
				+Follow
			</button>


			<!-- this is the send message icon, clicking here will create a pop up message window -->
			<img src="{{URL::asset('images/send_msg_icon.png')}}" style="width: 30px; height: 30px;">



		</div>



		<!-- link icons of facebook, google etc -->

		<div style="style=height: 30%; float: right;">

			<img src="{{URL::asset('images/facebook_icon.png')}}" style="width: 30px; height: 30px;">
			<img src="{{URL::asset('images/google_plus_icon.png')}}" style="width: 30px; height: 30px;">
			<img src="{{URL::asset('images/twitter_icon.png')}}" style="width: 30px; height: 30px;">

		</div>



	</div>
@endsection

@section('left_add_space')
@endsection

@section('right_add_space')
@endsection

@section('options')


	<style type="text/css">
	.option_button{
		height: 100%;
		float: left;
		color: #26867c;
		outline: none;
		border: none;
		background-color: white;
		width: 150px;
	}
	</style>

	@yield('options_array')
	

	<script type="text/javascript">
	function newPage(page)
	{
		window.location = page;
	}
	</script>

@endsection

@section('footer')
footer
@endsection

@section('main_content')
@yield('content_section')
@endsection

