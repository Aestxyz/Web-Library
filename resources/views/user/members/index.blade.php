<x-auth.layout>
    @include('layouts.table')
    <x-slot name="title">Users</x-slot>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="mb-0">Total {{ $members->count() }} users</p>
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    @forelse ($members->take(5) as $item)
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                            class="avatar pull-up" aria-label="{{ $item->name }}"
                            data-bs-original-title="{{ $item->name }}">
                            <img class="rounded-circle" src="/assets/img/avatars/6.png" alt="Avatar">
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                    <h5 class="mb-1">Anggota</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @include('user.members.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>role</th>
                            <th>telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $no => $user)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $user->role }}</span>
                                </td>
                                <td>{{ $user->telp }}</td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center justify-content-center">

                                        @include('user.members.update')
                                        @include('user.destroy')

                                        <a class="btn btn-outline-primary btn-sm"
                                            href="{{ route('users.show', $user->slug) }}" role="button">Lihat</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth.layout>