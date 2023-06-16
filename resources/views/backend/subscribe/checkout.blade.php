@extends('layouts.backend.app')

@section('page_vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/pages/app-ecommerce.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
    </div>
  </div>
  <div class="content-body">
    <div class="col-12">
      <div class="card">
          <div class="card-body ecommerce-application" id="subscription">
            <h4 class="card-title">Telli</h4>
            <input type="hidden" id="app_id" value="{{ $app->id }}" />
            <input type="hidden" id="plan_id" value="{{ $plan->id }}" />
            <input type="hidden" id="payment_url" value="{{ env('SAAS_URL') }}" />
            <div class="checkout-options">
              <div class="card">
                  <div class="card-body">
                      <div class="price-details">
                          <h6 class="price-title">Tellimuse üksikasjad</h6>
                          <ul class="list-unstyled">
                              <li class="price-detail">
                                  <div class="detail-title">Nimi</div>
                                  <div class="detail-amt">{{ $plan->name }}</div>
                              </li>
                              <li class="price-detail">
                                  <div class="detail-title">Kirjeldus</div>
                                  <div class="detail-amt">{{ $plan->description }}</div>
                              </li>
                              <li class="price-detail">
                                  <div class="detail-title">Hind</div>
                                  <div class="detail-amt text-success">{{ $plan->price }} / {{ $plan->billing_interval }}</div>
                                  <input type="hidden" id="price" value="{{ $plan->price }}">
                              </li>
                              <li class="price-detail">
                                <div class="detail-title">{{ $plan->billing_interval }}s</div>
                                <div class="detail-amt">
                                  <input type="number" class="form-control" placeholder="" aria-label="Coupons" aria-describedby="input-coupons" id="pay_amounts" value="1" />
                                </div>
                            </li>
                          </ul>
                          <hr />
                          <ul class="list-unstyled">
                              <li class="price-detail">
                                  <div class="detail-title detail-total">Kokku</div>
                                  <div class="detail-amt font-weight-bolder" id="total_price">{{ $plan->price }}</div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
                <!-- Checkout Place Order Right ends -->
            </div>
            <form id="payment-form"> 
              <div id="card-element"></div>
              <button class="btn btn-primary mt-1 btn-block btn-next place-order" type="submit">Telli</button>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
