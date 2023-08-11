@extends('template.layout')

@section('title', 'Profil')

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
                        <a href="{{ url('/profil') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center active">Personal</a>
                        <a href="{{ url('/privasi') }}" class="list-group-item list-group-item-action d-flex align-items-center">Privasi</a>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            @if (Auth::user()->photo == null)
                                <span class="avatar avatar-xl"
                                    style="background-image: url({{ asset('storage/guest.jpg') }})">
                                </span>
                            @else
                                <span class="avatar avatar-xl"
                                    style="background-image: url({{ asset('storage/' . $user->photo) }})">
                                </span>
                            @endif
                        </div>
                        <div class="col-auto">
                            <a href="" class="btn" data-bs-toggle="modal"
                                data-bs-target="#photo-profile-update-button" title="Edit foto profil">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-edit"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 8h.01"></path>
                                    <path d="M11 20h-4a3 3 0 0 1 -3 -3v-10a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v4"></path>
                                    <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                    <path d="M14 14l1 -1c.31 -.298 .644 -.497 .987 -.596"></path>
                                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                </svg>
                            </a>
                            <div class="modal modal-blur fade" id="photo-profile-update-button" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Silahkan pilih file dari folder anda.</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('photo.profile.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-5">
                                                    <input type="file"
                                                        class="form-control @error('photo') is-invalid @enderror"
                                                        name="photo" required>
                                                    @error('photo')
                                                        <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary" type="submit">Upload</button>
                                                <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Batal
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($user->photo != null)
                            <div class="col-auto">
                                <a href="" class="btn btn-ghost-danger" data-bs-toggle="modal"
                                    data-bs-target="#photo-profile-delete-button" title="Hapus foto profil">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </a>
                                <div class="modal modal-blur fade" id="photo-profile-delete-button" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Yakin mau hapus foto profil?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('photo.profile.delete', $user->id) }}" method="post">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="alert alert-info" role="alert">
                                                        <span>Note : Anda bisa meng upload foto lagi di menu edit foto
                                                            profil!</span>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Ya</button>
                                                    <a href="#" class="btn btn-danger" data-bs-dismiss="modal">
                                                        Batal
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
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
                                <div class="form-label">Agama</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->religion == null)
                                        -
                                    @else
                                        {{ $user->religion }}
                                    @endif
                                </p>
                                <select name="religion"
                                    class="form-control @error('religion') is-invalid @enderror personal-data-input d-none">
                                    <option value="" hidden>- Pilih Agama -</option>
                                    <option value="Katolik" @selected($user->religion == 'Katolik') @if ($user->religion == 'Katolik')
                                        hidden
                                        @endif>Katolik</option>
                                    <option value="Islam" @selected($user->religion == 'Islam') @if ($user->religion == 'Islam')
                                        hidden
                                        @endif>Islam</option>
                                    <option value="Kristen" @selected($user->religion == 'Kristen') @if ($user->religion == 'Kristen')
                                        hidden
                                        @endif>Kristen</option>
                                    <option value="Buddha" @selected($user->religion == 'Buddha') @if ($user->religion == 'Buddha')
                                        hidden
                                        @endif>Buddha</option>
                                    <option value="Hindu" @selected($user->religion == 'Hindu') @if ($user->religion == 'Hindu')
                                        hidden
                                        @endif>Hindu</option>
                                    <option value="Lainnya" @selected($user->religion == 'Lainnya') @if ($user->religion == 'Lainnya')
                                        hidden
                                        @endif>Lainnya</option>
                                </select>
                                @error('religion')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
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
                                <div class="form-label">Jenis Kelamin</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->gender == null)
                                        -
                                    @else
                                        {{ $user->gender }}
                                    @endif
                                </p>
                                <select name="gender"
                                    class="form-control @error('gender') is-invalid @enderror personal-data-input d-none">
                                    <option value="" hidden>- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-laki" @selected($user->gender == 'Laki-laki') @if ($user->gender == 'Laki-laki')
                                        hidden
                                        @endif>Laki-laki</option>
                                    <option value="Perempuan" @selected($user->gender == 'Perempuan') @if ($user->gender == 'Perempuan')
                                        hidden
                                        @endif>Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Tanggal Lahir</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->birth_date == null)
                                        -
                                    @else
                                        {{ date('d-m-Y', strToTime($user->birth_date)) }}
                                    @endif
                                </p>
                                <input type="date"
                                    class="form-control @error('birth_date') is-invalid @enderror personal-data-input d-none"
                                    value="{{ $user->birth_date }}" name="birth_date">
                                @error('birth_date')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">No HP</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->mobile_phone == null)
                                        -
                                    @else
                                        {{ $user->mobile_phone }}
                                    @endif
                                </p>
                                <input type="tel"
                                    class="form-control @error('mobile_phone') is-invalid @enderror personal-data-input d-none"
                                    value="{{ $user->mobile_phone }}" name="mobile_phone"
                                    placeholder="min : 6 karakter, max : 12 karakter" pattern="^(0)8[1-9][0-9]{6,9}$"
                                    minlength="6" maxlength="12">
                                @error('mobile_phone')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Status</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->marital_status == null)
                                        -
                                    @else
                                        {{ $user->marital_status }}
                                    @endif
                                </p>
                                <select name="marital_status"
                                    class="form-control @error('marital_status') is-invalid @enderror personal-data-input d-none">
                                    <option value="" hidden>- Pilih Status -</option>
                                    <option value="Lajang" @selected($user->marital_status == 'Lajang') @if ($user->marital_status == 'Lajang')
                                        hidden
                                        @endif>Lajang</option>
                                    <option value="Menikah" @selected($user->marital_status == 'Menikah') @if ($user->marital_status == 'Menikah')
                                        hidden
                                        @endif>Menikah</option>
                                    <option value="Janda" @selected($user->marital_status == 'Janda') @if ($user->marital_status == 'Janda')
                                        hidden
                                        @endif>Janda</option>
                                    <option value="Duda" @selected($user->marital_status == 'Duda') @if ($user->marital_status == 'Duda')
                                        hidden
                                        @endif>Duda</option>
                                </select>
                                @error('marital_status')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Gol Darah</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->blood_type == null)
                                        -
                                    @else
                                        {{ $user->blood_type }}
                                    @endif
                                </p>
                                <select name="blood_type"
                                    class="form-control @error('blood_type') is-invalid @enderror personal-data-input d-none">
                                    <option value="" hidden>- Pilih Golongan -</option>
                                    <option value="A" @selected($user->blood_type == 'A') @if ($user->blood_type == 'A')
                                        hidden
                                        @endif>A</option>
                                    <option value="B" @selected($user->blood_type == 'B') @if ($user->blood_type == 'B')
                                        hidden
                                        @endif>B</option>
                                    <option value="AB" @selected($user->blood_type == 'AB') @if ($user->blood_type == 'AB')
                                        hidden
                                        @endif>AB</option>
                                    <option value="O" @selected($user->blood_type == 'O') @if ($user->blood_type == 'O')
                                        hidden
                                        @endif>O</option>
                                </select>
                                @error('blood_type')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">No Telepon</div>
                                <p class="ms-2 personal-data-show">
                                    @if ($user->phone == null)
                                        -
                                    @else
                                        {{ $user->phone }}
                                    @endif
                                </p>
                                <input type="tel"
                                    class="form-control @error('phone') is-invalid @enderror personal-data-input d-none"
                                    value="{{ $user->phone }}" name="phone"
                                    placeholder="min : 6 karakter, max : 12 karakter" pattern="^(0)8[1-9][0-9]{6,9}$"
                                    minlength="6" maxlength="12">
                                @error('phone')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
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
                    <h3 class="card-title mt-4">Lainnya
                        <a href="" class="btn ms-5" id="another-button">Edit</a>
                    </h3>
                    <form action="{{ route('another.update') }}" method="post">
                        <div class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-label">Tipe Id</div>
                                <p class="ms-2 another-show">
                                    @if ($user->id_type == null)
                                        -
                                    @else
                                        {{ $user->id_type }}
                                    @endif
                                </p>
                                <select name="id_type"
                                    class="form-control @error('id_type') is-invalid @enderror another-input d-none">
                                    <option value="" hidden>- Pilih Tipe Id -</option>
                                    <option value="KTP" @selected($user->id_type == 'KTP') @if ($user->id_type == 'KTP')
                                        hidden
                                        @endif>KTP</option>
                                    <option value="Passport" @selected($user->id_type == 'Passport') @if ($user->id_type == 'Passport')
                                        hidden
                                        @endif>Passport</option>
                                </select>
                                @error('id_type')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Batas Kadaluarsa</div>
                                <p class="ms-2 another-show">
                                    @if ($user->id_expiration_date == null)
                                        -
                                    @else
                                        {{ $user->id_expiration_date }}
                                    @endif
                                </p>
                                <input type="date"
                                    class="form-control @error('id_expiration_date') is-invalid @enderror another-input d-none"
                                    value="{{ $user->id_expiration_date }}" name="id_expiration_date">
                                @error('id_expiration_date')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Kode Pos</div>
                                <p class="ms-2 another-show">
                                    @if ($user->postal_code == null)
                                        -
                                    @else
                                        {{ $user->postal_code }}
                                    @endif
                                </p>
                                <input type="number" name="postal_code"
                                    class="form-control @error('postal_code') is-invalid @enderror another-input d-none"
                                    value="{{ old('postal_code') }}" placeholder="Kode Pos" minlength="5"
                                    maxlength="5">
                                @error('postal_code')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-label">Nomor Id</div>
                                <p class="ms-2 another-show">
                                    @if ($user->id_number == null)
                                        -
                                    @else
                                        {{ $user->id_number }}
                                    @endif
                                </p>
                                <input type="number" name="id_number"
                                    class="form-control @error('id_number') is-invalid @enderror another-input d-none"
                                    value="{{ old('id_number') }}" placeholder="Nomor Id">
                                @error('id_number')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <div class="form-label">Alamat</div>
                                <p class="ms-2 another-show">
                                    @if ($user->address == null)
                                        -
                                    @else
                                        {{ $user->address }}
                                    @endif
                                </p>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror another-input d-none"
                                    @if ($user->address == null) value="{{ old('address') }}"
                                    @else
                                    value="{{ $user->address }}" @endif
                                    placeholder="Alamat Lengkap" maxlength="100">
                                @error('address')
                                    <span class="text-danger ms-2 mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <a href="" class="btn btn-primary d-none" data-bs-toggle="modal"
                                    data-bs-target="#another-submit" id="another-save-button">
                                    Simpan
                                </a>
                                <div class="modal modal-blur fade" id="another-submit" tabindex="-1" role="dialog"
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let personalDataBtn = $('#personal-data-button');
            let personalDatainput = $('.personal-data-input');
            let personalDataShow = $('.personal-data-show');
            let personalDataSvBtn = $('#personal-data-save-button');
            let anotherBtn = $('#another-button');
            let anotherInput = $('.another-input');
            let anotherShow = $('.another-show');
            let anotherSv = $('#another-save-button');

            $(personalDataBtn).click(function(e) {
                e.preventDefault();

                $(personalDatainput).toggleClass("d-none");
                $(personalDataShow).toggleClass("d-none");
                $(personalDataSvBtn).toggleClass("d-none");
            });

            $(anotherBtn).click(function(e) {
                e.preventDefault();

                $(anotherInput).toggleClass("d-none");
                $(anotherShow).toggleClass("d-none");
                $(anotherSv).toggleClass("d-none");
            });
        });
    </script>
@endsection
