@extends('layout')  

@section('content')
@include('sweetalert::alert')
<div class=" container-fluid my-5 ">
    <div class="row justify-content-center ">
        <div class="col-xl-10">
            <div class="card shadow-lg ">
                <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                    <div class="col">
                        <p class="text-muted space mb-0 shop">Lab. RPL/PPLG</p> 
                        <p class="text-muted space mb-0 shop">UBSI's Library</p>   
                    </div>
                    <div class="col">
                        <div class="row justify-content-start ">
                            <div class="col">
                                <img class="irc_mi img-fluid cursor-pointer " src="{{asset('assets/img/reading-book.png')}}"  width="70" height="70" >
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <img class="irc_mi img-fluid bell" src="{{asset('assets/img/logo-universitas-bina-sarana-informatika-ubsi.png')}}" width="30" height="30"  >
                    </div>
                </div>
                <div class="row  mx-auto justify-content-center text-center">
                    <div class="col-12 mt-3 pl-5">
                        <nav aria-label="breadcrumb" class="second ">
                            <ol class="breadcrumb indigo lighten-6 first  ">
                                <li class="breadcrumb-item font-weight-bold">
                                    <a class="black-text text-uppercase " href=""><span class="mr-md-3 mr-1">The Library of UBSI</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i>
                                </li>
                                <li class="breadcrumb-item font-weight-bold">
                                    <a class="black-text text-uppercase" href="{{ route('library.index') }}"><span class="mr-md-3 mr-1">New</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i>
                                </li>
                                <li class="breadcrumb-item font-weight-bold">
                                    <a class="black-text text-uppercase active-2" href="{{ route('library.data') }}"><span class="mr-md-3 mr-1">Data</span></a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="page-content page-container mb-5 mt-3" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center pl-3">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student Data</h4>
                                        <p class="card-description">
                                        Data sort by date loaned
                                        </p>
                                        @if (session('delete'))
                                            <div class="alert alert-warning my-3">
                                                {{ session('delete') }}
                                            </div>
                                        @endif
                                        @if (session('update'))
                                            <div class="alert alert-success my-3">
                                                {{ session('update') }}
                                            </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th>Student ID (NIM)</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Book Title</th>
                                                <th>Author / Publisher</th>
                                                <th>Date</th>
                                                <th>Return Date</th>
                                                <th>Staff / Teacher</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allData as $data)
                                                <tr>
                                                <td>{{$data['nim']}}</td>
                                                <td>{{$data['name']}}</td>
                                                <td>{{$data['class']}}</td>
                                                <td>{{$data['booktitle']}}</td>
                                                <td>{{$data['author']}}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['date'])->format('j F, Y') }}</td>
                                                <td class="text-warning text-center"> 
                                                    @if (is_null($data['return_date']))
                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                    @else
                                                    {{ \Carbon\Carbon::parse($data['date'])->format('j F, Y') }}
                                                    @endif
                                                </td>
                                                <td><label class="badge badge-info">{{$data['teacher']}}</label></td>
                                                <td class="d-flex">
                                                    <form action="{{route('library.update', $data['id'])}}" method="POST" class="mr-3">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="fa-solid fa-arrow-up text-success btn btn-outline-none" style="padding: 0 !important"></button>
                                                    </form>
                                                    <form action="{{route('library.destroy', $data['id'])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="fa-solid fa-xmark btn btn-outline-none text-danger" style="padding: 0 !important"></button>
                                                    </form>
                                                </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection