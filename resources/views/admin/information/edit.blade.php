@extends('admin.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- Internal Fancy uploader css -->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<!-- Internal Sumoselect css -->
<link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
<style>

</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Information</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Edit / </span>
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
          <form action="{{route('information.update', [$info->id])}}" method="post" data-parsley-validate="" id="selectForm" name="selectForm">
              @csrf
              @method('PUT')
            <div class="row row-xs">
              <div class="parsley-select col-md-12" id="slWrapper">
                <label class="form-label mt-2">Choose Key <span title="required" class="tx-danger">*</span></label>
                <select name="key" class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required="">
                  <option label="Choose one"></option>
                  <option value="Address" @if($info->key == 'Address') selected @else "" @endif>Address</option>
                  <option value="Phone"@if($info->key == 'Phone') selected @else "" @endif>Phone</option>
                  <option value="Email"@if($info->key == 'Email') selected @else "" @endif>Email</option>
                  <option value="Contact Info"@if($info->key == 'Contact Info') selected @else "" @endif>Contact Info</option>
                  <option value="Opening Hours"@if($info->key == 'Opening Hours') selected @else "" @endif>Opening Hours</option>
                </select>
                <div id="slErrorContainer"></div>
              </div>

              <div class="col-md-12 mg-t-20">
                <div class="form-group">
                  <label class="form-label">Value <span class="tx-danger">*</span></label>
                  <input class="form-control" name="value" value="{{$info->value}}" placeholder="Enter value" required type="text">
                </div><!-- main-form-group -->
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
@endsection
