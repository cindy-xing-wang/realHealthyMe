@extends('admin.layouts.master')

@section('content')
<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
    <i class="ik ik-inbox bg-blue"></i>
    <div class="d-inline">
        <h5>List of Real Healthy Me Staff</h5>
        <span>Staff information</span>
    </div>
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-12">
    @if (Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message')}}
        </div>
            
    @endif
<div class="card">
<div class="card-body">
    <table id="data_table" class="table">
        <thead>
            <tr>
                <th class="nosort">Name</th>
                <th class="nosort">Avatar</th>
                <th class="nosort">Email</th>
                <th class="nosort">phone_number</th>
                <th class="nosort">Specialist</th>
                <th  class="nosort"></th>
                <th  class="nosort"></th>
                <th  class="nosort"></th>

            </tr>
        </thead>
        <tbody>
            @if (count($staffs)>0)
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{$staff->name}}</td>
                        <td><img src="{{asset('images')}}/{{$staff->image}}" class="table-user-thumb" alt=""></td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->phone}}</td>
                        <td>{{$staff->specialist}}</td>
                        <td>
                            <div class="table-actions">
                                <a href="#" data-toggle="modal" data-target="#exampleModal{{$staff->id}}"><i class="ik ik-eye"></i></a>
                                <a href="{{route('healthProfessional.edit', $staff->id)}} "><i class="ik ik-edit-2"></i></a>
                                <a href="{{route('healthProfessional.show', $staff->id)}}"><i class="ik ik-trash-2"></i></a>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    {{-- View Modal --}}
                    @include('admin.healthProfessional.modal')
                @endforeach
            @else
                <td>No staff found</td>
            @endif
            
        </tbody>
    </table>
</div>
</div>
</div>
</div>
@endsection