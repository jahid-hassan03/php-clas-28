@extends('master')

@section('title')
    manage-student page
@endsection

@section('body')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white">All Student</div>
                        <div class="card-body">
                            <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Student Id</th>
                                    <th>Student name</th>
                                    <th>Student Email</th>
                                    <th>Student mobile</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($student as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->mobile}}</td>
                                        <td>
                                            <a href="{{route('edit-student', ['id' => $student->id])}}" class="btn btn-success btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('delete-student',['id'=>$student->id])}}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('deleteStudentForm{{$student->id}}').submit()">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <form method="POST" action="{{route('delete-student',['id'=>$student->id])}}" id="deleteStudentForm{{$student->id}}">
                                                @csrf
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
    </section>
@endsection
