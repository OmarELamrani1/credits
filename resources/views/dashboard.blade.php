@extends('layouts.user_type.auth')

@section('content')


                @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Montant Total</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $credit->amount }} Dhs
                  <span class="text-success text-sm font-weight-bolder">+{{ (int) (($credit->amount / $credit->amount)*100) }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Motant restant</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $credit->amountRemained }} Dhs
                  <span class="text-success text-sm font-weight-bolder">+{{ (int) (($credit->amountRemained / $credit->amount)*100) }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">M$ payé en total</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $monthlyPayements->sum('paymentGiven') }}
                  <span class="text-success text-sm font-weight-bolder">+{{ (int) (($monthlyPayements->sum('paymentGiven') / $credit->amount)*100) }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">M$ payé ce mois</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $creditMonth->sum('paymentGiven') }}
                  <span class="text-success text-sm font-weight-bolder">+{{ (int) (($creditMonth->sum('paymentGiven') / $credit->amount)*100) }}%</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Paiement reçu') }}</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('Paiements.store') }}" method="POST">
                @csrf
                @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                        {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="paymentGiven" class="form-control-label">{{ __('Paiement reçu') }}</label>
                            <div class="@error('paymentGiven')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="1000" type="number" placeholder="Entrer le paiement reçu" id="paymentGiven" name="paymentGiven">
                                    {{-- @error('paymentGiven')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Enregistrer' }}</button>
                </div>
            </form>

        </div>
    </div>
</div>


  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Paiments</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $monthlyPayements->count() }}</span> en total
              </p>
            </div>
            {{-- <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-ellipsis-v text-secondary"></i>
                </a>
                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                  <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                </ul>
              </div>
            </div> --}}
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">$M payé</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Members</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recu</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($monthlyPayements as $monthlyPayement)


                <tr>

                    <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $monthlyPayement->paymentGiven }} Dhs</h6>
                            <p class="text-sm text-secondary mb-0">{{ $monthlyPayement->created_at->format('d-m-y') }}</p>
                          </div>
                        </div>
                      </td>

                  <td>
                    <div class="avatar-group mt-2">
                      <a href="{{ url('https://omarelamrani.vercel.app/') }}" target="blank" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="EL Amrani Omar">
                        <img src="../assets/img/omar.jpg" alt="team8">
                      </a>
                      <a href="{{ url('https://soufianeekouines.vercel.app/') }}" target="blank" class="avatar avatar-sm rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="EKOUINES Soufiane">
                        <img src="../assets/img/soufiane.png" alt="team9">
                      </a>
                    </div>
                  </td>

                  <td class="align-middle">
                    <div class="text-center progress-wrapper w-75 mx-auto">

                      <a href="#">
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                      </a>

                    </div>
                  </td>
                </tr>

                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card h-100">
        <div class="card-header pb-0">
          <h6>Les paiements du mois {{ now()->format('F') }}</h6>
          {{-- <p class="text-sm">
            <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
            <span class="font-weight-bold">24%</span> this month
          </p> --}}
        </div>
        <div class="card-body p-3">
          <div class="timeline timeline-one-side">

            @foreach ($creditMonth as $monthCredit)
                <div class="timeline-block mb-3">
                <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                </span>
                <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $monthCredit->paymentGiven }} Dhs</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $monthCredit->created_at->format('d-M-y') }}</p>
                </div>
                </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('dashboard')

@endpush

