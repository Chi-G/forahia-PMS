<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://code.jquery.com https://cdn.jsdelivr.net;"> --}}
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tether Elite Finance">
	<meta property="og:title" content="Tether Elite Finance">
	<meta property="og:description" content="Tether Elite Finance">
	<meta property="og:image" content="Tether Elite Finance">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard | Tether Elite Finance</title>

    {{-- Include JQuery script --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Include sweetalert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>

    <!-- Include sweetalert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css">

	@include('admin.include.css')

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="loader">
	</div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
				<img src="{{ asset('backend/images/logo/logo.png')}}" class="logo-abbr" alt="">
				<img src="{{ asset('backend/images/logo/logo-text.png')}}" class="brand-title" alt="">
				<img src="{{ asset('backend/images/logo/logo-color.png')}}" class="logo-color" alt="">
				<img src="{{ asset('backend/images/logo/logo-text-color.png')}}" class="brand-title color-title" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
					<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
					</svg>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Chat box start
        ***********************************-->

		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        @include('admin.include.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.include.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users withdrawal Management</h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper">

                                        <!-- Edit Withdrawal Modal -->
                                        <div class="modal fade" id="editWithdrawalModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Withdrawal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" id="editWithdrawalForm">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <input type="hidden" name="withdrawal_id" id="withdrawal_id">
                                                            <input type="hidden" name="user_id" id="user_id">

                                                            <div class="mb-3">
                                                                <label for="user_name">User</label>
                                                                <input class="form-control" id="user_name" readonly>
                                                            </div>

                                                            <!-- Select Subscription Plan -->
                                                            <div class="mb-3">
                                                                <label for="referral_bonus">Subscription</label>
                                                                <select name="subscription_id" id="subscription" class="form-control">
                                                                    {{-- <option value="">-- Select Subscription --</option> --}}
                                                                    @foreach($subscriptions as $subscription)
                                                                        <option value="{{ $subscription->id }}">{{ $subscription->plan->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="service_fees">Amount</label>
                                                                <input class="form-control" type="text" name="amount" id="amount">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="investment_and_yields">Wallet Address</label>
                                                                <input class="form-control" type="text" name="wallet_address" id="wallet_address">
                                                            </div>

                                                            <!-- Select Withdrawal Status -->
                                                            <div class="form-group">
                                                                <label for="status">Withdrawal Status</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="Not-Requested">Not Requested</option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Contracting">Contracting</option>
                                                                    <option value="Evaluating">Evaluating</option>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Completed">Completed</option>
                                                                </select>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Withdrawal Table -->
                                        <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">

                                            <thead>
                                                <tr role="row">
                                                    <th>S/N</th>
                                                    <th>Users</th>
                                                    <th>Subscription</th>
                                                    <th>Amount</th>
                                                    <th>Wallet Address</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($withdrawals as $withdrawal)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><span class="badge light badge-success">{{ $withdrawal->user->name }}</span></td>
                                                        <td>{{ $withdrawal->user->subscription->plan->name ?? 'No Subscription' }}</td>
                                                        <td>{{ $withdrawal->amount }}</td>
                                                        <td>{{ $withdrawal->wallet_address }}</td>
                                                        <td>{{ $withdrawal->status }}</td>
                                                        <td>{{ $withdrawal->created_at->format('d M Y') }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <!-- Edit button -->
                                                                <button class="btn btn-primary shadow btn-xs sharp me-1 btn-edit"
                                                                    data-id="{{ $withdrawal->id }}"
                                                                    data-user-id="{{ $withdrawal->user_id }}"
                                                                    data-user-name="{{ $withdrawal->user->name }}"
                                                                    data-subscription="{{ $withdrawal->user->subscription->plan->name ?? 'No Subscription' }}"
                                                                    data-amount="{{ $withdrawal->amount }}"
                                                                    data-wallet-address="{{ $withdrawal->wallet_address }}"
                                                                    data-status="{{ $withdrawal->status }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editWithdrawalModal">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>

                                                                <!-- Delete form -->
                                                                <form action="{{ route('admin.withdrawal.destroy', $withdrawal->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp btn-delete" data-id="{{ $withdrawal->id }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Pagination -->
                                        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                            {{ $withdrawals->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
				</div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.include.footer')

	</div>

    <!--**********************************
        Scripts
    ***********************************-->

    @include('admin.include.script')

    {{-- Submit edit modal form --}}
    <script>
        $(document).ready(function () {
            $('.btn-edit').on('click', function () {
                // Get the data from the button
                var withdrawalId = $(this).data('id');
                var userName = $(this).data('user-name');
                var userId = $(this).data('user-id');
                var subscription = $(this).data('subscription');
                var amount = $(this).data('amount');
                var walletAddress = $(this).data('wallet-address');
                var status = $(this).data('status');

                // Log the values to the console for debugging
                console.log("Subscription: " + subscription);
                console.log("Amount: " + amount);
                console.log("Wallet Address: " + walletAddress);
                console.log("Status: " + status);


                // Set the values in the modal inputs
                $('#withdrawal_id').val(withdrawalId);
                $('#user_id').val(userId);
                $('#user_name').val(userName);
                $('#subscription').val(subscription);
                $('#amount').val(amount);
                $('#wallet_address').val(walletAddress);
                $('#status').val(status);

                // Show the modal
                $('#editWithdrawalModal').modal('show');

                $('#editWithdrawalForm').off('submit');

                // Handle form submission with AJAX
                $('#editWithdrawalForm').on('submit', function (e) {
                    e.preventDefault();

                    var withdrawalId = $('#withdrawal_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('admin.withdrawal.update', '') }}" + '/' + withdrawalId,
                        method: 'POST',
                        data: $(this).serialize(), // Serialize form data
                        success: function (response) {
                            // Success Alert using SweetAlert
                            Swal.fire({
                                title: 'Success!',
                                text: 'Withdrawal updated successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#editWithdrawalModal').modal('hide');
                                    location.reload();
                                }
                            });
                        },
                        error: function (response) {
                            // Handle errors (e.g., validation errors)
                            if (response.responseJSON && response.responseJSON.errors) {
                                $.each(response.responseJSON.errors, function (key, value) {
                                    Swal.fire({
                                        title: 'Validation Error!',
                                        text: value[0],
                                        icon: 'warning',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to update user Withdrawal.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                });
            });
        });
    </script>

    {{-- Delete Withdrawal with SweetAlert confirmation --}}
    <script>
        $(document).ready(function () {
        // Set CSRF token in AJAX request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            // Delete Withdrawal Record
            $('.btn-delete').on('click', function (e) {
                e.preventDefault();
                var withdrawalId = $(this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you can't undo this action!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: "{{ route('admin.withdrawal.destroy', '') }}" + '/' + withdrawalId,
                            success: function (response) {
                                Swal.fire({
                                    title: response.status,
                                    text: response.status_text,
                                    icon: response.status_icon,
                                    confirmButtonText: "Okay"
                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function (response) {
                                swal("Error!", "Failed to delete Withdrawal.", "error");
                            }
                        });
                    } else {
                        swal("You have canceled the delete action!");
                    }
                });
            });
        });
    </script>

    {{-- Toastr Options --}}
    <script>
            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };
    </script>

</body>
</html>
