@extends('admin.layouts.master')
@section('css')
  <!-- Internal Select2 css -->
  <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!-- Internal Fileupload css -->
  <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Internal Fancy uploader css -->
  <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
  <!-- Internal Sumoselect css -->
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
  <!-- Internal  TelephoneInput css -->
  <link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
  <style>

  </style>
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
      <div class="d-flex">
        <h4 class="content-title mb-0 my-auto">Chefs</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit / {{$chef->name}}</span>
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
          <form method="post" action="{{route('chefs.update')}}" enctype="multipart/form-data" data-parsley-validate="">
            @csrf
            @method('PUT')
            <input type="hidden" name="chefId" value="{{$chef->id}}">
            <div class="row row-xs">
              <div class="col-md-12 mg-t-10">
                <div class="form-group">
                  <label class="form-label">name: <span class="tx-danger">*</span></label>
                  <input class="form-control" name="name" value="{{$chef->name}}" required type="text">
                </div><!-- main-form-group -->
              </div>

              <div class="col-md-12 mg-t-10">
                <div class="form-group">
                  <label class="form-label">Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" required name="body" rows="5">{{$chef->body}}</textarea>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 mg-t-20">
                <label class="form-label">Image: <span style="font-size: 12px;">(Must be a file of dimension: 280*420)</span></label>
                <input type="file" class="dropify" data-default-file="{{ URL::asset('images/chefs/' . $chef->image) }}" name="image" data-width="280" data-height="420"/>
              </div>
              <div class="col-12">
                <button class="btn btn-main-primary pd-x-20 mg-t-20" type="submit">Update </button>
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
  <!-- Internal TelephoneInput js-->
  <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection
