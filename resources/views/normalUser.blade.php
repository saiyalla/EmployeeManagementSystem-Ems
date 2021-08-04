@extends('layout')
@section('content')
<link rel="stylesheet" href="css/main.css" >
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>
    </div>
</nav>
@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
  <h5 class="text-center">
  {{Session::get('success')}}
  </h5>
 </div>
   @endif
@if(Session::has('fail'))
    <div class="alert alert-danger" role="alert">
    <h5 class="text-center">
    {{Session::get('fail')}}
    </h5>

    </div>
@endif
<br>
             <!------Details for Normal User------->
<div class="container" id="info">
  <h4 class=" bg-info text-center" >Your Details </h4>
    <div class="table-responsive">
     <table class="table align-middle table-hover">
       <thead class="thead-dark">
        <tr>
      <td scope="col">ID</td>
      <td scope="col">FirstName</td>
      <td scope="col">LastName</td>
      <td scope="col">Contact</td>
      <td scope="col">Date of Birth</td>
      <td scope="col">Gender</td>
      <td scope="col">Address</td>
      <td scope="col">City</td>
      <td scope="col">User Type</td>
      <td scope="col">User Name</td>
      <td></td>
    </tr>
  </thead>

    @foreach ($employee as $emp)
    <tr>
      <td>{{$emp->emp_id}}</td>
      <td>{{$emp->emp_firstname}}</td>
      <td>{{$emp->emp_lastname}}</td>
      <td>{{$emp->mobile_num}}</td>
      <td>{{$emp->date_of_birth}}</td>
      <td>{{$emp->gender}}</td>
      <td>{{$emp->comm_address}}</td>
      <td>{{$emp->city}}</td>
      <td>{{$emp->user_type}}</td>
      <td>{{$emp->userName}}</td>
      <td>
        <a href={{"editMobileNormalUser/".$emp->emp_id}} class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
      </td>
    </tr>
   @endforeach
</table>
  </div>
</div>
<br>

             <!------Raise an Issue by Normal User------->

<div class="container ">
  <div class="row ">
      <div style="height: 200px ;" class="col-md-6 offset-md-3 ">
        <h3 class="feature-title">Raise an Issue</h3>
        <form action="/createIssueNormal" method="POST" >
       
   @csrf
   <input type="hidden" name="emp_id" value="{{$emp->emp_id}}" >
  

  <div class="form-group">
  <lable>Issue Type :</lable>
  <input type="text" class="form-control" name="issue_type" placeholder="Type of Issue" required><br>
  </div>

  <div class="form-group">
  <lable>Issue Description :</lable>
  <input type="text" class="form-control" name="issue_desc" placeholder="Description"  required><br>
  </div>


  <button type="submit" class="btn btn-success">Raise Issue</button>
 </form>
        </div>
  </div>
</div><br><br><br><br>


<footer>
<div class=" text-white text-center p-4 bg-primary" ">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="#">MindTree:Employee Management System</a>
</div>
</footer>



@stop
