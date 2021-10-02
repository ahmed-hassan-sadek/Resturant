@extends('admin.layouts.master')
@section('css')
  <!--- Internal Select2 css-->
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!---Internal Fileupload css-->
  <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
  <!---Internal Fancy uploader css-->
  <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
  <!--Internal Sumoselect css-->
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">

  <style>

  </style>
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Chefs</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Create</span>
      </div>
    </div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body">
          @include('partials._session')
          <form method="post" action="{{route('about.store')}}" enctype="multipart/form-data" data-parsley-validate="">
            @csrf

              <div class="col-md-12 mg-t-10">
                <div class="form-group">
                  <label class="form-label">Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" placeholder="Enter description" required name="body" rows="5"></textarea>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 mg-t-20">
                <label class="form-label">Image: <span style="font-size: 12px;">(Must be a file of dimension: 280*420)</span></label>
                <input type="file" class="dropify" name="image" data-width="280" data-height="420"/>
              </div>
              <div class="col-12">
                <button class="btn btn-main-primary pd-x-20 mg-t-20" type="submit">Add </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /row -->
  </div>
  <!-- Container closed -->
  </div>
  <!-- main-content closed -->
@endsection
@section('js')
  <!--Internal  Select2 js -->
  <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
  <!--Internal  Parsley.min js -->
  <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
  <!-- Internal Form-validation js -->
  <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
  <!--Internal  Datepicker js -->
  <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
  <!--Internal Fileuploads js-->
  <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
  <!--Internal Fancy uploader js-->
  <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
  <!--Internal  Form-elements js-->
  <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
  <script src="{{URL::asset('assets/js/select2.js')}}"></script>
  <!--Internal Sumoselect js-->
  <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
@endsection
