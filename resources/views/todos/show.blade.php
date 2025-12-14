@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Todo Details') }}</span>
                    <a href="{{ route('todos.index') }}" class="btn btn-secondary btn-sm">
                        {{ __('Back to List') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="card-title {{ $todo->completed ? 'text-decoration-line-through text-success' : '' }}">
                            {{ $todo->title }}
                        </h5>
                    </div>

                    @if ($todo->description)
                        <div class="mb-3">
                            <label class="fw-bold">{{ __('Description:') }}</label>
                            <p class="{{ $todo->completed ? 'text-decoration-line-through' : '' }}">
                                {{ $todo->description }}
                            </p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="fw-bold">{{ __('Status:') }}</label>
                        <span class="badge {{ $todo->completed ? 'bg-success' : 'bg-warning' }}">
                            {{ $todo->completed ? __('Completed') : __('Pending') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">{{ __('Created:') }}</label>
                        <span>{{ $todo->created_at->format('M d, Y h:i A') }}</span>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">{{ __('Last Updated:') }}</label>
                        <span>{{ $todo->updated_at->format('M d, Y h:i A') }}</span>
                    </div>

                    <div class="d-flex gap-2">
                        <form action="{{ route('todos.toggle', $todo) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn {{ $todo->completed ? 'btn-warning' : 'btn-success' }}">
                                {{ $todo->completed ? __('Mark as Incomplete') : __('Mark as Complete') }}
                            </button>
                        </form>
                        <a href="{{ route('todos.edit', $todo) }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this todo?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
