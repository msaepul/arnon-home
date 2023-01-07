@php
    function np($id)
    {
        if ($id == null) {
            return '-';
        } elseif ($id == '') {
            return '-';
        } else {
            $namaproduk = [
                1 => 'Paroti Cream Messes 200gr',
                'Paroti Tawar Bundar',
                'Paroti Tawar Kotak',
                'Paroti Sisir Mentega',
                'Paroti Roti Kasur',
                'Bika Paroti Coklat',
                'Bika Paroti Keju',
                'Paroti Choco Roll',
                'Paroti Abon Pedas',
                'Paroti Pisang Cokelat',
                'Paroti Crocante',
                'Paroti Keju',
                'Paroti Nanas',
                'Paroti Cokelat',
                'Paroti Cream Messes 40gr',
                'Paroti Bluder Coklat',
                'Paroti Bluder Keju',
                'Paroti Mung Bean Roll',
                'Arnon Cream Messes 200gr',
                'Arnon Tawar Bundar',
                'Arnon Tawar Kotak',
                'Arnon Sisir Mentega',
                'Arnon Kasur',
                'Arnon Red Velvet',
                'Bika Arnon Coklat',
                'Bika Arnon Kacang',
                'Bika Arnon Keju',
                'Bika Arnon Pisang',
                'Arnon Choco Roll',
                'Arnon Abon Pedas',
                'Arnon Pisang Cokelat',
                'Arnon Crocante',
                'Arnon Keju',
                'Arnon Cokelat',
                'Arnon Cream Messes 40gr',
                'Arnon Bluder Coklat',
                'Arnon Bluder Keju',
                'Arnon Mung Bean Roll',
                'Arnon Brioche Coklat',
                'Arnon Brioche Keju',
                'Jordan Tawar Panjang',
                'Krim Meses Jordan',
                'Bagelen Kering Jordan',
                'Bagelen Kering Jordan Kecil',
                'Kering Besar Jordan',
                'Sisir Manis Jordan',
                'Cokelat Jordan',
                'Nanas Jordan',
                'Jordan Panjang Cokelat',
                'Jordan Krim Durian',
                'Jordan Krim Pandan',
                'Jordan Krim Cokelat',
                'Cokelat Panjang Jordan',
                'Jordan Cokelat Isi 2',
                'Jordan Nanas Isi 2',
                'Jordan Roti Susu',
                'Jordan Krim 2 Rasa',
                'Roti Isi Krim Kelapa',
                'Sisir Manis Pinggiran',
                'Jordan Cream Pisang Pandan',
                'Jordan Cream Pisang Cokelat',
                'Jordan Kering 8',
                'Jordan Cream Sisir Manis',
                'Jordan Selai Strawberry',
                'Jordan Selai Durian',
                'Jordan Selai Blueberry',
                'Jordan Susu Panjang',
                'Jordan Cream Strawberry',
                'Jordan Cokelat Nanas',
            ];
            $np = $namaproduk[(int) $id];
    
            return $np;
        }
    }
    function mp($id)
    {
        if ($id == null) {
            return '-';
        } elseif ($id == '') {
            return '-';
        } else {
            $kodeproduk = [
                1 => 'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'PAROTI',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'ARNON',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
                'JORDAN',
            ];
            $mp = $kodeproduk[(int) $id];
    
            return $mp;
        }
    }
    function kp($id)
    {
        if ($id == null) {
            return '-';
        } elseif ($id == '') {
            return '-';
        } else {
            $namaproduk = [1 => 'PCRM', 'PTSB', 'PTSP', 'PSRM', 'PRKS', 'PBCK', 'PBKJ', 'PCRL', 'PRAB', 'PPCK', 'PRCT', 'PRKJ', 'PNNS', 'PCKT', 'PCM1', 'PBCK', 'PBKJ', 'PMBR', 'CRMS', 'TSBD', 'TSPJ', 'SSRM', 'ARKS', 'ARVC', 'BACK', 'BAKC', 'BAKJ', 'BAPG', 'ACRL', 'ARAB', 'APCK', 'ARCT', 'ARKJ', 'ACKT', 'CM1', 'ABCK', 'ABKJ', 'AMBR', 'ABCK', 'ABKJ', 'JTSP', 'CRMJ', 'BGKJ', 'BKJK', 'KRGB', 'SMSJ', 'CKJD', 'NNJD', 'PJCK', 'CRDR', 'CRPD', 'CRCK', 'CKPJ', 'COK2', 'NNS2', 'PJSS', 'JC2R', 'JKKL', 'SMSP', 'JCPP', 'JCPC', '8KRG', 'JCSM', 'JSSB', 'JSDR', 'JSBB', 'JSSP', 'CRSB', 'JCNS', 'CMJ1'];
            $kp = $namaproduk[(int) $id];
    
            return $kp;
        }
    }
@endphp
<div>
    @if (session('success'))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- @if (!empty($successMessage))
        <div class="alert alert-success alert dismissible fade show" role="alert" id="success-alert">
            <strong>{{ $successMessage }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="text-center" style="margin-bottom: -2%">
                            <!-- progressbar -->
                            <ul class="progressbar">
                                <li class="{{ $currentStep != 1 ? '' : 'active' }}">
                                    <a href="#step-1" type="button"> Form 1 </a>
                                </li>
                                <li class="{{ $currentStep != 2 ? '' : 'active' }}">
                                    <a href="#step-2" type="button"> Form 2 </a>
                                </li>
                                <li class="{{ $currentStep != 3 ? '' : 'active' }}">
                                    <a href="#step-3" type="button" disabled="disabled"> Form 3 </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                            <div class="form-group row">
                                <label for="nomor" class="col-sm-2 col-form-label">Nomor WO</label>
                                <div class="col-sm-3">
                                    <input type="text" wire:model="nomor"
                                        class="form-control @error('nomor') is-invalid @enderror" id="taskTitle"
                                        readonly>
                                </div>
                                <div class="col-sm-2">
                                </div>

                                <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                                <div class="col-sm-3">
                                    <input type="text" wire:model="cabang"
                                        class="form-control @error('cabang') is-invalid @enderror" id="productAmount"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                                <div class="col-sm-3">
                                    <select class="form-control @error('produk') is-invalid @enderror"
                                        data-dropdown-css-class="select2-danger" wire:model="produk" id="productAmount">
                                        <option value="">...</option>
                                        <optgroup label="ARNON">
                                            @foreach ($listRotiArnon as $d)
                                                <option value="{{ $d->id }}">{{ $d->produk }} &nbsp; - &nbsp;
                                                    ({{ $d->kode }})
                                                </option>
                                            @endforeach
                                        <optgroup label="PAROTI">
                                            @foreach ($listRotiParoti as $d)
                                                <option value="{{ $d->id }}">{{ $d->produk }} &nbsp; - &nbsp;
                                                    ({{ $d->kode }})
                                                </option>
                                            @endforeach
                                        <optgroup label="JORDAN">
                                            @foreach ($listRotiJordan as $d)
                                                <option value="{{ $d->id }}">{{ $d->produk }} &nbsp; -
                                                    &nbsp; ({{ $d->kode }})
                                                </option>
                                            @endforeach
                                    </select>
                                    @error('produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="tgl" class="col-sm-2 col-form-label">Tanggal WO</label>
                                <div class="col-sm-3">
                                    <input type="text" wire:model="tgl"
                                        class="form-control @error('tgl') is-invalid @enderror" id="taskTitle" readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Jenis Izin Edar</label>
                                <div class="col-sm-3">
                                    <select wire:model="status"
                                        class="form-control @error('status') is-invalid @enderror" id="taskTitle">
                                        <option value=1> BPOM MD </option>
                                        <option value=0> PIRT </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="mui" class="col-sm-2 col-form-label"> No Sertifikat Halal /
                                    MUI</label>
                                <div class="col-sm-3">
                                    <input type="text" wire:model="mui"
                                        class="form-control @error('mui') is-invalid @enderror" id="productAmount">
                                    @error('mui')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="izinedar" class="col-sm-2 col-form-label">No PIRT / BPOM</label>
                                <div class="col-sm-3">
                                    <input type="text" wire:model="izinedar"
                                        class="form-control @error('izinedar') is-invalid @enderror" id="taskTitle">
                                    @error('izinedar')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi WO</label>
                                <div class="col-sm-3">
                                    <textarea type="text" wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                        style="height: 100px; resize: none;" id="taskDescription"></textarea>

                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                                type="button">Next</button>
                        </div>

                        <div class="setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                            <center>
                                <h3>Silahkan Pilih Contoh Desain yang paling Sesuai : </h3> <br>
                            </center>
                            @php
                                $roti = kp($produk);
                            @endphp
                            <div class="row">
                                @for ($i = 1; $i < 4; $i++)
                                    <div class="item col-sm-4 col-md-4 mb-4">
                                        <a href="{{ asset('storage/uploads/wo/masterdesain/' . $roti . $i . '.png') }}"
                                            class="fancybox" data-fancybox="gallery1" data-caption="Lampiran 1">
                                            <img style="border: 5px solid #555;"
                                                src="{{ asset('storage/uploads/wo/masterdesain/' . $roti . $i . '.png') }}"
                                                width="100%" height="100%">
                                        </a>
                                        <center><input style="width: 20px; height: 20px;" type="radio"
                                                wire:model="lampiran1" id="{{ $i }}"
                                                value="{{ $roti . $i . '.png' }}">
                                        </center>
                                    </div>
                                    @error('lampiran1')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @endfor
                            </div>

                            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                wire:click="back(1)">Back</button>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                                wire:click="secondStepSubmit">Next</button>
                        </div>
                        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12">
                                    <table class="table">

                                        <tr>
                                            <td>Nomor WO:</td>
                                            <td><strong>{{ $nomor }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Cabang:</td>
                                            <td><strong>{{ $cabang }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal WO:</td>
                                            <td><strong>{{ $tgl }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Merek Roti:</td>
                                            <td><strong>{{ mp($produk) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Produk:</td>
                                            <td><strong>{{ np($produk) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Izin Edar:</td>
                                            <td><strong>{{ $izinedar }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Sertifikat Halal:</td>
                                            <td><strong>{{ $mui }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Izin Edar:</td>
                                            <td><strong>{{ $status ? 'BPOM' : 'PIRT' }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Product Description:</td>
                                            <td><strong>{{ $deskripsi }}</strong></td>
                                        </tr>
                                    </table>
                                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                                        wire:click="back(2)">Back</button>
                                    <button class="btn btn-success btn-lg pull-right" wire:click="submitForm"
                                        type="button">Finish!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
