<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
@include('admin.stylesheet')
</head>
<body>
@include('admin.navigation')
<!-- Right Panel -->
    @if(in_array('products',$avilable))
    <div id="right-panel" class="right-panel">
    @include('admin.header')
     <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ Helper::translation(1921,$translate) }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-attribute-value') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ Helper::translation(1920,$translate) }}</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
        <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
       </div>
       @endif
       @if (session('error'))
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        @endif
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ Helper::translation(1921,$translate) }}</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ Helper::translation(1964,$translate) }}</th>
                                            <th>{{ Helper::translation(1914,$translate) }}</th>
                                            <th>{{ Helper::translation(1921,$translate) }}</th>
                                            <th>{{ Helper::translation(2101,$translate) }}</th>
                                            <th>{{ Helper::translation(1915,$translate) }}</th>
                                            <th>{{ Helper::translation(1965,$translate) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($valueData['view'] as $value)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $value->attribute_name }} </td>
                                            <td>{{ $value->attribute_value }} </td>
                                           <td>{{ $value->username }} </td>
                                           <td>@if($value->attribute_value_status == 1) <span class="badge badge-success">{{ Helper::translation(1916,$translate) }}</span> @else <span class="badge badge-danger">{{ Helper::translation(1917,$translate) }}</span> @endif</td>
                                            <td><a href="edit-attribute-value/{{ $value->attribute_value_id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>&nbsp; {{ Helper::translation(1966,$translate) }}</a> 
                                            @if($demo_mode == 'on') 
                                            <a href="demo-mode" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(1967,$translate) }}</a>
                                            @else 
                                            <a href="attribute-value/{{ $value->attribute_value_id }}" class="btn btn-danger btn-sm" onClick="return confirm('{{ Helper::translation(1968,$translate) }}');"><i class="fa fa-trash"></i>&nbsp;{{ Helper::translation(1967,$translate) }}</a>@endif</td></tr>
                                        @php $no++; @endphp
                                        @endforeach     
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>
            </div><!-- .animated -->
        </div><!-- .content -->
     </div><!-- /#right-panel -->
    @else
    @include('admin.denied')
    @endif
    <!-- Right Panel -->
    @include('admin.javascript')
</body>
</html>