@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/main-sidebar_trans.sections')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main-sidebar_trans.sections')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main-sidebar_trans.view_all')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.message_alert')
				<!-- row -->
                    <!-- row opened -->
                    <div class="row row-sm">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                                            Add Doctor
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example2">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.name')}}</th>
                                                <!-- <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.description')}}</th> -->
                                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.name_sections')}}</th>
                                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.created_at')}}</th>
                                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($doctors as $doctor)
                                               <tr>
                                                   <td>{{$loop->iteration}}</td> {{-- loop for making indexing --}}
                                                   <td><a href="{{route('Doctors.show',$doctor->id)}}">{{$doctor->name}}</a> </td>
                                                   <!-- <td>{{ \Str::limit($doctor->description, 50) }}</td> -->
                                                   <td>{{ $doctor->section($doctor->section_id)}}</td>
                                                   <td>{{ $doctor->created_at->diffForHumans() }}</td> <!--diffForHumans() to show the time in a human readable format-->
                                                   <td>
                                                       <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$doctor->id}}">{{$doctor->id}}<i class="las la-pen"></i></a>
                                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$doctor->id}}"><i class="las la-trash"></i></a>
                                                   </td>
                                               </tr>
                                               @include('Dashboard.Doctors.edit')
                                               @include('Dashboard.Doctors.delete')

                                                  
                                           @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->
                    @include('Dashboard.Doctors.add',['sections'=>$sections,'appointments'=>$appointments])
                    

				</div>
				<!-- row closed -->

			<!-- Container closed -->

		<!-- main-content closed -->
@endsection
@section('js')


    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection