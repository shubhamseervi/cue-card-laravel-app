@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Card</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cards') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                          <label for="front" class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                              <select  name="category" class="selectpicker form-control " title="Choose one of the following.">
                                @foreach ($categories as $key => $value)
                                    <option value="{{$value}}">{{$key}}</option>
                                @endforeach
                              </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('front') ? ' has-error' : '' }}">
                            <label for="front" class="col-md-4 control-label">Front</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="front" id="front" rows="3"></textarea>

                                @if ($errors->has('front'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('front') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('back') ? ' has-error' : '' }}">
                            <label for="back" class="col-md-4 control-label">Back</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="back" id="back" rows="3"></textarea>

                                @if ($errors->has('back'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('back') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add new
                                </button>
                            </div>
                        </div>
                    </form>


                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/categories') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">category name</label>

                            <div class="col-md-6">

                                <input id="category_name" type="text" class="form-control" name="category_name" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id}}">

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add new
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

<script src="/js/bootstrap-select.js"></script>

@endsection
