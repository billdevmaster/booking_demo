@extends('layouts.backend.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        @if ($message)
            <div class="alert alert-danger">
                <div class="alert-body">
                  {{ $message }}
                </div>
            </div>
        @endif
    </div>
  </div>
  <div class="content-body">
    <div class="col-12">
      <div class="card">
          <div class="card-body">
            <h4 class="card-title">Telli</h4>
            <div class="row">
              @foreach ($plans as $plan)
                <div class="col-12 col-md-4">
                  <div class="card basic-pricing text-center">
                      <div class="card-body">
                          
                          <img src="{{asset('public/assets/backend/app-assets/images/illustration/Pot1.svg')}}" class="mb-2 mt-5" alt="svg img" />
                          <div style="height: 50px;">
                            <h3>{{ $plan['product']['name'] }}</h3>
                            <p class="card-text">{{ $plan['product']['description'] }}</p>
                          </div>
                          <div style="height: 50px">
                            <div class="annual-plan">
                                <div class="plan-price mt-2">
                                    <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                                    <span class="pricing-basic-value font-weight-bolder text-primary">{{ $plan['unit_amount'] / 100 }}</span>
                                    <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/{{ $plan['recurring']['interval'] }}</sub>
                                </div>
                                <small class="annual-pricing d-none text-muted"></small>
                            </div>
                            @if ($app_subscription != null && $app_subscription->price_id == $plan['id'])
                            <div class="pt-1">
                              <div class="badge badge-success">Current Plan</div>
                            </div>
                          </div>
                          <form action="{{ env('SAAS_URL') }}/api/subscribe/create_portal_session" method="POST">
                            <!-- Add a hidden field with the lookup_key of your Price -->
                            <input type="hidden" name="customer_id" value="{{ $app_subscription->customer_id }}" />
                            <input type="hidden" name="app_url" value="{{ env('APP_URL') }}" />
                            <button id="checkout-and-portal-button" class="btn btn-block btn-warning mt-2" type="submit">Edit</button>
                          </form>  
                          @else
                          </div>
                          <form action="{{ env('SAAS_URL') }}/api/subscribe/create_checkout_session" method="POST">
                            <!-- Add a hidden field with the lookup_key of your Price -->
                            <input type="hidden" name="price_id" value="{{ $plan['id'] }}" />
                            <input type="hidden" name="domain" value="{{ env('APP_URL') }}" />
                            <button id="checkout-and-portal-button" class="btn btn-block btn-outline-success mt-2" type="submit">Checkout</button>
                          </form>
                          @endif
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