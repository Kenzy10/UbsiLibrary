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
                                    <a class="black-text text-uppercase" href="{{ route('library.data') }}"><span class="mr-md-3 mr-1">Data</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i>
                                </li>
                                <li class="breadcrumb-item font-weight-bold">
                                    <a class="black-text text-uppercase active-2" href="{{ route('library.index') }}"><span class="mr-md-3 mr-1">NEW</span></a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            
                <div class="row justify-content-around">
                    <div class="col-md-5">
                        <div class="card border-0">
                            <div class="card-header pb-0">
                                <h4 class="card-title space ">The Library of UBSI</h4>
                                <p class="card-text text-muted mt-4  space">New Data</p>
                                <hr class="my-0">
                            </div>
                            <form action="{{ route('library.store') }}" method="POST" class="card-body">
                                @csrf
                                <div class="row justify-content-between">
                                    <div class="col-auto mt-0"><p><b>Please fill all the input with the right value.</b></p></div>
                                </div>
                                @if (session('add'))
                                    <div class="alert alert-success my-3">
                                        {{ session('add') }}
                                    </div>
                                @endif
                                <div class="row mt-4">
                                    <div class="col"><p class="text-muted mb-2">Form Input</p><hr class="mt-0"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="small text-muted mb-1">Borrower's Name</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Full name of the student">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="booktitle" class="small text-muted mb-1">Book Title</label>
                                    <textarea class="form-control form-control-sm @error('booktitle') is-invalid @enderror" name="booktitle" id="booktitle" rows="4" cols="15" placeholder="Title of the book"></textarea>
                                    @error('booktitle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Author" class="small text-muted mb-1">Author / Publisher</label>
                                    <textarea class="form-control form-control-sm @error('author') is-invalid @enderror" name="author" id="author" rows="4" cols="15" placeholder="author's and publisher's name (or code)"></textarea>
                                    @error('author')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-sm-6 pr-sm-2">
                                        <div class="form-group">
                                            <label for="nim" class="small text-muted mb-1">Student ID (NIM)</label>
                                            <input type="number" class="form-control form-control-sm @error('nim') is-invalid @enderror" name="nim" id="nim" aria-describedby="helpId" placeholder="Unique student identifier">
                                            @error('nim')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="class" class="small text-muted mb-1">Class</label>
                                            <input type="text" 
                                                class="form-control form-control-sm @error('class') is-invalid @enderror" 
                                                name="class" 
                                                id="class" 
                                                placeholder="Enter student class (e.g. 10.2A.01 TI)">
                                            @error('class')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-sm-12 pr-sm-2">
                                        <div class="form-group">
                                            <label for="date" class="small text-muted mb-1">DATE</label>
                                            <input type="date" class="form-control form-control-sm @error('date') is-invalid @enderror" name="date" id="date">
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="return_date" class="small text-muted mb-1">RETURN DATE</label>
                                            <input type="date" class="form-control form-control-sm @error('return_date') is-invalid @enderror" name="return_date" id="return_date">
                                            @error('return_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="teacher" class="small text-muted mb-1">Staff / Teacher Name</label>
                                    <input type="text" class="form-control form-control-sm @error('teacher') is-invalid @enderror" name="teacher" id="teacher" aria-describedby="helpId" placeholder="Name of the approving staff/teacher">
                                    @error('teacher')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mb-md-5">
                                    <div class="col">
                                        <button type="submit" class="btn  btn-lg btn-block">Create New</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border-0 ">
                            <div class="card-header card-2">
                                <p class="card-text text-muted mt-md-4  mb-2 space">TOTAL DATA <span class=" small text-muted ml-2 cursor-pointer">UBSI's Library</span> </p>
                                <hr class="my-2">
                            </div>
                            <div class="card-body pt-0">
                                <div class="row  justify-content-between">
                                    <div class="col-auto col-md-7">
                                        <div class="media flex-column flex-sm-row">
                                            <i class="fa-solid fa-right-from-bracAuthor mr-3" style="font-size: 2rem"></i>
                                            <div class="media-body  my-auto">
                                                <div class="row ">
                                                    <div class="col-auto"><p class="mb-0"><b>Loaned</b></p><small class="text-muted">Total Book who loaned this day</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1">{{count($loanedToday) }}</p></div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b>{{\Carbon\Carbon::now()->format('d-m')}}</b></p></div>
                                </div>
                                <hr class="my-2">
                                <div class="row  justify-content-between">
                                    <div class="col-auto col-md-7">
                                        <div class="media flex-column flex-sm-row">
                                            <i class="fa-solid fa-right-left mr-3" style="font-size: 2rem"></i>
                                            <div class="media-body  my-auto">
                                                <div class="row ">
                                                    <div class="col"><p class="mb-0"><b>Returned</b></p><small class="text-muted">Total Book who returned this day</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed">{{ count($returnToday) }}</p></div>
                                    <div class="pl-0 flex-sm-col col-auto my-auto"><p><b>{{\Carbon\Carbon::now()->format('d-m')}}</b></p></div>
                                </div>
                                <hr class="my-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection