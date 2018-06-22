@extends('layouts.app')
@section('title')
	All questions
@stop
@section('content')
<div class="container">
</br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<table class="table">
	                <?php
	                    foreach ($contacts as $contact){
					?>
						<tr>
							<td class="middle">
							    <div class="media">
							        <div class="media-body">
							            <h4 class="media-heading"><?php echo $contact->name; ?>
						                </h4>
						                    <address>
						                        <strong>Email : <?php echo $contact->email; ?><br> Status : <?php echo $contact->status; ?></strong><br>
													Question : <?php echo $contact->comment; ?><br>
							                        Date : <?php echo $contact->created_at; ?>
						                    </address>
							        </div>
							    </div>
							</td>
							<td width="100" class="middle">
							    <div>
									{!!Form::open(['method' => 'delete','route' => ['contact.destroy', $contact->id]])!!}
										<a href="{{route('contact.edit', ['id' => $contact->id])}}" class="btn btn-primary btn-block">
								        <i class="fa fa-share fa-lg" aria-hidden="true"><b> Answer</b></i>
										</a>
										<button class="btn btn-danger btn-block" onclick="return confirm('Are you sure ?')">
											<i class="fa fa-trash fa-lg" aria-hidden="true"><b> Delete</b></i>
										</button>
									{!!Form::close()!!}
								</div>
							</td>
						</tr>
	                        <?php } ?>
				</table>	
					<div class="text-center">
						{!! $contacts->links()!!}
					</div>
			</div>
		</div>
	</div>
</div>
@stop
