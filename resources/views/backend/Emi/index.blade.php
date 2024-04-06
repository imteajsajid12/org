@extends('frontend.layouts.app')

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

{{--<div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="align-items-center">
            <h1 class="h3">{{translate('All Customers')}}</h1>
</div>
</div>--}}

<section>
    <div class="container">
        <div class="row mb-3 mt-3">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="container">
                            {{-- <h1>Current Balance</h1>--}}
                            {{-- <div class="balance" id="current-balance">Current Balance: -50</div>--}}
                        </div>
                        <h2 for="" class="text-center">Emi Requst</h2><br><br>
                        {{--<form action="{{ route('redx.create') }}" method="POST"
                        enctype="multipart/form-data">--}}
                        @csrf


                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email <span class="text-danger text-lg">*</span></label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name / নাম <span class="text-danger text-lg">*</span></label>
                              <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="Name / নাম">
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Phone /মোবাইল নাম্বার <span class="text-danger text-lg">*</span></label>
                              <input type="number"  class="form-control" name="phone" id="inputEmail4" placeholder="Phone /মোবাইল নাম্বার">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Division / বিভাগ<span class="text-danger text-lg">*</span></label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Dhaka</option>
                                    <option>Chattogram</option>
                                    <option>Rajshahi</option>
                                    <option>Khulna</option>
                                    <option>Barishal</option>
                                    <option>Mymensingh</option>
                                    <option>Rangpur</option>
                                    <option>Sylhet </option>
                                  </select>
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">District /জেলা <span class="text-danger text-lg">*</span></label>
                                <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="state_id" required>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Upazila/উপজেলা <span class="text-danger text-lg">*</span></label>
                                <select class="form-control mb-3 aiz-selectpicker rounded-0" id="mySelect" data-live-search="true" onchange="getValue()" name="city_id" required>
                                </select>
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Union /ইউনিয়ন <span class="text-danger text-lg">*</span></label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Union /ইউনিয়ন">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Address /ঠিকানা <span class="text-danger text-lg">*</span></label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Address /ঠিকানা">
                            </div>
                            </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Residence Type  / বাসস্থানের ধরন  <span class="text-danger text-lg">*</span></label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Rental / বাসা ভাড়া</option>
                                    <option>Owned / নিজের বাসা</option>
                                  </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Type / পণ্যের ধরন <span class="text-danger text-lg">*</span></label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                  </select>
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Occupation / পেশা
                                    <span class="text-danger text-lg">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                      </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Organization / প্রতিষ্ঠানের নাম <span class="text-danger text-lg">*</span></label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Organization / প্রতিষ্ঠানের নাম">
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Designation / পদ
                                    <span class="text-danger text-lg">*</span></label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Designation / পদ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Monthly Income  <span class="text-danger text-lg">*</span></label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Designation / পদ">
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputEmail4">Nid /আপনার এনআইডি  ছবি <span class="text-danger text-lg">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile04">
                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                      </div>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your key with anyone else.</small>
                                </div>
                                {{--<div class="form-group">
                                    <label for="exampleInputPassword1">API Access Token</label> 
                                    <input type="text" class="form-control" value="" name="token" id="exampleInputPassword1" placeholder="Key">
                                </div>--}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
<script type="text/javascript">
  
 $(document).ready(function(){
//  address checking

window.onload = function() {
            let country_id = 18;
    
            get_states(country_id);
        };

  $(document).on('change', '[name=state_id]', function() {
    alert('Please ente')
            var state_id = $(this).val();
            get_city(state_id);
        });

        function get_states(country_id) {
            $('[name="state"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-state')}}",
                type: 'POST',
                data: {
                    country_id  : country_id
                },
                success: function (response) {
                    console.log(response);
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="state_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }


        function get_city(state_id) {
            $('[name="city"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-city')}}",
                type: 'POST',
                data: {
                    state_id: state_id
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="city_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }
    });

</script>
@endsection
