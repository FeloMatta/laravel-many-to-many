@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Tutte le Tecnologie
                </h1>

                <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">
                    Aggiungi Tecnologia
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('page.name') }}</th>
                            <th scope="col">Slug</th>
                            <th scope="col"># {{ __('page.projects') }}</th>
                            <th scope="col">{{ __('page.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">{{ $technology->id }}</th>
                                <td>
                                    <span class="text-capitalize">{{ $technology->name }}</span>
                                </td>
                                <td>{{ $technology->slug }}</td>
                                <td>{{ $technology->projects()->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-wrench"></i>
                                    </a>
                                    <form
                                        class="d-inline-block"
                                        action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questa tecnologia?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection