@extends('admin.layouts.master')

@section('content')
      
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Add Health Professionals or Admins</h5>
                            <span>Create Staff or Admin login here</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="row justify-content-center">
<div class="col-md-10">
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <form class="forms-sample" enctype="multipart/form-data" action="{{route('healthProfessional.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputName1">Full name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputName1" placeholder="Name" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror                
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail3" placeholder="Email" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="" placeholder="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" id="exampleSelectGender">
                            <option value="">Please select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword4">Highest education</label>
                        <input type="text" class="form-control @error('education') is-invalid @enderror" value="{{ old('education') }}"  id="exampleInputPassword4" name="education" placeholder="education">
                        @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword4">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="exampleInputPassword4" name="address" placeholder="address">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Specialist (Gp, Dietitian,Pharmacist...)</label>
                        <input type="text" name="specialist" class="form-control @error('specialist') is-invalid @enderror" value="{{ old('specialist') }}">
                        @error('specialist')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                        
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Choose Profile Photo</label>
                    <input type="file" name="image" class="form-control file-upload-info"  placeholder="Upload Image">
                    <span class="input-group-append">
                    {{-- <button class="file-upload-browse btn btn-primary" type="button">Choose photo</button> --}}
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Choose a role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                           <option value="">Please select role</option>
                           @foreach (App\Models\Role::where('name', '!=', 'patient')->get() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                           @endforeach
                        </select> 
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleTextarea1">Profile description</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
