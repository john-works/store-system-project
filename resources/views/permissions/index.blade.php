@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Permissions Management</h1>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Grant Permissions</a>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Resource</th>
                <th>Actions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $userId => $userPermissions)
                @php $user = $userPermissions->first()->user; @endphp
                @foreach($userPermissions->groupBy('resource') as $resource => $perms)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $resource }}</td>
                        <td>{{ $perms->pluck('action')->implode(', ') }}</td>
                        <td>
                            <a href="{{ route('permissions.edit', $userId) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('permissions.destroy', $userId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove All</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
