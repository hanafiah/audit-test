@extends('layouts.app') @section('content')
<div class="container">
    <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form
            method="post"
            action="{{ route('pemilih.update', $pemilih->id ) }}"
        >
            @csrf @method('PATCH')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="no_kp">no_kp:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="no_kp"
                            value="{{ $pemilih->no_kp }}"
                        />
                    </div>
                    <!-- <div class="form-group">
                        <label for="no_personel">no_personel:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="no_personel"
                            value="{{ $pemilih->no_personel }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="jenis_kp">jenis_kp:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="jenis_kp"
                            value="{{ $pemilih->jenis_kp }}"
                        />
                    </div> -->
                    <div class="form-group">
                        <label for="nama">nama:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            value="{{ $pemilih->nama }}"
                        />
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label for="jantina">jantina:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="jantina"
                            value="{{ $pemilih->jantina }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="keturunan">keturunan:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="keturunan"
                            value="{{ $pemilih->keturunan }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="agama">agama:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="agama"
                            value="{{ $pemilih->agama }}"
                        />
                    </div>
                </div> -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="alamat1">alamat1:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="alamat1"
                            value="{{ $pemilih->alamat1 }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="alamat2">alamat2:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="alamat2"
                            value="{{ $pemilih->alamat2 }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="alamat3">alamat3:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="alamat3"
                            value="{{ $pemilih->alamat3 }}"
                        />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="poskod">poskod:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="poskod"
                            value="{{ $pemilih->poskod }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="bandar">bandar:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="bandar"
                            value="{{ $pemilih->bandar }}"
                        />
                    </div>
                    <div class="form-group">
                        <label for="kodNegeri">kodNegeri:</label>
                        <input
                            type="text"
                            class="form-control"
                            name="kodNegeri"
                            value="{{ $pemilih->kodNegeri }}"
                        />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Update Data
            </button>
        </form>
        <hr />
        <h3>Changes Log</h3>
        <table class="table">
            <tr>
                <td>id</td>
                <td>audit_event</td>
                <td>audit_url</td>
                <td>audit_created_at</td>
                <td>changes</td>
                <td>by</td>
                <td>action</td>
            </tr>

            @foreach($pemilih->audits->sortByDesc('id') as $audit) @php $data =
            $audit->getMetadata(); @endphp
            <tr>
                <td>{{ $data["audit_id"] }}</td>
                <td>{{ $data["audit_event"] }}</td>
                <td>{{ $data["audit_url"] }}</td>
                <td>{{ $data["audit_created_at"] }}</td>
                <td>
                    @foreach ($audit->getModified() as $attribute => $modified)
                    <ul>
                        <li>
                            {{ $attribute }}
                            <ul>
                                @isset($modified["old"])
                                <li>old: {{ $modified["old"] }}</li>
                                @endisset
                                <li>new: {{ $modified["new"] }}</li>
                            </ul>
                        </li>
                    </ul>
                    @endforeach
                </td>
                <td>
                    @if(isset($data["user_name"]))
                    {{ $data["user_name"] }}
                    @else System @endif
                </td>
                <td>
                    <form
                        action="{{ route('pemilih.restore', ['pemilih'=>$pemilih->id,'audit'=>$audit])}}"
                        method="post"
                    >
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            Restore
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
@endsection
