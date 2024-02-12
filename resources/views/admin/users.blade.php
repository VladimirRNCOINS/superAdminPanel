@extends('layouts.dashboard')

@section('title')
    Users
@endsection

@section('content')
    @if (isset($users))
    <div class="div_item_admin_block">
        
            <div id="wrap_data_users">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Active</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>{{ $user->publish }}</td>
                                    <td>
                                        <a href="{{ route('edit_user', $user->id) }}">
                                            <button type="button" class="btn btn-primary g_my_stilizy">
                                                <span class="material-icons">edit</span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        <div id="wrap_custom_pagination_block">
            <div id="inside_wrap_custom_pagination_block">
                <div class="pagination_element" id="fast_rewind">
                    <span class="material-icons">
                        fast_rewind
                    </span>
                </div>
                <div class="pagination_element" id="arrow_left">
                    <span class="material-icons">
                        arrow_left
                    </span>
                </div>
                <div class="pagination_text">
                    <span>Страница:</span>
                </div>
                <div class="pagination_element" id="current_page">
                    <input type="text" name="current_page" class="form-control" value="{{ $users->currentPage }}" autocomplete="off">
                </div>
                <div class="pagination_text">
                    <span id="span_last_page">из {{ $users->lastPage }}</span>
                </div>
                <div class="pagination_element" id="arrow_right">
                    <span class="material-icons">
                        arrow_right
                    </span>
                </div>
                <div class="pagination_element" id="fast_forward">
                    <span class="material-icons">
                        fast_forward
                    </span>
                </div>
                <div class="pagination_element" id="refresh">
                    <span class="material-icons">
                        refresh
                    </span>
                </div>
                <div class="pagination_text">
                    <span>На странице:</span>
                </div>
                <div class="pagination_element" id="per_page">
                    <input type="text" name="per_page" class="form-control" value="{{ $users->perPage }}" autocomplete="off">
                </div>
            </div>
        </div>
        
    </div>
    @endif
@endsection