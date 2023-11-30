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
        <h5 class="card-header">Test Category <a href="{{route('create_test_category')}}" class="btn btn-sm btn-primary text-white" style="float: right">Create Test Category</a></h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Main Category Name</th>
                  <th>Units</th>
                  <th>BIO.REF Interval</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($test_list))
                    @foreach ($test_list as $item)
                    <tr>
                        <td>{{$item->test_category_name}}</td>
                        <td>{{$item->main_test_categories_name}}</td>
                        <td>{{$item->test_category_units}}</td>
                        <td>{{$item->bio_referal_interval}}</td>
                        <td>
                            <a href="{{route('edit_test_category',$item->test_category_id)}}" class="btn btn-sm btn-success"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{$item->test_category_id}}">
                                <i class="bx bx-trash me-1"></i> Delete
                            </a>
                        </td>
                    </tr>  
                    <!-- Modal -->
                    <div class="modal fade" id="confirmDelete{{$item->test_category_id}}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{$item->test_category_id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteLabel{{$item->test_category_id}}">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this Category?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteForm{{$item->test_category_id}}" action="{{ route('delete_test_category', $item->test_category_id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-danger" onclick="deleteUser({{$item->test_category_id}})">Delete</button>
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