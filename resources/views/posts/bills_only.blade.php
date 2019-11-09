

    <div class="row">
        <div class="col-sm-4 form-group">

            {!! Form::select('role',['-1'=>'Select Status','active'=>'Active','bill due'=>'Bill due', 'bill due in 3 days' => 'Bill due in 3 days',
            'bill due in 5 days' => 'Bill due in 5 days', 'bill due in 10 days' => 'Bill due in 10 days', 'bill over due' => 'Bill over due',
            'evicted' => 'Evicted', 'overdue note' => 'Overdue note', 'recovery process' => 'Recovery process'],request()->session()->get('gender'),['class'=>'form-control form-control-lg','onChange'=>'ajaxLoad("'.url("admin/bills").'?gender="+this.value)']) !!}
        </div>
        <div class="col-sm-5 form-group">
            <div class="input-group">
                <input class="form-control" id="search"
                       value="{{ request()->session()->get('search') }}"
                       onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/bills')}}?search='+this.value)"
                       placeholder="Search name" name="search"
                       type="text"/>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-warning"
                            onclick="ajaxLoad('{{url('admin/bills')}}?search='+$('#search').val())"
                    >
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered bg-light">
        <thead class="bg-dark">
        <tr>
            <th width="60px" style="vertical-align: middle;text-align: center">No</th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=reference&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Reference
                </a>
                {{request()->session()->get('field')=='reference'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=first_name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    First Name
                </a>
                {{request()->session()->get('field')=='first_name'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=last_name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Last Name
                </a>
                {{request()->session()->get('field')=='last_name'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=bill_name&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Bill Type
                </a>
                {{request()->session()->get('field')=='bill_name'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=amount_paid&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Amount Paid
                </a>
                {{request()->session()->get('field')=='amount_paid'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=property_amount&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Amount Due
                </a>
                {{request()->session()->get('field')=='property_amount'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=due_date&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Due Date
                </a>
                {{request()->session()->get('field')=='due_date'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=date_last_payment&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Last Payment
                </a>
                {{request()->session()->get('field')=='date_last_payment'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th style="vertical-align: middle">
                <a href="javascript:ajaxLoad('{{url('admin/bills?field=status&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">
                    Status
                </a>
                {{request()->session()->get('field')=='status'?(request()->session()->get('sort')=='asc'?'⇧':'⇩'):''}}
            </th>
            <th width="130px" style="vertical-align: middle">Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i=1;
        @endphp
        @foreach($customers as $customer)
            <tr>
                <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                <td style="vertical-align: middle">{{ $customer->reference }}</td>
                <td style="vertical-align: middle">{{ ucfirst($customer->first_name) }}</td>
                <td style="vertical-align: middle">{{ucfirst($customer->last_name)}}</td>
                <td style="vertical-align: middle">{{ucfirst($customer->bill_name)}}</td>
                <td style="vertical-align: middle">{{number_format($customer->amount_paid, 2)}}</td>
                <td style="vertical-align: middle">{{number_format($customer->property_amount, 2)}}</td>
                <td style="vertical-align: middle">{{$customer->due_date}}</td>
                <td style="vertical-align: middle">{{$customer->date_last_payment}}</td>
                <td style="vertical-align: middle">{{ucfirst($customer->status)}}</td>

                <td style="vertical-align: middle" align="center">
                <button class="bill-details-modal btn-sm btn btn-success" data-id="{{$customer->id}}" data-location="{{$customer->location}}" data-first_name="{{$customer->first_name}}" data-due_date="{{$customer->due_date}}" data-date_last_payment="{{$customer->date_last_payment}}"
                data-bill_name="{{$customer->bill_name}}" data-status="{{$customer->status}}" data-amount_paid="{{$customer->amount_paid}}" data-property_amount="{{$customer->property_amount}}" data-last_name="{{$customer->last_name}}" data-bill_category="{{$customer->bill_category}}"
                data-bill_frequency="{{$customer->frequency}}">
                Details</button>
        <!--<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">

            <input type="hidden" name="email" value="{{$customer->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{$customer->reference}}">
            <input type="hidden" name="amount" value="{{($customer->property_amount - $customer->amount_paid) * 100 }}"> {{-- required in kobo --}}
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['customer_bill_id' => $customer->id, 'url_type' => 'admin\bills']) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

              <button class="btn btn-warning btn-sm" type="submit">
              Pay
              </button>


        </form>

                    <!--<a class="btn btn-primary btn-sm" title="Edit"
                       href="javascript:ajaxLoad('{{url('admin/bills/update/'.$customer->id)}}')">
                        Edit</a>

                    <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-sm" title="Delete"
                       href="javascript:if(confirm('Are you sure want to delete?')) ajaxDelete('{{url('admin/bills/delete/'.$customer->id)}}','{{csrf_token()}}')">
                        Delete
                    </a> -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-end">
            {{$customers->links()}}
        </ul>
    </nav>
		<a href="/admin/export_bill" class="btn btn-primary">Export</a>


    <!--- Modal form for details -->
    <div id="BillDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
            {!! Form::open(['action' => 'Dash_adminController@update_bill_status', 'method' => 'POST']) !!}

                    <!--<form class="form-horizontal" role="form">-->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">First name</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" id="id"  hidden="hidden" >
                                <input type="text" name="first_name" id="first_name" class="form-control" required disabled>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Last name</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="last_name" id="last_name" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Location</label>
                            <div class="col-sm-10">
                            <textarea id="location" name="location" disabled class="form-control" rows="3"></textarea>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Bill name</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="bill_name" id="bill_name" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Bill category</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="bill_category" id="bill_category" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Bill frequency</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="bill_frequency" id="bill_frequency" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Amount paid</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="amount_paid" id="amount_paid" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Bill amount</label>
                            <div class="col-sm-10">
                               <input disabled type="text" name="property_amount" id="property_amount" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Due date</label>
                            <div class="col-sm-10">
                               <input disabled type="date" name="due_date" id="due_date" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Last payment date</label>
                            <div class="col-sm-10">
                               <input disabled type="date" name="date_last_payment" id="due_date" class="form-control" required>
                                <br/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Status</label>
                            <div class="col-sm-10">
                            <select name="status" id="status" class="form-control" required>
                            <option>Status</option>
                            @foreach($status_type as $stype)
                            <option value="{{$stype->name}}">{{ucfirst($stype->name)}}</option>
                            @endforeach
                            </select>

                                <br/>

                            </div>
                        </div>
                    <div class="modal-footer">
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}

                      <!-- <button type="submit" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span>Pay
                        </button>-->
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                    </div>
        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

