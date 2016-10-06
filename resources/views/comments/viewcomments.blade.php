<?php $replies = $comment->reply ?>
{{ 'here' }}

	 <div class="row col-md-10" style="align:center">

	<div  align="left row col-md-10" style="align:center"  >
		
		<hr>

		<div style="height:60px"  >
			<img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
				<div align="left row col-md-10" style="align:left" > 
					 <p><h4 >{{ $comment->comment_body }}</h4></p>
				</div>

			<h6>Dated : {{ $comment->created_at }} | AUTHOR : <a href="#">{{$comment->user->first_name}} {{$comment->user->last_name}}</a> | <a href="/comments/{{$comment->id}}">View </a></h6>
		</div>
		

		<hr>

		<ul class="list-group">
			@foreach($replies as $reply)
				<li class="list-group-item">

				<hr>
					<img src="/uploades/profile_pic/{{ $reply->user->profile_picture }}" style="width:40px; height:40px; float:left; border-radius:50%; margin-right:25px; ">
					{{$reply->reply_body}}

					<h6>
						<a href="#" style="float:left">{{ $reply->user->first_name }}</a>  | 
						date : {{ $reply->created_at }} | 
						<a href="#">Like </a> :({{ $reply->likes}}) | 
					</h6>
					
	
				<hr>
				</li>
			@endforeach
		</ul>
		<hr>
		
		<h3>Reply :</h3>

		@if(count($errors) > 0)
			<div class="row">
				<div class="col-md-6">
					<ul>
						@foreach($errors->all() as $error)
							<li>
								<div class="alert alert-danger" role="alert">
										<strong>Sorry:</strong> {{ $error }}
									</div>
							</li>
						@endforeach
					</ul>
					
				</div>
				
			</div>
		@endif
		
		 <form method="POST" action="/comments/{{$comment->id}}/replies">
			<div >
				<textarea name="reply_body" class="form-control" {{ old('body') }}></textarea>	
			</div>
			<div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
				{{ csrf_field() }}
				<button type="submit" class="btn-success">Add Reply</button>
			</div>
		</form> 
		


		 
	
	</div>

	</div> 