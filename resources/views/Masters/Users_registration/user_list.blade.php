@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h5 class="card-header">Users <a href="{{route('create_user')}}" class="btn btn-sm btn-primary text-white" style="float: right">Create User</a></h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($users))
                  @foreach ($users as $item)
                  <tr>
                      <td>{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->usertype}}</td>
                      <td>
                          <a href="{{route('edit_user',$item->id)}}" class="btn btn-sm btn-success"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$item->id}}">
                              <i class="bx bx-trash me-1"></i> Delete
                          </a>
                        </td>
                  </tr>  
                  <!-- Modal -->
                  <div class="modal fade" id="confirmDelete{{$item->id}}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{$item->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="confirmDeleteLabel{{$item->id}}">Confirmation</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  Are you sure you want to delete this user?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <form id="deleteForm{{$item->id}}" action="{{ route('delete_user', $item->id) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('PUT')
                                      <button type="button" class="btn btn-danger" onclick="deleteUser({{$item->id}})">Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4">No Result Found</td>  
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>


@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

@endpush