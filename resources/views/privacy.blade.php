@extends('template.layout')

@section('title', 'Privasi')

@section('content_header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Privasi Akun
            </h2>
        </div>
    </div>
@endsection

@section('content_body')
    <div class="card">
        <div class="row g-0">
            <div class="col-3 d-none d-md-block border-end">
                <div class="card-body">
                    <h4 class="subheader">Menu</h4>
                    <div class="list-group list-group-transparent">
                        <a href="{{ url('/profil') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center">Personal</a>
                        <a href="{{ url('/privasi') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center active">Privasi</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <h3 class="card-title mt-4">Personal Data
                        <a href="" class="btn ms-5" id="personal-data-button">Edit</a>
                    </h3>
                    <form action="{{ route('personal.data.update') }}" method="post">
                        <div class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-label">Nama</div>
                                <p class="ms-2">
                                    @if ($user->name == null)
                                        -
                                    @else
                                        {{ $user->name }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Email</div>
                                <p class="ms-2">
                                    @if ($user->email == null)
                                        -
                                    @else
                                        {{ $user->email }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <a href="" class="btn btn-primary d-none" data-bs-toggle="modal"
                                    data-bs-target="#profile-button-submit" id="personal-data-save-button">
                                    Simpan
                                </a>
                                <div class="modal modal-blur fade" id="profile-button-submit" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Yakin mau simpan?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-info" role="alert">
                                                    <span>Note : Cek data dengan benar!</span>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Ya</button>
                                                <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Batal
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="card-title mt-4">Keamanan
                        <a href="" class="btn ms-5" id="another-button">Edit</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection

