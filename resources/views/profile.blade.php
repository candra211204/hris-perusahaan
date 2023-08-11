@extends('template.layout')

@section('title', 'Home')

@section('content_header')
    <div class="row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
                Setting Akun
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
                        <a href="./settings.html"
                            class="list-group-item list-group-item-action d-flex align-items-center active">Personal</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">My
                            Notifications</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Connected
                            Apps</a>
                        <a href="./settings-plan.html"
                            class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">Billing &
                            Invoices</a>
                    </div>
                    <h4 class="subheader mt-4">Experience</h4>
                    <div class="list-group list-group-transparent">
                        <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto"><span class="avatar avatar-xl"
                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                        </div>
                        <div class="col-auto"><a href="#" class="btn">
                                Ganti profil
                            </a></div>
                        <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                Hapus profil
                            </a></div>
                    </div>
                    <h3 class="card-title mt-4">Personal Data<a href="" class="btn ms-5"
                            id="profile-edit-button">Edit</a></h3>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="form-label">Nama</div>
                            <span class="ms-2">
                                @if ($user->name == null)
                                    -
                                @else
                                    {{ $user->name }}
                                @endif
                            </span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $user->name }}" name="name" minlength="5" maxlength="50" required>
                            @error('name')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Agama</div>
                            <span class="ms-2">
                                @if ($user->religion == null)
                                    -
                                @else
                                    {{ $user->religion }}
                                @endif
                            </span>
                            <input type="text" class="form-control @error('religion') is-invalid @enderror"
                                value="{{ $user->religion }}" name="religion" list="profile-religion">
                            <datalist id="profile-religion">
                                <option value="Katolik">
                                <option value="Islam">
                                <option value="Kristen">
                                <option value="Buddha">
                                <option value="Hindu">
                                <option value="Lainnya">
                            </datalist>
                            @error('religion')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Email</div>
                            <span class="ms-2">
                                @if ($user->email == null)
                                    -
                                @else
                                    {{ $user->email }}
                                @endif
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ $user->email }}" name="email" required>
                            @error('email')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Jenis Kelamin</div>
                            <span class="ms-2">
                                @if ($user->gender == null)
                                    -
                                @else
                                    {{ $user->gender }}
                                @endif
                            </span>
                            <input type="text" class="form-control @error('gender') is-invalid @enderror"
                                value="{{ $user->gender }}" name="gender" list="profile-gender">
                            <datalist id="profile-gender">
                                <option value="Laki-laki">
                                <option value="Perempuan">
                            </datalist>
                            @error('gender')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Tanggal Lahir</div>
                            <span class="ms-2">
                                @if ($user->birth_date == null)
                                    -
                                @else
                                    {{ $user->birth_date }}
                                @endif
                            </span>
                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                value="{{ $user->birth_date }}" name="birth_date">
                            @error('birth_date')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">No HP</div>
                            <span class="ms-2">
                                @if ($user->mobile_phone == null)
                                    -
                                @else
                                    {{ $user->mobile_phone }}
                                @endif
                            </span>
                            <input type="tel" class="form-control @error('mobile_phone') is-invalid @enderror"
                                value="{{ $user->mobile_phone }}" name="mobile_phone" pattern="^(\0)8[1-9][0-9]{6,9}$">
                            @error('mobile_phone')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Status</div>
                            <span class="ms-2">
                                @if ($user->marital_status == null)
                                    -
                                @else
                                    {{ $user->marital_status }}
                                @endif
                            </span>
                            <input type="text" class="form-control @error('marital_status') is-invalid @enderror"
                                value="{{ $user->marital_status }}" name="marital_status" list="profile-status">
                            <datalist id="profile-status">
                                <option value="Lajang">
                                <option value="Menikah">
                                <option value="Janda">
                                <option value="Duda">
                            </datalist>
                            @error('marital_status')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">Gol Darah</div>
                            <span class="ms-2">
                                @if ($user->blood_type == null)
                                    -
                                @else
                                    {{ $user->blood_type }}
                                @endif
                            </span>
                            <input type="text" class="form-control @error('blood_type') is-invalid @enderror"
                                value="{{ $user->blood_type }}" name="blood_type" list="profile-blood-type">
                            <datalist id="profile-blood-type">
                                <option value="A">
                                <option value="B">
                                <option value="AB">
                                <option value="O">
                            </datalist>
                            @error('blood_type')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-label">No Telepon</div>
                            <span class="ms-2">
                                @if ($user->phone == null)
                                    -
                                @else
                                    {{ $user->phone }}
                                @endif
                            </span>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ $user->phone }}" name="phone" pattern="^(\0)8[1-9][0-9]{6,9}$">
                            @error('phone')
                                <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#profile-button-submit">
                                Simpan
                            </a>
                            <div class="modal modal-blur fade" id="profile-button-submit" tabindex="-1" role="dialog"
                                aria-hidden="true">
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
                                            <a href="#" class="btn btn-danger"
                                                data-bs-dismiss="modal">
                                                Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger" id="profile-edit-button-close">Batal</button>
                        </div>
                    </div>
                    <h3 class="card-title mt-4">Email</h3>
                    <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.</p>
                    <div>
                        <div class="row g-2">
                            <div class="col-auto">
                                <input type="text" class="form-control w-auto" value="paweluna@howstuffworks.com">
                            </div>
                            <div class="col-auto"><a href="#" class="btn">
                                    Change
                                </a></div>
                        </div>
                    </div>
                    <h3 class="card-title mt-4">Password</h3>
                    <p class="card-subtitle">You can set a permanent password if you don't want to use temporary login
                        codes.</p>
                    <div>
                        <a href="#" class="btn">
                            Set new password
                        </a>
                    </div>
                    <h3 class="card-title mt-4">Public profile</h3>
                    <p class="card-subtitle">Making your profile public means that anyone on the Dashkit network will be
                        able to find
                        you.</p>
                    <div>
                        <label class="form-check form-switch form-switch-lg">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label form-check-label-on">You're currently visible</span>
                            <span class="form-check-label form-check-label-off">You're
                                currently invisible</span>
                        </label>
                    </div>
                </div>
                <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        <a href="#" class="btn">
                            Cancel
                        </a>
                        <a href="#" class="btn btn-primary">
                            Submit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
