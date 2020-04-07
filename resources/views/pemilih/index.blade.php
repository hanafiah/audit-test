@extends('layouts.app') @section('content')
<div class="container">
    <div class="col-md-8">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        <br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>No KP</td>
                    <!-- <td>No Personel</td> -->
                    <!-- <td>Jenis KP Personel</td> -->
                    <td>Nama</td>
                    <!-- <td>Jantina</td> -->
                    <!-- <td>keturunan</td> -->
                    <!-- <td>agama</td> -->
                    <td>alamat 1</td>
                    <td>alamat 2</td>
                    <td>alamat 3</td>
                    <td>poskod</td>
                    <td>bandar</td>
                    <td>negeri</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pemilih as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->no_kp}}</td>
                    <!-- <td>{{$row->no_personel}}</td> -->
                    <!-- <td>{{$row->jenis_kp}}</td> -->
                    <td>{{$row->nama}}</td>
                    <!-- <td>{{$row->jantina}}</td> -->
                    <!-- <td>{{$row->keturunan}}</td> -->
                    <!-- <td>{{$row->agama}}</td> -->
                    <td>{{$row->alamat1}}</td>
                    <td>{{$row->alamat2}}</td>
                    <td>{{$row->alamat3}}</td>
                    <td>{{$row->poskod}}</td>
                    <td>{{$row->bandar}}</td>
                    <td>{{$row->kodNegeri}}</td>
                    <td>
                        <a
                            href="{{ route('pemilih.edit', $row->id)}}"
                            class="btn btn-primary"
                            >Edit</a
                        >
                    </td>
                    <td>
                        <form
                            action="{{ route('pemilih.destroy', $row->id)}}"
                            method="post"
                        >
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
