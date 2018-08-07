@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new car</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="add-car">
                        <select class="custom-select" name="user">
                            <option  value="">Select user</option>
                            @foreach ($users as $user)
                                <option {{ old('user') == $user->id ? "selected" : ''  }}
                                        value="{{$user->id}}">{{$user->name}}
                                </option>
                            @endforeach
                        </select>
     
                        <select class="custom-select" name="brand">
                            <option  value="">Select brand</option>
                            @foreach ($brands as $brand)
                                <option {{ old('brand') == $brand->id ? "selected" : ''  }}
                                        value="{{$brand->id}}">{{$brand->name}}
                                </option>
                            @endforeach
                        </select>
                            
                            
                        <select class="custom-select" name="color">
                            <option value="">Select color</option>
                            @foreach ($colors as $color)
                                <option {{ old('color') == $color->id ? "selected" : ''  }}
                                        value="{{$color->id}}">{{$color->color}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <input type="text" value="{{ old('number') }}" class="form-control" placeholder="Type your code" name="state_number">
                        </div>
                            
        
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
                        
                        {{ csrf_field() }}
                    </form>
                </div>

                
            </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All cars</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Brand</th>
                <th scope="col">Color</th>
                <th scope="col">State Number</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
             
            @for ($i=0;$i<count($cars);$i++)
                    
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$cars[$i]->user->name}}</td>
                            <td>{{$cars[$i]->brand->name}}</td>
                            <td>{{$cars[$i]->color->color}}</td>
                            <td>{{$cars[$i]->state_number}}</td>
                            <td>
                                <a href="delete/{{$cars[$i]->id}}"><button class="btn btn-danger">DELETE</button></a>
                            </td>
                        </tr>
                    
                    
              @endfor
              
            </tbody>
          </table>



            

                
            </div>
        </div>
    </div>
</div>
@endsection
