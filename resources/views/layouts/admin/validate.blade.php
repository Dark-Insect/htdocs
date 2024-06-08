@extends('layouts.global.dashboard')

@section('title', 'Members')

@section('content')
<main>
    @if (session('deleted'))
        <div class="alert alert-danger text-center">
            {{ session('deleted') }}
        </div>
    @endif
    <style>
    #printable-section {
        font-family: Arial, sans-serif;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        margin: 20px auto;
        max-width: 1200px;
    }

    h1 {
        color: #333;
    }

    p {
        color: #666;
    }

    /* Hide the button when printing */
    @media print {
        button {
            display: none;
        }
    }
</style>
<button style="width: 90px; background-color: red; border-radius: 9px; color: white;" onclick="printPage()">Print</button>
    <div id="printable-section">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Validate</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                           <th>Fullname</th>
                            <th>Member ID</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Loan Amount</th>
                            <th>Loan Type</th>
                            <th>Loan Term</th>
                            <th>Interest</th>
                            <th>Principal</th>
                            <th>Loan Amortization</th>
                            <th>Loan Balance</th>
                            <th>Amount</th>
                            <th>Paid</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fullname</th>
                            <th>Member ID</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Loan Amount</th>
                            <th>Loan Type</th>
                            <th>Loan Term</th>
                            <th>Interest</th>
                            <th>Principal</th>
                            <th>Loan Amortization</th>
                            <th>Loan Balance</th>
                            <th>Amount</th>
                            <th>Paid</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @isset($users)
                            @if ($users)
                                @foreach ($users as $user)
                                    @if ($user->role === 'member')
                                        <tr>
                                            {{-- <td>
                                                <img src="{{ asset($user->photo) }}" width='50' height='50' class="img img-reponsive" />
                                            </td> --}}
                                            <td>
                                                <img src="{{ asset('storage/' . $user->photo) }}" width='50' height='50' class="img img-reponsive"  alt="User Photo"/>
                                            </td> 
                                            <td>
                                              <a href="{{ route('admin.member.personal', $user->id) }}">{{ $user->first_name . " " . $user->last_name }}</a>
                                            </td>
                                            <td>{{ $user->memberId }}</td>
                                            @foreach($loans as $loan)
                                            <td>{{ $loan->loan_purpose}}</td>
                                            @endforeach
                                            <td style="display: flex;">
                                            @foreach ($loans as $loan)
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan-review', $loan->loan_id) }}">Review</a>
                                            @endforeach
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.loan-payment-user-loan-lists', $user->id) }}"><i class="fas fa-eye"></i>View Active loan</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.member.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.member.transaction', $user->id) }}"><i class="fas fa-truck"></i></a>
                                                <!-- <form action="{{ route('admin.member.update', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i> Update Role</button>
                                        </form> -->


                                                <form action="{{ route('admin.member.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-box-archive"></i></button>
                                                    @method('DELETE')
                                                </form>
                                                {{-- <a class="btn btn-secondary btn-sm" href="{{ route('admin.member.delete', $user->id) }}"><i class="fas fa-trash"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</main>
<script>
    function printPage() {
        var printContent = document.getElementById("printable-section");
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent.innerHTML;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>
@endsection
