@extends('layouts.main-master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-header pb-2 p-3">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <h6 class="mb-0">Add New Guest Book</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body px-3 pt-0 pb-2">
                    <form action="/guestbooks" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">First name</label>
                                    <input class="form-control" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Last name</label>
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Organization</label>
                                    <input class="form-control" type="text" name="organization">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Address</label>
                                    <input class="form-control" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Province</label>
                                    <select class="form-select" name="province">
                                        <option selected>Select Province</option>
                                        @foreach($provinces as $province)
                                        <option value="{{$province->code}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">City</label>
                                    <select class="form-select" name="city">
                                        <option selected>Select City</option>
                                        <option disabled>Please select province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                <a href="/guestbooks" class="btn btn-dark btn-sm ms-auto">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/assets/js/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="province"]').on('change', function() {
            var province_code = $(this).val();
            if (province_code) {
                $.ajax({
                    url: '/city/' + province_code,
                    type: "GET",
                    dataType: "json",
                    success: function(cities) {
                        $('select[name="city"]').empty();
                        $('select[name="city"]').append(
                            '<option selected> Select City </option>'
                        );
                        $.each(cities, function(i, cities) {
                            $('select[name="city"]').append(
                                '<option value="' +
                                cities.code + '">' + cities.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"').empty();
            }
        });
    });
</script>
@endsection