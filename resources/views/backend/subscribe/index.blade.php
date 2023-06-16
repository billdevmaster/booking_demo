@extends('layouts.backend.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
    </div>
  </div>
  <div class="content-body">
    <div class="col-12">
      <div class="card">
          <div class="card-body">
            <h4 class="card-title">Telli</h4>
            <p>Lõppkuupäev: {{ $app_plans ? $app_plans->end_date : 'Not Subscribed' }}</p>
            <div class="row">
              @foreach ($plans as $plan)
                <div class="col-12 col-md-4">
                  <div class="card basic-pricing text-center">
                      <div class="card-body">
                          <img src="{{asset('public/assets/backend/app-assets/images/illustration/Pot1.svg')}}" class="mb-2 mt-5" alt="svg img" />
                          <h3>{{ $plan->name }}</h3>
                          <p class="card-text">{{ $plan->description }}</p>
                          <div class="annual-plan">
                              <div class="plan-price mt-2">
                                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                                  <span class="pricing-basic-value font-weight-bolder text-primary">{{ $plan->price }}</span>
                                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/{{ $plan->billing_interval }}</sub>
                              </div>
                              <small class="annual-pricing d-none text-muted"></small>
                          </div>
                          <a href="subscribe/checkout?id={{ $plan->id }}" class="btn btn-block btn-outline-success mt-2">Telli</a>
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script>

</script>
@endsection

@section('page_vendor_js')

@endsection