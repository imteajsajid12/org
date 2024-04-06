@extends('backend.layouts.app')

@section('content')
{{--validations--}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">{{translate('All Customers')}}</h1>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                    </div>
                    <h3 for="" class="text-center">EMI Create</h3><br><br>
                    <form action="{{ route('emi.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Installment Frequncey</label>
                                    <select id="inputState" name="installment_frequency" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Daily</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                      </select>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Emi</label>
                                    <input type="number" name="emi_month" class="form-control" value="" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Emi">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Emi Interest %</label>
                                    <input type="number" class="form-control" value="" name="emi_interest" id="exampleInputPassword1" placeholder="Interest %">
                                </div>
                                {{--<div class="form-group">
                                    <label for="exampleInputPassword1">Secret Key</label>
                                    <input type="text" class="form-control"  value=" " name="api_secret" id="exampleInputPassword1" placeholder="secret">
                                </div>--}}

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                    </div>
                    <h3 for="" class="text-center">EMI Data</h3><br><br>
                    {{--<form action="{{ route('emi.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf--}}
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <table class="table aiz-tables mb-0" id="data-table">
                                    <thead>
                                        <tr>
                                            {{--<th>
                                                <div class="form-group">
                                                    <div class="aiz-checkbox-inline">
                                                        <label class="aiz-checkbox">
                                                            <input type="checkbox" class="check-all" >
                                                            <span class="aiz-square-check"></span>
                                                        </label>
                
                                                    </div>
                                                </div>
                                            </th>--}}
                                            <th data-breakpoints="lg">#</th>
                                            <th data-breakpoints="md">{{ translate('Emi') }}</th>
                                            <th data-breakpoints="md">{{ translate('Emi Interest') }}</th>
                                            <th data-breakpoints="md">{{ translate('options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($emis as $key => $emi)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                    {{--<div class="form-group">
                                                        <div class="aiz-checkbox-inline">
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" name="id[]" value="{{ $emi->id }}">
                                                                <span class="aiz-square-check"></span>
                                                            </label>
                                                        </div>
                                                    </div>--}}
                                                </td>
                                                <td>{{ $emi->emi_month }} <span>{{$emi->installment_frequency}}</span></td>
                                                <td>{{ $emi->emi_interest }} <i class="fa fa-percent" aria-hidden="true"></i>
                                                </td>
                                                <td>
                                                    {{--<a href="" class="btn btn-soft-primary btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="las la-pen"></i>
                                                    </a>--}}
                                                    <form method="post" action="{{ route('emi.destroy', $emi->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="las la-trash"></i>
                                                    </button>
                                                    </form>
                                                </td>
                                        @endforeach
                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
  
@endsection
