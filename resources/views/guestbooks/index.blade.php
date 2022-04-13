@extends('layouts.main-master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">GuestBook List</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="guestbooks/create" class="btn btn-outline-primary btn-sm mb-0">Add New Guest Book</a>
                        </div>
                    </div>
                </div>

                <div class="card-body px-3 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-2">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Organization</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Province</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($guest_books as $guest_book)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$guest_book->first_name}}</td>
                                    <td>{{$guest_book->last_name}}</td>
                                    <td>{{$guest_book->organization}}</td>
                                    <td>{{$guest_book->address}}</td>
                                    <td>{{$guest_book->provinces->name}}</td>
                                    <td>{{$guest_book->cities->name}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('guestbooks.edit', $guest_book->id) }}" class="btn btn-sm btn-info mb-0 px-4">Edit</a>
                                        <a href="#" class="btn btn-sm btn-warning mb-0 px-4 btn-delete" data-id="{{$guest_book->id}}">
                                            <form action="{{ route('guestbooks.destroy', $guest_book->id) }}" method="post" id="delete{{$guest_book->id}}">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Sweet Alert -->
<script src="/assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script>
    //== Class definition
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-delete').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Yes, delete it!',
                            className: 'btn btn-info'
                        },
                        cancel: {
                            visible: true,
                            className: 'btn btn-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $(`#delete${id}`).submit();
                    } else {
                        swal.close();
                    }
                });
            });
        };
        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    }();
    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
@endsection