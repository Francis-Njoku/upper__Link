@extends('layouts.app')

@section('content')
<h3>Users</h3>
        <div class="row">
          <div class="col-md-12">
      {!! Form::open(['action' => ['UsersController@search'], 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                <div class="input-group">
                  <span class="input-group-input">
                         {!! Form::text('search_text', null, array('placeholder' => 'Search Data','class' => 'form-control','id'=>'search_text')) !!}
                  </span>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info">Search&nbsp; <i class="fa fa-long-arrow-right"></i></button>
                    </span>
                </div>
      {!! Form::close() !!}
          </div>
        </div>

        <br/><br/><br/>
    @if(count($posts) >= 1)



<div class="table-responsive">
    <table class="table table-bordered bg-light">
        <thead class="bg-dark">
        <tr>
            <th style="vertical-align: middle">
            Name
            </th>
            <th style="vertical-align: middle">
            Email
            </th>
            <th style="vertical-align: middle">
            Phone Number
            </th>
            <th style="vertical-align: middle">
            Status
            </th>
            <th width="130px" style="vertical-align: middle">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $detail)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{strtoupper($detail->name)}}</th>
                <th style="vertical-align: middle;text-align: center">{{$detail->email}}</th>
                <td style="vertical-align: middle">{{$detail->phone_number}}</td>
                <td style="vertical-align: middle">
                @if($detail->status == 'enable')
                Active
                @else
                Inactive
                @endif

                </td>


                <td style="vertical-align: middle" align="center">
                <button class="ci-modal btn-sm btn btn-success" data-toggle="modal" data-id="{{$detail->id}}" data-name="{{$detail->name}}"
                data-email="{{$detail->email}}" data-phone_number="{{$detail->phone_number}}">
                Edit</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
    </div>
        @else
        <p>No User</p>
        @endif

<div class="row">

		<!----- Edit money supply ----->
    <div id="CiModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
            {!! Form::open(['action' => 'UsersController@update', 'method' => 'POST']) !!}

                    <!--<form class="form-horizontal" role="form">-->
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="id">Name</label>
                            <div class="col-sm-7">
                                <input type="hidden" name="id" id="id"  hidden="hidden" >
                                <input type="text" name="name" id="name" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="fpi">Email</label>
                            <div class="col-sm-7">
                               <input type="text" name="email" id="email" class="form-control">
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="quarterly">Phone Number</label>
                            <div class="col-sm-7">
                               <input type="text" name="phone_number" id="phone_number" class="form-control">
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-5" for="status">Status</label>
                            <div class="col-sm-7">
                               <select class="form-control" name="status" id="status">
                               <option value="enable">Approve</option>
                               <option value="disable">Disapprove</option>
                               </select>
                                <br/>

                            </div>
                        </div>
                    <div class="modal-footer">
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}


                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


		</div>
        @endsection