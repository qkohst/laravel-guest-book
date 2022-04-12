@extends('layouts.master')
@section('content')
<main class="main-content pt-5 mt-5">
  <section>
    <div class="page-header min-vh-20">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">GuestBook List</h6>
                  </div>
                  <div class="col-6 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0">Add New Guest Book</button>
                  </div>
                </div>
              </div>

              <div class="card-body px-3 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Organization</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Province</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Kukoh
                        </td>
                        <td>
                          Santoso
                        </td>
                        <td>
                          Coba voajahsahsasjas
                        </td>
                        <td>
                          Tambakboyo
                        </td>
                        <td>
                          Jawa Timur
                        </td>
                        <td>
                          Jawa Timur
                        </td>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Kukoh
                        </td>
                        <td>
                          Santoso
                        </td>
                        <td>
                          Coba voajahsahsasjas
                        </td>
                        <td>
                          Tambakboyo
                        </td>
                        <td>
                          Jawa Timur
                        </td>
                        <td>
                          Jawa Timur
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection