@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Edit') }}: {{ $event->title }}</div>
                    <div class="card-body">
                        <form method="POST" action="/events/{{ $event->id }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" value="{{ $event->title }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Content</label>
                                    <textarea class="form-control" id="textarea-input" name="content" rows="9" placeholder="{{ __('Content..') }}" required>{{ $event->content }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Applies to date</label>
                                    <input type="date" class="form-control" name="date" value="{{ $event->date }}" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>event type</label>
                                    <input class="form-control" type="text" placeholder="{{ __('event type') }}" name="type" value="{{ $event->type }}" required>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="/events" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        </form>
                    </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-8">
                <div class="card">
                                <div class="card-header">
                                  <i class="fa fa-align-justify"></i>{{ __('Subscribed Users') }}
                                  @if($event->status == 'unpublished')
                                  <form method="POST" action="/events/publish/{{$event->id}}" class="float-right">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-success"  type="submit">publish</button>
                                  </form>
                                  @else
                                  <form method="POST" action="/events/unpublish/{{$event->id}}" class="float-right">
                                      @csrf
                                      @method('PUT')
                                      <button class="btn btn-danger"  type="submit">unpublish</button>
                                  </form>
                                  @endif
                                  </div>
                                <div class="card-body">
                                    <table class="table table-responsive-sm table-striped">
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($users as $key => $user)
                                        <tr>
                                          <th>{{ ++$key }}</th>
                                          <td><b>{{ $user->name }}</b></td>
                                          <td>{{ $user->email }}</td>
                                          <td>{{ $user->status }}</td>
                                          <td>
                                            @if($user->status != 'approved')
                                              <form method="POST" action="/events/approve/{{$user->id}}/{{$event->id}}">
                                                  @csrf
                                                  @method('PUT')
                                                  <button class="btn btn-success"  type="submit">Approve</button>
                                              </form>
                                            @else
                                              <form method="POST" action="/events/unapprove/{{$user->id}}/{{$event->id}}">
                                                  @csrf
                                                  @method('PUT')
                                                  <button class="btn btn-danger"  type="submit">Unapprove</button>
                                              </form>
                                            @endif
                                            </td>
                                            <td>
                                            @if($user->status == 'pending')

                                            <form method="POST" action="/events/remove/{{$user->id}}/{{$event->id}}">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger"  type="submit">Remove</button>
                                            </form>
                                            @endif
                                          </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
