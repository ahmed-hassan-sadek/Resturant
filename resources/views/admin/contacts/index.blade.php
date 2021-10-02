@extends('admin.layouts.master')
@section('css')
  <!-- Internal Data table css -->
  <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!--- Internal Sweet-Alert css-->
  <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Contacts</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Show</span>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row row-sm">
    <!--div-->
    <div class="col-xl-12">
      <div class="card mg-b-20">
        <div class="card-header pb-0">
          <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">Show All Contacts</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-hover key-buttons text-md-nowrap">
              <thead>
              <tr>
                <th class="border-bottom-0">Name</th>
                <th class="border-bottom-0">Email</th>
                <th class="border-bottom-0">Message</th>
                <!-- <th class="border-bottom-0">action</th> -->
              </tr>
              </thead>
              <tbody>
                @foreach($contacts as $contact)
              <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <!-- <td>
                  <div class="d-flex my-xl-auto right-content">
                    <div class="pr-1 mb-3 mb-xl-0">
                      <a type="button" href="#" class="btn btn-info btn-icon mr-2" data-placement="top" data-toggle="tooltip" title="Show"><i class="far fa-eye" style="color: #fff"></i></a>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-danger btn-icon mr-2 delete" data-id="" data-placement="top" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                      <a type="button" href="../contacts/edit.html" class="btn btn-warning  btn-icon mr-2" data-placement="top" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a>
                    </div>
                  </div>
                </td> -->
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/div-->
  </div>
  <!-- /row -->
  </div>
  <!-- Container closed -->
  </div>
  <!-- main-content closed -->
@endsection
@section('js')
  <!-- Internal Data tables -->
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
  <!--Internal  Datatable js -->
  <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
  <!--Internal  Sweet-Alert js-->
  <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
  <!-- Sweet-alert js  -->
  <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
@endsection
