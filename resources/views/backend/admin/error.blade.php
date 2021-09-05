@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1188.75px;">
    <!-- Main content -->
    <section class="content">

               <div class="card-body">
                    {{ Auth::user()->name}}
                    {{ __('You are restricted from accesing this page') }}
                </div>

    </section>
    <!-- /.content -->
    </div>
  </div>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
  <!-- Vendor JS -->
  <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script> <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
  <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
  
  <!-- Sunny Admin App -->
  <script src="{{ asset('backend/js/template.js') }}"></script>
@endsection