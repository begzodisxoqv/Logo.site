@extends('layouts.admin')

@section('title')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('pricing.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('pricing.update', $pricing->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>title_1 </label>
                                    <input class="form-control @error('title_1') is-invalid @enderror" value="{{ $pricing->title_1 }}"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="title_1" type="text">
                                    @error('title_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_1 </label>
                                    <input class="form-control @error('text_1') is-invalid @enderror" value="{{ $pricing->text_1 }}"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="text_1" type="text">
                                    @error('text_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_2 </label>
                                    <input class="form-control @error('text_2') is-invalid @enderror" value="{{ $pricing->text_2 }}"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="text_2" type="text">
                                    @error('text_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>text_3 </label>
                                    <input class="form-control @error('text_3') is-invalid @enderror" value="{{ $pricing->text_3 }}"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="text_3" type="text">
                                    @error('text_3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                

                                <div class="col-md-6 form-group mb-3">
                                    <label>text_4</label>
                                    <input class="form-control @error('text_4') is-invalid @enderror" value="{{ $pricing->text_4 }}"
                                           autocomplete="off" placeholder="Например: Бакалавр" name="text_4" type="text">
                                    @error('text_4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                              


                                <div class="col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $pricing->image) }}" class="img-fluid"
                                         style="max-width: 200px;">
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

