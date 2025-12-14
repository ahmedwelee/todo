@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('My Todo List') }}</span>
                    <a href="{{ route('todos.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus"></i> {{ __('Add New Todo') }}
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($todos->isEmpty())
                        <div class="text-center py-5">
                            <p class="text-muted">{{ __('No todos yet. Create your first todo!') }}</p>
                            <a href="{{ route('todos.create') }}" class="btn btn-primary">
                                {{ __('Create Todo') }}
                            </a>
                        </div>
                    @else
                        <div class="list-group">
                            @foreach ($todos as $todo)
                                <div class="list-group-item {{ $todo->completed ? 'list-group-item-success' : '' }}">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 {{ $todo->completed ? 'text-decoration-line-through' : '' }}">
                                                {{ $todo->title }}
                                            </h5>
                                            @if ($todo->description)
                                                <p class="mb-1 {{ $todo->completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ Str::limit($todo->description, 100) }}
                                                </p>
                                            @endif
                                            <small class="text-muted">
                                                {{ __('Created:') }} {{ $todo->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{ $todo->completed ? 'btn-warning' : 'btn-success' }}" title="{{ $todo->completed ? __('Mark as Incomplete') : __('Mark as Complete') }}">
                                                    {{ $todo->completed ? '↶' : '✓' }}
                                                </button>
                                            </form>
                                            <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-primary" title="{{ __('Edit') }}">
                                                ✎
                                            </a>
                                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this todo?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ __('Delete') }}">
                                                    ×
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
