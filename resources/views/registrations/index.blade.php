@extends('layouts.app')
@section('title')
	All users
@stop
@section('content')

	<div class="container">
		</br>
		  <div class="row">
		      <div class="col-md-8 col-md-offset-2">
						{!! Form::open(['method' => 'GET','class'  => 'navbar-form ', 'role' => 'search']) !!}

										<div class="input-group">
											{!!Form::text('search',Request::get('search'),array('class' => 'form-control','placeholder' => 'Search...'))!!}
											<span class="input-group-btn">
												<button class="btn btn-default" type="submit">
													<i class="glyphicon glyphicon-search"></i>
												</button>
										</span>
										</div>
									</div>
							</div>
						{!!Form::close()!!}
						<div class="panel panel-default">
						            <table class="table">
	                        <?php
	                          foreach ($registrations as $registration){
	                        ?>
						              <tr>
						                <td class="middle">
						                  <div class="media">
						                    <div class="media-body">
						                      <h4 class="media-heading"><?php echo $registration->name; ?> <?php echo $registration->surname; ?></h4>
						                      <address>
						                        <strong>Mac Address :<?php echo $registration->mac_address; ?></strong><br>
																		ID : <?php echo $registration->id; ?><br>
						                        Phone : <?php echo $registration->phone; ?>
						                      </address>
						                    </div>
						                  </div>
						                </td>
						                <td width="100" class="middle">
						                  <div>
									{!!Form::open(['method' => 'delete','route' => ['registration.destroy', $registration->id]])!!}
										<a href="{{route('registration.edit', ['id' => $registration->id])}}" class="btn btn-primary btn-block">
								        <i class="fa fa-edit fa-lg" aria-hidden="true"><b> Edit</b></i>
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
						          </div>
											<div class="text-center">
											{!! $registrations->links()!!}
											</div>
										</div>
									</div>
								</div>
@stop
