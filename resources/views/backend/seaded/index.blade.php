@extends('layouts.backend.app')
@section('page_vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/pages/app-user.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        
    </div>
    <div class="content-body">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Avaliku saidi URL</h4>
                <p class="card-text" id="public_url">*******************************************</p>
                <button type="button" class="btn btn-primary waves-effect waves-float waves-light" onclick="copyToClipboard('#public_url')">Copy</button>
            </div>
        </div>

        <div class="card mb-4 app-user-view">
            <div class="card-body">
                <h4 class="card-title">Kasutajateave</h4>
                <div class="col-xl-12 col-lg-12 mt-2 mt-xl-0">
                    <div class="user-info-wrapper">
                        <div class="d-flex flex-wrap">
                            <div class="user-info-title">
                                <i data-feather="book" class="mr-1"></i>
                                <span class="card-text user-info-title font-weight-bold mb-0">ettevõtte nimi</span>
                            </div>
                            <p class="card-text mb-0">{{ Auth::user()->company }}</p>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="user-info-title">
                                <i data-feather="user" class="mr-1"></i>
                                <span class="card-text user-info-title font-weight-bold mb-0">Kasutajanimi</span>
                            </div>
                            <p class="card-text mb-0">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="d-flex flex-wrap my-50">
                            <div class="user-info-title">
                                <i data-feather="mail" class="mr-1"></i>
                                <span class="card-text user-info-title font-weight-bold mb-0">Email</span>
                            </div>
                            <p class="card-text mb-0">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="d-flex flex-wrap my-50">
                            <div class="user-info-title">
                                <i data-feather="star" class="mr-1"></i>
                                <span class="card-text user-info-title font-weight-bold mb-0">Roll</span>
                            </div>
                            <p class="card-text mb-0">{{ Auth::user()->role == 'A' || Auth::user()->role == 'SA' ? "Admin" : "Client" }}</p>
                        </div>
                    </div>
                  </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(element) {
        console.log($(element).text())
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert("Your Public Site Url Copied")
    }
</script>

@endsection