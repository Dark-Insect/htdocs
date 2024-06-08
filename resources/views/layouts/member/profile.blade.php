@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">My Profile</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th> 1x1 Picture</th>
                            <th>Full Name</th>
                            <th>Member ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th>1x1 Picture</th>
                            <th>Full Name</th>
                            <th>Member ID</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($users)
                            @if ($users)
                                @foreach ($users as $user)
                                    @if ($user->role === 'member')
                                    @if ($user->id === Auth::user()->id)
                                    <tr>
                                            {{-- <td>
                                                <img src="{{ asset($user->photo) }}" width='50' height='50' class="img img-reponsive" />
                                            </td> --}}
                                            <td>
                                                <img src="{{ asset('storage/' . $user->photo) }}" width='50' height='50' class="img img-reponsive"  alt="User Photo"/>
                                            </td> 
                                            <td>{{ $user->first_name . " " . $user->last_name }}</td>
                                            <td>{{ $user->memberId }}</td>
                                            <!-- <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td> -->
                                            <td style="display: flex;">
                                            <!-- @foreach ($loans as $loan)
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan-review', $loan->loan_id) }}">Review</a>
                                            @endforeach
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan-payment-user-loan-lists', $user->id) }}"><i class="fas fa-eye"></i>View Active loan</a> -->
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.member.edit', $user->id) }}"><i class="fas fa-pen"></i>Edit</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan', $loan->loan_id) }}"><i class="fa fa-history"></i>Loan Payment History</a>

                                                <!-- <form action="{{ route('admin.member.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i> Update Role</button>
                                        </form> -->


                                                <!-- <form action="{{ route('admin.member.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i></button>
                                                    @method('DELETE')
                                                </form>
                                                {{-- <a class="btn btn-secondary btn-sm" href="{{ route('admin.member.delete', $user->id) }}"><i class="fas fa-trash"></i></a> --}}
                                            </td> -->
                                        </tr>
                                    @endif
                                    @endif
                                @endforeach
                            @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
