@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('product.index')}}">

    <input type="text" name="city">
    <button type="submit">Get Recommendation</button>

</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
