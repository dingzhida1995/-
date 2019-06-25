@extends('layout.index')
@section('title','微商城注册')
@section('content')
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>REGISTER</h3>
            </div>
            <div class="register">
                <div class="row">
                    <form class="col s12"  action="{{url('home/registerdo')}}" method="post">
                        @csrf
                        <div class="input-field" >
                            <input type="text" name="name" class="validate" placeholder="NAME" required>
                        </div>
                        <div class="input-field">
                            <input type="password" name="pwd" placeholder="PASSWORD" class="validate" required>
                        </div>
                        <input type="submit" value="REGISTER" class="btn button-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection