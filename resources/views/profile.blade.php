@include('layout.header')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" style="height:100px;">

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container-fluid" style="margin-top:5px;">
        <div class="section-header">
          <h3 class="section-title">Daftar</h3>
          <span class="section-divider"></span>
        </div>

        <br><div class="row">
          <div class="col-lg-6 about-img wow fadeInLeft foto">
              
        <form class="form-horizontal" method="POST" action="/profil/edit" enctype="multipart/form-data">
            
            <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="foto" class="col-md-4 control-label">Foto Profil</label>
                            <div class="col-md-6">
                            <hr/>
                            <img style="width:400px;height:auto;padding-left:10px;" src="{{Auth::user()->foto_profil}}" alt="">
                            <hr/><input id="foto" type="file" class="form-control" name="foto" required>

                                @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
            </div>
          </div>

          <div class="col-lg-6 content wow fadeInRight">
          <div class="panel-body">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tentukan Jenis Pegguna</label>

                            <div class="col-md-6">
                            <ul>
                                <div class="custom-control custom-radio">
                                    <li><input name="rbpakan" value="0" type="radio" class="custom-control-input" id="rb1">
                                    <label class="custom-control-label" for="rb1">Supplier</label></li>
                                </div>
                                <div class="custom-control custom-radio">
                                    <li><input name="rbpakan" value="1" type="radio"  class="custom-control-input" id="rb2">
                                    <label class="custom-control-label" for="rb2">Peternak</label></li>
                                </div>
                                <div class="custom-control custom-radio">
                                    <li><input name="rbpakan" value="1" type="radio"  class="custom-control-input" id="rb2" checked>
                                    <label class="custom-control-label" for="rb2">Konsumen</label></li>
                                </div>
                            </ul>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                            <div class="col-md-6">
                                <input id="email" type="email" disabled class="form-control" name="email" value="{{Auth::user()->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{Auth::user()->alamat}}" required>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nowa') ? ' has-error' : '' }}">
                            <label for="nowa" class="col-md-4 control-label">Nomor WhatsApp</label>

                            <div class="col-md-6">
                                <input id="nowa" type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="0812-1827-2819" required  class="form-control" name="nowa" value="{{Auth::user()->no_wa}}" required>

                                @if ($errors->has('nowa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nowa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notelp') ? ' has-error' : '' }}">
                            <label for="notelp" class="col-md-4 control-label">Nomor Telepon</label>

                            <div class="col-md-6">
                                <input id="notelp" type="tel" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="0812-1827-2819" required class="form-control" name="notelp" value="{{Auth::user()->no_telp}}" required>

                                @if ($errors->has('notelp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notelp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><hr/>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>

      </div>
    </section><!-- #about -->

  </main>

  @include('layout.footer')