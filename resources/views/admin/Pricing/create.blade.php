@extends('layouts.admin')

@section('title')
    Добавить новые данные
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a href="{{route('pricing.index')}}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('pricing.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>title_1</label>
                                    <input class="form-control @error('title_1') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="title_1" type="text">
                                    @error('title_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_1</label>
                                    <input class="form-control @error('text_1') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="text_1" type="text">
                                    @error('text_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_2</label>
                                    <input class="form-control @error('text_2') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="text_2" type="text">
                                    @error('text_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_3</label>
                                    <input class="form-control @error('text_3') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="text_3" type="text">
                                    @error('text_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label> Text_4</label>
                                    <input class="form-control @error('text_4') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="text_4" type="text">
                                    @error('text_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image">

                                </div>

                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    